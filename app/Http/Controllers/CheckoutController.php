<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Cart;
use Midtrans\Config;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\OrderItem;
use Midtrans\Notification;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Untuk logging
use App\Models\Barang; // Pastikan model Barang di-import
use Illuminate\Support\Facades\Validator; // Untuk validasi
use Midtrans\Notification as MidtransNotification; // Alias untuk Midtrans Notification

class CheckoutController extends Controller
{
    public function show()
    {
        // 1. Dapatkan pengguna yang sedang login
        $user = Auth::user();

        // 2. Ambil keranjang milik user, beserta relasi item dan barangnya
        // 'items.barang' -> Eager loading untuk efisiensi query database
        $cart = $user->cart()->with('items.barang')->first();

        // 3. JAGA-JAGA: Jika keranjang tidak ada atau kosong, kembalikan ke halaman lain
        if (!$cart || $cart->items->isEmpty()) {
            // Ganti 'home' dengan route yang Anda inginkan (misal: 'keranjang.index')
            return redirect()->route('home.index')->with('error', 'Keranjang Anda kosong!');
        }

        // 4. Ambil semua item dari keranjang
        $cartItems = $cart->items;

        // 5. Hitung total harga
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->barang->harga;
        });

        // 6. Hitung total jumlah item
        $totalItemsInCart = $cartItems->sum('quantity');

        // 7. Ambil daftar alamat milik pengguna
        $alamatList = $user->alamats;

        // 8. Kirim semua data ke view
        return view('payment', [
            'cartItems'        => $cartItems,
            'total'            => $total,
            'alamatList'       => $alamatList,
            'totalItemsInCart' => $totalItemsInCart,
        ]);
    }

    /**
     * Memproses pembayaran dan membuat order. (Handle POST Request dari Fetch)
     */
    public function processPayment(Request $request)
    {
        // Gunakan DB Transaction untuk memastikan semua proses berhasil atau tidak sama sekali
        DB::beginTransaction();

        try {
            // 1. Validasi request, terutama alamat_id
            $validator = Validator::make($request->all(), [
                'alamat_id' => 'required|exists:alamat,id,user_id,' . Auth::id(),
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Alamat tidak valid.', 'errors' => $validator->errors()], 422);
            }

            // 2. Ambil data user & keranjang (sebagai validasi ulang di server)
            $user = Auth::user();
            $cart = $user->cart()->with('items.barang')->first();

            if (!$cart || $cart->items->isEmpty()) {
                return response()->json(['message' => 'Keranjang Anda kosong.'], 400);
            }

            // 3. Buat Order di database dengan status "pending"
            $total = $cart->items->sum(fn($item) => $item->barang->harga * $item->quantity);
            $orderCode = 'ORDER-' . Str::upper(Str::random(8));

            $order = Order::create([
                'user_id'    => $user->id,
                'alamat_id'  => $request->alamat_id,
                'order_code' => $orderCode,
                'total'      => $total,
                'status'     => 'pending',
            ]);

            // 4. Masukkan semua item dari keranjang ke order_items
            foreach ($cart->items as $item) {
                OrderItem::create([
                    'order_id'  => $order->id,
                    'barang_id' => $item->barang_id,
                    'quantity'  => $item->quantity,
                    'price'     => $item->barang->harga,
                ]);
            }

            // 5. Konfigurasi Midtrans
            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = config('midtrans.is_production');
            Config::$isSanitized = true;
            Config::$is3ds = true;

            // 6. Siapkan parameter untuk Midtrans
            $params = [
                'transaction_details' => [
                    'order_id'     => $order->order_code,
                    'gross_amount' => $order->total,
                ],
                'customer_details' => [
                    'first_name' => $user->nama, // asumsikan ada kolom 'nama'
                    'email'      => $user->email,
                ],
            ];

            // 7. Dapatkan Snap Token dari Midtrans
            $snapToken = Snap::getSnapToken($params);

            // Jika semua berhasil, hapus item di keranjang
            $cart->items()->delete();

            // Commit transaksi jika semua berhasil
            DB::commit();

            // 8. Kirim Snap Token kembali ke frontend
            return response()->json(['snapToken' => $snapToken]);
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi error
            DB::rollBack();
            Log::error('Payment Processing Error: ' . $e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat memproses pembayaran.'], 500);
        }
    }

    public function handleCallback(Request $request)
    {
        // 1. Catat semua data notifikasi yang masuk untuk debugging
        Log::info('Midtrans Callback Received - Start Processing.');
        Log::info('Raw Notification Data:', ['data' => $request->getContent()]);

        // 2. Set konfigurasi Midtrans (penting dilakukan di setiap request callback)
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true; // Input yang di-sanitize direkomendasikan
        Config::$is3ds = true;       // Sesuaikan jika Anda tidak menggunakan 3DS

        try {
            // 3. Buat instance notifikasi dari Midtrans SDK
            // SDK akan otomatis mem-parse JSON dari body request
            $notification = new MidtransNotification();

            // 4. Ambil detail penting dari notifikasi
            $transactionStatus = $notification->transaction_status;
            $orderId = $notification->order_id; // Ini adalah 'order_code' yang Anda kirim ke Midtrans
            $fraudStatus = $notification->fraud_status;
            $paymentType = $notification->payment_type; // Jenis pembayaran, misal: 'gopay', 'bank_transfer'

            Log::info('Parsed Midtrans Notification:', [
                'order_id' => $orderId,
                'transaction_status' => $transactionStatus,
                'fraud_status' => $fraudStatus,
                'payment_type' => $paymentType,
                'gross_amount_notif' => $notification->gross_amount ?? 'N/A'
            ]);

            // 5. Cari order di database Anda berdasarkan order_code
            $order = Order::where('order_code', $orderId)->first();

            if (!$order) {
                Log::warning('Midtrans Callback: Order not found in database.', ['order_code' => $orderId]);
                // Midtrans mengharapkan respons 200 OK bahkan jika order tidak ditemukan untuk menghindari pengiriman ulang notifikasi
                return response()->json(['message' => 'Order not found, but notification acknowledged.'], 200);
            }

            // 6. Hindari pemrosesan ganda: Jika order sudah 'paid', jangan proses lagi
            if ($order->status === 'paid') {
                Log::info('Midtrans Callback: Order already marked as paid. Skipping.', ['order_code' => $orderId]);
                return response()->json(['message' => 'Order already processed.']);
            }

            // 7. Proses berdasarkan status transaksi
            //    Untuk sebagian besar metode, 'settlement' berarti sukses.
            //    Untuk kartu kredit, 'capture' dengan fraud_status 'accept' berarti sukses.
            if ($transactionStatus == 'settlement' || ($transactionStatus == 'capture' && $fraudStatus == 'accept')) {
                // Jika pembayaran sukses, lakukan semua update dalam transaksi database
                DB::transaction(function () use ($order, $notification) {
                    Log::info('Processing successful payment for order.', ['order_code' => $order->order_code]);

                    // a. Update status order menjadi 'paid'
                    $order->status = 'paid';
                    // Anda mungkin ingin menyimpan detail pembayaran lain jika perlu
                    // $order->payment_type = $notification->payment_type;
                    // $order->payment_details = json_encode($notification->toArray()); // Simpan semua detail notif
                    $order->save();
                    Log::info('Order status updated to paid.', ['order_code' => $order->order_code]);

                    // b. Kurangi stok barang
                    // Pastikan model Order memiliki relasi orderItems()
                    // public function orderItems() { return $this->hasMany(OrderItem::class); }
                    // Dan OrderItem memiliki relasi barang()
                    // public function barang() { return $this->belongsTo(Barang::class); }
                    $orderItems = OrderItem::where('order_id', $order->id)->with('barang')->get();

                    if ($orderItems->isEmpty()) {
                        Log::warning('No order items found for a paid order.', ['order_code' => $order->order_code]);
                    }

                    foreach ($orderItems as $item) {
                        if ($item->barang) { // Pastikan objek barang ada
                            $barang = $item->barang;
                            $stokSebelumnya = $barang->stok;
                            $barang->stok -= $item->quantity;
                            if ($barang->stok < 0) { // Hindari stok negatif
                                Log::warning('Stock for item became negative, setting to 0.', [
                                    'barang_id' => $barang->id,
                                    'nama_produk' => $barang->nama_produk,
                                    'stok_diminta' => $item->quantity,
                                    'stok_sebelumnya' => $stokSebelumnya
                                ]);
                                $barang->stok = 0;
                            }
                            $barang->save();
                            Log::info('Stock updated for barang.', [
                                'barang_id' => $barang->id,
                                'nama_produk' => $barang->nama_produk,
                                'stok_berkurang' => $item->quantity,
                                'stok_sekarang' => $barang->stok
                            ]);
                        } else {
                            Log::warning('Associated barang not found for order item.', [
                                'order_item_id' => $item->id,
                                'barang_id_ref' => $item->barang_id
                            ]);
                        }
                    }

                    // c. Kosongkan keranjang (cart dan cart_items) milik user
                    $cart = Cart::where('user_id', $order->user_id)->first();
                    if ($cart) {
                        // Hapus semua item dari keranjang tersebut
                        // Pastikan model Cart memiliki relasi items()
                        // public function items() { return $this->hasMany(CartItem::class); }
                        CartItem::where('cart_id', $cart->id)->delete();
                        Log::info('Cart items deleted for user.', ['user_id' => $order->user_id, 'cart_id' => $cart->id]);

                        // Opsional: Hapus juga record Cart itu sendiri jika diinginkan
                        // $cart->delete();
                        // Log::info('Cart record deleted for user.', ['user_id' => $order->user_id, 'cart_id' => $cart->id]);
                    } else {
                        Log::info('No active cart found for user to clear.', ['user_id' => $order->user_id]);
                    }

                    // Tambahkan logika lain jika perlu, misalnya mengirim email konfirmasi
                });
            } else if (in_array($transactionStatus, ['pending'])) {
                // Order masih pending, mungkin hanya update timestamp atau biarkan
                if ($order->status !== 'paid') { // Jangan ubah jika sudah 'paid' oleh notif lain
                    $order->status = 'pending';
                    $order->save();
                    Log::info('Order status set/confirmed as pending.', ['order_code' => $orderId]);
                }
            } else if (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
                // Order gagal atau dibatalkan
                if ($order->status !== 'paid') { // Jangan ubah jika sudah 'paid'
                    $order->status = $transactionStatus; // Atau status internal Anda untuk 'failed'/'canceled'
                    $order->save();
                    Log::info('Order status updated to failed/canceled.', ['order_code' => $orderId, 'new_status' => $transactionStatus]);
                    // Di sini Anda mungkin tidak perlu mengurangi stok atau mengosongkan keranjang.
                    // Atau, jika barang sudah "dipesan" (stok dikurangi sementara), Anda mungkin perlu mengembalikan stok.
                }
            } else {
                Log::info('Unhandled Midtrans transaction status.', ['order_code' => $orderId, 'status' => $transactionStatus]);
            }

            // 8. Kirim respons HTTP 200 OK ke Midtrans agar tidak mengirim notifikasi berulang
            return response()->json(['message' => 'Notification processed successfully.']);
        } catch (\Exception $e) {
            // Tangani semua jenis error dan log
            DB::rollBack(); // Jika transaksi aktif dan terjadi error, batalkan
            Log::error('Midtrans Callback General Error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'order_id_attempted' => $orderId ?? 'N/A' // orderId mungkin belum terdefinisi jika error di awal
            ]);
            // Tetap kirim 200 OK jika memungkinkan, atau 500 jika error parah
            return response()->json(['message' => 'Error processing notification on server.', 'error' => $e->getMessage()], 500);
        }
    }
}

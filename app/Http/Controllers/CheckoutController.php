<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Barang; // Pastikan model Barang di-import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Untuk logging
use Illuminate\Support\Facades\Validator; // Untuk validasi
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification as MidtransNotification; // Alias untuk Midtrans Notification

class CheckoutController extends Controller
{
    public function payment(Request $request)
    {
        $user = Auth::user();
        $cart = $user->cart()->with('items.barang')->first();

        if (!$cart || $cart->items->isEmpty()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Keranjang kosong.'], 400);
            }
            return redirect()->back()->with('error', 'Keranjang kosong.');
        }

        $total = $cart->items->sum(fn($item) => $item->barang->harga * $item->quantity);

        // Jika ini adalah POST request (dari tombol "Bayar Sekarang" via fetch)
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'alamat_id' => 'required|exists:alamat,id,user_id,' . $user->id, // Validasi alamat_id ada, valid, dan milik user
            ]);

            if ($validator->fails()) {
                Log::error('Validation failed for payment:', $validator->errors()->toArray());
                return response()->json(['errors' => $validator->errors(), 'message' => 'Data tidak valid.'], 422);
            }

            $alamatId = $request->input('alamat_id');
            Log::info('Alamat ID received in POST:', ['alamat_id' => $alamatId]); // Log alamatId yang diterima

            $orderCode = 'ORDER-' . Str::upper(Str::random(8));

            try {
                $order = Order::create([
                    'user_id'    => $user->id,
                    'alamat_id'  => $alamatId, // Ini yang menyebabkan error jika $alamatId null
                    'order_code' => $orderCode,
                    'total'      => $total,
                    'status'     => 'pending',
                ]);
                Log::info('Order created successfully:', ['order_id' => $order->id, 'order_code' => $orderCode]);

                foreach ($cart->items as $item) {
                    OrderItem::create([
                        'order_id'  => $order->id,
                        'barang_id' => $item->barang->id,
                        'quantity'  => $item->quantity,
                        'price'     => $item->barang->harga,
                    ]);
                }
                Log::info('Order items created for order:', ['order_id' => $order->id]);

                // Midtrans Setup
                Config::$serverKey = config('midtrans.server_key');
                Config::$isProduction = config('midtrans.is_production');
                Config::$isSanitized = config('midtrans.sanitized');
                Config::$is3ds = config('midtrans.3ds');

                $transactionDetails = [
                    'order_id'     => $orderCode,
                    'gross_amount' => $total,
                ];

                $itemDetails = [];
                foreach ($cart->items as $item) {
                    $itemDetails[] = [
                        'id'       => $item->barang->id,
                        'price'    => $item->barang->harga,
                        'quantity' => $item->quantity,
                        'name'     => Str::limit($item->barang->nama_produk, 50), // Batasi panjang nama produk jika perlu
                    ];
                }

                $customerDetails = [
                    'first_name' => $user->nama, // Asumsi ada kolom 'nama' di model User
                    'email'      => $user->email,
                    // 'phone'      => $user->phone_number, // Jika ada
                    // Tambahkan billing_address dan shipping_address jika diperlukan
                ];

                $params = [
                    'transaction_details' => $transactionDetails,
                    'item_details'        => $itemDetails,
                    'customer_details'    => $customerDetails,
                ];

                $snapToken = Snap::getSnapToken($params);
                Log::info('Snap token generated:', ['snap_token' => $snapToken]);
                return response()->json(['snapToken' => $snapToken]);
            } catch (\Exception $e) {
                Log::error('Error during payment processing or Midtrans Snap Token generation:', [
                    'message' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                    'request_data' => $request->all()
                ]);
                return response()->json(['message' => 'Gagal memproses pembayaran.', 'error' => $e->getMessage()], 500);
            }
        }

        // Jika ini adalah GET request (untuk menampilkan halaman checkout)
        $alamatList = $user->alamats; // Ambil daftar alamat untuk ditampilkan di form
        $totalItemsInCart = $cart->items->sum('quantity'); // Untuk tampilan summary

        return view('checkout.payment', [
            'cartItems'        => $cart->items,
            'total'            => $total,
            'alamatList'       => $alamatList,
            'totalItemsInCart' => $totalItemsInCart, // Kirim total item ke view
            // snapToken tidak dikirim di sini, akan didapatkan via fetch POST nanti
        ]);
    }

    public function handleCallback(Request $request)
    {
        Log::info('Midtrans callback received:', $request->all());
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');

        try {
            $notification = new MidtransNotification(); // Objek notifikasi dari Midtrans SDK

            $transactionStatus = $notification->transaction_status;
            $orderId = $notification->order_id; // Ini adalah 'order_code' Anda
            $fraudStatus = $notification->fraud_status;
            $paymentType = $notification->payment_type;

            $order = Order::where('order_code', $orderId)->first();

            if (!$order) {
                Log::warning('Midtrans Callback: Order not found.', ['order_code' => $orderId]);
                return response()->json(['message' => 'Order not found'], 404);
            }

            // Hindari proses ganda jika order sudah pernah diproses (misal sudah 'paid')
            if (in_array($order->status, ['paid', 'settlement', 'capture'])) {
                Log::info('Midtrans Callback: Order already processed.', ['order_code' => $orderId, 'status' => $order->status]);
                return response()->json(['message' => 'Order already processed']);
            }

            $statusToUpdate = $order->status; // Default ke status saat ini

            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'challenge') {
                    $statusToUpdate = 'challenge';
                } else if ($fraudStatus == 'accept') {
                    $statusToUpdate = 'paid';
                }
            } else if ($transactionStatus == 'settlement') {
                $statusToUpdate = 'paid';
            } else if ($transactionStatus == 'pending') {
                $statusToUpdate = 'pending';
            } else if ($transactionStatus == 'deny') {
                $statusToUpdate = 'denied';
            } else if ($transactionStatus == 'expire') {
                $statusToUpdate = 'expired';
            } else if ($transactionStatus == 'cancel') {
                $statusToUpdate = 'canceled';
            }

            if ($order->status !== $statusToUpdate) {
                $order->status = $statusToUpdate;
                $order->save();
                Log::info('Order status updated.', ['order_code' => $orderId, 'new_status' => $statusToUpdate]);
            }


            // Jika pembayaran berhasil ('paid')
            if ($statusToUpdate == 'paid') {
                // Kurangi stok barang
                // Pastikan model Order memiliki relasi orderItems
                // Di model Order.php: public function orderItems() { return $this->hasMany(OrderItem::class); }
                foreach ($order->orderItems as $item) {
                    $barang = Barang::find($item->barang_id); // Atau $item->barang jika relasi sudah di-load
                    if ($barang) {
                        $newStock = $barang->stok - $item->quantity;
                        $barang->stok = $newStock >= 0 ? $newStock : 0; // Hindari stok negatif
                        $barang->save();
                        Log::info('Stock updated for barang.', ['barang_id' => $barang->id, 'new_stock' => $barang->stok]);
                    }
                }

                // Kosongkan cart user
                $cart = Cart::where('user_id', $order->user_id)->first();
                if ($cart) {
                    // Hapus CartItems terlebih dahulu
                    $cart->items()->delete(); // Menggunakan relasi 'items' di model Cart
                    // Opsional: hapus Cart itu sendiri jika tidak lagi diperlukan
                    // $cart->delete();
                    Log::info('Cart cleared for user.', ['user_id' => $order->user_id]);
                }
            }

            return response()->json(['message' => 'Callback processed successfully']);
        } catch (\Exception $e) {
            Log::error('Midtrans Callback Error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->getContent() // Log raw data
            ]);
            return response()->json(['message' => 'Error processing callback', 'error' => $e->getMessage()], 500);
        }
    }
}

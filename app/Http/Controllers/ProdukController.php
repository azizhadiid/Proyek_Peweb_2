<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;
use App\Models\Barang;
use App\Models\Review;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();

        return view('produk', compact('barangs'));
    }

    public function detail($id)
    {
        $barang = Barang::with([
            'user',
            'reviews.user.profile' // memuat user dan profil user dari review
        ])->findOrFail($id);

        $averageRating = $barang->reviews->avg('rating');

        return view('detailProduk', compact('barang', 'averageRating'));
    }

    public function submitReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'judul' => 'required|string|max:255',
            'ulasan' => 'required|string',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'barang_id' => $id,
            'rating' => $request->rating,
            'judul' => $request->judul,
            'ulasan' => $request->ulasan,
        ]);

        return redirect()->route('produk.detail', $id)->with('success', 'Ulasan berhasil dikirim!');
    }

    public function update(Request $request, $id)
    {
        $review = Review::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $review->update([
            'rating' => $request->rating,
            'judul' => $request->judul,
            'ulasan' => $request->ulasan,
        ]);

        return back()->with('success', 'Ulasan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // Cek apakah review milik user yang sedang login
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $review->delete();

        return back()->with('success', 'Ulasan berhasil dihapus.');
    }

    public function cari(Request $request)
    {
        $query = $request->input('query');

        $produk = \App\Models\Barang::where('nama_produk', 'like', '%' . $query . '%')->first();

        if ($produk) {
            return redirect()->route('produk.detail', ['id' => $produk->id]);
        } else {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }
    }

    public function beli(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $barang = Barang::findOrFail($request->barang_id);
        $alamatList = auth()->user()->alamats;
        $quantity = $request->quantity;
        $total = $barang->harga * $quantity;

        return view('checkout', compact('barang', 'quantity', 'total', 'alamatList'));
    }

    public function bayar(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'quantity' => 'required|integer|min:1',
            'alamat_id' => 'required|exists:alamat,id',
        ]);

        $barang = Barang::findOrFail($request->barang_id);
        $quantity = $request->quantity;
        $total = $barang->harga * $quantity;

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.sanitized');
        Config::$is3ds = config('midtrans.3ds');

        // Simpan sementara order ke DB dengan status pending
        $order = Order::create([
            'user_id' => auth()->id(),
            'alamat_id' => $request->alamat_id,
            'order_code' => 'ORD-' . strtoupper(uniqid()),
            'total' => $total,
            'status' => 'pending',
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'barang_id' => $barang->id,
            'quantity' => $quantity,
            'price' => $barang->harga,
        ]);

        // Buat token pembayaran
        $params = [
            'transaction_details' => [
                'order_id' => $order->order_code,
                'gross_amount' => $total,
            ],
            'item_details' => [
                [
                    'id' => $barang->id,
                    'price' => $barang->harga,
                    'quantity' => $quantity,
                    'name' => $barang->nama_produk,
                ]
            ],
            'customer_details' => [
                'first_name' => auth()->user()->nama,
                'email' => auth()->user()->email,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return response()->json(['snap_token' => $snapToken]);
    }
}

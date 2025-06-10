<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $barangId)
    {
        $user = auth()->user();

        // Ambil keranjang atau buat baru
        $cart = $user->cart()->firstOrCreate([]);

        // Tambahkan item ke keranjang
        $item = $cart->items()->where('barang_id', $barangId)->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            $cart->items()->create([
                'barang_id' => $barangId,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Barang ditambahkan ke keranjang!');
    }

    public function showCart()
    {
        $cart = auth()->user()->cart()->with('items.barang')->first();
        return view('keranjang', compact('cart'));
    }

    public function produkKeranjang(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = auth()->user();

        // Cari atau buat cart user
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // Cek apakah barang sudah ada di cart
        $cartItem = $cart->items()->where('barang_id', $request->barang_id)->first();

        if ($cartItem) {
            // Tambah kuantiti
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Tambah item baru
            $cart->items()->create([
                'barang_id' => $request->barang_id,
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Berhasil ditambahkan ke keranjang']);
    }
}

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

    public function updateCart(Request $request)
    {
        // Akses sebagai properti untuk mendapatkan model Cart
        $cart = auth()->user()->cart;

        // Jika user mungkin tidak punya cart, tambahkan pengecekan
        if (!$cart) {
            return redirect()->route('cart.index')->with('error', 'Keranjang tidak ditemukan.');
        }

        $itemIds = $request->input('item_id', []);
        $quantities = $request->input('quantity', []);

        foreach ($itemIds as $index => $id) {
            // Query langsung dari relasi items di model cart
            $item = $cart->items()->find($id);
            if ($item) {
                $item->update(['quantity' => $quantities[$index]]);
            }
        }

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui.');
    }

    public function clearCart()
    {
        $cart = auth()->user()->cart;

        if ($cart) {
            $cart->items()->delete(); // Hapus semua item
            $cart->delete(); // Hapus cart itu sendiri jika perlu
        }

        return redirect()->route('cart.index')->with('success', 'Keranjang telah dikosongkan.');
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

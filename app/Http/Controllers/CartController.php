<?php

namespace App\Http\Controllers;

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
        return view('account', compact('cart'));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

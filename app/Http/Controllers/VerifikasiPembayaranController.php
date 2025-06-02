<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class VerifikasiPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['items.barang', 'user', 'alamat'])->get();
        return view('admin.verifikasi', compact('orders'));
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
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $action = $request->input('action');

        if ($action === 'paid') {
            $order->status = 'paid';
            $order->save();

            // Kurangi stok produk
            foreach ($order->orderItems as $item) {
                $barang = $item->barang;
                if ($barang && $barang->stok >= $item->quantity) {
                    $barang->stok -= $item->quantity;
                    $barang->save();
                }
            }
        } elseif ($action === 'cancelled') {
            $order->status = 'cancelled';
            $order->save();
        }

        // Hapus cart dan itemnya setelah status diubah
        $cart = Cart::where('user_id', $order->user_id)->first();
        if ($cart) {
            $cart->items()->delete();
            $cart->delete();
        }

        return redirect()->route('verifikasi.show')->with('success', 'Status pembayaran diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

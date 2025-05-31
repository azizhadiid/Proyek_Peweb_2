<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $user = Auth::user();
        $cart = $user->cart()->with('items.barang')->first();
        $total = $cart->items->sum(fn($i) => $i->barang->harga * $i->quantity);

        $alamatList = $user->alamats;

        // Setup Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.sanitized');
        Config::$is3ds = config('midtrans.3ds');

        // Data transaksi
        $transactionDetails = [
            'order_id' => 'ORDER-' . Str::upper(Str::random(8)),
            'gross_amount' => $total,
        ];

        $items = [];
        foreach ($cart->items as $item) {
            $items[] = [
                'id' => $item->barang->id,
                'price' => $item->barang->harga,
                'quantity' => $item->quantity,
                'name' => $item->barang->nama_produk,
            ];
        }

        $customerDetails = [
            'first_name' => $user->nama,
            'email' => $user->email,
        ];

        $params = [
            'transaction_details' => $transactionDetails,
            'item_details' => $items,
            'customer_details' => $customerDetails,
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('checkout.payment', [
            'snapToken' => $snapToken,
            'cartItems' => $cart->items,
            'total' => $total,
            'alamatList' => $alamatList,
        ]);
    }

    public function payment()
    {
        $user = Auth::user();
        $cart = $user->cart()->with('items.barang')->first();

        $alamatList = $user->alamats;

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kosong.');
        }

        $total = $cart->items->sum(fn($i) => $i->barang->harga * $i->quantity);

        // Midtrans Setup
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.sanitized');
        Config::$is3ds = config('midtrans.3ds');

        // Midtrans Params
        $transactionDetails = [
            'order_id' => 'ORDER-' . Str::upper(Str::random(8)),
            'gross_amount' => $total,
        ];

        $items = [];
        foreach ($cart->items as $item) {
            $items[] = [
                'id' => $item->barang->id,
                'price' => $item->barang->harga,
                'quantity' => $item->quantity,
                'name' => $item->barang->nama_produk,
            ];
        }

        $customerDetails = [
            'first_name' => $user->nama,
            'email' => $user->email,
        ];

        $params = [
            'transaction_details' => $transactionDetails,
            'item_details' => $items,
            'customer_details' => $customerDetails,
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('checkout.payment', [
            'snapToken' => $snapToken,
            'cartItems' => $cart->items,
            'total' => $total,
            'alamatList' => $alamatList,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();

        return view('produk', compact('barangs'));
    }

    public function detail($id)
    {
        $barang = Barang::with('user')->findOrFail($id);
        return view('detailProduk', compact('barang'));
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

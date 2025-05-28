<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'jenis_olahan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $barang = new Barang($request->except('gambar'));
        $barang->user_id = Auth::id(); // simpan user yang login

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/barang'), $filename);
            $barang->gambar = $filename;
        }

        $barang->save();

        return redirect()->route('barang.create')->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.formEditBarang', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $barangs = Barang::with('user')->get(); // eager load relasi untuk ambil nama penulis

        return view('admin.edit', compact('barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'jenis_olahan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('img/barang'), $filename);

            // hapus gambar lama
            if ($barang->gambar && file_exists(public_path('img/barang/' . $barang->gambar))) {
                unlink(public_path('img/barang/' . $barang->gambar));
            }

            $barang->gambar = $filename;
        }

        $barang->update([
            'nama_produk' => $request->nama_produk,
            'jenis_olahan' => $request->jenis_olahan,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'gambar' => $barang->gambar,
        ]);

        return redirect()->route('barang.edit', $barang->id)->with('success', 'Barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);

        $barang->delete();

        return redirect()->route('barang.edit')->with('success', 'Barang berhasil dihapus.');
    }
}

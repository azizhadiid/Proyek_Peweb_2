<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';

    protected $fillable = [
        'user_id',
        'nama_produk',
        'jenis_olahan',
        'deskripsi',
        'stok',
        'harga',
        'gambar',
    ];
}

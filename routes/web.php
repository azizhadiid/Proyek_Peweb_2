<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/', function () {
    return view('welcome');
});


// Khusus Admin
Route::get('/admin/barang/buat', [BarangController::class, 'create'])->name('barang.create');
Route::post('/admin/barang/simpan', [BarangController::class, 'store'])->name('barang.store');

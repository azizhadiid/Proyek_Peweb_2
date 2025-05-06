<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/', function () {
    return view('welcome');
});


// Khusus Admin
Route::get('/admin/barang/buat', [BarangController::class, 'create'])->name('barang.create');
Route::post('/admin/barang/simpan', [BarangController::class, 'store'])->name('barang.store');

Route::get('/dashboard', function () {
    return view('admin.templates.mainAdminlayout');
});

Route::get('/login', function () {
    return view('admin.templates.loginAdminlayout');
});

Route::get('/register', function () {
    return view('admin.templates.regisAdminlayout');
});

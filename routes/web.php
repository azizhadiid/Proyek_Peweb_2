<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TentangController;

Route::get('/', function () {
    return view('welcome');
});

// Khusus User
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang.index');

// Khusus Admin
Route::get('/admin/barang/buat', [BarangController::class, 'create'])->name('barang.create');
Route::post('/admin/barang/simpan', [BarangController::class, 'store'])->name('barang.store');

Route::get('/dashboard', function () {
    return view('admin.templates.mainAdminlayout');
});

// Khusus Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register/create', [AuthController::class, 'create']);
Route::get('/forgot', function () {
    return view('auth.forgot');
});

Route::get('/reset', function () {
    return view('auth.reset');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserProfileControlle;
use App\Http\Controllers\VerifikasiPembayaranController;

Route::get('/', function () {
    return view('welcome');
});

// Khusus User
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang.index');
Route::get('/account', [UserProfileControlle::class, 'index'])->name('account.index');
Route::post('/account', [UserProfileControlle::class, 'update'])->name('account.update');
Route::post('/profile/change-password', [AuthController::class, 'changePassword'])->name('profile.change-password');
Route::post('/alamat', [AlamatController::class, 'store'])->name('alamat.tambah');
Route::put('/alamat/{id}', [AlamatController::class, 'update'])->name('alamat.update');
Route::delete('/alamat/{id}', [AlamatController::class, 'destroy'])->name('alamat.destroy');
Route::post('/like/{barang}', [LikeController::class, 'toggle'])->name('barang.like');
Route::delete('/like/{barang}', [LikeController::class, 'destroy'])->name('barang.unlike');
Route::get('/keranjang', [CartController::class, 'showCart'])->name('cart.index');
Route::post('/keranjang/{barang}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/beli', [CheckoutController::class, 'payment'])->name('checkout.index');
Route::post('/checkout/payment', [CheckoutController::class, 'payment'])->name('checkout.payment');
Route::post('/midtrans/callback', [CheckoutController::class, 'handleCallback']);
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/detail/{id}', [ProdukController::class, 'detail'])->name('produk.detail');
Route::get('/produk/cari', [ProdukController::class, 'cari'])->name('produk.cari');


// Khusus Admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/admin/barang/buat', [BarangController::class, 'create'])->name('barang.create');
Route::post('/admin/barang/simpan', [BarangController::class, 'store'])->name('barang.store');
Route::get('/admin/barang/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::get('/admin/barang/edit/{id}', [BarangController::class, 'show'])->name('barang.show');
Route::put('/admin/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/admin/barang/edit/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
Route::get('/admin/verifikasi/pembayaran', [VerifikasiPembayaranController::class, 'index'])->name('verifikasi.show');
Route::patch('/admin/verifikasi/pembayaran/{id}', [VerifikasiPembayaranController::class, 'update'])->name('verifikasi.update');

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

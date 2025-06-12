<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserProfileControlle;
use App\Http\Controllers\VerifikasiPembayaranController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index'])->name('rasaTangkit.com');

// Khusus User
Route::middleware(['role:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/tentang', [TentangController::class, 'index'])->name('tentang.index');
    Route::get('/account', [UserProfileControlle::class, 'index'])->name('account.index');
    Route::post('/account/likes/semua', [UserProfileControlle::class, 'addAllLikedToCart'])->name('liked.addAllToCart');
    Route::post('/account', [UserProfileControlle::class, 'update'])->name('account.update');
    Route::post('/profile/change-password', [AuthController::class, 'changePassword'])->name('profile.change-password');
    Route::post('/alamat', [AlamatController::class, 'store'])->name('alamat.tambah');
    Route::put('/alamat/{id}', [AlamatController::class, 'update'])->name('alamat.update');
    Route::delete('/alamat/{id}', [AlamatController::class, 'destroy'])->name('alamat.destroy');
    Route::post('/like/{barang}', [LikeController::class, 'toggle'])->name('barang.like');
    Route::delete('/like/{barang}', [LikeController::class, 'destroy'])->name('barang.unlike');
    Route::get('/keranjang', [CartController::class, 'showCart'])->name('cart.index');
    Route::put('/keranjang/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/keranjang/clear', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::post('/keranjang/{barang}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/beli', [CheckoutController::class, 'show'])->name('checkout.index');
    Route::post('/beli/bayar', [CheckoutController::class, 'processPayment'])->name('checkout.payment');
    Route::post('/midtrans/callback', [CheckoutController::class, 'handleCallback']);
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/detail/{id}', [ProdukController::class, 'detail'])->name('produk.detail');
    Route::post('/produk/review/{id}', [ProdukController::class, 'submitReview'])->name('produk.review');
    Route::put('/produk/review/{id}', [ProdukController::class, 'update'])->name('produk.review.update');
    Route::delete('/produk/review/{id}', [ProdukController::class, 'destroy'])->name('produk.review.delete');
    Route::post('/produk/beli', [ProdukController::class, 'beli'])->name('produk.beli');
    Route::post('/produk/beli/bayar', [ProdukController::class, 'bayar'])->name('produk.bayar');
    Route::post('/produk/keranjang', [CartController::class, 'produkKeranjang'])->name('produk.keranjang');
    Route::get('/produk/cari', [ProdukController::class, 'cari'])->name('produk.cari');
    Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::post('/kontak/kirim', [KontakController::class, 'kirim'])->name('kontak.kirim');
});


// Khusus Admin
Route::middleware(['role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/admin/distribusi-olahan', [DashboardController::class, 'getDistribusiOlahan']);
    Route::get('/admin/chart/penjualan-bulanan', [DashboardController::class, 'getMonthlySales']);
    Route::get('/admin/barang/buat', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/admin/barang/simpan', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/admin/barang/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::get('/admin/barang/edit/{id}', [BarangController::class, 'show'])->name('barang.show');
    Route::put('/admin/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/admin/barang/edit/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    Route::get('/admin/verifikasi/pembayaran', [VerifikasiPembayaranController::class, 'index'])->name('verifikasi.show');
    Route::patch('/admin/verifikasi/pembayaran/{id}', [VerifikasiPembayaranController::class, 'update'])->name('verifikasi.update');
    Route::get('/admin/logout', [AuthController::class, 'logout']);
});


// Khusus Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register/create', [AuthController::class, 'create']);
Route::get('/forgot', function () {
    return view('auth.forgot');
});

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::ResetLinkSent
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PasswordReset
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');

Route::get('/reset', function () {
    return view('auth.reset');
});

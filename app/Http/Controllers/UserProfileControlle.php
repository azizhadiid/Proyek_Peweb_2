<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileControlle extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $userProfile = $user->profile;
        $alamats = $user->alamats;
        $barangs = $user->likedBarangs()->get();
        $cart = $user->cart()->with('items.barang')->first();

        // 1. Ambil nilai sort dari request, default-nya 'terbaru'
        $sort = $request->input('sort', 'terbaru');

        // 2. Siapkan query untuk review tanpa ->get() dulu
        $reviewsQuery = $user->reviews()->with(['barang', 'user.profile']);

        // 3. Terapkan pengurutan berdasarkan nilai $sort
        switch ($sort) {
            case 'rating_tertinggi':
                $reviewsQuery->orderBy('rating', 'desc');
                break;
            case 'rating_terendah':
                $reviewsQuery->orderBy('rating', 'asc');
                break;
            default: // 'terbaru' atau nilai lainnya
                $reviewsQuery->latest(); // Mengurutkan berdasarkan created_at descending
                break;
        }

        // 4. Eksekusi query setelah pengurutan diterapkan
        $reviews = $reviewsQuery->get();

        // Hitung rata-rata rating dari semua review milik user
        $averageRating = $user->reviews()->avg('rating'); // Lebih efisien hitung avg terpisah

        // Ambil keyword pencarian
        $search = $request->input('search');

        // Query untuk orders
        $ordersQuery = $user->orders()->with(['items.barang'])->latest();

        if ($search) {
            $ordersQuery->where('order_code', 'like', '%' . $search . '%')
                ->orWhereHas('items.barang', function ($query) use ($search) {
                    $query->where('nama_produk', 'like', '%' . $search . '%');
                });
        }

        $orders = $ordersQuery->get();
        $totalOrders = $orders->count();
        $totalLikes = $barangs->count();

        return view('account', compact(
            'user',
            'userProfile',
            'alamats',
            'barangs',
            'cart',
            'orders',
            'totalOrders',
            'totalLikes',
            'search',
            'reviews',
            'averageRating',
            'sort' // 5. Kirim variabel $sort ke view
        ));
    }

    public function addAllLikedToCart(Request $request)
    {
        // 1. Dapatkan user yang sedang login
        $user = $request->user();

        // 2. Dapatkan atau buat keranjang belanja untuk user ini
        // firstOrCreate akan mencari cart milik user, jika tidak ada, akan dibuatkan yang baru
        $cart = $user->cart()->firstOrCreate([]);

        // 3. Ambil semua barang yang disukai oleh user
        $likedBarangs = $user->likedBarangs()->get();

        // Jika tidak ada barang yang disukai, langsung kembalikan
        if ($likedBarangs->isEmpty()) {
            return redirect()->route('account.index')->with('info', 'Anda tidak memiliki produk yang disukai untuk ditambahkan.');
        }

        // 4. Loop setiap barang yang disukai dan tambahkan ke keranjang
        foreach ($likedBarangs as $barang) {
            // Cek apakah barang ini sudah ada di keranjang
            $cartItem = $cart->items()->where('barang_id', $barang->id)->first();

            if ($cartItem) {
                // Jika sudah ada, cukup tambahkan jumlahnya (quantity)
                $cartItem->increment('quantity');
            } else {
                // Jika belum ada, buat item baru di keranjang
                $cart->items()->create([
                    'barang_id' => $barang->id,
                    'quantity'  => 1,
                ]);
            }
        }

        // 5. Kembalikan user ke halaman akun dengan pesan sukses
        return redirect()->route('account.index')->with('success', 'Semua produk yang disukai berhasil ditambahkan ke keranjang!');
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
    public function update(Request $request)
    {
        $userProfile = Auth::user()->profile;

        $request->validate([
            'nama_panjang' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'noHp' => 'nullable|string|max:20',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:3500',
        ]);

        if (!$userProfile) {
            $userProfile = new UserProfile();
            $userProfile->user_id = Auth::id();
        }

        $userProfile->fill($request->except('foto_profil'));

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Hapus gambar lama
            if (!empty($userProfile->foto_profil) && file_exists(public_path('img/user/profile/' . $userProfile->foto_profil))) {
                unlink(public_path('img/user/profile/' . $userProfile->foto_profil));
            }

            $file->move(public_path('img/user/profile'), $filename);
            $userProfile->foto_profil = $filename;
        }

        $userProfile->save();

        return redirect()->route('account.index')->with('success', 'Update Profil Sukses.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

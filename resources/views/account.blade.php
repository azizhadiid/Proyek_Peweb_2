@extends('templates.mainTemplatedUser')

@section('title', 'Akun')

@section('konten')
<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Akun</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="/home">Beranda</a></li>
                <li class="current">Akuun</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Account Section -->
<section id="account" class="account section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        {{-- Pesan Error --}}
        <div class="row g-4">
            {{-- Jika Ada Error --}}
            @if ($errors->any())
            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert" style="width: 100%">
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    <div>
                        @foreach ($errors->all() as $error)
                        <p class="m-0">{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            {{-- Jika Sukses Login --}}
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="width: 100%">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            {{-- Jika Password Telah Diubah --}}
            @if (session('status'))
            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert" style="width: 100%">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            {{-- Jika Password Telah Diubah --}}
            @if (session('info'))
            <div class="alert alert-info alert-dismissible fade show mt-3" role="alert" style="width: 100%">
                <i class="bi bi-info-circle-fill me-2"></i>
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>

        <!-- Mobile Menu Toggle -->
        <div class="mobile-menu d-lg-none mb-4">
            <button class="mobile-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#profileMenu">
                <i class="bi bi-grid"></i>
                <span>Menu</span>
            </button>
        </div>

        <div class="row g-4">
            <!-- Profile Menu -->
            <div class="col-lg-3">
                <div class="profile-menu collapse d-lg-block" id="profileMenu">
                    <!-- User Info -->
                    <div class="user-info" data-aos="fade-right">
                        <div class="user-avatar">
                            <img src="{{ $userProfile && $userProfile->foto_profil ? asset('img/user/profile/' . $userProfile->foto_profil) : asset('img/user/profile/default.png') }}"
                                alt="Profile">
                        </div>
                        <h4>{{ old('nama', $user->nama ?? '') }}</h4>
                    </div>

                    <!-- Navigation Menu -->
                    <nav class="menu-nav">
                        <ul class="nav flex-column" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link active" data-bs-toggle="tab" href="#wishlist">
                                    <i class="bi bi-heart"></i>
                                    <span>Daftar Suka</span>
                                    <span class="badge">{{$totalLikes}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#history">
                                    <i class="bi bi-clock-history"></i>
                                    <span>Riwayat Pesanan</span>
                                    <span class="badge">{{ $totalOrders }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#reviews">
                                    <i class="bi bi-star"></i>
                                    <span>Ulasan Saya</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#settings">
                                    <i class="bi bi-gear"></i>
                                    <span>Pengaturan Akun</span>
                                </a>
                            </li>
                        </ul>

                        <div class="menu-footer">
                            <a href="{{url('/logout')}}" class="logout-link logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Keluar</span>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-9">
                <div class="content-area">
                    <div class="tab-content">
                        <!-- Like Tab -->
                        <div class="tab-pane fade show active" id="wishlist">
                            <div class="section-header" data-aos="fade-up">
                                <h2>Daftar Suka</h2>
                                <div class="header-actions">
                                    {{-- Ubah tombol menjadi form --}}
                                    <form action="{{ route('liked.addAllToCart') }}" method="POST"
                                        style="display: inline;">
                                        @csrf {{-- Token keamanan wajib untuk form POST di Laravel --}}

                                        <button type="submit" class="btn"
                                            style="background-color: #eda96d; color: aliceblue">
                                            Tambah Semua ke Keranjang
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="wishlist-grid">
                                @if ($barangs->isEmpty())
                                <div class="d-flex justify-content-center">
                                    <div class="text-center py-10 px-4 bg-white rounded-xl shadow-sm"
                                        data-aos="fade-up">
                                        <img src="{{ asset('img/hati.svg') }}" alt="Tidak ada like"
                                            class="mx-auto mb-6 opacity-70" style="width: 100px;">
                                        <h2 class="text-xl font-semibold text-gray-700 mb-2">Belum ada barang yang
                                            disukai
                                        </h2>
                                        <p class="text-gray-500">Temukan produk favoritmu dan tekan tombol <span
                                                class="text-pink-500">❤</span> untuk menyimpannya di sini.</p>
                                    </div>
                                </div>

                                @else
                                @foreach ($barangs as $barang)
                                <div class="wishlist-card" data-aos="fade-up" data-aos-delay="200">
                                    <div class="wishlist-image">
                                        <img src="{{ asset('img/barang/' . $barang->gambar) }}" alt="Product"
                                            loading="lazy">
                                        <form action="{{ route('barang.unlike', $barang->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-remove" type="submit" aria-label="Remove from wishlist">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="wishlist-content">
                                        <h4>{{ $barang->nama_produk }}</h4>
                                        <div class="product-meta">
                                            <div class="rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <span>(4.0)</span>
                                            </div>
                                            <div class="price">
                                                <span class="current">Rp
                                                    {{ number_format($barang->harga, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                        <form action="{{ route('cart.add', $barang->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn-add-cart">
                                                <i class="bi bi-cart-plus"></i> Tambah ke Keranjang
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>

                        <!-- History Tab -->
                        <div class="tab-pane fade" id="history">
                            <div class="section-header" data-aos="fade-up">
                                <h2>Riwayat Pesanan</h2>
                                <div class="header-actions">
                                    <form method="GET" action="{{ route('account.index') }}">
                                        <div class="search-box">
                                            <i class="bi bi-search"></i>
                                            <input type="text" name="search" placeholder="Cari Pesanan..."
                                                value="{{ request('search') }}">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="orders-grid">
                                @if ($barangs->isEmpty())
                                <div class="d-flex flex-column align-items-center justify-content-center text-center p-5 bg-white rounded-4 shadow-sm"
                                    style="max-width: 500px; margin: auto;" data-aos="fade-up">
                                    <i class="bi bi-clock-history text-secondary mb-3"
                                        style="font-size: 3rem; opacity: 0.7;"></i>
                                    <h5 class="text-dark fw-semibold mb-2">Belum ada Riwayat Pesanan</h5>
                                    <p class="text-muted mb-0">Pesananmu akan muncul di sini setelah kamu melakukan
                                        transaksi pertama.</p>
                                </div>

                                <!-- Order Card  -->
                                @else
                                @foreach ($orders as $order)
                                <div class="order-card" data-aos="fade-up" data-aos-delay="100">
                                    <div class="order-header">
                                        <div class="order-id">
                                            <span class="label">ID Pesanan:</span>
                                            <span class="value">#{{ $order->order_code }}</span>
                                        </div>
                                        <div class="order-date">{{ $order->created_at->format('M d, Y') }}</div>
                                    </div>
                                    <div class="order-content">
                                        <div class="product-grid">
                                            @foreach ($order->items->take(3) as $item)
                                            <img src="{{ asset('img/barang/' . $item->barang->gambar) }}"
                                                alt="{{ $item->barang->nama_produk }}" loading="lazy">
                                            @endforeach
                                        </div>
                                        <div class="order-info">
                                            <div class="info-row">
                                                <span>Status</span>
                                                <span class="status  @if($order->status === 'paid') text-success 
                                                @elseif($order->status === 'cancelled') text-danger 
                                                @elseif($order->status === 'pending') text-warning 
                                                @endif">{{ ucfirst($order->status) }}
                                                </span>
                                            </div>
                                            <div class="info-row">
                                                <span>Items</span>
                                                <span>{{ $order->items->sum('quantity') }} items</span>
                                            </div>
                                            <div class="info-row">
                                                <span>Total</span>
                                                <span
                                                    class="price">Rp{{ number_format($order->total, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>

                        <!-- Reviews Tab -->
                        <div class="tab-pane fade" id="reviews">
                            <div class="section-header" data-aos="fade-up">
                                <h2>Ulasan Saya</h2>
                                <div class="header-actions">
                                    <div class="dropdown">
                                        <button class="filter-btn" data-bs-toggle="dropdown">
                                            <i class="bi bi-funnel"></i>

                                            {{-- Bagian ini dibuat dinamis --}}
                                            <span>Urutkan Berdasarkan:
                                                @if($sort == 'rating_tertinggi')
                                                Rating Tertinggi
                                                @elseif($sort == 'rating_terendah')
                                                Rating Terendah
                                                @else
                                                Terbaru
                                                @endif
                                            </span>

                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('account.index', array_merge(request()->except('sort'), ['sort' => 'terbaru'])) }}">Terbaru</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('account.index', array_merge(request()->except('sort'), ['sort' => 'rating_tertinggi'])) }}">Rating
                                                    Tertinggi</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('account.index', array_merge(request()->except('sort'), ['sort' => 'rating_terendah'])) }}">Rating
                                                    Terendah</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="reviews-grid">
                                @if ($reviews->isEmpty())
                                <div class="d-flex flex-column align-items-center justify-content-center text-center p-5 bg-white rounded-4 shadow-sm"
                                    style="max-width: 500px; margin: auto;" data-aos="fade-up">
                                    <i class="bi bi-chat-left-dots mb-3"
                                        style="font-size: 3rem; opacity: 0.7;"></i>
                                    <h5 class="text-dark fw-semibold mb-2">Belum ada Ulasan</h5>
                                    <p class="text-muted mb-0">Kamu belum memberikan ulasan untuk produk mana pun.
                                        Jangan ragu untuk membagikan pengalamanmu setelah berbelanja!</p>
                                </div>
                                @else

                                @foreach ($reviews as $review)
                                <div class="review-card" data-aos="fade-up" data-aos-delay="200">
                                    <div class="review-header">
                                        <img src="{{ asset('img/barang/' . $review->barang->gambar) }}" alt="Product"
                                            class="product-image">
                                        <div class="review-meta">
                                            <h4>{{ $review->judul }}</h4>
                                            <div class="rating">
                                                @for($i = 1; $i <= 5; $i++) <i
                                                    class="bi bi-star{{ $i <= $review->rating ? '-fill' : '' }}"></i>
                                                    @endfor
                                                    <span>({{ number_format($review->rating, 1) }})</span>
                                            </div>
                                            <div class="review-date"> Review pada
                                                {{ $review->created_at->format('M d, Y') }}
                                                — <strong>{{ $review->barang->nama_produk }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-content">
                                        <p>{{ $review->ulasan }}</p>
                                    </div>
                                    <div class="review-footer mt-2">
                                        <button class="btn-edit btn btn-sm btn-warning" data-bs-toggle="collapse"
                                            data-bs-target="#editReview{{ $review->id }}" aria-expanded="false"
                                            aria-controls="editReview{{ $review->id }}">
                                            Edit Review
                                        </button>

                                        <form method="POST" action="{{ route('produk.review.delete', $review->id) }}"
                                            class="d-inline delete-review-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm btn-danger btn-delete-review">Delete</button>
                                        </form>

                                        {{-- CDN SWITCH ALERT --}}
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                        <script>
                                            document.querySelectorAll('.btn-delete-review').forEach(function (button) {
                                                button.addEventListener('click', function (e) {
                                                    e.preventDefault();
                                                    const form = this.closest('form');

                                                    Swal.fire({
                                                        title: 'Yakin ingin menghapus ulasan ini?',
                                                        text: "Tindakan ini tidak bisa dibatalkan!",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#d33',
                                                        cancelButtonColor: '#aaa',
                                                        confirmButtonText: 'Ya, hapus!',
                                                        cancelButtonText: 'Batal'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            form.submit();
                                                        }
                                                    });
                                                });
                                            });

                                        </script>
                                    </div>

                                    <div class="collapse mt-3 review-form-container" id="editReview{{ $review->id }}">
                                        <style>
                                            /* Menyembunyikan radio button asli */
                                            .rating-stars .btn-check {
                                                display: none;
                                            }

                                            /* Container untuk bintang */
                                            .rating-stars {
                                                display: flex;
                                                /* Menggunakan flexbox */
                                                flex-direction: row-reverse;
                                                /* Membalik urutan visual dari kanan ke kiri */
                                                justify-content: flex-end;
                                                /* Membuat bintang mulai dari kiri */
                                            }

                                            /* Styling dasar untuk label bintang */
                                            .rating-stars label {
                                                color: #e4e5e9;
                                                /* Warna bintang default (abu-abu) */
                                                font-size: 1.5rem;
                                                /* Ukuran bintang bisa disesuaikan */
                                                cursor: pointer;
                                                transition: color 0.2s;
                                                /* Animasi perubahan warna */
                                                padding: 0 0.1rem;
                                                /* Sedikit jarak antar bintang */
                                            }

                                            /* Styling saat kursor (hover) di atas bintang */
                                            .rating-stars label:hover,
                                            .rating-stars label:hover~label {
                                                color: gold;
                                                /* Warna bintang saat di-hover */
                                            }

                                            /* Styling saat bintang dipilih (checked) */
                                            .rating-stars .btn-check:checked~label {
                                                color: gold;
                                                /* Warna bintang yang dipilih dan sebelumnya */
                                            }

                                        </style>

                                        <form class="review-form p-4 border rounded shadow-sm bg-light" method="POST"
                                            action="{{ route('produk.review.update', $review->id) }}">
                                            @csrf
                                            @method('PUT')

                                            <!-- Rating -->
                                            <div class="mb-4">
                                                <label class="form-label fw-bold">Beri Rating</label>

                                                <div class="rating-stars">
                                                    @for ($i = 5; $i >= 1; $i--)
                                                    <input type="radio" class="btn-check" name="rating"
                                                        id="star{{ $i }}-{{ $review->id }}" value="{{ $i }}"
                                                        {{ $review->rating == $i ? 'checked' : '' }}>
                                                    <label for="star{{ $i }}-{{ $review->id }}">
                                                        <i class="bi bi-star-fill"></i>
                                                    </label>
                                                    @endfor
                                                </div>
                                            </div>

                                            <!-- Judul -->
                                            <div class="mb-3">
                                                <label for="review-title-{{ $review->id }}"
                                                    class="form-label fw-bold">Judul Ulasan</label>
                                                <input type="text" class="form-control"
                                                    id="review-title-{{ $review->id }}" name="judul"
                                                    value="{{ $review->judul }}" required>
                                            </div>

                                            <!-- Ulasan -->
                                            <div class="mb-4">
                                                <label for="review-content-{{ $review->id }}"
                                                    class="form-label fw-bold">Ulasan Kamu</label>
                                                <textarea class="form-control" id="review-content-{{ $review->id }}"
                                                    name="ulasan" rows="4" required>{{ $review->ulasan }}</textarea>
                                            </div>

                                            <!-- Submit -->
                                            <div class="d-grid">
                                                <button type="submit" class="btn"
                                                    style="background-color: #eda96d; color: aliceblue">
                                                    <i class="bi bi-save me-1"></i> Simpan Perubahan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>

                        </div>

                        <!-- Settings Tab -->
                        <div class="tab-pane fade" id="settings">
                            <div class="section-header" data-aos="fade-up">
                                <h2>Pengaturan Akun</h2>
                            </div>

                            <div class="settings-content">
                                <!-- Personal Information -->
                                <div class="settings-section" data-aos="fade-up">
                                    <h3>Informasi Personal</h3>

                                    <form class="settings-form" action="{{ route('account.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <!-- Foto Profil + Aksi -->
                                        <div class="profile-photo-wrapper text-center mb-4">
                                            <div class="profile-photo">
                                                <img id="profileImg"
                                                    src="{{ $userProfile && $userProfile->foto_profil ? asset('img/user/profile/' . $userProfile->foto_profil) : asset('img/user/profile/default.png') }}"
                                                    alt="Profile" class="profile-img">
                                            </div>
                                            <div class="profile-photo-actions mt-2">
                                                <!-- Tombol Upload -->
                                                <label for="foto_profil"
                                                    class="d-inline-block bg-primary link-light lh-1 p-2 rounded"
                                                    style="cursor: pointer;">
                                                    <i class="bi bi-pencil-fill"></i> Edit
                                                </label>
                                                <input type="file" name="foto_profil" id="foto_profil" class="d-none">

                                            </div>
                                        </div>

                                        <!-- Form Input -->
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="nama_panjang" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="firstName"
                                                    value="{{ old('nama', $user->nama ?? '') }}"
                                                    placeholder="Masukkan nama lengkap" name="nama_panjang"
                                                    id="nama_panjang" readonly>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <input class="form-control" id="tanggal_lahir" type="date"
                                                    name="tanggal_lahir"
                                                    value="{{ old('tanggal_lahir', $userProfile->tanggal_lahir ?? '') }}">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label d-block">Jenis Kelamin</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                        id="genderMale" value="Laki-laki"
                                                        {{ old('jenis_kelamin', $userProfile->jenis_kelamin ?? '') === 'Laki-laki' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="genderMale">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                        id="genderFemale" value="Perempuan"
                                                        {{ old('jenis_kelamin', $userProfile->jenis_kelamin ?? '') === 'Perempuan' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="genderFemale">Perempuan</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email"
                                                    value="{{ old('email', $user->email ?? '') }}"
                                                    placeholder="Masukkan email" readonly>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="phone" class="form-label">No Handphone</label>
                                                <input class="form-control" type="text" name="noHp" id="noHp"
                                                    value="{{ old('noHp', $userProfile->noHp ?? '') }}"
                                                    placeholder="Masukkan nomor telepon">
                                            </div>
                                        </div>

                                        <!-- Tombol Simpan -->
                                        <div class="form-buttons mt-4">
                                            <button type="submit" class="btn-save">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Alamat Pengiriman -->
                                <div class="settings-section" data-aos="fade-up" data-aos-delay="100">
                                    <h3>Alamat Pengiriman</h3>

                                    <!-- Daftar Alamat -->
                                    <div class="list-group mb-3" id="address-list">
                                        @if ($alamats->count() > 0)
                                        @foreach ($alamats as $index => $alamat)
                                        <div class="list-group-item d-flex justify-content-between align-items-start">
                                            <div>
                                                <div class="fw-bold">Alamat {{ $index + 1 }}</div>
                                                {{ $alamat->alamat }}
                                            </div>
                                            <div>
                                                <style>
                                                    .btn-outline-orange {
                                                        color: #eda96d;
                                                        border: 1px solid #eda96d;
                                                        background-color: transparent;
                                                        transition: 0.3s;
                                                    }

                                                    .btn-outline-orange:hover {
                                                        background-color: #eda96d;
                                                        color: #ffffff;
                                                    }

                                                    .btn-outline-orange:hover i {
                                                        color: #ffffff;
                                                    }

                                                    .btn-outline-orange i {
                                                        color: #eda96d;
                                                        transition: 0.3s;
                                                    }

                                                </style>
                                                <!-- Tombol Edit (ikon pensil) -->
                                                <button type="button"
                                                    class="btn btn-sm me-1 mb-2 mb-md-0 btn-outline-orange"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editAddressModal{{ $alamat->id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>

                                                <!-- Modal Edit Alamat -->
                                                <div class="modal fade" id="editAddressModal{{ $alamat->id }}"
                                                    tabindex="-1"
                                                    aria-labelledby="editAddressModalLabel{{ $alamat->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="editAddressModalLabel{{ $alamat->id }}">Edit
                                                                    Alamat</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="{{ route('alamat.update', $alamat->id) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-3">
                                                                        <label for="newAddress{{ $alamat->id }}"
                                                                            class="form-label">Alamat Lengkap</label>
                                                                        <textarea class="form-control"
                                                                            id="newAddress{{ $alamat->id }}" rows="3"
                                                                            placeholder="Masukkan alamat lengkap"
                                                                            name="alamat">{{ $alamat->alamat }}</textarea>
                                                                    </div>
                                                                    <div class="modal-footer px-0">
                                                                        <button type="button"
                                                                            class="btn btn-outline-danger btn-sm"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-outline-orange">Simpan
                                                                            Perubahan Alamat</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('alamat.destroy', $alamat->id) }}" method="POST"
                                                    class="d-inline form-hapus">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm me-1 mb-2 mb-md-0 btn-outline-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                                {{-- CDN Switch Alert --}}
                                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function () {
                                                        const hapusForms = document.querySelectorAll(
                                                            '.form-hapus');

                                                        hapusForms.forEach(form => {
                                                            form.addEventListener('submit', function (
                                                                e) {
                                                                e
                                                                    .preventDefault(); // Mencegah submit langsung

                                                                Swal.fire({
                                                                    title: 'Apakah kamu yakin?',
                                                                    text: "Data alamat akan dihapus permanen!",
                                                                    icon: 'warning',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#d33',
                                                                    cancelButtonColor: '#6c757d',
                                                                    confirmButtonText: 'Ya, hapus!',
                                                                    cancelButtonText: 'Batal'
                                                                }).then((result) => {
                                                                    if (result
                                                                        .isConfirmed) {
                                                                        form
                                                                            .submit(); // Submit jika user klik "Ya, hapus!"
                                                                    }
                                                                });
                                                            });
                                                        });
                                                    });

                                                </script>
                                            </div>
                                        </div>
                                        @endforeach

                                        @else
                                        <!-- UI jika alamat kosong -->
                                        <div class="list-group-item text-center py-4">
                                            <i class="bi bi-geo-alt fs-2 text-muted"></i>
                                            <p class="mt-2 mb-0 text-muted">Belum ada alamat yang ditambahkan.</p>
                                        </div>
                                        @endif
                                    </div>

                                    <!-- Tombol Tambah Alamat -->
                                    <button class="btn btn-sm mb-3" data-bs-toggle="collapse"
                                        data-bs-target="#addAddressForm" aria-expanded="false"
                                        style="background-color: #eda96d; color: white">
                                        <i class="bi bi-plus-circle"></i> Tambah Alamat
                                    </button>

                                    <!-- Form Tambah Alamat -->
                                    <div class="collapse" id="addAddressForm">
                                        <form method="POST" action="{{url('/alamat')}}" class="">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="newAddress" class="form-label">Alamat Lengkap</label>
                                                <textarea class="form-control" id="newAddress" rows="3"
                                                    placeholder="Masukkan alamat lengkap" name="alamat"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-sm"
                                                style="background-color: #eda96d; color: white">Simpan Alamat</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Security Settings -->
                                <div class="settings-section" data-aos="fade-up" data-aos-delay="200">
                                    <h3>Keamanan</h3>
                                    <form class="settings-form" action="{{ route('profile.change-password') }}"
                                        method="POST">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="currentPassword" class="form-label">Password Saat
                                                    Ini</label>
                                                <input type="password" class="form-control" id="currentPassword"
                                                    name="current_password" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="newPassword" class="form-label">Password Baru</label>
                                                <input type="password" class="form-control" id="newPassword"
                                                    name="new_password" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="confirmPassword" class="form-label">Konfirmasi
                                                    Password</label>
                                                <input type="password" class="form-control" id="confirmPassword"
                                                    name="new_password_confirmation" required>
                                            </div>
                                        </div>

                                        <!-- Tombol Simpan -->
                                        <div class="form-buttons mt-4">
                                            <button type="submit" class="btn-save">Perbarui Password</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section><!-- /Account Section -->
@endsection

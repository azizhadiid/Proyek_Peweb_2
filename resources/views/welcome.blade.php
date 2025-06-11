<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Rasa Tangkit</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets-user/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets-user/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets-user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-user/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-user/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-user/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-user/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-user/vendor/drift-zoom/drift-basic.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets-user/css/main.css') }}" rel="stylesheet">

    {{-- My Style --}}
    <style>
        .btn-search-style {
            background-color: #E8A26D;
            /* Warna oranye muda */
            color: white;
            border: none;
            border-radius: 20px;
            /* Atau gunakan '50%' untuk benar-benar bulat */
            padding: 0.5rem 1.25rem;
            display: inline-flex;
            align-items: center;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .btn-search-style:hover {
            background-color: #d38c57;
            /* Warna saat hover */
            color: white;
        }

    </style>

    <!-- =======================================================
  * Template Name: eStore
  * Template URL: https://bootstrapmade.com/estore-bootstrap-ecommerce-template/
  * Updated: Apr 26 2025 with Bootstrap v5.3.5
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page" style="padding-top: 150px">

    <header id="header" class="header fixed-top bg-white shadow-sm">

        <!-- Main Header -->
        <div class="main-header">
            <div class="container-fluid container-xl">
                <div class="d-flex py-3 align-items-center justify-content-between">

                    <!-- Logo -->
                    <a href="/" class="d-flex align-items-center">
                        <!-- Uncomment the line below if you also wish to use an image logo -->
                        <!-- <img src="assets/img/logo.webp" alt=""> -->
                        <h1 class="sitename"><img src="{{ asset('assets-user/img/logo_navbar.png') }}" alt=""
                                style="height: 50px; width: auto;"></h1>
                    </a>

                    <!-- Search -->
                    <form class="search-form desktop-search-form" action="{{ route('produk.cari') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Produk Anda" name="query">
                            <button class="btn" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>

                    <!-- Actions -->
                    <div class="header-actions d-flex align-items-center justify-content-end">

                        <!-- Mobile Search Toggle -->
                        <button class="header-action-btn mobile-search-toggle d-xl-none" type="button"
                            data-bs-toggle="collapse" data-bs-target="#mobileSearch" aria-expanded="false"
                            aria-controls="mobileSearch">
                            <i class="bi bi-search"></i>
                        </button>

                        <!-- Desktop buttons -->
                        <div class="d-none d-md-flex">
                            <a href="/login" class="btn btn-search-style me-2">
                                Masuk <i class="bi bi-box-arrow-in-right ms-1"></i>
                            </a>
                            <a href="/register" class="btn btn-search-style">
                                Daftar <i class="bi bi-person-plus ms-1"></i>
                            </a>
                        </div>

                        <!-- Mobile Navigation Toggle -->
                        <i class="mobile-nav-toggle d-xl-none bi bi-list me-0"></i>

                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="header-nav">
            <div class="container-fluid container-xl">
                <div class="position-relative">
                    <nav id="navmenu" class="navmenu">
                        <ul>
                            <li><a href="/" class="active">Beranda</a></li>
                            <li><a href="/tentang" class="{{ request()->is('tentang') ? 'active' : '' }}">Tentang</a>
                            </li>
                            <li><a href="/produk" class="{{ request()->is('produk*') ? 'active' : '' }}">Produk</a></li>
                            <li><a href="/keranjang"
                                    class="{{ request()->is('keranjang') ? 'active' : '' }}">Keranjang</a></li>
                            <li><a href="/beli" class="{{ request()->is('beli*') ? 'active' : '' }}">Beli</a></li>
                            <li><a href="/kontak" class="{{ request()->is('kontak') ? 'active' : '' }}">Kontak</a></li>
                            <li class="d-md-none text-center mt-5">
                                <div class="d-flex justify-content-center">
                                    <a href="login-register.html"
                                        style="background-color: #f7941d; width: 50%; color: white; text-align: center; display: flex; align-items: center; justify-content: center;"
                                        class="btn">
                                        Masuk
                                    </a>
                                </div>
                            </li>
                            <li class="d-md-none text-center mt-2">
                                <div class="d-flex justify-content-center">
                                    <a href="register.html"
                                        style="background-color: #f7941d; width: 50%; color: white; text-align: center; display: flex; align-items: center; justify-content: center;"
                                        class="btn">
                                        Daftar
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Mobile Search Form -->
        <div class="collapse" id="mobileSearch">
            <div class="container">
                <form class="search-form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <button class="btn" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </header>

    <main class="main">
        <section class="ecommerce-hero-1 hero section" id="hero">
            <div class="container">
                {{-- Pesan Error --}}
                <div class="row g-4">
                    {{-- Jika Ada Error --}}
                    @if (session('error'))
                    <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert" style="width: 100%">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-exclamation-circle-fill me-2"></i>
                            <div>
                                <p class="m-0"> {{ session('error') }}</p>
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

                <div class="row align-items-center">
                    <div class="col-lg-6 content-col" data-aos="fade-right" data-aos-delay="100">
                        <div class="content">
                            <!-- <span class="promo-badge">New Collection 2025</span> -->
                            <h1><span>RasaTangkit:</span> Produk Berkelas dari Nanas Tangkit</h1>
                            <p>Temukan beragam olahan nanas khas Tangkit — nikmat, alami, dan penuh kebaikan rasa lokal.
                            </p>
                            <div class="hero-cta">
                                <a href="/produk" class="btn btn-shop">Beli Sekarang <i
                                        class="bi bi-arrow-right"></i></a>
                                <a href="/produk" class="btn btn-collection">Lihat Semua Produk</a>
                            </div>
                            <div class="hero-features">
                                <div class="feature-item">
                                    <i class="bi bi-truck"></i>
                                    <span>100% Nanas Lokal</span>
                                </div>
                                <div class="feature-item">
                                    <i class="bi bi-shield-check"></i>
                                    <span>Kualitas Premium</span>
                                </div>
                                <div class="feature-item">
                                    <i class="bi bi-arrow-repeat"></i>
                                    <span>Siap Kirim ke Seluruh Indonesia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 image-col" data-aos="fade-left" data-aos-delay="200">
                        <div class="hero-image">
                            <img src="{{ asset('assets-user/img/product/nanas2.png') }}" alt="Selai Nanas"
                                class="main-product" loading="lazy">
                            <div class="floating-product product-1" data-aos="fade-up" data-aos-delay="300">
                                <img src="{{ asset('assets-user/img/product/nanas3.webp') }}" alt="Product 2">
                                <div class="product-info">
                                    <h4>Nanas Queen</h4>
                                    <span class="price">Rp15.000</span>
                                </div>
                            </div>
                            <div class="floating-product product-2" data-aos="fade-up" data-aos-delay="400">
                                <img src="{{ asset('assets-user/img/product/nastar.png') }}" alt="Product 3">
                                <div class="product-info">
                                    <h4>Nastar Nanas</h4>
                                    <span class="price">Rp25.000</span>
                                </div>
                            </div>
                            <div class="discount-badge" data-aos="zoom-in" data-aos-delay="500">
                                <span class="percent">100%</span>
                                <span class="text">LOCAL</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Hero Section -->

        <!-- Info Cards Section -->
        <section id="info-cards" class="info-cards section light-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4 justify-content-center">

                    <!-- Info Card 1 -->
                    <div class="col-12 col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-card text-center">
                            <div class="icon-box">
                                <i class="bi bi-truck"></i>
                            </div>
                            <h3>Gratis Ongkir</h3>
                            <p>Gratis ongkos kirim ke wilayah tertentu. Nikmati olahan nanas khas Tangkit langsung di
                                rumah
                                Anda.</p>
                        </div>
                    </div><!-- End Info Card 1 -->

                    <!-- Info Card 2 -->
                    <div class="col-12 col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="info-card text-center">
                            <div class="icon-box">
                                <i class="bi bi-star"></i>
                            </div>
                            <h3>Kualitas Terbaik</h3>
                            <p>Produk kami diolah dari nanas pilihan dengan proses higienis untuk menjaga rasa dan mutu
                                terbaik.
                            </p>
                        </div>
                    </div><!-- End Info Card 2 -->

                    <!-- Info Card 3 -->
                    <div class="col-12 col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                        <div class="info-card text-center">
                            <div class="icon-box">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <h3>Olahan Lokal Asli Tangkit</h3>
                            <p>Dibuat langsung dari nanas unggulan Tangkit, Jambi—dengan cita rasa otentik khas daerah.
                            </p>
                        </div>
                    </div><!-- End Info Card 3 -->

                    <!-- Info Card 4 -->
                    <div class="col-12 col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                        <div class="info-card text-center">
                            <div class="icon-box">
                                <i class="bi bi-recycle"></i>
                            </div>
                            <h3>Ramah Lingkungan</h3>
                            <p>Kami berkomitmen pada keberlanjutan dengan kemasan ramah lingkungan dan praktik produksi
                                yang
                                bijak.</p>
                        </div>
                    </div><!-- End Info Card 4 -->

                </div>

            </div>
        </section><!-- End Info Cards Section -->


        <!-- Category Cards Section -->
        <section id="category-cards" class="category-cards section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="category-slider swiper init-swiper">
                    <!-- Best Sellers Section -->
                    <section id="best-sellers" class="best-sellers section">
                        <!-- Section Title -->
                        <div class="container section-title" data-aos="fade-up">
                            <h2>Best Sellers</h2>
                            <p>Nikmati cita rasa khas dari olahan nanas pilihan, langsung dari kebun terbaik kami untuk
                                Anda.
                            </p>
                        </div><!-- End Section Title -->

                        <div class="container" data-aos="fade-up" data-aos-delay="100">

                            <div class="row gy-4">
                                <!-- Menampilkan Product -->
                                @foreach($bestProducts as $barang)
                                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <img src="{{ asset('img/barang/' . $barang->gambar) }}"
                                                class="img-fluid default-image" alt="Product" loading="lazy">
                                            <img src="{{ asset('img/barang/' . $barang->gambar) }}"
                                                class="img-fluid hover-image" alt="Product hover" loading="lazy">
                                            <div class="product-tags">
                                                <span class="badge bg-accent">New</span>
                                            </div>
                                            <div class="product-actions">
                                                <button class="btn-wishlist" type="button" aria-label="Add to wishlist">
                                                    <i class="bi bi-heart"></i>
                                                </button>
                                                <button class="btn-quickview" type="button" aria-label="Quick view">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h4>{{ $barang->nama_produk }}</h4>
                                            <h3 class="product-title"><a href="#">{{ $barang->deskripsi }}</a></h3>
                                            <div class="product-price">
                                                <span class="current-price">Rp
                                                    {{ number_format($barang->harga, 0, ',', '.') }}</span>
                                            </div>
                                            <div class="product-rating">
                                                @php
                                                $average = round($barang->reviews_avg_rating ?? 0, 1);
                                                $fullStars = floor($average);
                                                $hasHalfStar = ($average - $fullStars) >= 0.5;
                                                $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
                                                $reviewCount = $barang->reviews_count ?? $barang->reviews()->count();
                                                @endphp

                                                @for ($i = 0; $i < $fullStars; $i++) <i class="bi bi-star-fill"></i>
                                                    @endfor

                                                    @if ($hasHalfStar)
                                                    <i class="bi bi-star-half"></i>
                                                    @endif

                                                    @for ($i = 0; $i < $emptyStars; $i++) <i class="bi bi-star"></i>
                                                        @endfor

                                                        <span>({{ $reviewCount }})</span>
                                            </div>
                                            <form action="{{ route('cart.add', $barang->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-add-to-cart">
                                                    <i class="bi bi-bag-plus me-2"></i> Tambah ke Keranjang
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </section><!-- /Best Sellers Section -->

                    <!-- Product List Section -->
                    <section id="product-list" class="product-list section">

                        <div class="container isotope-layout" data-aos="fade-up" data-aos-delay="100"
                            data-default-filter="*" data-layout="masonry" data-sort="original-order">

                            <div class="row">
                                <div class="col-12">
                                    <div class="product-filters isotope-filters mb-5 d-flex justify-content-center"
                                        data-aos="fade-up">
                                        <ul class="d-flex flex-wrap gap-2 list-unstyled">
                                            <li class="filter-active" data-filter="*">Semua</li>
                                            <li data-filter=".Snack">Snack</li>
                                            <li data-filter=".Minuman">Minuman</li>
                                            <li data-filter=".Selai">Selai</li>
                                            <li data-filter=".Sambal">Sambal</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row product-container isotope-container" data-aos="fade-up"
                                data-aos-delay="200">

                                <!-- Menampilkan Barang -->
                                @foreach($barangs as $barang)
                                <div
                                    class="col-md-6 col-lg-3 product-item isotope-item filter-clothing {{$barang->jenis_olahan}}">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <span class="badge">Sale</span>
                                            <img src="{{ asset('img/barang/' . $barang->gambar) }}" alt="Product"
                                                class="img-fluid main-img">
                                            <img src="{{ asset('img/barang/' . $barang->gambar) }}" alt="Product Hover"
                                                class="img-fluid hover-img">
                                            <div class="product-overlay">
                                                <form action="{{ route('cart.add', $barang->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-cart">
                                                        <i class="bi bi-cart-plus"></i> Tambah ke Keranjang
                                                    </button>
                                                </form>

                                                <div class="product-actions">
                                                    @php
                                                    $liked = auth()->check() &&
                                                    auth()->user()->likedBarangs->contains($barang->id);
                                                    @endphp

                                                    <a href="" class="action-btn"
                                                        onclick="event.preventDefault(); document.getElementById('like-form-{{ $barang->id }}').submit();">
                                                        <i
                                                            class="bi bi-heart{{ $liked ? '-fill text-danger' : '' }}"></i>
                                                    </a>
                                                    <form id="like-form-{{ $barang->id }}"
                                                        action="{{ route('barang.like', $barang->id) }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                    <a href="{{ route('produk.detail', $barang->id) }}"
                                                        class="action-btn"><i class="bi bi-eye"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-title">
                                                <a href="#">{{ $barang->nama_produk }}</a>
                                            </h5>
                                            <div class="product-price">
                                                <span class="current-price">Rp
                                                    {{ number_format($barang->harga, 0, ',', '.') }}</span>
                                                <span class="old-price">Rp
                                                    {{ number_format($barang->harga + 10000, 0, ',', '.') }}</span>
                                            </div>
                                            <div class="product-rating">
                                                @php
                                                $average = round($barang->reviews_avg_rating ?? 0, 1);
                                                $fullStars = floor($average);
                                                $hasHalfStar = ($average - $fullStars) >= 0.5;
                                                $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
                                                $reviewCount = $barang->reviews_count ?? $barang->reviews()->count();
                                                @endphp

                                                @for ($i = 0; $i < $fullStars; $i++) <i class="bi bi-star-fill"></i>
                                                    @endfor

                                                    @if ($hasHalfStar)
                                                    <i class="bi bi-star-half"></i>
                                                    @endif

                                                    @for ($i = 0; $i < $emptyStars; $i++) <i class="bi bi-star"></i>
                                                        @endfor

                                                        <span>({{ $reviewCount }})</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="text-center mt-5" data-aos="fade-up">
                                <a href="/produk" class="view-all-btn">Lihat Semua Produk<i
                                        class="bi bi-arrow-right"></i></a>
                            </div>

                        </div>

                    </section><!-- /Product List Section -->
    </main>

    <footer id="footer" class="footer">
        <div class="footer-main">
            <div class="container">
                <div class="row gy-4">
                    <!-- Tentang -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-widget footer-about">
                            <a href="index.html" class="logo" style="margin-top: -20px;">
                                <span class="sitename">Rasa Tangkit</span>
                            </a>
                            <p>Rasakan kelezatan nanas Tangkit dalam keripik, dodol, selai, dan minuman segar. Dukung
                                petani lokal, nikmati rasa asli Indonesia!</p>
                            <div class="footer-contact mt-4">
                                <div class="contact-item">
                                    <i class="bi bi-geo-alt"></i>
                                    <span>Jalan Nanas No. 5, Tangkit, Muaro Jambi, Jambi</span>
                                </div>
                                <div class="contact-item">
                                    <i class="bi bi-telephone"></i>
                                    <span>+62 812-3456-7890</span>
                                </div>
                                <div class="contact-item">
                                    <i class="bi bi-envelope"></i>
                                    <span>info@rasatangkit.id</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Produk -->
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h4>Produk</h4>
                            <ul class="footer-links">
                                <li><a href="/produk">Semua Produk</a></li>
                                <li>Keripik Nanas</li>
                                <li>Dodol Nanas</li>
                                <li>Selai Nanas</li>
                                <li>Minuman Nanas</li>
                                <li>Promo Spesial</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Bantuan -->
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h4>Bantuan</h4>
                            <ul class="footer-links">
                                <li><a href="/kontak">Pusat Bantuan</a></li>
                                <li><a href="/account">Status Pesanan</a></li>
                                <li><a href="/account">Info Pengiriman</a></li>
                                <li><a href="/account">Pengembalian Barang</a></li>
                                <li><a href="/home">FAQ</a></li>
                                <li><a href="/kontak">Hubungi Kami</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Tentang Kami -->
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h4>Perusahaan</h4>
                            <ul class="footer-links">
                                <li><a href="/tentang">Tentang Kami</a></li>
                                <li><a href="/tentang">Mitra & Distribusi</a></li>
                                <li><a href="/tentang">Berita & Media</a></li>
                                <li><a href="/tentang">Tanggung Jawab Sosial</a></li>
                                <li><a href="/tentang">Karir</a></li>
                                <li><a href="/tentang">Kontak</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Aplikasi & Sosial Media -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h4>Unduh Aplikasi Kami</h4>
                            <p>Belanja olahan nanas lebih mudah lewat aplikasi</p>
                            <div class="app-buttons">
                                <a href="/home" class="app-btn">
                                    <i class="bi bi-apple"></i>
                                    <span>App Store</span>
                                </a>
                                <a href="/home" class="app-btn">
                                    <i class="bi bi-google-play"></i>
                                    <span>Google Play</span>
                                </a>
                            </div>
                            <div class="social-links mt-4">
                                <h5>Ikuti Kami</h5>
                                <div class="social-icons">
                                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                                    <a href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                                    <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">

                <div class="copyright text-center">
                    <p>© <span>Copyright</span> <strong class="sitename">RasaTangkit</strong>. All Rights Reserved.</p>
                </div>

                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you've purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                    Designed by <a href="https://rasatangkit.com/">RasaTangkit</a>
                </div>

            </div>

        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets-user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-user/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets-user/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets-user/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets-user/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets-user/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets-user/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets-user/vendor/drift-zoom/Drift.min.js') }}"></script>
    <script src="{{ asset('assets-user/vendor/purecounter/purecounter_vanilla.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets-user/js/main.js') }}"></script>

</body>

</html>

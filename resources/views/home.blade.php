@extends('templates.mainTemplatedUser')

@section('title', 'Home')

@section('konten')
<!-- Hero Section -->
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
                    <p>Temukan beragam olahan nanas khas Tangkit — nikmat, alami, dan penuh kebaikan rasa lokal.</p>
                    <div class="hero-cta">
                        <a href="/produk" class="btn btn-shop">Beli Sekarang <i class="bi bi-arrow-right"></i></a>
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
                    <img src="{{ asset('assets-user/img/product/nanas2.png') }}" alt="Selai Nanas" class="main-product"
                        loading="lazy">
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
                    <p>Gratis ongkos kirim ke wilayah tertentu. Nikmati olahan nanas khas Tangkit langsung di rumah
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
                    <p>Produk kami diolah dari nanas pilihan dengan proses higienis untuk menjaga rasa dan mutu terbaik.
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
                    <p>Dibuat langsung dari nanas unggulan Tangkit, Jambi—dengan cita rasa otentik khas daerah.</p>
                </div>
            </div><!-- End Info Card 3 -->

            <!-- Info Card 4 -->
            <div class="col-12 col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                <div class="info-card text-center">
                    <div class="icon-box">
                        <i class="bi bi-recycle"></i>
                    </div>
                    <h3>Ramah Lingkungan</h3>
                    <p>Kami berkomitmen pada keberlanjutan dengan kemasan ramah lingkungan dan praktik produksi yang
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
                    <p>Nikmati cita rasa khas dari olahan nanas pilihan, langsung dari kebun terbaik kami untuk Anda.
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

                <div class="container isotope-layout" data-aos="fade-up" data-aos-delay="100" data-default-filter="*"
                    data-layout="masonry" data-sort="original-order">

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

                    <div class="row product-container isotope-container" data-aos="fade-up" data-aos-delay="200">

                        <!-- Menampilkan Barang -->
                        @foreach($barangs as $barang)
                        <div class="col-md-6 col-lg-3 product-item isotope-item filter-clothing {{$barang->jenis_olahan}}">
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
                                                <i class="bi bi-heart{{ $liked ? '-fill text-danger' : '' }}"></i>
                                            </a>
                                            <form id="like-form-{{ $barang->id }}"
                                                action="{{ route('barang.like', $barang->id) }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                            <a href="{{ route('produk.detail', $barang->id) }}" class="action-btn"><i
                                                    class="bi bi-eye"></i></a>
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
                        <a href="/produk" class="view-all-btn">Lihat Semua Produk<i class="bi bi-arrow-right"></i></a>
                    </div>

                </div>

            </section><!-- /Product List Section -->
            @endsection

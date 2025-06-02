@extends('templates.mainTemplatedUser')

@section('title', 'Produk')

@section('konten')
<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Semua Produk</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="index.html">Beranda</a></li>
                <li class="current">Toko</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<div class="container">
    <div class="row">
        <div class="col-lg-25">

            <!-- Category Header Section -->
            <section id="category-header" class="category-header section">

                <div class="container" data-aos="fade-up">

                    <!-- Filter and Sort Options -->
                    <div class="d-flex justify-content-end">
                        <div class="filter-container mb-4" data-aos="fade-up" data-aos-delay="100" style="width: 50%">
                            <div class="row g-3">
                                <div class="filter-item search-form">
                                    <label for="productSearch" class="form-label">Search Products</label>
                                    <div class="input-group" style="width: 100%">
                                        <input type="text" class="form-control" id="productSearch"
                                            placeholder="Search for products..." aria-label="Search for products">
                                        <button class="btn search-btn" type="button">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </section><!-- /Category Header Section -->

            <!-- Category Product List Section -->
            <section id="category-product-list" class="category-product-list section">

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row gy-4">
                        <!-- Product 1 -->
                        @foreach($barangs as $barang)
                        <div class="col-md-6 col-lg-3">
                            <div class="product-box">
                                <div class="product-thumb">
                                    <span class="product-label">New Season</span>
                                    <img src="{{ asset('img/barang/' . $barang->gambar) }}" alt="Product Image" class="main-img">
                                    <div class="product-overlay">
                                        <div class="product-quick-actions">
                                            @php
                                            $liked = auth()->check() &&
                                            auth()->user()->likedBarangs->contains($barang->id);
                                            @endphp

                                            <a href="" class="quick-action-btn"
                                                onclick="event.preventDefault(); document.getElementById('like-form-{{ $barang->id }}').submit();">
                                                <i class="bi bi-heart{{ $liked ? '-fill text-danger' : '' }}"></i>
                                            </a>
                                            <form id="like-form-{{ $barang->id }}"
                                                action="{{ route('barang.like', $barang->id) }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                            <a href="{{ route('produk.detail', $barang->id) }}" class="quick-action-btn">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </div>
                                        <div class="add-to-cart-container">
                                            <button type="button" class="add-to-cart-btn">Tambah Ke Keranjang</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-details">
                                        <h3 class="product-title"><a href="">{{ $barang->nama_produk }}</a></h3>
                                        <div class="product-price" style="margin-top: -20px">
                                            <span>Rp
                                            {{ number_format($barang->harga, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                    <div class="product-rating-container">
                                        <div class="rating-stars">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star"></i>
                                        </div>
                                        <span class="rating-number">4.0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- End Product 1 -->

                    </div>

                </div>

            </section><!-- /Category Product List Section -->

        </div>

    </div>
</div>
@endsection

@extends('templates.mainTemplatedUser')

@section('title', 'Keranjang')

@section('konten')
<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Keranjang</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="/home">Beranda</a></li>
                <li class="current">Keranjang</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Cart Section -->
<section id="cart" class="cart section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                <div class="cart-items">
                    <div class="cart-header d-none d-lg-block">
                        <div class="row align-items-center gy-4">
                            <div class="col-lg-6">
                                <h5>Produk</h5>
                            </div>
                            <div class="col-lg-2 text-center">
                                <h5>Harga</h5>
                            </div>
                            <div class="col-lg-2 text-center">
                                <h5>Kuantitas</h5>
                            </div>
                            <div class="col-lg-2 text-center">
                                <h5>Total</h5>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Item 1 -->
                    @if($cart && $cart->items)
                    @foreach($cart->items as $item)
                    <div class="cart-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="row align-items-center gy-4">
                            <div class="col-lg-6 col-12 mb-3 mb-lg-0">
                                <div class="product-info d-flex align-items-center">
                                    <div class="product-image">
                                        <img src="{{ asset('img/barang/' . $item->barang->gambar) }}" alt="Product"
                                            class="img-fluid" loading="lazy">
                                    </div>
                                    <div class="product-details">
                                        <h6 class="product-title">{{ $item->barang->nama_produk }}</h6>
                                        <div class="product-meta">
                                            <span class="product-color">{{ $item->barang->jenis_olahan }}</span>
                                        </div>
                                        <button class="remove-item" type="button">
                                            <i class="bi bi-trash"></i> Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-2 text-center">
                                <div class="price-tag">
                                    <span
                                        class="current-price">Rp{{ number_format($item->barang->harga * $item->quantity, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            <div class="col-12 col-lg-2 text-center">
                                <div class="quantity-selector">
                                    <button class="quantity-btn decrease">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" class="quantity-input" value="{{ $item->quantity }}">
                                    <button class="quantity-btn increase">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-2 text-center mt-3 mt-lg-0">
                                <div class="item-total mt-4">
                                    <span>Rp{{ number_format($item->barang->harga * $item->quantity, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p class="text-center">Keranjang masih kosong.</p>
                    @endif

                    <div class="cart-actions">
                        <div class="row g-3">
                            <div class="text-md-end">
                                <button class="btn btn-outline-accent me-2">
                                    <i class="bi bi-arrow-clockwise"></i> Update
                                </button>
                                <button class="btn btn-outline-danger">
                                    <i class="bi bi-trash"></i> Bersih
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="cart-summary">
                    <h4 class="summary-title">Rangkuman Pesanan</h4>

                    <div class="summary-item">
                        <span class="summary-label">Subtotal</span>
                        <span class="summary-value">Rp
                            {{ $cart && $cart->items ? number_format($cart->items->sum(fn($i) => ($i->barang->harga ?? 0) * $i->quantity), 0, ',', '.') : '0' }}
                        </span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Item</span>
                        <span class="summary-value">{{ $cart && $cart->items ? $cart->items->sum('quantity') : 0 }}
                            item</span>
                    </div>

                    <div class="summary-total">
                        <span class="summary-label">Total</span>
                        <span class="summary-value">
                            Rp
                            {{ $cart && $cart->items ? number_format($cart->items->sum(fn($i) => ($i->barang->harga ?? 0) * $i->quantity), 0, ',', '.') : '0' }}
                        </span>
                    </div>

                    <div class="checkout-button">
                        <a href="/beli" class="btn btn-accent w-100">
                            Proses Pembayaran <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <div class="continue-shopping">
                        <a href="/produk" class="btn btn-link w-100">
                            <i class="bi bi-arrow-left"></i> Lanjut Belanja
                        </a>
                    </div>

                    <div class="payment-methods">
                        <p class="payment-title">We Accept</p>
                        <div class="payment-icons">
                            <i class="bi bi-credit-card-2-front"></i>
                            <i class="bi bi-paypal"></i>
                            <i class="bi bi-wallet2"></i>
                            <i class="bi bi-credit-card"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section><!-- /Cart Section -->
@endsection

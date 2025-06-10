@extends('templates.mainTemplatedUser')

@section('title', $barang->nama_produk)

@section('konten')
<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Detail Produk</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="/home">Beranda</a></li>
                <li class="current">Detail Produk</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Product Details Section -->
<section id="product-details" class="product-details section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
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
            <div class="alert alert-success" style="width: 100%">
                {{ session('success') }}
            </div>
            @endif

            {{-- jika Password telah di ubah --}}
            @if (session('status'))
            <div class="alert alert-success" style="width: 100%">
                {{ session('status') }}
            </div>
            @endif
        </div>

        <div class="row">
            <!-- Product Images -->
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
                <div class="product-images">
                    <div class="main-image-container mb-3">
                        <div class="image-zoom-container">
                            <img src="{{ asset('img/barang/' . $barang->gambar) }}" alt="{{$barang->nama_produk}}"
                                class="img-fluid main-image drift-zoom" id="main-product-image"
                                data-zoom="{{ asset('img/barang/' . $barang->gambar) }}">
                        </div>
                    </div>

                    <div class="product-thumbnails">
                        <div class="swiper product-thumbnails-slider init-swiper">
                            <script type="application/json" class="swiper-config">
                                {
                                    "loop": false,
                                    "speed": 400,
                                    "slidesPerView": 4,
                                    "spaceBetween": 10,
                                    "navigation": {
                                        "nextEl": ".swiper-button-next",
                                        "prevEl": ".swiper-button-prev"
                                    },
                                    "breakpoints": {
                                        "320": {
                                            "slidesPerView": 3
                                        },
                                        "576": {
                                            "slidesPerView": 4
                                        }
                                    }
                                }

                            </script>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide thumbnail-item active"
                                    data-image="{{ asset('img/barang/' . $barang->gambar) }}">
                                    <img src="{{ asset('img/barang/' . $barang->gambar) }}"
                                        alt="{{$barang->nama_produk}}" class="img-fluid">
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="product-info">
                    <div class="product-meta mb-2">
                        <span class="product-category">{{$barang->jenis_olahan}}</span>
                        <div class="product-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <span class="rating-count">(42)</span>
                        </div>
                    </div>

                    <h1 class="product-title">{{$barang->nama_produk}}</h1>

                    <div class="product-price-container mb-4">
                        <span class="current-price">Rp
                            {{ number_format($barang->harga, 0, ',', '.') }}</span>
                    </div>

                    <div class="product-short-description mb-4">
                        <p>{{$barang->deskripsi}}</p>
                    </div>

                    <div class="product-availability mb-4">
                        <i class="bi bi-check-circle-fill text-success"></i>
                        <span>Dalam Stok</span>
                        <span class="stock-count">({{$barang->stok}})</span>
                    </div>

                    <!-- Quantity Selector -->
                    <div class="product-quantity mb-4">
                        <h6 class="option-title">Kuantiti:</h6>
                        <div class="quantity-selector">
                            <button class="quantity-btn decrease">
                                <i class="bi bi-dash"></i>
                            </button>
                            <input type="number" class="quantity-input" value="1" min="1" max="24" name="quantity"
                                value="1" min="1" max="{{ $barang->stok }}">
                            <button class="quantity-btn increase">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Action Buttons -->

                    <div class="product-actions">
                        <button class="btn btn-primary add-to-cart-btn">
                            <i class="bi bi-cart-plus"></i> Tambah ke keranjang
                        </button>

                        <form method="POST" action="{{ route('produk.beli') }}">
                            @csrf
                            <input type="hidden" name="barang_id" value="{{ $barang->id }}">
                            <input type="hidden" id="buy-quantity" name="quantity" value="1">
                            <button class="btn btn-outline-primary buy-now-btn">
                                <i class="bi bi-lightning-fill"></i> Beli sekarang
                            </button>
                        </form>

                        <button type="button" class="btn btn-outline-secondary wishlist-btn"
                            data-id="{{ $barang->id }}">
                            <i
                                class="bi {{ auth()->user() && auth()->user()->likedBarangs->contains($barang->id) ? 'bi-heart-fill text-danger' : 'bi-heart' }}"></i>
                        </button>

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                document.querySelectorAll('.wishlist-btn').forEach(button => {
                                    button.addEventListener('click', function () {
                                        const barangId = this.dataset.id;
                                        const icon = this.querySelector('i');

                                        fetch(`/like/${barangId}`, {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                },
                                            })
                                            .then(response => {
                                                if (!response.ok) throw new Error(
                                                    "Gagal menyukai produk");
                                                return response
                                                    .text(); // Bisa juga return JSON kalau kamu ubah di controller
                                            })
                                            .then(() => {
                                                icon.classList.toggle('bi-heart');
                                                icon.classList.toggle('bi-heart-fill');
                                                icon.classList.toggle('text-danger');
                                            })
                                            .catch(err => {
                                                console.error(err);
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'Terjadi kesalahan saat menyukai produk.'
                                                });
                                            });
                                    });
                                });
                            });

                        </script>
                    </div>

                    <!-- SweetAlert2 CDN -->
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                    <script>
                        // Perbaikan script quantity selector
                        document.addEventListener('DOMContentLoaded', function () {
                            const quantityInput = document.querySelector('.quantity-input');
                            const quantityHiddenInput = document.getElementById('buy-quantity');
                            const increaseBtn = document.querySelector('.quantity-btn.increase');
                            const decreaseBtn = document.querySelector('.quantity-btn.decrease');

                            // Fungsi untuk menangani penambahan
                            function handleIncrease() {
                                let current = parseInt(quantityInput.value);
                                let max = parseInt(quantityInput.max);
                                if (current < max) {
                                    quantityInput.value = current + 1;
                                    quantityHiddenInput.value = quantityInput.value;
                                }
                            }

                            // Fungsi untuk menangani pengurangan
                            function handleDecrease() {
                                let current = parseInt(quantityInput.value);
                                if (current > 1) {
                                    quantityInput.value = current - 1;
                                    quantityHiddenInput.value = quantityInput.value;
                                }
                            }

                            // Hapus event listener yang mungkin sudah ada
                            increaseBtn.removeEventListener('click', handleIncrease);
                            decreaseBtn.removeEventListener('click', handleDecrease);

                            // Tambahkan event listener baru
                            increaseBtn.addEventListener('click', handleIncrease, {
                                once: false
                            });
                            decreaseBtn.addEventListener('click', handleDecrease, {
                                once: false
                            });

                            // Sync manual input
                            quantityInput.addEventListener('input', function () {
                                quantityHiddenInput.value = this.value;
                            });

                            const addToCartBtn = document.querySelector('.add-to-cart-btn');
                            const barangId = "{{ $barang->id }}";

                            addToCartBtn.addEventListener('click', function () {
                                const quantity = parseInt(document.querySelector('.quantity-input')
                                    .value);

                                fetch("{{ route('produk.keranjang') }}", {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({
                                            barang_id: barangId,
                                            quantity: quantity
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Berhasil',
                                                text: data.message,
                                                timer: 2000,
                                                showConfirmButton: false
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Gagal',
                                                text: 'Gagal menambahkan ke keranjang'
                                            });
                                        }
                                    })
                                    .catch(err => {
                                        console.error(err);
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Terjadi kesalahan saat menambahkan ke keranjang.'
                                        });
                                    });
                            });
                        });

                    </script>

                    <!-- Additional Info -->
                    <div class="additional-info mt-4">
                        <div class="info-item">
                            <i class="bi bi-truck"></i>
                            <span>Gratis pengiriman untuk pesanan di atas Rp 50.000,00</span>
                        </div>
                        <div class="info-item">
                            <i class="bi bi-arrow-repeat"></i>
                            <span>Kebijakan pengembalian 30 hari</span>
                        </div>
                        <div class="info-item">
                            <i class="bi bi-shield-check"></i>
                            <span>Garansi 2 tahun</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details Tabs -->
        <div class="row mt-5" data-aos="fade-up">
            <div class="col-12">
                <div class="product-details-tabs">
                    <ul class="nav nav-tabs" id="productTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                aria-selected="true">Deskripsi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                type="button" role="tab" aria-controls="reviews" aria-selected="false">Ulasan
                                ({{ $totalReviews }})</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="productTabsContent">
                        <!-- Description Tab -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="product-description">
                                <h4>Gambaran Umum Produk</h4>
                                <p>{{$barang->deskripsi}}
                                </p>
                            </div>
                        </div>

                        <!-- Reviews Tab -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="product-reviews">
                                <div class="reviews-summary">
                                    <div class="overall-rating">
                                        <div class="rating-number">{{ number_format($averageRating, 1) }}</div>
                                        <div class="rating-stars">
                                            @for ($i = 1; $i <= 5; $i++) @if ($averageRating>= $i)
                                                <i class="bi bi-star-fill"></i>
                                                @elseif ($averageRating >= $i - 0.5)
                                                <i class="bi bi-star-half"></i>
                                                @else
                                                <i class="bi bi-star"></i>
                                                @endif
                                                @endfor
                                        </div>
                                        <div class="rating-count">Berdasarkan {{ $totalReviews }} ulasan</div>
                                    </div>

                                    <div class="rating-breakdown">
                                        @foreach ([5, 4, 3, 2, 1] as $star)
                                        @php
                                        $count = $ratingCounts[$star];
                                        $percentage = $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0;
                                        @endphp
                                        <div class="rating-bar">
                                            <div class="rating-label">{{ $star }} stars</div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="rating-count">{{ $count }}</div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="review-form-container">
                                    <h4>Tulis Review</h4>
                                    <form class="review-form" method="POST"
                                        action="{{ route('produk.review', $barang->id) }}">
                                        @csrf
                                        <div class="rating-select mb-4">
                                            <label class="form-label">Beri Rating</label>
                                            <div class="star-rating">
                                                @for ($i = 5; $i >= 1; $i--)
                                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}">
                                                <label for="star{{ $i }}" title="{{ $i }} stars">
                                                    <i class="bi bi-star-fill"></i>
                                                </label>
                                                @endfor
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="review-title" class="form-label">Judul Ulasan</label>
                                            <input type="text" class="form-control" id="review-title" name="judul"
                                                required>
                                        </div>

                                        <div class="mb-4">
                                            <label for="review-content" class="form-label">Ulasan Kamu</label>
                                            <textarea class="form-control" id="review-content" name="ulasan" rows="4"
                                                required></textarea>
                                            <div class="form-text">Beri tahu orang lain pendapatmu tentang produk ini.
                                            </div>
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="reviews-list mt-5">
                                    <h4>Ulasan Pembeli</h4>

                                    @forelse ($barang->reviews as $review)
                                    <div class="review-item mb-4 p-3 border rounded shadow-sm">
                                        <div class="review-header d-flex justify-content-between align-items-start">
                                            <div class="reviewer-info d-flex align-items-center">
                                                <img src="{{ asset('img/user/profile/' . ($review->user->profile->foto_profil ?? 'default.png')) }}"
                                                    alt="Reviewer" class="reviewer-avatar rounded-circle me-3"
                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                                <div>
                                                    <h5 class="reviewer-name mb-0">
                                                        {{ $review->user->profile->nama_panjang ?? $review->user->nama }}
                                                    </h5>
                                                    <div class="review-date text-muted" style="font-size: 0.875rem;">
                                                        {{ $review->created_at->format('d/m/Y') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-rating text-warning">
                                                @for($i = 1; $i <= 5; $i++) <i
                                                    class="bi bi-star{{ $i <= $review->rating ? '-fill' : '' }}"></i>
                                                    @endfor
                                            </div>
                                        </div>

                                        <h6 class="review-title mt-2 fw-semibold">{{ $review->judul }}</h6>
                                        <div class="review-content text-muted">
                                            <p class="mb-0">{{ $review->ulasan }}</p>
                                        </div>
                                    </div>
                                    @empty
                                    <p
                                        class="alert alert-warning text-center m-3 d-flex align-items-center justify-content-center">
                                        <i class="bi bi-chat-left-text d-inline-flex align-items-center me-2"></i> Belum
                                        ada ulasan untuk produk ini.
                                    </p>
                                    @endforelse

                                    @if ($barang->reviews->count() > 3)
                                    <div class="text-center mt-4">
                                        <button class="btn btn-outline-primary load-more-btn">Ulasan lainnya</button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Product Details Section -->
@endsection

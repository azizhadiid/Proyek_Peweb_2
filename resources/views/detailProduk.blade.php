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
                                    <img src="{{ asset('img/barang/' . $barang->gambar) }}" alt="{{$barang->nama_produk}}"
                                        class="img-fluid">
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
                        <span>In Stock</span>
                        <span class="stock-count">({{$barang->stok}})</span>
                    </div>

                    <!-- Quantity Selector -->
                    <div class="product-quantity mb-4">
                        <h6 class="option-title">Quantity:</h6>
                        <div class="quantity-selector">
                            <button class="quantity-btn decrease">
                                <i class="bi bi-dash"></i>
                            </button>
                            <input type="number" class="quantity-input" value="1" min="1" max="24">
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
                        <button class="btn btn-outline-primary buy-now-btn">
                            <i class="bi bi-lightning-fill"></i> Beli sekarang
                        </button>
                        <button class="btn btn-outline-secondary wishlist-btn">
                            <i class="bi bi-heart"></i>
                        </button>
                    </div>

                    <!-- Additional Info -->
                    <div class="additional-info mt-4">
                        <div class="info-item">
                            <i class="bi bi-truck"></i>
                            <span>Free shipping on orders over $50</span>
                        </div>
                        <div class="info-item">
                            <i class="bi bi-arrow-repeat"></i>
                            <span>30-day return policy</span>
                        </div>
                        <div class="info-item">
                            <i class="bi bi-shield-check"></i>
                            <span>2-year warranty</span>
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
                                (42)</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="productTabsContent">
                        <!-- Description Tab -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="product-description">
                                <h4>Gambaran Umum Produk</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at lacus congue,
                                    suscipit elit nec, tincidunt orci. Phasellus egestas nisi vitae lectus imperdiet
                                    venenatis. Suspendisse vulputate quam diam, et consectetur augue condimentum in.
                                    Aenean dapibus urna eget nisi pharetra, in iaculis nulla blandit. Praesent at
                                    consectetur sem, sed sollicitudin nibh. Ut interdum risus ac nulla placerat aliquet.
                                </p>
                            </div>
                        </div>

                        <!-- Reviews Tab -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="product-reviews">
                                <div class="reviews-summary">
                                    <div class="overall-rating">
                                        <div class="rating-number">4.5</div>
                                        <div class="rating-stars">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                        </div>
                                        <div class="rating-count">Based on 42 reviews</div>
                                    </div>

                                    <div class="rating-breakdown">
                                        <div class="rating-bar">
                                            <div class="rating-label">5 stars</div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 65%;"
                                                    aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="rating-count">27</div>
                                        </div>
                                        <div class="rating-bar">
                                            <div class="rating-label">4 stars</div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="rating-count">10</div>
                                        </div>
                                        <div class="rating-bar">
                                            <div class="rating-label">3 stars</div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 8%;"
                                                    aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="rating-count">3</div>
                                        </div>
                                        <div class="rating-bar">
                                            <div class="rating-label">2 stars</div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 2%;"
                                                    aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="rating-count">1</div>
                                        </div>
                                        <div class="rating-bar">
                                            <div class="rating-label">1 star</div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 2%;"
                                                    aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="rating-count">1</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="review-form-container">
                                    <h4>Tulis Review</h4>
                                    <form class="review-form">
                                        <div class="rating-select mb-4">
                                            <label class="form-label">Beri Rating</label>
                                            <div class="star-rating">
                                                <input type="radio" id="star5" name="rating" value="5"><label
                                                    for="star5" title="5 stars"><i class="bi bi-star-fill"></i></label>
                                                <input type="radio" id="star4" name="rating" value="4"><label
                                                    for="star4" title="4 stars"><i class="bi bi-star-fill"></i></label>
                                                <input type="radio" id="star3" name="rating" value="3"><label
                                                    for="star3" title="3 stars"><i class="bi bi-star-fill"></i></label>
                                                <input type="radio" id="star2" name="rating" value="2"><label
                                                    for="star2" title="2 stars"><i class="bi bi-star-fill"></i></label>
                                                <input type="radio" id="star1" name="rating" value="1"><label
                                                    for="star1" title="1 star"><i class="bi bi-star-fill"></i></label>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="review-title" class="form-label">Judul Ulasan</label>
                                            <input type="text" class="form-control" id="review-title" required="">
                                        </div>

                                        <div class="mb-4">
                                            <label for="review-content" class="form-label">Ulasan Kamu</label>
                                            <textarea class="form-control" id="review-content" rows="4"
                                                required=""></textarea>
                                            <div class="form-text">Beri tahu orang lain pendapatmu tentang produk ini.
                                                Jujurlah dan berikan ulasan yang bermanfaat!</div>
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="reviews-list mt-5">
                                    <h4>Ulasan Pembeli</h4>

                                    <!-- Review Item -->
                                    <div class="review-item">
                                        <div class="review-header">
                                            <div class="reviewer-info">
                                                <img src="assets/img/person/person-m-1.webp" alt="Reviewer"
                                                    class="reviewer-avatar">
                                                <div>
                                                    <h5 class="reviewer-name">John Doe</h5>
                                                    <div class="review-date">03/15/2024</div>
                                                </div>
                                            </div>
                                            <div class="review-rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                        <h5 class="review-title">Exceptional sound quality and comfort</h5>
                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at
                                                lacus congue, suscipit elit nec, tincidunt orci. Phasellus egestas nisi
                                                vitae lectus imperdiet venenatis. Suspendisse vulputate quam diam, et
                                                consectetur augue condimentum in.</p>
                                        </div>
                                    </div><!-- End Review Item -->

                                    <!-- Review Item -->
                                    <div class="review-item">
                                        <div class="review-header">
                                            <div class="reviewer-info">
                                                <img src="assets/img/person/person-f-2.webp" alt="Reviewer"
                                                    class="reviewer-avatar">
                                                <div>
                                                    <h5 class="reviewer-name">Jane Smith</h5>
                                                    <div class="review-date">02/28/2024</div>
                                                </div>
                                            </div>
                                            <div class="review-rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                            </div>
                                        </div>
                                        <h5 class="review-title">Great headphones, battery could be better</h5>
                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at
                                                lacus congue, suscipit elit nec, tincidunt orci. Phasellus egestas nisi
                                                vitae lectus imperdiet venenatis.</p>
                                        </div>
                                    </div><!-- End Review Item -->

                                    <!-- Review Item -->
                                    <div class="review-item">
                                        <div class="review-header">
                                            <div class="reviewer-info">
                                                <img src="assets/img/person/person-m-3.webp" alt="Reviewer"
                                                    class="reviewer-avatar">
                                                <div>
                                                    <h5 class="reviewer-name">Michael Johnson</h5>
                                                    <div class="review-date">02/15/2024</div>
                                                </div>
                                            </div>
                                            <div class="review-rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                            </div>
                                        </div>
                                        <h5 class="review-title">Impressive noise cancellation</h5>
                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at
                                                lacus congue, suscipit elit nec, tincidunt orci. Phasellus egestas nisi
                                                vitae lectus imperdiet venenatis. Suspendisse vulputate quam diam.</p>
                                        </div>
                                    </div><!-- End Review Item -->

                                    <div class="text-center mt-4">
                                        <button class="btn btn-outline-primary load-more-btn">Ulasan lainnya</button>
                                    </div>
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

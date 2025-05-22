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
                    <a href="/" class="logo d-flex align-items-center">
                        <!-- Uncomment the line below if you also wish to use an image logo -->
                        <!-- <img src="assets/img/logo.webp" alt=""> -->
                        <h1 class="sitename">RasaTangkit</h1>
                    </a>

                    <!-- Search -->
                    <form class="search-form desktop-search-form">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for products">
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
                            <li><a href="about.html">Tentang</a></li>
                            <li><a href="about.html">Produk</a></li>
                            <li><a href="category.html">Category</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="contact.html">Contact</a></li>
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
                <div class="row align-items-center">
                    <div class="col-lg-6 content-col" data-aos="fade-right" data-aos-delay="100">
                        <div class="content">
                            <!-- <span class="promo-badge">New Collection 2025</span> -->
                            <h1><span>RasaTangkit:</span> Produk Berkelas dari Nanas Tangkit</h1>
                            <p>Temukan beragam olahan nanas khas Tangkit — nikmat, alami, dan penuh kebaikan rasa lokal.
                            </p>
                            <div class="hero-cta">
                                <a href="#" class="btn btn-shop">Beli Sekarang <i class="bi bi-arrow-right"></i></a>
                                <a href="#" class="btn btn-collection">Lihat Semua Produk</a>
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
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "autoplay": {
                                "delay": 5000,
                                "disableOnInteraction": false
                            },
                            "grabCursor": true,
                            "speed": 600,
                            "slidesPerView": "auto",
                            "spaceBetween": 20,
                            "navigation": {
                                "nextEl": ".swiper-button-next",
                                "prevEl": ".swiper-button-prev"
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 2,
                                    "spaceBetween": 15
                                },
                                "576": {
                                    "slidesPerView": 3,
                                    "spaceBetween": 15
                                },
                                "768": {
                                    "slidesPerView": 4,
                                    "spaceBetween": 20
                                },
                                "992": {
                                    "slidesPerView": 5,
                                    "spaceBetween": 20
                                },
                                "1200": {
                                    "slidesPerView": 6,
                                    "spaceBetween": 20
                                }
                            }
                        }

                    </script>

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
                                <!-- Product 1 -->
                                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <img src="assets/img/product/product-1.webp" class="img-fluid default-image"
                                                alt="Product" loading="lazy">
                                            <img src="assets/img/product/product-1-variant.webp"
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
                                            <h3 class="product-title"><a href="product-details.html">Lorem ipsum dolor
                                                    sit
                                                    amet</a></h3>
                                            <div class="product-price">
                                                <span class="current-price">$89.99</span>
                                            </div>
                                            <div class="product-rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                                <span class="rating-count">(42)</span>
                                            </div>
                                            <button class="btn btn-add-to-cart">
                                                <i class="bi bi-bag-plus me-2"></i>Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div><!-- End Product 1 -->

                                <!-- Product 2 -->
                                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <img src="assets/img/product/product-4.webp" class="img-fluid default-image"
                                                alt="Product" loading="lazy">
                                            <img src="assets/img/product/product-4-variant.webp"
                                                class="img-fluid hover-image" alt="Product hover" loading="lazy">
                                            <div class="product-tags">
                                                <span class="badge bg-sale">Sale</span>
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
                                            <h3 class="product-title"><a href="product-details.html">Consectetur
                                                    adipiscing
                                                    elit</a></h3>
                                            <div class="product-price">
                                                <span class="current-price">$64.99</span>
                                                <span class="original-price">$79.99</span>
                                            </div>
                                            <div class="product-rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <span class="rating-count">(28)</span>
                                            </div>
                                            <button class="btn btn-add-to-cart">
                                                <i class="bi bi-bag-plus me-2"></i>Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div><!-- End Product 2 -->

                                <!-- Product 3 -->
                                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <img src="assets/img/product/product-7.webp" class="img-fluid default-image"
                                                alt="Product" loading="lazy">
                                            <img src="assets/img/product/product-7-variant.webp"
                                                class="img-fluid hover-image" alt="Product hover" loading="lazy">
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
                                            <h3 class="product-title"><a href="product-details.html">Sed do eiusmod
                                                    tempor
                                                    incididunt</a></h3>
                                            <div class="product-price">
                                                <span class="current-price">$119.00</span>
                                            </div>
                                            <div class="product-rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <span class="rating-count">(56)</span>
                                            </div>
                                            <button class="btn btn-add-to-cart">
                                                <i class="bi bi-bag-plus me-2"></i>Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div><!-- End Product 3 -->

                                <!-- Product 4 -->
                                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="250">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <img src="assets/img/product/product-12.webp"
                                                class="img-fluid default-image" alt="Product" loading="lazy">
                                            <img src="assets/img/product/product-12-variant.webp"
                                                class="img-fluid hover-image" alt="Product hover" loading="lazy">
                                            <div class="product-tags">
                                                <span class="badge bg-sold-out">Sold Out</span>
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
                                            <h3 class="product-title"><a href="product-details.html">Ut labore et dolore
                                                    magna
                                                    aliqua</a></h3>
                                            <div class="product-price">
                                                <span class="current-price">$75.50</span>
                                            </div>
                                            <div class="product-rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-star"></i>
                                                <span class="rating-count">(15)</span>
                                            </div>
                                            <button class="btn btn-add-to-cart btn-disabled" disabled="">
                                                <i class="bi bi-bag-plus me-2"></i>Sold Out
                                            </button>
                                        </div>
                                    </div>
                                </div><!-- End Product 4 -->
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
                                            <li class="filter-active" data-filter="*">All</li>
                                            <li data-filter=".filter-clothing">Clothing</li>
                                            <li data-filter=".filter-accessories">Accessories</li>
                                            <li data-filter=".filter-electronics">Electronics</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row product-container isotope-container" data-aos="fade-up"
                                data-aos-delay="200">

                                <!-- Product Item 1 -->
                                <div class="col-md-6 col-lg-3 product-item isotope-item filter-clothing">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <span class="badge">Sale</span>
                                            <img src="assets/img/product/product-11.webp" alt="Product"
                                                class="img-fluid main-img">
                                            <img src="assets/img/product/product-11-variant.webp" alt="Product Hover"
                                                class="img-fluid hover-img">
                                            <div class="product-overlay">
                                                <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add
                                                    to
                                                    Cart</a>
                                                <div class="product-actions">
                                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                                    <a href="#" class="action-btn"><i
                                                            class="bi bi-arrow-left-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-title"><a href="product-details.html">Lorem ipsum dolor
                                                    sit
                                                    amet</a></h5>
                                            <div class="product-price">
                                                <span class="current-price">$89.99</span>
                                                <span class="old-price">$129.99</span>
                                            </div>
                                            <div class="product-rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                                <span>(24)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Product Item -->

                                <!-- Product Item 2 -->
                                <div class="col-md-6 col-lg-3 product-item isotope-item filter-electronics">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <img src="assets/img/product/product-9.webp" alt="Product"
                                                class="img-fluid main-img">
                                            <img src="assets/img/product/product-9-variant.webp" alt="Product Hover"
                                                class="img-fluid hover-img">
                                            <div class="product-overlay">
                                                <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add
                                                    to
                                                    Cart</a>
                                                <div class="product-actions">
                                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                                    <a href="#" class="action-btn"><i
                                                            class="bi bi-arrow-left-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-title"><a href="product-details.html">Consectetur
                                                    adipiscing
                                                    elit</a></h5>
                                            <div class="product-price">
                                                <span class="current-price">$249.99</span>
                                            </div>
                                            <div class="product-rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <span>(18)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Product Item -->

                                <!-- Product Item 3 -->
                                <div class="col-md-6 col-lg-3 product-item isotope-item filter-accessories">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <span class="badge">New</span>
                                            <img src="assets/img/product/product-3.webp" alt="Product"
                                                class="img-fluid main-img">
                                            <img src="assets/img/product/product-3-variant.webp" alt="Product Hover"
                                                class="img-fluid hover-img">
                                            <div class="product-overlay">
                                                <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add
                                                    to
                                                    Cart</a>
                                                <div class="product-actions">
                                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                                    <a href="#" class="action-btn"><i
                                                            class="bi bi-arrow-left-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-title"><a href="product-details.html">Sed do eiusmod
                                                    tempor</a>
                                            </h5>
                                            <div class="product-price">
                                                <span class="current-price">$59.99</span>
                                            </div>
                                            <div class="product-rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-star"></i>
                                                <span>(7)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Product Item -->

                                <!-- Product Item 4 -->
                                <div class="col-md-6 col-lg-3 product-item isotope-item filter-clothing">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <img src="assets/img/product/product-4.webp" alt="Product"
                                                class="img-fluid main-img">
                                            <img src="assets/img/product/product-4-variant.webp" alt="Product Hover"
                                                class="img-fluid hover-img">
                                            <div class="product-overlay">
                                                <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add
                                                    to
                                                    Cart</a>
                                                <div class="product-actions">
                                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                                    <a href="#" class="action-btn"><i
                                                            class="bi bi-arrow-left-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-title"><a href="product-details.html">Incididunt ut
                                                    labore et
                                                    dolore</a></h5>
                                            <div class="product-price">
                                                <span class="current-price">$79.99</span>
                                                <span class="old-price">$99.99</span>
                                            </div>
                                            <div class="product-rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <span>(32)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Product Item -->

                                <!-- Product Item 5 -->
                                <div class="col-md-6 col-lg-3 product-item isotope-item filter-electronics">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <span class="badge">Sale</span>
                                            <img src="assets/img/product/product-5.webp" alt="Product"
                                                class="img-fluid main-img">
                                            <img src="assets/img/product/product-5-variant.webp" alt="Product Hover"
                                                class="img-fluid hover-img">
                                            <div class="product-overlay">
                                                <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add
                                                    to
                                                    Cart</a>
                                                <div class="product-actions">
                                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                                    <a href="#" class="action-btn"><i
                                                            class="bi bi-arrow-left-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-title"><a href="product-details.html">Magna aliqua ut
                                                    enim ad
                                                    minim</a></h5>
                                            <div class="product-price">
                                                <span class="current-price">$199.99</span>
                                                <span class="old-price">$249.99</span>
                                            </div>
                                            <div class="product-rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                                <i class="bi bi-star"></i>
                                                <span>(15)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Product Item -->

                                <!-- Product Item 6 -->
                                <div class="col-md-6 col-lg-3 product-item isotope-item filter-accessories">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <img src="assets/img/product/product-6.webp" alt="Product"
                                                class="img-fluid main-img">
                                            <img src="assets/img/product/product-6-variant.webp" alt="Product Hover"
                                                class="img-fluid hover-img">
                                            <div class="product-overlay">
                                                <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add
                                                    to
                                                    Cart</a>
                                                <div class="product-actions">
                                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                                    <a href="#" class="action-btn"><i
                                                            class="bi bi-arrow-left-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-title"><a href="product-details.html">Veniam quis nostrud
                                                    exercitation</a></h5>
                                            <div class="product-price">
                                                <span class="current-price">$45.99</span>
                                            </div>
                                            <div class="product-rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <span>(21)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Product Item -->

                                <!-- Product Item 7 -->
                                <div class="col-md-6 col-lg-3 product-item isotope-item filter-clothing">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <span class="badge">New</span>
                                            <img src="assets/img/product/product-7.webp" alt="Product"
                                                class="img-fluid main-img">
                                            <img src="assets/img/product/product-7-variant.webp" alt="Product Hover"
                                                class="img-fluid hover-img">
                                            <div class="product-overlay">
                                                <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add
                                                    to
                                                    Cart</a>
                                                <div class="product-actions">
                                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                                    <a href="#" class="action-btn"><i
                                                            class="bi bi-arrow-left-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-title"><a href="product-details.html">Ullamco laboris
                                                    nisi ut
                                                    aliquip</a></h5>
                                            <div class="product-price">
                                                <span class="current-price">$69.99</span>
                                            </div>
                                            <div class="product-rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                                <i class="bi bi-star"></i>
                                                <span>(11)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Product Item -->

                                <!-- Product Item 8 -->
                                <div class="col-md-6 col-lg-3 product-item isotope-item filter-electronics">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <img src="assets/img/product/product-8.webp" alt="Product"
                                                class="img-fluid main-img">
                                            <img src="assets/img/product/product-8-variant.webp" alt="Product Hover"
                                                class="img-fluid hover-img">
                                            <div class="product-overlay">
                                                <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add
                                                    to
                                                    Cart</a>
                                                <div class="product-actions">
                                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                                    <a href="#" class="action-btn"><i
                                                            class="bi bi-arrow-left-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-title"><a href="product-details.html">Ex ea commodo
                                                    consequat</a>
                                            </h5>
                                            <div class="product-price">
                                                <span class="current-price">$159.99</span>
                                            </div>
                                            <div class="product-rating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <span>(29)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Product Item -->

                            </div>

                            <div class="text-center mt-5" data-aos="fade-up">
                                <a href="#" class="view-all-btn">View All Products <i class="bi bi-arrow-right"></i></a>
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
                                <li><a href="produk.html">Semua Produk</a></li>
                                <li><a href="produk.html#keripik">Keripik Nanas</a></li>
                                <li><a href="produk.html#dodol">Dodol Nanas</a></li>
                                <li><a href="produk.html#selai">Selai Nanas</a></li>
                                <li><a href="produk.html#minuman">Minuman Nanas</a></li>
                                <li><a href="promo.html">Promo Spesial</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Bantuan -->
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h4>Bantuan</h4>
                            <ul class="footer-links">
                                <li><a href="bantuan.html">Pusat Bantuan</a></li>
                                <li><a href="pesanan.html">Status Pesanan</a></li>
                                <li><a href="pengiriman.html">Info Pengiriman</a></li>
                                <li><a href="pengembalian.html">Pengembalian Barang</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="kontak.html">Hubungi Kami</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Tentang Kami -->
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h4>Perusahaan</h4>
                            <ul class="footer-links">
                                <li><a href="tentang.html">Tentang Kami</a></li>
                                <li><a href="mitra.html">Mitra & Distribusi</a></li>
                                <li><a href="berita.html">Berita & Media</a></li>
                                <li><a href="csr.html">Tanggung Jawab Sosial</a></li>
                                <li><a href="karir.html">Karir</a></li>
                                <li><a href="kontak.html">Kontak</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Aplikasi & Sosial Media -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h4>Unduh Aplikasi Kami</h4>
                            <p>Belanja olahan nanas lebih mudah lewat aplikasi</p>
                            <div class="app-buttons">
                                <a href="#" class="app-btn">
                                    <i class="bi bi-apple"></i>
                                    <span>App Store</span>
                                </a>
                                <a href="#" class="app-btn">
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

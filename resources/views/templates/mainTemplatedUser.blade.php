<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title')</title>
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
                    <a href="/home" class="d-flex align-items-center">
                        <!-- Uncomment the line below if you also wish to use an image logo -->
                        <!-- <img src="assets/img/logo.webp" alt=""> -->
                        <h1 class="sitename"><img src="{{ asset('assets-user/img/logo_navbar.png') }}" alt="" style="height: 50px; width: auto;"></h1>
                    </a>

                    <!-- Search -->
                    <form class="search-form desktop-search-form">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Produk Anda">
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

                        <!-- Account -->
                        <div class="dropdown account-dropdown">
                            <button class="header-action-btn" data-bs-toggle="dropdown">
                                <i class="bi bi-person"></i>
                            </button>
                            <div class="dropdown-menu">
                                <div class="dropdown-header">
                                    <h6>Selamat Datang di <span class="sitename">Rasa Tangkit</span></h6>
                                    <p class="mb-0">Akses Akun &amp; Atur Pesanan</p>
                                </div>
                                <div class="dropdown-body">
                                    <a class="dropdown-item d-flex align-items-center" href="/account">
                                        <i class="bi bi-person-circle me-2"></i>
                                        <span>Profil Saya</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="/account">
                                        <i class="bi bi-bag-check me-2"></i>
                                        <span>Pesanan Saya</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="/account">
                                        <i class="bi bi-heart me-2"></i>
                                        <span>List Harapan Saya</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="/account">
                                        <i class="bi bi-gear me-2"></i>
                                        <span>Pengaturan</span>
                                    </a>
                                </div>
                                <div class="dropdown-footer">
                                    <a href="/logout" class="btn btn-primary w-100 mb-2">Keluar</a>
                                </div>
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <a href="/account" class="header-action-btn d-none d-md-block">
                            <i class="bi bi-heart"></i>
                            <span class="badge">0</span>
                        </a>

                        <!-- Cart -->
                        <a href="cart.html" class="header-action-btn">
                            <i class="bi bi-cart3"></i>
                            <span class="badge">3</span>
                        </a>

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
                            <li><a href="/home" class="{{ request()->is('home') ? 'active' : '' }}">Beranda</a></li>
                            <li><a href="/tentang" class="{{ request()->is('tentang') ? 'active' : '' }}">Tentang</a></li>
                            <li><a href="/produk" class="{{ request()->is('produk*') ? 'active' : '' }}">Produk</a></li>
                            <li><a href="/keranjang" class="{{ request()->is('keranjang') ? 'active' : '' }}">Keranjang</a></li>
                            <li><a href="/beli" class="{{ request()->is('beli*') ? 'active' : '' }}">Beli</a></li>
                            <li><a href="/kontak" class="{{ request()->is('kontak') ? 'active' : '' }}">Kontak</a></li>

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
        @yield('konten')
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

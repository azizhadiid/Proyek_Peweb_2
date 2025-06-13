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

        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Tentang</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Beranda</a></li>
                        <li class="current">Tentang</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- About 2 Section -->
        <section id="about-2" class="about-2 section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <!--<span class="section-badge"><i class="bi bi-info-circle"></i> Tentang Kami</span>-->
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="about-title">Tentang Kami</h2>
                        <p class="about-description">Rasa Tangkit adalah platform digital yang menghubungkan penjual dan
                            pembeli
                            nanas berkualitas dari Tangkit, Jambi. Berdiri sejak tahun 2025, kami hadir untuk
                            mempermudah
                            distribusi nanas lokal yang segar, manis, dan berkualitas unggul.</p>
                    </div>
                    <div class="col-lg-6">
                        <p class="about-text">Kami percaya bahwa produk lokal punya potensi besar. Dengan teknologi yang
                            sederhana namun efektif, Rasa Tangkit membantu petani memasarkan hasil panen secara langsung
                            kepada
                            pembeli — tanpa perantara.</p>
                        <p class="about-text">Kami juga berkomitmen untuk menjaga transparansi dan kepercayaan dalam
                            setiap
                            transaksi. Melalui sistem yang mudah digunakan, kami ingin menciptakan pengalaman jual beli
                            nanas
                            yang praktis, aman, dan saling menguntungkan bagi semua pihak.</p>
                    </div>
                </div>

                <div class="row features-boxes gy-4 mt-3">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-box">
                            <div class="icon-box">
                                <i class="bi bi-bullseye"></i>
                            </div>
                            <h3><a href="#" class="stretched-link"> Misi Kami</a></h3>
                            <p>➤ Mempermudah akses nanas Tangkit bagi seluruh Indonesia.</p>
                            <p>➤ Meningkatkan kesejahteraan petani lokal lewat penjualan digital.</p>
                            <p>➤ Menjaga kualitas dan kesegaran nanas dari kebun ke pembeli.</p>
                        </div>
                    </div>

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-box">
                            <div class="icon-box">
                                <i class="bi bi-person-check"></i>
                            </div>
                            <h3><a href="#" class="stretched-link">Untuk Siapa Website Ini?</a></h3>
                            <p>➤ Petani & Penjual nanas Tangkit yang ingin menjangkau pasar lebih luas.</p>
                            <p>➤ Pembeli & Distributor yang mencari nanas segar dan terpercaya langsung dari sumbernya.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="feature-box">
                            <div class="icon-box">
                                <i class="bi bi-clipboard-data"></i>
                            </div>
                            <h3><a href="#" class="stretched-link">Apa yang Kami Tawarkan.</a></h3>
                            <p>➤ Sistem pemesanan nanas online.</p>
                            <p>➤ Informasi lengkap tentang produk dan petani.</p>
                            <p>➤ Pengiriman cepat dan aman ke seluruh wilayah.</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-12" data-aos="zoom-in" data-aos-delay="200">
                        <div class="video-box">
                            <img src="{{ asset('assets-user/img/about/profil nanas.png') }}" class="img-fluid"
                                alt="Video Thumbnail">
                            <a href="https://youtu.be/cHU_8Bhif-0?si=hqEl87tVkd7r7jKJ"
                                class="glightbox pulsating-play-btn"></a>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About 2 Section -->

        <!-- Stats Section -->
        <!--<section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="avatars d-flex align-items-center">
              <img src="assets/img/person/person-m-2.webp" alt="Avatar 1" class="rounded-circle" loading="lazy">
              <img src="assets/img/person/person-m-3.webp" alt="Avatar 2" class="rounded-circle" loading="lazy">
              <img src="assets/img/person/person-f-5.webp" alt="Avatar 3" class="rounded-circle" loading="lazy">
              <img src="assets/img/person/person-m-5.webp" alt="Avatar 4" class="rounded-circle" loading="lazy">
            </div>
          </div>

          <div class="col-lg-8">
            <div class="row counters">
              <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <h2><span data-purecounter-start="0" data-purecounter-end="185" data-purecounter-duration="1" class="purecounter"></span>+</h2>
                <p>Nemo enim ipsam</p>
              </div>

              <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                <h2><span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>K</h2>
                <p>Voluptatem sequi</p>
              </div>

              <div class="col-md-4" data-aos="fade-up" data-aos-delay="500">
                <h2><span data-purecounter-start="0" data-purecounter-end="128" data-purecounter-duration="1" class="purecounter"></span>+</h2>
                <p>Dolor sit consectetur</p>
              </div>
            </div>
          </div>
        </div>
      </div>-->

        </section><!-- /Stats Section -->

        <!-- Testimonials Section -->
        <!--<section id="testimonials" class="testimonials section">-->

        <div class="container">

            <div class="testimonial-masonry">

                <!--<div class="testimonial-item" data-aos="fade-up">
            <div class="testimonial-content">
              <div class="quote-pattern">
                <i class="bi bi-quote"></i>
              </div>
              <p>Implementing innovative strategies has revolutionized our approach to market challenges and competitive positioning.</p>
              <div class="client-info">
                <div class="client-image">
                  <img src="assets/img/person/person-f-7.webp" alt="Client">
                </div>
                <div class="client-details">
                  <h3>Rachel Bennett</h3>
                  <span class="position">Strategy Director</span>
                </div>
              </div>
            </div>
          </div>-->

                <!--<div class="testimonial-item highlight" data-aos="fade-up" data-aos-delay="100">
            <div class="testimonial-content">
              <div class="quote-pattern">
                <i class="bi bi-quote"></i>
              </div>
              <p>Exceptional service delivery and innovative solutions have transformed our business operations, leading to remarkable growth and enhanced customer satisfaction across all touchpoints.</p>
              <div class="client-info">
                <div class="client-image">
                  <img src="assets/img/person/person-m-7.webp" alt="Client">
                </div>
                <div class="client-details">
                  <h3>Daniel Morgan</h3>
                  <span class="position">Chief Innovation Officer</span>
                </div>
              </div>
            </div>
          </div>-->

                <!--<div class="testimonial-item" data-aos="fade-up" data-aos-delay="200">
            <div class="testimonial-content">
              <div class="quote-pattern">
                <i class="bi bi-quote"></i>
              </div>
              <p>Strategic partnership has enabled seamless digital transformation and operational excellence.</p>
              <div class="client-info">
                <div class="client-image">
                  <img src="assets/img/person/person-f-8.webp" alt="Client">
                </div>
                <div class="client-details">
                  <h3>Emma Thompson</h3>
                  <span class="position">Digital Lead</span>
                </div>
              </div>
            </div>
          </div>-->

                <!--<div class="testimonial-item" data-aos="fade-up" data-aos-delay="300">
            <div class="testimonial-content">
              <div class="quote-pattern">
                <i class="bi bi-quote"></i>
              </div>
              <p>Professional expertise and dedication have significantly improved our project delivery timelines and quality metrics.</p>
              <div class="client-info">
                <div class="client-image">
                  <img src="assets/img/person/person-m-8.webp" alt="Client">
                </div>
                <div class="client-details">
                  <h3>Christopher Lee</h3>
                  <span class="position">Technical Director</span>
                </div>
              </div>
            </div>
          </div>-->

                <!--<div class="testimonial-item highlight" data-aos="fade-up" data-aos-delay="400">
            <div class="testimonial-content">
              <div class="quote-pattern">
                <i class="bi bi-quote"></i>
              </div>
              <p>Collaborative approach and industry expertise have revolutionized our product development cycle, resulting in faster time-to-market and increased customer engagement levels.</p>
              <div class="client-info">
                <div class="client-image">
                  <img src="assets/img/person/person-f-9.webp" alt="Client">
                </div>
                <div class="client-details">
                  <h3>Olivia Carter</h3>
                  <span class="position">Product Manager</span>
                </div>
              </div>
            </div>
          </div>-->

                <!--<div class="testimonial-item highlight" data-aos="fade-up" data-aos-delay="500">
            <div class="testimonial-content">
              <div class="quote-pattern">
                <i class="bi bi-quote"></i>
              </div>
              <p>Innovative approach to user experience design has significantly enhanced our platform's engagement metrics and customer retention rates.</p>
              <div class="client-info">
                <div class="client-image">
                  <img src="assets/img/person/person-m-13.webp" alt="Client">
                </div>
                <div class="client-details">
                  <h3>Nathan Brooks</h3>
                  <span class="position">UX Director</span>
                </div>
              </div>
            </div>
          </div>

        </div>-->

            </div>

            </section><!-- /Testimonials Section -->
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

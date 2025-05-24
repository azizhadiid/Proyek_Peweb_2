@extends('templates.mainTemplatedUser')

@section('title', 'Tentang Kami')

@section('konten')
<!-- Page Title
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Tentang</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Beranda</a></li>
            <li class="current">Tentang</li>
          </ol>
        </nav>
      </div>
    </div> End Page Title -->

<!-- About 2 Section -->
<section id="about-2" class="about-2 section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!--<span class="section-badge"><i class="bi bi-info-circle"></i> Tentang Kami</span>-->
        <div class="row">
            <div class="col-lg-6">
                <h2 class="about-title">Tentang Kami</h2>
                <p class="about-description">Rasa Tangkit adalah platform digital yang menghubungkan penjual dan pembeli
                    nanas berkualitas dari Tangkit, Jambi. Berdiri sejak tahun 2025, kami hadir untuk mempermudah
                    distribusi nanas lokal yang segar, manis, dan berkualitas unggul.</p>
            </div>
            <div class="col-lg-6">
                <p class="about-text">Kami percaya bahwa produk lokal punya potensi besar. Dengan teknologi yang
                    sederhana namun efektif, Rasa Tangkit membantu petani memasarkan hasil panen secara langsung kepada
                    pembeli — tanpa perantara.</p>
                <p class="about-text">Kami juga berkomitmen untuk menjaga transparansi dan kepercayaan dalam setiap
                    transaksi. Melalui sistem yang mudah digunakan, kami ingin menciptakan pengalaman jual beli nanas
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
                    <p>➤ Pembeli & Distributor yang mencari nanas segar dan terpercaya langsung dari sumbernya.</p>
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
                    <img src="{{ asset('assets-user/img/about/profil nanas.png') }}" class="img-fluid" alt="Video Thumbnail">
                    <a href="https://youtu.be/cHU_8Bhif-0?si=hqEl87tVkd7r7jKJ" class="glightbox pulsating-play-btn"></a>
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
@endsection

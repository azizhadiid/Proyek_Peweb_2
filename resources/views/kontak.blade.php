@extends('templates.mainTemplatedUser')

@section('title', 'Kontak')

@section('konten')
<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Kontak</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="/home">Beranda</a></li>
                <li class="current">Kontak</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Contact 2 Section -->
<section id="contact-2" class="contact-2 section">

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

        <div class="row gy-4">

            <div class="col-lg-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
                    data-aos-delay="200">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Alamat</h3>
                    <p>Jalan Nanas No. 5, Tangkit, Muaro Jambi, Jambi</p>
                </div>
            </div><!-- End Info Item -->

            <div class="col-lg-3 col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
                    data-aos-delay="300">
                    <i class="bi bi-telephone"></i>
                    <h3>Hubngin Kami</h3>
                    <p>+62 812-3456-7890</p>
                </div>
            </div><!-- End Info Item -->

            <div class="col-lg-3 col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
                    data-aos-delay="400">
                    <i class="bi bi-envelope"></i>
                    <h3>Email Kami</h3>
                    <p>info@rasatangkit.id</p>
                </div>
            </div><!-- End Info Item -->

        </div>

        <div class="row gy-4 mt-1">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63811.5974683571!2d103.59379586782761!3d-1.6193795075736288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e258f5ba7a2cfc3%3A0xdeb33429de5c8bff!2sAgrowisata%20Nanas%20Tangkit!5e0!3m2!1sid!2sid!4v1749135730833!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div><!-- End Google Maps -->

            <div class="col-lg-6">
                <form action="{{ route('kontak.kirim') }}" method="post" class="" data-aos="fade-up"
                    data-aos-delay="400">
                    @csrf
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" value="{{ $user->nama }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subyek" required>
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="Pesan"
                                required></textarea>
                        </div>


                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn" style="background-color: #eda96d; color: aliceblue">Kirim
                                Pesan</button>
                        </div>

                    </div>
                </form>
            </div><!-- End Contact Form -->

        </div>

    </div>

</section><!-- /Contact 2 Section -->
@endsection

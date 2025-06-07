<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login RasaTangkit</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{asset('assets-user/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets-user/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

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
</head>

<body class="login-register-page">

    <main class="main">
        <!-- Login Register Section -->
        <section id="login-register" class="login-register section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="container min-vh-100 d-flex align-items-center justify-content-center">
                    <div class="col-lg-5">
                        <div class="login-register-wraper">

                            <!-- Logo -->
                            <div class="text-center mb-4">
                                <img src="{{ asset('assets-user/img/logo_rasa_tangkit.png') }}" alt="Logo"
                                    style="max-width: 150px;">
                            </div>

                            <div class="row g-4">
                                {{-- Jika Ada Error --}}
                                @if ($errors->any())
                                <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert"
                                    style="width: 100%">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-exclamation-circle-fill me-2"></i>
                                        <div>
                                            @foreach ($errors->all() as $error)
                                            <p class="m-0">{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif

                                {{-- Jika Sukses Login --}}
                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert"
                                    style="width: 100%">
                                    <i class="bi bi-check-circle-fill me-2"></i>
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif

                                {{-- Jika Password Telah Diubah --}}
                                @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert"
                                    style="width: 100%">
                                    <i class="bi bi-check-circle-fill me-2"></i>
                                    {{ session('status') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif
                            </div>

                            <!-- Tab Navigation -->
                            <ul class="nav nav-tabs nav-tabs-bordered justify-content-center mb-4 mt-5" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" href="/login">
                                        <i class="bi bi-box-arrow-in-right me-1"></i>Login
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" href="/register">
                                        <i class="bi bi-person-plus me-1"></i>Register
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab Content -->
                            <div class="tab-content">

                                <!-- Login Form -->
                                <div class="tab-pane fade show active" id="login-register-login-form" role="tabpanel">
                                    <form method="POST" action="/login" class="mt-5">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="login-register-login-email" class="form-label">Alamat
                                                Email</label>
                                            <input type="email" class="form-control" id="login-register-login-email"
                                                name="email" value="" required autofocus>
                                        </div>

                                        <div class="mb-4">
                                            <label for="login-register-login-password"
                                                class="form-label">Password</label>
                                            <input type="password" class="form-control"
                                                id="login-register-login-password" name="password" required>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <a href="/forgot" class="forgot-password">Lupa Password?</a>
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary btn-lg">Login</button>
                                        </div>
                                    </form>

                                    <div class="d-flex justify-content-center mt-5">
                                        <div class="d-flex justify-content-center align-items-center mb-4">
                                            <span style="margin-right: 5px">Belum Punya Akun?</span> <a href="/register" class="forgot-password">Klik Disini!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </section><!-- /Login Register Section -->

    </main>

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

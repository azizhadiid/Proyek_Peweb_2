<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Lupa Password Rasa Tangkit</title>
    <link href="{{ asset('assets-user/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets-user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-user/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-user/css/main.css') }}" rel="stylesheet">
</head>

<body class="login-register-page">

    <main class="main">
        <section id="forgot-password" class="login-register section">
            <div class="container min-vh-100 d-flex align-items-center justify-content-center">
                <div class="col-lg-5">
                    <div class="login-register-wraper">
                        <!-- Logo -->
                        <div class="text-center mb-4">
                            <img src="{{ asset('assets-user/img/logo_rasa_tangkit.png') }}" alt="Logo"
                                style="max-width: 150px;">
                        </div>

                        {{-- Pesan Error --}}
                        <div class="row g-4">
                            {{-- Jika Ada Error --}}
                            @if (session('error'))
                            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert"
                                style="width: 100%">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                                    <div>
                                        <p class="m-0">{{ session('error') }}</p>
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
                            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert"
                                style="width: 100%">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif

                            {{-- Jika Password Telah Diubah --}}
                            @if (session('info'))
                            <div class="alert alert-info alert-dismissible fade show mt-3" role="alert"
                                style="width: 100%">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                {{ session('info') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                        </div>

                        <h4 class="text-center mb-4 mt-3"><b>Lupa Password</b></h4>

                        <form method="POST" action="/forgot-password">
                            @csrf
                            <div class="mb-4">
                                <label for="forgot-email" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control" id="forgot-email"
                                    placeholder="Masukkan email anda" name="email" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Kirim Link Reset</button>
                            </div>
                        </form>

                        <div class="mt-3 text-center">
                            <a href="{{ url('login') }}">Kembali ke Login</a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="{{ asset('assets-user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-user/js/main.js') }}"></script>
</body>

</html>

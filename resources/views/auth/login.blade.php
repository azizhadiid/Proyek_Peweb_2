<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Login RasaTangkit</title>
    <link href="{{asset('assets-admin/css/styles.css')}}" rel="stylesheet" />
</head>

<body style="background-color: #FFB22C;">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="{{ asset('assets-user/images/logo.png') }}" alt="logo" width="300">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Masuk Ke Akunmu</h1>
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

                            <form method="POST" action="/login" class="needs-validation" novalidate="" autocomplete="off">
								@csrf
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">Alamat Email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="" required
                                        autofocus>
                                    <div class="invalid-feedback">
                                        Email tidak valid
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        Password dibutuhkan
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mt-4">
                                    <a href="forgot" class="float-end">
                                        Lupa Password?
                                    </a>
                                    <button type="submit" class="btn btn-primary ms-auto" href="dashboard"
                                        style="width: 40%">
                                        Masuk
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                Belum punya akun? <a href="register" class="text-dark">Buat akun</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5 text-muted">
                        Copyright &copy; 2025 &mdash; AHID Production
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/login.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="{{asset('assets-admin/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
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
                                        <form method="POST" action="{{url('/register/create')}}" class="mt-2">
                                            @csrf
                                            <div class="row gy-3 gy-md-4 overflow-hidden">
                                                <div class="col-12">
                                                    <label for="nama" class="form-label">Nama <span
                                                            class="text-danger">*</span></label>
                                                    <input type="nama" class="form-control" name="nama" id="nama"
                                                        placeholder="Jhond Doe" required>
                                                </div>
            
                                                <div class="col-12">
                                                    <label for="email" class="form-label">Email <span
                                                            class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="name@example.com" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="password" class="form-label">Password <span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" class="form-control" name="password" id="password"
                                                        value="" required placeholder="********">
                                                </div>
            
                                                <div class="col-12">
                                                    <label for="password_confirmation" class="form-label">Confirm Password <span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                                                        value="" required placeholder="********">
                                                        
                                                </div>
                                                <hr class="border-secondary-subtle">
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-primary" type="submit">Register Now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="/login">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets-admin/js/scripts.js')}}"></script>
    </body>
</html>

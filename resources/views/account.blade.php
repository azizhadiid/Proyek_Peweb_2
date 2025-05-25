@extends('templates.mainTemplatedUser')

@section('title', 'Kontak')

@section('konten')
<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Account</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="index.html">Home</a></li>
                <li class="current">Account</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Account Section -->
<section id="account" class="account section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        {{-- Error Alert --}}
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <div class="d-flex align-items-start">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                <div>
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        {{-- Success Alert --}}
        @if (session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-4 px-4 py-3 d-flex align-items-center gap-3 position-relative fade show mt-3"
            style="background-color: #e6f9ed; color: #256029;" role="alert">
            <i class="bi bi-check-circle-fill fs-4" style="color: #198754;"></i>
            <div class="flex-grow-1">
                <strong>Sukses!</strong> {{ session('success') }}
            </div>
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
        @endif

        <!-- Mobile Menu Toggle -->
        <div class="mobile-menu d-lg-none mb-4">
            <button class="mobile-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#profileMenu">
                <i class="bi bi-grid"></i>
                <span>Menu</span>
            </button>
        </div>

        <div class="row g-4">
            <!-- Profile Menu -->
            <div class="col-lg-3">
                <div class="profile-menu collapse d-lg-block" id="profileMenu">
                    <!-- User Info -->
                    <div class="user-info" data-aos="fade-right">
                        <div class="user-avatar">
                            <img src="{{ $userProfile && $userProfile->profile_picture ? asset('img/user/profile/' . $userProfile->profile_picture) : asset('img/user/profile/default.png') }}"
                                alt="Profile" loading="lazy">
                        </div>
                        <h4>{{ old('nama_panjang', $userProfile->nama_panjang ?? '') }}</h4>
                    </div>

                    <!-- Navigation Menu -->
                    <nav class="menu-nav">
                        <ul class="nav flex-column" role="tablist">
                            
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#settings">
                                    <i class="bi bi-gear"></i>
                                    <span>Pengaturan Akun</span>
                                </a>
                            </li>
                        </ul>

                        <div class="menu-footer">
                            <a href="#" class="logout-link">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Keluar</span>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-9">
                <div class="content-area">
                    <div class="tab-content">
                        <!-- Orders Tab -->
                        

                        <!-- Wishlist Tab -->
                        

                        <!-- Reviews Tab -->
                        

                        <!-- Settings Tab -->
                        <div class="tab-pane fade" id="settings">
                            <div class="section-header" data-aos="fade-up">
                                <h2>Account Settings</h2>
                            </div>

                            <div class="settings-content">
                                <!-- Personal Information -->
                                <div class="settings-section" data-aos="fade-up">
                                    <h3>Informasi Personal</h3>
                                    <form action="{{ route('contact.update') }}" method="POST"
                                        enctype="multipart/form-data" class="php-email-form settings-form">
                                        @csrf
                                        <!-- Foto Profil + Aksi -->
                                        <div class="profile-photo-wrapper text-center mb-4">
                                            <div class="profile-photo">
                                                <img src="{{ $userProfile && $userProfile->profile_picture ? asset('img/user/profile/' . $userProfile->profile_picture) : asset('img/user/profile/default.png') }}"
                                                    alt="Profile" class="profile-img" loading="lazy">
                                            </div>
                                            <div class="profile-photo-actions mt-2">
                                                <div class="btn btn-sm btn-outline-primary me-2">
                                                    <label for="fotoProfil">
                                                        <i class="bi bi-pencil-fill"></i> Edit
                                                        <input type="file" id="fotoProfil" name="foto_profil">
                                                    </label>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash-fill"></i> Hapus
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Form Input -->
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="firstName" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="firstName"
                                                    value="{{ old('nama_panjang', $userProfile->nama_panjang ?? '') }}"
                                                    placeholder="Masukkan nama lengkap" required name="nama_panjang">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="dob" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="dob" required
                                                    name="tanggal_lahir">
                                            </div>

                                            {{-- <div class="col-md-6">
                                                <label class="form-label d-block">Jenis Kelamin</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                        id="genderMale" value="Laki-laki"
                                                        {{ old('jenis_kelamin', $userProfile->jenis_kelamin ?? '') === 'Laki-laki' ? 'checked' : '' }}
                                                        required>
                                                    <label class="form-check-label" for="genderMale">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                        id="genderFemale" value="Perempuan"
                                                        {{ old('jenis_kelamin', $userProfile->jenis_kelamin ?? '') === 'Perempuan' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="genderFemale">Perempuan</label>
                                                </div>
                                            </div> --}}

                                            <div class="col-md-6">
                                                <label for="inputPhone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="inputPhone" name="noHp"
                                            value="{{ old('noHp', $userProfile->noHp ?? '') }}">
                                            </div>
                                        </div>

                                        <!-- Tombol Simpan -->
                                        <div class="form-buttons mt-4">
                                            <button type="submit" class="btn-save">Simpan Perubahan</button>
                                        </div>

                                        <!-- Feedback -->
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Your changes have been saved successfully!</div>
                                    </form>
                                </div>

                                <!-- Alamat Pengiriman -->
                                

                                <!-- Security Settings -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section><!-- /Account Section -->
@endsection

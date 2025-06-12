@extends('admin.templates.mainAdminlayout')

@section('title', 'Tambah Barang')

@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Produk Baru</h1>
    <p class="mb-4 text-muted">Silakan isi data lengkap produk olahan nanas yang akan ditambahkan ke dalam RasaTangkit.
    </p>

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

    <div class="card shadow-lg border-0 rounded-4 mb-4">
        <div class="card-header bg-primary text-white fw-semibold">Form Tambah Produk</div>
        <div class="card-body px-4 py-5">
            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk"
                            placeholder="Contoh: Selai Nanas Premium" required>
                    </div>

                    <div class="col-md-6">
                        <label for="jenis_olahan" class="form-label">Jenis Olahan</label>
                        <select class="form-select" name="jenis_olahan" required>
                            <option disabled selected>Pilih jenis olahan</option>
                            <option value="Snack">Snack</option>
                            <option value="Manisan">Manisan</option>
                            <option value="Selai">Selai</option>
                            <option value="Sambal">Sambal</option>
                            <option value="Minuman">Minuman</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                    <textarea class="form-control" name="deskripsi" rows="3"
                        placeholder="Contoh: Selai nanas dengan cita rasa manis alami dan tanpa pengawet."></textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stok" placeholder="Contoh: 100" required>
                    </div>
                    <div class="col-md-4">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" placeholder="Contoh: 15000" required>
                    </div>
                    <div class="col-md-4">
                        <label for="gambar" class="form-label">Gambar Produk</label>
                        <input type="file" class="form-control" name="gambar">
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="fas fa-save me-2"></i> Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



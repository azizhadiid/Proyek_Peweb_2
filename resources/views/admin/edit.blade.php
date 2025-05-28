@extends('admin.templates.mainAdminlayout')

@section('title', 'Edit Barang')

@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Produk</h1>

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

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-table me-1"></i> Daftar Produk</span>
            <a href="{{ route('barang.create') }}" class="btn btn-sm btn-warning text-white">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Ubah loop dari $produk menjadi $sampleProduk --}}
                    @if ($barangs->count() > 0)
                    @foreach ($barangs as $index => $barang)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $barang->nama_produk }}</td>
                        <td>{{ $barang->jenis_olahan }}</td>
                        <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                        <td>{{ $barang->stok }}</td>
                        <td>
                            <img src="{{ asset('img/barang/' . $barang->gambar) }}" width="50"
                                alt="{{ $barang->nama_produk }}">
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('barang.show', $barang->id) }}"
                                    class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST"
                                    class="form-hapus">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>Barang Tidak Ada</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{-- CDN Switch Alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const hapusForms = document.querySelectorAll(
            '.form-hapus');

        hapusForms.forEach(form => {
            form.addEventListener('submit', function (
                e) {
                e
                    .preventDefault(); // Mencegah submit langsung

                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Data barang akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result
                        .isConfirmed) {
                        form
                            .submit(); // Submit jika user klik "Ya, hapus!"
                    }
                });
            });
        });
    });

</script>
@endsection

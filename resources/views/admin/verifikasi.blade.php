@extends('admin.templates.mainAdminlayout')

@section('title', 'Verifikasi Pembayaran')

@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Verifikasi Pembayaran</h1>

    <div class="row g-4 mt-4">
        {{-- Jika Ada Error --}}
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
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="width: 100%">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        {{-- Jika Password Telah Diubah --}}
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="width: 100%">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i> Daftar Pembayaran
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID Order</th>
                        <th>Nama Barang</th>
                        <th>Nama Pemesan</th>
                        <th>Alamat</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Dummy data simulasi --}}
                    @foreach ($orders as $order)
                    @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $item->barang->nama_produk }}</td>
                        <td>{{ $order->user->nama ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $order->alamat->alamat }}</td>
                        <td>Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge bg-{{ $order->status == 'paid' ? 'success' : 'warning' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>
                            @if ($order->status == 'pending')
                            <form action="{{ route('verifikasi.update', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button name="action" value="paid" class="btn btn-success btn-sm">Bayar</button>
                                <button name="action" value="cancelled" class="btn btn-danger btn-sm">Tidak
                                    Bayar</button>
                            </form>
                            @else
                            <span class="text-muted">Sudah Diverifikasi</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @endforeach

                    </script>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

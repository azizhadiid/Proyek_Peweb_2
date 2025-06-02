@extends('admin.templates.mainAdminlayout')

@section('title', 'Verifikasi Pembayaran')

@section('konten')
<div class="container mt-5">
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
    <h2 class="mb-4">Verifikasi Pembayaran</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
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
                            <button name="action" value="cancelled" class="btn btn-danger btn-sm">Tidak Bayar</button>
                        </form>
                        @else
                        <span class="text-muted">Sudah Diverifikasi</span>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

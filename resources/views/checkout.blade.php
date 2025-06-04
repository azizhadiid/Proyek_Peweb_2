@extends('templates.mainTemplatedUser')

@section('title', $barang->nama_produk)

@section('konten')

<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Beli</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="/home">Beranda</a></li>
                <li class="current">Beli</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Checkout Section -->
<section id="checkout" class="checkout section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
            <div class="col-lg-5">
                <!-- Order Summary -->
                <div class="order-summary" data-aos="fade-left" data-aos-delay="200">
                    <div class="order-summary-header">
                        <h3>Rangkuman Pesanan</h3>
                    </div>

                    <div class="order-summary-content">
                        <div class="order-items">
                            <div class="order-item">
                                <div class="order-item-image">
                                    <img src="{{ asset('img/barang/' . $barang->gambar) }}"
                                        alt="{{ $barang->nama_produk }}" class="img-fluid">
                                </div>
                                <div class="order-item-details">
                                    <h4>{{ $barang->nama_produk }}</h4>
                                    <p class="order-item-variant">{{ $barang->jenis_olahan }}</p>
                                    <div class="order-item-price">
                                        <span class="quantity">{{ $quantity }} X</span>
                                        <span class="price">Rp{{ number_format($barang->harga) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="order-totals">
                            <div class="order-shipping d-flex justify-content-between">
                                <span>Jumlah</span>
                                <span>{{ $quantity }}</span>
                            </div>
                            <div class="order-subtotal d-flex justify-content-between">
                                <span>Subtotal</span>
                                <span>Rp{{ number_format($total) }}</span>
                            </div>
                            <div class="order-total d-flex justify-content-between">
                                <span>Total</span>
                                <span>Rp{{ number_format($total) }}</span>
                            </div>
                        </div>

                        <div class="secure-checkout">
                            <div class="payment-icons">
                                <i class="bi bi-credit-card-2-front"></i>
                                <i class="bi bi-credit-card"></i>
                                <i class="bi bi-paypal"></i>
                                <i class="bi bi-apple"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <!-- Checkout Form -->
                <div class="checkout-container" data-aos="fade-up">
                    <form class="checkout-form" id="payment-form" method="POST" action="{{ route('produk.bayar') }}">
                        @csrf
                        <!-- Shipping Address -->
                        <input type="hidden" name="barang_id" value="{{ $barang->id }}">
                        <input type="hidden" name="quantity" value="{{ $quantity }}">
                        <div class="checkout-section" id="shipping-address">
                            <div class="section-header">
                                <div class="section-number">1</div>
                                <h3>Pilih Alamat</h3>
                            </div>
                            <div class="section-content">
                                {{-- Pilih Alamat --}}
                                <div class="form-group">
                                    <label for="alamat">Pilih Alamat Pengiriman</label>
                                    <select name="alamat_id" id="alamat" class="form-control" required>
                                        <option disabled selected>-- Pilih Alamat --</option>
                                        @foreach($alamatList as $alamat)
                                        <option value="{{ $alamat->id }}">{{ $alamat->alamat }}</option>
                                        @endforeach
                                    </select>
                                    <small>
                                        <a href="/account">+ Tambah Alamat Baru</a>
                                    </small>
                                </div>

                                {{-- Tombol Bayar --}}
                                <div class="place-order-container mt-4">
                                    <button type="submit" id="pay-button" class="btn btn-primary place-order-btn">
                                        <span class="btn-text">Bayar Sekarang</span>
                                        <span class="btn-price">Rp{{ number_format($total) }}</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>

                    {{-- Midtrans  --}}
                    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
                        data-client-key="{{ config('midtrans.client_key') }}">
                    </script>

                    <script>
                        document.getElementById('payment-form').addEventListener('submit', function (e) {
                            e.preventDefault();

                            fetch(this.action, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Accept': 'application/json',
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        barang_id: this.barang_id.value,
                                        quantity: this.quantity.value,
                                        alamat_id: this.alamat_id.value
                                    })
                                }).then(res => res.json())
                                .then(data => {
                                    snap.pay(data.snap_token, {
                                        onSuccess: function (result) {
                                            window.location.href =
                                            '/produk'; // redirect ke halaman pesanan
                                        },
                                        onPending: function (result) {
                                            window.location.href =
                                            '/produk'; // redirect juga bisa saat pending
                                        },
                                        onError: function (result) {
                                            alert("Pembayaran gagal. Silakan coba lagi.");
                                        }
                                    });
                                });
                        });

                    </script>
                </div>
            </div>
        </div>
    </div>

</section><!-- /Checkout Section -->
@endsection

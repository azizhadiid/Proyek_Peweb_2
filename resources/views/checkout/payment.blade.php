@extends('templates.mainTemplatedUser')

@section('title', 'Beli')

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
                        @foreach($cartItems as $item)
                        <div class="order-items">
                            <div class="order-item">
                                <div class="order-item-image">
                                    <img src="{{ asset('img/barang/' . $item->barang->gambar) }}"
                                        alt="{{ $item->barang->nama_produk }}" class="img-fluid">
                                </div>
                                <div class="order-item-details">
                                    <h4>{{ $item->barang->nama_produk }}</h4>
                                    <p class="order-item-variant">{{ $item->barang->jenis_olahan }}</p>
                                    <div class="order-item-price">
                                        <span class="quantity">{{ $item->quantity }} X</span>
                                        <span class="price">Rp
                                            {{ number_format($item->barang->harga, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="order-totals">
                            <div class="order-shipping d-flex justify-content-between">
                                <span>Keranjang</span>
                                <span>{{ $item->quantity }}</span>
                            </div>
                            <div class="order-subtotal d-flex justify-content-between">
                                <span>Subtotal</span>
                                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <div class="order-total d-flex justify-content-between">
                                <span>Total</span>
                                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
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
                    <form class="checkout-form">
                        <!-- Shipping Address -->
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
                                        @foreach ($alamatList as $alamat)
                                        <option >{{ $alamat->alamat }}</option>
                                        @endforeach
                                    </select>
                                    <small>
                                        <a href="/account">+ Tambah Alamat Baru</a>
                                    </small>
                                </div>

                                {{-- Tombol Bayar --}}
                                <div class="place-order-container mt-4">
                                    <button type="button" id="pay-button" class="btn btn-primary place-order-btn">
                                        <span class="btn-text">Bayar Sekarang</span>
                                        <span class="btn-price">Rp {{ number_format($total, 0, ',', '.') }}</span>
                                    </button>
                                </div>
                            </div>

                            {{-- Midtrans Script --}}
                            <script src="https://app.sandbox.midtrans.com/snap/snap.js"
                                data-client-key="{{ config('midtrans.client_key') }}"></script>
                            <script>
                                document.getElementById('pay-button').addEventListener('click', function () {
                                    let selectedAlamat = document.getElementById('alamat').value;

                                    if (!selectedAlamat) {
                                        alert("Silakan pilih alamat pengiriman terlebih dahulu.");
                                        return;
                                    }

                                    // Lanjut ke Snap
                                    snap.pay('{{ $snapToken }}', {
                                        onSuccess: function (result) {
                                            console.log('Pembayaran sukses:', result);
                                            alert("Pembayaran sukses!");
                                            window.location.href = "/home";
                                        },
                                        onPending: function (result) {
                                            console.log('Menunggu pembayaran:', result);
                                            alert("Menunggu pembayaran...");
                                        },
                                        onError: function (result) {
                                            console.error('Pembayaran gagal:', result);
                                            alert("Pembayaran gagal!");
                                        },
                                        onClose: function () {
                                            alert('Pembayaran dibatalkan!');
                                        }
                                    });
                                });

                            </script>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section><!-- /Checkout Section -->
@endsection

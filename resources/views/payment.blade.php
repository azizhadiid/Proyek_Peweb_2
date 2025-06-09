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
                                        <span class="price">Rp{{ number_format($item->barang->harga, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="order-totals">
                            <div class="order-shipping d-flex justify-content-between">
                                <span>Jumlah Item</span>
                                <span>{{ $totalItemsInCart }}</span>
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
                        @endforeach

                        <div class="secure-checkout">
                            <div class="payment-icons">
                                <i class="bi bi-credit-card-2-front"></i>
                                <i class="bi bi-paypal"></i>
                                <i class="bi bi-wallet2"></i>
                                <i class="bi bi-credit-card"></i>
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
                                        <option value="{{ $alamat->id }}">{{ $alamat->alamat }}</option>
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
                                // Pastikan event listener dipasang pada elemen form
                                document.querySelector('.checkout-form').addEventListener('submit', function (event) {
                                    // Mencegah form submit default
                                    event.preventDefault();

                                    // Panggil fungsi pembayaran saat tombol di dalam form di-klik
                                    handlePayment();
                                });

                                // Atau jika Anda tetap ingin menggunakan listener pada tombol
                                document.getElementById('pay-button').addEventListener('click', function (event) {
                                    event.preventDefault(); // Mencegah perilaku default
                                    handlePayment();
                                });

                                function handlePayment() {
                                    let selectedAlamat = document.getElementById('alamat').value;

                                    if (!selectedAlamat || selectedAlamat === "-- Pilih Alamat --") {
                                        alert("Silakan pilih alamat pengiriman terlebih dahulu.");
                                        return;
                                    }

                                    // URL fetch harus sesuai dengan route POST Anda
                                    fetch('{{ route("checkout.payment") }}', { // Menggunakan helper route lebih aman
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                'Accept': 'application/json'
                                            },
                                            body: JSON.stringify({
                                                alamat_id: selectedAlamat
                                            })
                                        })
                                        .then(response => {
                                            if (!response.ok) {
                                                return response.json().then(err => {
                                                    throw err;
                                                });
                                            }
                                            return response.json();
                                        })
                                        .then(data => {
                                            if (!data.snapToken) {
                                                alert('Snap token tidak tersedia.');
                                                return;
                                            }

                                            // Tampilkan pop-up pembayaran Midtrans
                                            snap.pay(data.snapToken, {
                                                onSuccess: function (result) {
                                                    alert("Pembayaran sukses!");
                                                    // Arahkan ke halaman histori transaksi atau halaman utama
                                                    window.location.href = "/produk";
                                                },
                                                onPending: function (result) {
                                                    alert("Menunggu pembayaran Anda!");
                                                    window.location.href = "/beli";
                                                },
                                                onError: function (result) {
                                                    alert("Pembayaran gagal!");
                                                },
                                                onClose: function () {
                                                    alert(
                                                        'Anda menutup pop-up tanpa menyelesaikan pembayaran.'
                                                        );
                                                }
                                            });
                                        })
                                        .catch(error => {
                                            console.error('Error:', error);
                                            alert(error.message || 'Terjadi kesalahan. Silakan coba lagi.');
                                        });
                                }

                            </script>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section><!-- /Checkout Section -->
@endsection

<h3>Konfirmasi Pembayaran</h3>

<button id="pay-button" class="btn btn-success">Bayar Sekarang</button>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    document.getElementById('pay-button').addEventListener('click', function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function (result) {
                alert("Pembayaran sukses!");
                window.location.href = "/account"; // bisa diarahkan ke halaman sukses
            },
            onPending: function (result) {
                alert("Menunggu pembayaran...");
            },
            onError: function (result) {
                alert("Pembayaran gagal!");
            },
            onClose: function () {
                alert('Pembayaran dibatalkan!');
            }
        });
    });
</script>

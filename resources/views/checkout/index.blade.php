<h2>Checkout</h2>
<p>Alamat: {{ $alamat->alamat }}</p>

<table>
    <thead>
        <tr><th>Produk</th><th>Qty</th><th>Harga</th></tr>
    </thead>
    <tbody>
        @foreach($cart->items as $item)
        <tr>
            <td>{{ $item->barang->nama_produk }}</td>
            <td>{{ $item->quantity }}</td>
            <td>Rp{{ number_format($item->barang->harga, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<p>Total: <strong>Rp{{ number_format($total, 0, ',', '.') }}</strong></p>

<form action="{{ route('checkout.process') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
</form>

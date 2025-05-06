<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD BARANG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Tambah Barang</h1>
        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
            </div>
        
            <div class="mb-3">
                <label for="jenis_olahan">Jenis Olahan</label>
                <select class="form-select" id="jenis_olahan" name="jenis_olahan" required>
                    <option value="" disabled selected>Pilih jenis olahan</option>
                    <option value="Selai">Selai</option>
                    <option value="Keripik">Keripik</option>
                    <option value="Manisan">Manisan</option>
                    <option value="Jus">Jus</option>
                    <option value="Dodol">Dodol</option>
                </select>
            </div>
        
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"></textarea>
            </div>
        
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" required>
            </div>
        
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
        
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input class="form-control" type="file" id="gambar" name="gambar">
            </div>
        
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
</body>

</html>

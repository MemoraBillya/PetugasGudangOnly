<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambahkan Barang Baru</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('petugas-gudang.store')}}">
        @csrf
        @method('post')
        <div>
            <label for="KodeBarang">Kode Barang</label>
            <input type="text" id="KodeBarang" name="KodeBarang" placeholder="KodeBarang" required>
        </div>
        <div>
            <label for="Nama">Nama</label>
            <input type="text" id="Nama" name="Nama" placeholder="Nama">
        </div>
        <div>
            <label for="Satuan">Satuan</label>
            <input type="text" id="Satuan" name="Satuan" placeholder="Satuan">
        </div>
        <div>
            <label for="HargaBeli">Harga Beli</label>
            <input type="number" id="HargaBeli" name="HargaBeli" placeholder="Harga Beli" step=".01">
        </div>
        <div>
            <label for="HargaJual">Harga Jual</label>
            <input type="number" id="HargaJual" name="HargaJual" placeholder="Harga Jual" step=".01">
        </div>
        <div>
            <label for="Stok">Stok</label>
            <input type="number" id="Stok" name="Stok" placeholder="Stok">
        </div>
        <div>
            <label for="Barcode">Barcode</label>
            <input type="text" id="Barcode" name="Barcode" placeholder="Barcode">
        </div>
        <div>
            <input type="submit" value="Tambahkan Produk" >
        </div>
    </form>
</body>
</html>
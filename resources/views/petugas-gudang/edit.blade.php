<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update Barang</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('petugas-gudang.update', ['barang' => $barang])}}">
        @csrf
        @method('put')
        <div>
            <label for="KodeBarang">Kode Barang</label>
            <input type="text" id="KodeBarang" name="KodeBarang" placeholder="KodeBarang" required value="{{$barang->KodeBarang}}">
        </div>
        <div>
            <label for="Nama">Nama</label>
            <input type="text" id="Nama" name="Nama" placeholder="Nama" value="{{$barang->Nama}}">
        </div>
        <div>
            <label for="Satuan">Satuan</label>
            <input type="text" id="Satuan" name="Satuan" placeholder="Satuan" value="{{$barang->Satuan}}">
        </div>
        <div>
            <label for="HargaBeli">Harga Beli</label>
            <input type="number" id="HargaBeli" name="HargaBeli" placeholder="Harga Beli" value="{{$barang->HargaBeli}}">
        </div>
        <div>
            <label for="HargaJual">Harga Jual</label>
            <input type="number" id="HargaJual" name="HargaJual" placeholder="Harga Jual" value="{{$barang->HargaJual}}">
        </div>
        <div>
            <label for="Stok">Stok</label>
            <input type="number" id="Stok" name="Stok" placeholder="Stok" value="{{$barang->Stok}}">
        </div>
        <div>
            <label for="Barcode">Barcode</label>
            <input type="text" id="Barcode" name="Barcode" placeholder="Barcode" value="{{$barang->Barcode}}">
        </div>
        <div>
            <input type="submit" value="Update Produk" >
        </div>
    </form>
</body>
</html>
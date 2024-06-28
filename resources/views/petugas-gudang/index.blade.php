<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hai Petugas Gudang!</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>

    <!-- Form pencarian -->
    <form method="GET" action="{{ route('petugas-gudang.index') }}">
        <input type="text" name="search" placeholder="Cari barang..." value="{{ request('search') }}">
        <button type="submit">Cari</button>
    </form>

    <div>
        <div>
            <a href="{{route('petugas-gudang.create')}}">Tambahkan Produk Baru</a>
        </div>
        <table border="1">
            <thead>
                <tr>
                    <th><a href="{{ route('petugas-gudang.index', array_merge(request()->query(), ['sort_by' => 'KodeBarang', 'sort_order' => $sort_order === 'asc' ? 'desc' : 'asc'])) }}">Kode Barang</a></th>
                    <th><a href="{{ route('petugas-gudang.index', array_merge(request()->query(), ['sort_by' => 'Nama', 'sort_order' => $sort_order === 'asc' ? 'desc' : 'asc'])) }}">Nama</a></th>
                    <th><a href="{{ route('petugas-gudang.index', array_merge(request()->query(), ['sort_by' => 'Satuan', 'sort_order' => $sort_order === 'asc' ? 'desc' : 'asc'])) }}">Satuan</a></th>
                    <th><a href="{{ route('petugas-gudang.index', array_merge(request()->query(), ['sort_by' => 'HargaBeli', 'sort_order' => $sort_order === 'asc' ? 'desc' : 'asc'])) }}">Harga Beli</a></th>
                    <th><a href="{{ route('petugas-gudang.index', array_merge(request()->query(), ['sort_by' => 'HargaJual', 'sort_order' => $sort_order === 'asc' ? 'desc' : 'asc'])) }}">Harga Jual</a></th>
                    <th><a href="{{ route('petugas-gudang.index', array_merge(request()->query(), ['sort_by' => 'Stok', 'sort_order' => $sort_order === 'asc' ? 'desc' : 'asc'])) }}">Stok</a></th>
                    <th><a href="{{ route('petugas-gudang.index', array_merge(request()->query(), ['sort_by' => 'Barcode', 'sort_order' => $sort_order === 'asc' ? 'desc' : 'asc'])) }}">Barcode</a></th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barang as $item)
                    <tr>
                        <td>{{ $item->KodeBarang }}</td>
                        <td>{{ $item->Nama }}</td>
                        <td>{{ $item->Satuan }}</td>
                        <td>{{ $item->HargaBeli }}</td>
                        <td>{{ $item->HargaJual }}</td>
                        <td>{{ $item->Stok }}</td>
                        <td>{{ $item->Barcode }}</td>
                        <td><a href="{{ route('petugas-gudang.edit', ['barang' => $item->KodeBarang]) }}">Edit</a></td>
                        <td>
                            <form method="post" action="{{ route('petugas-gudang.destroy', $item) }}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" onclick="return confirm('Hapus barang ini?');" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginate links -->
        <div>
            {{ $barang->appends(request()->except('page'))->links() }}
        </div>
    </div>
</body>
</html>
</body>
</html>
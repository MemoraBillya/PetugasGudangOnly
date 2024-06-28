<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;

class barangcontroller extends Controller
{
    public function index(Request $request){
        // Ambil parameter pencarian, pengurutan, dan urutan dari request
        $search = $request->input('search', '');
        $sort_by = $request->input('sort_by', 'KodeBarang');
        $sort_order = $request->input('sort_order', 'asc');

        // Query dasar
        $query = Barang::query();

        // Terapkan pencarian jika ada
        if ($search) {
            $query->where('Nama', 'like', '%' . $search . '%')
                  ->orWhere('KodeBarang', 'like', '%' . $search . '%')
                  ->orWhere('Barcode', 'like', '%' . $search . '%');
        }

        // Terapkan pengurutan
        $query->orderBy($sort_by, $sort_order);

        // Ambil data dengan paginasi
        $barang = $query->paginate(50);

        // Kembalikan view dengan data
        return view('petugas-gudang.index', [
            'barang' => $barang,
            'search' => $search,
            'sort_by' => $sort_by,
            'sort_order' => $sort_order
        ]);
    }

    public function create()
    {
        return view('petugas-gudang.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'KodeBarang' => 'required',
            'Nama' => 'nullable|string|max:255',
            'Satuan' => 'nullable|string|max:50',
            'HargaBeli' => 'nullable|decimal:2',
            'HargaJual' => 'nullable|decimal:2',
            'Stok' => 'nullable|integer',
            'Barcode' => 'nullable|numeric',
        ]);

        Barang::create($data);

        return redirect(route('petugas-gudang.index'))->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit(Barang $barang){
        return view('petugas-gudang.edit', ['barang' => $barang]);
    }

    public function update(Barang $barang, Request $request){
        $data = $request->validate([
            'KodeBarang' => 'required',
            'Nama' => 'nullable|string|max:255',
            'Satuan' => 'nullable|string|max:50',
            'HargaBeli' => 'nullable|decimal:2',
            'HargaJual' => 'nullable|decimal:2',
            'Stok' => 'nullable|integer',
            'Barcode' => 'nullable|numeric',
        ]);

        $barang->update($data);
        return redirect(route('petugas-gudang.index'))->with('success', 'Barang terupdate!');
    }

    public function destroy(Barang $barang){
        $barang->delete();
        return redirect(route('petugas-gudang.index'))->with('success', 'Barang terhapus!');
    }
}

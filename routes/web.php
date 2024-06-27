<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\barangcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/petugasgudang', [barangcontroller::class, 'index'])->name('petugas-gudang.index');
Route::get('/petugasgudang/produkbaru', [barangcontroller::class, 'create'])->name('petugas-gudang.create');
Route::post('/petugasgudang', [barangcontroller::class, 'store'])->name('petugas-gudang.store');
Route::get('/petugasgudang{barang}/edit', [barangcontroller::class, 'edit'])->name('petugas-gudang.edit');
Route::put('/petugasgudang{barang}/update', [barangcontroller::class, 'update'])->name('petugas-gudang.update');
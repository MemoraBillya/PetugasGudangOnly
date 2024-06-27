<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'KodeBarang'; // Set the custom primary key
    public $incrementing = false;         // Indicate that the primary key is not auto-incrementing
    protected $keyType = 'string';    
    protected $fillable = [
        'KodeBarang',
        'Nama',
        'Satuan',
        'HargaBeli',
        'HargaJual',
        'Stok',
        'Barcode',
    ];
}

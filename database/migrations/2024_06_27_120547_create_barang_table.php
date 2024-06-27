<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->string('KodeBarang', 20)->notNull();
            $table->string('Nama', 30)->nullable();
            $table->string('Satuan', 10)->nullable();
            $table->decimal('HargaBeli', 8, 2)->nullable();
            $table->decimal('HargaJual', 8, 2)->nullable();
            $table->integer('Stok')->nullable();
            $table->string('Barcode', 13)->nullable();
            $table->timestamps();
            $table->primary('KodeBarang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};

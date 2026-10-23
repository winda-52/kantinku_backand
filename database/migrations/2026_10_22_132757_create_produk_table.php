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
        Schema::create('produk', function (Blueprint $table) {
           $table->id('produk_id');
           $table->string('nama_produk', 150);
           $table->text('deskripsi')->nullable();
           $table->foreignId('kategori_id');
           $table->decimal('harga', 12, 2);
           $table->decimal('rating', 3, 1)->default(0.0);
           $table->string('gambar_produk')->nullable();
           $table->string('slug')->unique();
           $table->timestamps();

           // untuk foregen keynya ini win
           $table->foreign('kategori_id')->references('kategori_id')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};

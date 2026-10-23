<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class produk extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk')->insert([
            [
                'nama_produk' => 'Nasi Goreng',
                'slug' => Str::slug('Nasi Goreng'),
                'deskripsi' => 'Nasi goreng spesial dengan telur dan kerupuk',
                'kategori_id' => 1, // Makanan
                'harga' => 15000,
                'rating' => 4.5,
                'gambar_produk' => 'https://winda-52.github.io/KantinKu/images/nasi-goreng.jpeg',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Ayam Geprek',
                'slug' => Str::slug('Ayam Geprek'),
                'deskripsi' => 'Ayam geprek spesial dengan sambal',
                'kategori_id' => 1, // Makanan
                'harga' => 18000,
                'rating' => 4.7,
                'gambar_produk' => 'https://winda-52.github.io/KantinKu/images/ayam-geprek.jpeg',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Mie Goreng',
                'slug' => Str::slug('Mie Goreng'),
                'deskripsi' => 'Mie goreng spesial dengan sayuran',
                'kategori_id' => 1, // Makanan
                'harga' => 13000,
                'rating' => 4.3,
                'gambar_produk' => 'https://winda-52.github.io/KantinKu/images/mie-goreng.jpeg',
                'created_at' => now(), 'updated_at' => now()
            ],  
            [
                'nama_produk' => 'Es Teh',
                'slug' => Str::slug('Es Teh'),
                'deskripsi' => 'Es teh manis dingin',
                'kategori_id' => 2, // kategori minuman
                'harga' => 5000,
                'rating' => 4.4,
                'gambar_produk' => 'https://winda-52.github.io/KantinKu/images/es-teh.jpeg',
                'created_at' => now(), 'updated_at' => now()
            ], 
            [
                'nama_produk' => 'Es Jeruk',
                'slug' => Str::slug('Es Jeruk'),
                'deskripsi' => 'Es jeruk segar dingin',
                'kategori_id' => 2, // kategori minuman
                'harga' => 7000,
                'rating' => 4.6,
                'gambar_produk' => 'https://winda-52.github.io/KantinKu/images/es-jeruk.jpeg',
                'created_at' => now(), 'updated_at' => now()
            ], 
            [
                'nama_produk' => 'Kopi Susu',
                'slug' => Str::slug('Kopi Susu'),
                'deskripsi' => 'Kopi susu dingin',
                'kategori_id' => 2, // kategori minuman
                'harga' => 10000,
                'rating' => 4.8,
                'gambar_produk' => 'https://winda-52.github.io/KantinKu/images/kopi-susu.jpeg',
                'created_at' => now(), 'updated_at' => now()
            ], 
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategori extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori')->insert([
            ['kategori' => 'Makanan', 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'Minuman', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

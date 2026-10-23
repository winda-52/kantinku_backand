<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdukResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->produk_id,
            'nama_produk' => $this->nama_produk,
            'slug' => $this->slug,
            'deskripsi' => $this->deskripsi,
            'harga' => (float) $this->harga,
            'rating' => (float) $this->rating,
            'stok' => (int) $this->stok,
            'gambar_url' => $this->gambar_produk ? url('storage/' . $this->gambar_produk) : null,
            'kategori' => [
                'id' => $this->kategori?->kategori_id,
                'nama_kategori' => $this->kategori?->kategori,
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
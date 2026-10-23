<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdukResource;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * untuk menampilkan data produk
     */
    public function index()
    {
        // Get all products with their category (menggunakan pagination sesuai modul)
        $produk = Produk::with('kategori')->paginate(10);
        return ProdukResource::collection($produk);
    }

    /**
     * untuk menyimpan data produk dari api
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'nama_produk' => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'kategori_id' => 'required|exists:kategori,kategori_id',
            'harga' => 'required|numeric',
            'rating' => 'nullable|numeric',
            'gambar_produk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Inisialisasi path gambar
        $path = null;
        if ($request->hasFile('gambar_produk')) {
            $path = $request->file('gambar_produk')->store('produk', 'public');
        }

        // untuk menyimpan data produk dari api
        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'rating' => $request->rating ?? 0.0,
            'gambar_produk' => $path,
            'slug' => Str::slug($request->nama_produk) // Generate slug from name
        ]);

        return new ProdukResource($produk);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Get product by ID with its category
        $produk = Produk::with('kategori')->findOrFail($id);
        return new ProdukResource($produk);
    }

    /**
     * untuk update data produk dari api
     */
    public function update(Request $request, string $id)
    {
        // Find the product
        $produk = Produk::findOrFail($id);

        // Validate the request
        $request->validate([
            'nama_produk' => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'kategori_id' => 'required|exists:kategori,kategori_id',
            'harga' => 'required|numeric',
            'rating' => 'nullable|numeric',
            'gambar_produk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = [
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'rating' => $request->rating ?? $produk->rating,
            'slug' => Str::slug($request->nama_produk) // Generate slug from name
        ];

        // Jika ada upload gambar baru
        if ($request->hasFile('gambar_produk')) {
            if ($produk->gambar_produk && Storage::disk('public')->exists($produk->gambar_produk)) {
                Storage::disk('public')->delete($produk->gambar_produk);
            }
            $data['gambar_produk'] = $request->file('gambar_produk')->store('produk', 'public');
        }

        // Update the product
        $produk->update($data);

        return new ProdukResource($produk);
    }

    /**
     * untuk menghapus data produk 
     */
    public function destroy(string $id)
    {
        // Find and delete the product
        $produk = Produk::find($id);
        if ($produk != null) {
            if ($produk->gambar_produk && Storage::disk('public')->exists($produk->gambar_produk)) {
                Storage::disk('public')->delete($produk->gambar_produk);
            }
            $produk->delete();
            return response()->json(['message' => 'Produk deleted successfully']);
        }

        // Return a response jika tidak ditemukan
        return response()->json(['message' => 'Produk not found'], 404);
    }
}
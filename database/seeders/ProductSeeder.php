<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'nama' => 'Pupuk Urea',
            'deskripsi' => 'Pupuk urea untuk pertumbuhan daun dan batang tanaman.',
            'harga' => 120000,
            'stok' => 50,
            'gambar' => 'products/placeholder.jpg',
        ]);

        Product::create([
            'nama' => 'Pupuk NPK',
            'deskripsi' => 'Pupuk NPK mengandung Nitrogen, Fosfor, dan Kalium untuk tanaman.',
            'harga' => 135000,
            'stok' => 30,
            'gambar' => 'products/placeholder.jpg',
        ]);

        Product::create([
            'nama' => 'Pupuk Kompos Organik',
            'deskripsi' => 'Pupuk alami dari bahan organik untuk memperbaiki struktur tanah.',
            'harga' => 80000,
            'stok' => 40,
            'gambar' => 'products/placeholder.jpg',
        ]);

        Product::create([
            'nama' => 'Pupuk Kandang',
            'deskripsi' => 'Pupuk dari kotoran ternak yang kaya unsur hara untuk tanaman pangan.',
            'harga' => 70000,
            'stok' => 60,
            'gambar' => 'products/placeholder.jpg',
        ]);

        Product::create([
            'nama' => 'Pupuk ZA',
            'deskripsi' => 'Pupuk ZA membantu pembentukan protein dan klorofil pada tanaman.',
            'harga' => 110000,
            'stok' => 35,
            'gambar' => 'products/placeholder.jpg',
        ]);

        Product::create([
            'nama' => 'Pupuk SP-36',
            'deskripsi' => 'Pupuk SP-36 kaya fosfor, meningkatkan pertumbuhan akar dan bunga.',
            'harga' => 125000,
            'stok' => 45,
            'gambar' => 'products/placeholder.jpg',
        ]);

        Product::create([
            'nama' => 'Pupuk Dolomit',
            'deskripsi' => 'Pupuk Dolomit menetralkan keasaman tanah dan menambah unsur kalsium serta magnesium.',
            'harga' => 95000,
            'stok' => 25,
            'gambar' => 'products/placeholder.jpg',
        ]);
    }
}

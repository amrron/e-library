<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'nama' => 'Fiksi',
            'deskripsi' => 'Buku cerit karangan', 
        ]);

        Kategori::create([
            'nama' => 'Komik',
            'deskripsi' => 'Buku cerita bergambar', 
        ]);

        Kategori::create([
            'nama' => 'Resep',
            'deskripsi' => 'Buku berisi resep masakan', 
        ]);
    }
}

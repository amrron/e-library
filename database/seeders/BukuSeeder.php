<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::create([
            'judul' => 'Laskar Pelangi',
            'author' => 'Andrea Hirata',
            'penerbit' => 'Andrea Hirata',
            'tahun_terbit' => 'Andrea Hirata',
            'isbn' => 'Andrea Hirata',
            'kategori_id' => Kategori::where('nama', 'Fiksi')->first()->id,
            'jumlah_salinan' => 5
        ]);
    }
}

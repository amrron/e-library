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
            'tahun_terbit' => '2000',
            'isbn' => '092340235732042',
            'kategori_id' => Kategori::where('nama', 'Fiksi')->first()->id,
            'jumlah_salinan' => 5,
            'cover' => "https://inc.mizanstore.com/aassets/img/com_cart/produk/covFL-12.jpg"
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peminjaman::create([
            'buku_id' => Buku::all()[0]->id,
            'user_id' => User::where('role', 'user')->first()->id,
            'tanggal_peminjaman' => Carbon::now(),
            'tenggat_pengembalian' => Carbon::now()->addDays(7)
        ]);
    }
}

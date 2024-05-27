<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Ali Imron',
            'email' => 'imrona463@gmail.com',
            'role' => 'admin',
            'password' => '123123'
        ]);

        User::create([
            'name' => 'Imron',
            'email' => 'aliimronali759@gmail.com',
            'role' => 'user',
            'password' => '123123'
        ]);

        $this->call([
            KategoriSeeder::class,
            BukuSeeder::class,
            PeminjamanSeeder::class
        ]);
    }
}

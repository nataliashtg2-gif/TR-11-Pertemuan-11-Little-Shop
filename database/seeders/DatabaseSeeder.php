<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat kategori
        $this->call(CategorySeeder::class);

        // Membuat 50 produk
        Product::factory()
            ->count(50)
            ->create();

        // Membuat akun Admin, Editor, dan User
        $this->call(UserSeeder::class);
    }
}

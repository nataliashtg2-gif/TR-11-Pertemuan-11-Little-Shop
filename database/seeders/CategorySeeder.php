<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Skincare',
                'description' => 'Produk perawatan wajah untuk menjaga kulit tetap sehat dan bercahaya.',
            ],
            [
                'name' => 'Body Care',
                'description' => 'Produk perawatan tubuh dengan nuansa tropis yang menyegarkan.',
            ],
            [
                'name' => 'Hair Care',
                'description' => 'Produk perawatan rambut untuk menjaga rambut tetap lembut dan sehat.',
            ],
            [
                'name' => 'Beauty',
                'description' => 'Produk kecantikan untuk melengkapi rutinitas sehari-hari.',
            ],
            [
                'name' => 'Fragrance',
                'description' => 'Beragam aroma segar dengan karakter tropis.',
            ],
            [
                'name' => 'Tropical Essentials',
                'description' => 'Produk pilihan dengan inspirasi suasana tropis.',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['name' => $category['name']],
                [
                    'slug' => Str::slug($category['name']),
                    'description' => $category['description'],
                    'is_active' => true,
                ]
            );
        }
    }
}
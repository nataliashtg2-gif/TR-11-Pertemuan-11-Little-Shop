<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $products = [
            'Coconut Breeze Body Wash',
            'Tropical Glow Sunscreen',
            'Mango Bloom Body Lotion',
            'Ocean Mist Face Wash',
            'Pineapple Fresh Scrub',
            'Coconut Silk Shampoo',
            'Sunset Glow Lip Balm',
            'Tropical Bloom Hair Serum',
            'Island Fresh Body Mist',
            'Papaya Brightening Cleanser',
            'Aloe Paradise Gel',
            'Coconut Dream Hair Mask',
            'Mango Splash Shower Gel',
            'Ocean Breeze Facial Toner',
            'Tropical Kiss Hand Cream',
            'Pineapple Glow Body Scrub',
            'Summer Bloom Perfume',
            'Coconut Milk Hair Conditioner',
            'Tropical Fresh Deodorant',
        ];

        $baseName = fake()->randomElement($products);

        // Nomor unik supaya nama dan slug tidak bentrok
        $name = $baseName . ' ' . fake()->unique()->numberBetween(1, 99999);

        return [
            'category_id' => Category::query()
                ->inRandomOrder()
                ->value('id'),

            'name' => $name,

            'slug' => Str::slug($name),

            'description' => fake()->sentence(14),

            'price' => fake()->numberBetween(35, 750) * 1000,

            'stock' => fake()->numberBetween(5, 120),

            'sku' => 'TM-' . strtoupper(fake()->unique()->bothify('???-#####')),

            'image' => null,

            'is_active' => true,
        ];
    }
}

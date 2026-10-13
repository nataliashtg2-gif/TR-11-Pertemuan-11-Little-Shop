<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class CategoryFactory extends Factory { public function definition():array{$n=fake()->unique()->randomElement(['Everyday','Gadgets','Style','Home & Living','Lifestyle']);return ['name'=>$n,'slug'=>Str::slug($n),'description'=>fake()->sentence(8)];} }

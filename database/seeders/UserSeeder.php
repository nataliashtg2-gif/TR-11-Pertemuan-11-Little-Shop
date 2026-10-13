<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@tropicalmarket.test'],
            [
                'name' => 'Tropical Market Admin',
                'password' => Hash::make('Admin12345'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'editor@tropicalmarket.test'],
            [
                'name' => 'Tropical Market Editor',
                'password' => Hash::make('Editor12345'),
                'role' => 'editor',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@tropicalmarket.test'],
            [
                'name' => 'Tropical Market User',
                'password' => Hash::make('User12345'),
                'role' => 'user',
            ]
        );
    }
}

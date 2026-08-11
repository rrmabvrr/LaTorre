<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@latorre.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('admin123'),
            ]
        );

        if (MenuItem::query()->count() === 0) {
            MenuItem::insert([
                [
                    'name' => 'Pizza Mussarela',
                    'description' => 'Molho de tomate especial, mussarela e oregano.',
                    'category' => 'tradicionais',
                    'price' => 35.00,
                    'is_available' => true,
                    'display_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Pizza Camarao',
                    'description' => 'Camaroes selecionados com catupiry e cebolinha.',
                    'category' => 'especiais',
                    'price' => 55.00,
                    'is_available' => true,
                    'display_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Refrigerante 2L',
                    'description' => 'Sabores variados conforme disponibilidade.',
                    'category' => 'bebidas',
                    'price' => 14.00,
                    'is_available' => true,
                    'display_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}

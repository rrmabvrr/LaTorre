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
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
            ]
        );

        if (MenuItem::query()->count() === 0) {
            MenuItem::insert([
                [
                    'name' => 'MÉDIA',
                    'description' => 'Pizza tradicional',
                    'category' => 'tradicionais',
                    'price' => 39.90,
                    'is_available' => true,
                    'display_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'MÉDIA',
                    'description' => 'Pizza especial',
                    'category' => 'especiais',
                    'price' => 44.90,
                    'is_available' => true,
                    'display_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'MÉDIA',
                    'description' => 'Pizza nobre',
                    'category' => 'nobres',
                    'price' => 49.90,
                    'is_available' => true,
                    'display_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'COPO',
                    'description' => 'Suco natural em copo',
                    'category' => 'sucos_naturais',
                    'price' => 12.00,
                    'is_available' => true,
                    'display_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'PORÇÃO',
                    'description' => 'Porção de tira gosto',
                    'category' => 'tira_gosto',
                    'price' => 18.90,
                    'is_available' => true,
                    'display_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Refrigerante 600ml',
                    'description' => 'Lata ou garrafa',
                    'category' => 'bebidas',
                    'price' => 8.00,
                    'is_available' => true,
                    'display_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'LONG NECK',
                    'description' => 'Cerveja gelada',
                    'category' => 'cervejas',
                    'price' => 14.90,
                    'is_available' => true,
                    'display_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Casquinha',
                    'description' => 'Sabor de escolha',
                    'category' => 'sorvetes',
                    'price' => 8.00,
                    'is_available' => true,
                    'display_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Adicional de batatas',
                    'description' => 'Adicional para pizzas',
                    'category' => 'adicionais',
                    'price' => 7.00,
                    'is_available' => true,
                    'display_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}

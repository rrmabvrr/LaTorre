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

        $defaultItems = [
            [
                'name' => 'MUSSARELA',
                'description' => 'Pizza tradicional',
                'category' => 'tradicionais',
                'price' => 39.90,
                'is_available' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'LA TORRE',
                'description' => 'Pizza especial',
                'category' => 'especiais',
                'price' => 44.90,
                'is_available' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'FILÉ COM FRITAS',
                'description' => 'Pizza nobre',
                'category' => 'nobres',
                'price' => 49.90,
                'is_available' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'Laranja',
                'description' => 'Suco natural de laranja',
                'category' => 'sucos_naturais',
                'price' => 12.00,
                'sizes' => ['COPO' => 12.00, 'JARRA' => 24.00, 'ADICIONAL DE LEITE' => 5.00],
                'is_available' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'Morango',
                'description' => 'Suco natural de morango',
                'category' => 'sucos_naturais',
                'price' => 12.00,
                'sizes' => ['COPO' => 12.00, 'JARRA' => 24.00, 'ADICIONAL DE LEITE' => 5.00],
                'is_available' => true,
                'display_order' => 2,
            ],
            [
                'name' => 'Maracujá',
                'description' => 'Suco natural de maracujá',
                'category' => 'sucos_naturais',
                'price' => 12.00,
                'sizes' => ['COPO' => 12.00, 'JARRA' => 24.00, 'ADICIONAL DE LEITE' => 5.00],
                'is_available' => true,
                'display_order' => 3,
            ],
            [
                'name' => 'Abacaxi',
                'description' => 'Suco natural de abacaxi',
                'category' => 'sucos_naturais',
                'price' => 12.00,
                'sizes' => ['COPO' => 12.00, 'JARRA' => 24.00, 'ADICIONAL DE LEITE' => 5.00],
                'is_available' => true,
                'display_order' => 4,
            ],
            [
                'name' => 'Acerola',
                'description' => 'Suco natural de acerola',
                'category' => 'sucos_naturais',
                'price' => 12.00,
                'sizes' => ['COPO' => 12.00, 'JARRA' => 24.00, 'ADICIONAL DE LEITE' => 5.00],
                'is_available' => true,
                'display_order' => 5,
            ],
            [
                'name' => 'Limão',
                'description' => 'Suco natural de limão',
                'category' => 'sucos_naturais',
                'price' => 12.00,
                'sizes' => ['COPO' => 12.00, 'JARRA' => 24.00, 'ADICIONAL DE LEITE' => 5.00],
                'is_available' => true,
                'display_order' => 6,
            ],
            [
                'name' => 'Porção de Batata Frita',
                'description' => 'Porção crocante de batata frita',
                'category' => 'tira_gosto',
                'price' => 18.90,
                'is_available' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'Porção de Calabresa',
                'description' => 'Calabresa frita com molho',
                'category' => 'tira_gosto',
                'price' => 24.90,
                'is_available' => true,
                'display_order' => 2,
            ],
            [
                'name' => 'Porção de Cebola',
                'description' => 'Cebola empanada e crocante',
                'category' => 'tira_gosto',
                'price' => 19.90,
                'is_available' => true,
                'display_order' => 3,
            ],
            [
                'name' => 'Porção de Frango',
                'description' => 'Frango crocante em tiras',
                'category' => 'tira_gosto',
                'price' => 26.90,
                'is_available' => true,
                'display_order' => 4,
            ],
            [
                'name' => 'Anéis de Cebola',
                'description' => 'Anéis de cebola dourados',
                'category' => 'tira_gosto',
                'price' => 21.90,
                'is_available' => true,
                'display_order' => 5,
            ],
            [
                'name' => 'Porção Mista',
                'description' => 'Mix de tira gosto da casa',
                'category' => 'tira_gosto',
                'price' => 29.90,
                'is_available' => true,
                'display_order' => 6,
            ],
            [
                'name' => 'Refrigerante 600ml',
                'description' => 'Lata ou garrafa',
                'category' => 'bebidas',
                'price' => 8.00,
                'is_available' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'LONG NECK',
                'description' => 'Cerveja gelada',
                'category' => 'cervejas',
                'price' => 14.90,
                'is_available' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'Casquinha',
                'description' => 'Sabor de escolha',
                'category' => 'sorvetes',
                'price' => 8.00,
                'is_available' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'Adicional de batatas',
                'description' => 'Adicional para pizzas',
                'category' => 'adicionais',
                'price' => 7.00,
                'is_available' => true,
                'display_order' => 1,
            ],
        ];

        foreach ($defaultItems as $item) {
            $record = MenuItem::query()
                ->where('category', $item['category'])
                ->where('name', $item['name'])
                ->first();

            if ($record) {
                $record->update([
                    'description' => $item['description'],
                    'price' => $item['price'] ?? null,
                    'sizes' => $item['sizes'] ?? null,
                    'is_available' => $item['is_available'],
                    'display_order' => $item['display_order'],
                ]);

                continue;
            }

            MenuItem::query()->create([
                'name' => $item['name'],
                'description' => $item['description'],
                'category' => $item['category'],
                'price' => $item['price'] ?? null,
                'sizes' => $item['sizes'] ?? null,
                'is_available' => $item['is_available'],
                'display_order' => $item['display_order'],
            ]);
        }

        $validTiraGosto = [
            'Porção de Batata Frita',
            'Porção de Calabresa',
            'Porção de Cebola',
            'Porção de Frango',
            'Anéis de Cebola',
            'Porção Mista',
        ];

        MenuItem::query()
            ->where('category', 'tira_gosto')
            ->whereNotIn('name', $validTiraGosto)
            ->delete();
    }
}

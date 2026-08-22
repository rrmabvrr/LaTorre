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
            // Tradicionais
            [
                'name' => 'MUSSARELA',
                'description' => 'Molho, mussarela, ovos, tomate, cebola, milho, ervilha, pimentão e orégano.',
                'category' => 'tradicionais',
                'price' => null,
                'is_available' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'CALABRESA',
                'description' => 'Molho, mussarela, calabresa, cebola, azeitona e orégano.',
                'category' => 'tradicionais',
                'price' => null,
                'is_available' => true,
                'display_order' => 2,
            ],
            [
                'name' => 'FRANGO',
                'description' => 'Molho, mussarela, frango, cebola, azeitona e orégano.',
                'category' => 'tradicionais',
                'price' => null,
                'is_available' => true,
                'display_order' => 3,
            ],
            [
                'name' => 'PORTUGUESA',
                'description' => 'Molho, mussarela, ovos, tomate, cebola, milho, ervilha, pimentão e orégano.',
                'category' => 'tradicionais',
                'price' => null,
                'is_available' => true,
                'display_order' => 4,
            ],
            [
                'name' => 'MILHO',
                'description' => 'Molho, mussarela, milho, azeitona e orégano.',
                'category' => 'tradicionais',
                'price' => null,
                'is_available' => true,
                'display_order' => 5,
            ],
            [
                'name' => 'NAPOLITANA',
                'description' => 'Molho, mussarela, ovos, calabresa, presunto, milho, azeitona e orégano.',
                'category' => 'tradicionais',
                'price' => null,
                'is_available' => true,
                'display_order' => 6,
            ],
            [
                'name' => 'MEXICANA',
                'description' => 'Molho, mussarela, calabresa picante, pimentão, azeitona e orégano.',
                'category' => 'tradicionais',
                'price' => null,
                'is_available' => true,
                'display_order' => 7,
            ],
            [
                'name' => 'QUATRO ESTAÇÕES',
                'description' => 'Molho, mussarela, calabresa, presunto, frango, tomate, azeitona e orégano.',
                'category' => 'tradicionais',
                'price' => null,
                'is_available' => true,
                'display_order' => 8,
            ],

            // Especiais
            [
                'name' => 'LA TORRE',
                'description' => 'Molho, mussarela, presunto, cebola, pimentão, calabresa, tomate e orégano.',
                'category' => 'especiais',
                'price' => null,
                'is_available' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'FRANGO COM CATUPIRÍ',
                'description' => 'Molho, mussarela, frango, cebola, milho, tomate, catupiry, ervilha, azeitona e orégano.',
                'category' => 'especiais',
                'price' => null,
                'is_available' => true,
                'display_order' => 2,
            ],
            [
                'name' => 'FILÉ',
                'description' => 'Molho, mussarela, filé, catupiry, milho verde, tomate, cebola, ervilha e orégano.',
                'category' => 'especiais',
                'price' => null,
                'is_available' => true,
                'display_order' => 3,
            ],
            [
                'name' => 'CARNE DE SOL',
                'description' => 'Molho, mussarela, carne de sol, tomate, cebola, ervilha, pimentão e orégano.',
                'category' => 'especiais',
                'price' => null,
                'is_available' => true,
                'display_order' => 4,
            ],
            [
                'name' => 'CAIPIRA',
                'description' => 'Molho, mussarela, bacon, catupiry, milho, ervilha, azeitona e orégano.',
                'category' => 'especiais',
                'price' => null,
                'is_available' => true,
                'display_order' => 5,
            ],
            [
                'name' => 'Q’ DELÍCIA',
                'description' => 'Molho, mussarela, calabresa, batata palha, azeitona e orégano.',
                'category' => 'especiais',
                'price' => null,
                'is_available' => true,
                'display_order' => 6,
            ],
            [
                'name' => '3 QUEIJO',
                'description' => 'Molho, mussarela, parmesão, requeijão cremoso, tomate, azeitona e orégano.',
                'category' => 'especiais',
                'price' => null,
                'is_available' => true,
                'display_order' => 7,
            ],
            [
                'name' => 'CALABRESA MINEIRA',
                'description' => 'Molho, mussarela, milho, calabresa, bacon, cebola e orégano.',
                'category' => 'especiais',
                'price' => null,
                'is_available' => true,
                'display_order' => 8,
            ],
            [
                'name' => 'ESPANHOLA',
                'description' => 'Molho, mussarela, presunto, ovo, tomate, cebola, creme de leite, azeitona e orégano.',
                'category' => 'especiais',
                'price' => null,
                'is_available' => true,
                'display_order' => 9,
            ],

            // Nobres
            [
                'name' => 'FILÉ COM FRITAS',
                'description' => 'Molho, mussarela, filé com fritas, catupiry, cebola, tomate e orégano.',
                'category' => 'nobres',
                'price' => null,
                'is_available' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'STROGONOFF DE FRANGO',
                'description' => 'Molho, mussarela, strogonoff de frango, milho, ervilha, azeite, azeitona e orégano.',
                'category' => 'nobres',
                'price' => null,
                'is_available' => true,
                'display_order' => 2,
            ],
            [
                'name' => 'STROGONOFF DE CARNE',
                'description' => 'Molho, mussarela, strogonoff de carne, batata palha e azeitona.',
                'category' => 'nobres',
                'price' => null,
                'is_available' => true,
                'display_order' => 3,
            ],
            [
                'name' => 'FILÉBRESA',
                'description' => 'Molho, mussarela, filé, calabresa e azeitona.',
                'category' => 'nobres',
                'price' => null,
                'is_available' => true,
                'display_order' => 4,
            ],
            [
                'name' => 'MACUXI',
                'description' => 'Molho, mussarela, carne de sol, banana frita, cebola e orégano.',
                'category' => 'nobres',
                'price' => null,
                'is_available' => true,
                'display_order' => 5,
            ],
            [
                'name' => 'BACON',
                'description' => 'Molho, mussarela, bacon, cebola, tomate e azeitona.',
                'category' => 'nobres',
                'price' => null,
                'is_available' => true,
                'display_order' => 6,
            ],
            [
                'name' => 'ESPANHOLA C/ BACON E CATUPIRY',
                'description' => 'Molho, mussarela, presunto, ovo, tomate, cebola, bacon, catupiry, azeitona e orégano.',
                'category' => 'nobres',
                'price' => null,
                'is_available' => true,
                'display_order' => 7,
            ],

            // Sucos_Naturais
            [
                'name' => 'ACEROLA',
                'description' => 'Suco natural de acerola',
                'category' => 'sucos_naturais',
                'price' => null,
                'sizes' => ['COPO' => 8.00, 'JARRA' => 15.00],
                'is_available' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'CUPUAÇÚ',
                'description' => 'Suco natural de cupuaçu',
                'category' => 'sucos_naturais',
                'price' => null,
                'sizes' => ['COPO' => 8.00, 'JARRA' => 15.00],
                'is_available' => true,
                'display_order' => 2,
            ],
            [
                'name' => 'GOIABA',
                'description' => 'Suco natural de goiaba',
                'category' => 'sucos_naturais',
                'price' => null,
                'sizes' => ['COPO' => 8.00, 'JARRA' => 15.00],
                'is_available' => true,
                'display_order' => 3,
            ],
            [
                'name' => 'GRAVIOLA',
                'description' => 'Suco natural de graviola',
                'category' => 'sucos_naturais',
                'price' => null,
                'sizes' => ['COPO' => 8.00, 'JARRA' => 15.00],
                'is_available' => true,
                'display_order' => 4,
            ],
            [
                'name' => 'MARACUJÁ',
                'description' => 'Suco natural de maracujá',
                'category' => 'sucos_naturais',
                'price' => null,
                'sizes' => ['COPO' => 8.00, 'JARRA' => 15.00],
                'is_available' => true,
                'display_order' => 5,
            ],
            [
                'name' => 'TAPEREBÁ',
                'description' => 'Suco natural de taperebá',
                'category' => 'sucos_naturais',
                'price' => null,
                'sizes' => ['COPO' => 8.00, 'JARRA' => 15.00],
                'is_available' => true,
                'display_order' => 6,
            ],
            // Tira_Gosto
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
                'description' => 'Calabresa frita',
                'category' => 'tira_gosto',
                'price' => 24.90,
                'is_available' => true,
                'display_order' => 2,
            ],

            [
                'name' => 'Batata + Calabresa',
                'description' => 'Mix de batata e calabresa',
                'category' => 'tira_gosto',
                'price' => 29.90,
                'is_available' => true,
                'display_order' => 3,
            ],

            // BEBIDAS
            [
                'name' => 'Refrigerante 350ml',
                'description' => 'Lata',
                'category' => 'bebidas',
                'price' => 8.00,
                'is_available' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'Coca-Cola 2L',
                'description' => 'Garrafa',
                'category' => 'bebidas',
                'price' => 10.00,
                'is_available' => true,
                'display_order' => 2,
            ],
            [
                'name' => 'Fanta 2L',
                'description' => 'Garrafa',
                'category' => 'bebidas',
                'price' => 10.00,
                'is_available' => true,
                'display_order' => 3,
            ],
            [
                'name' => 'Baré 2L',
                'description' => 'Garrafa',
                'category' => 'bebidas',
                'price' => 10.00,
                'is_available' => true,
                'display_order' => 4,
            ],
            [
                'name' => 'Guaraná 2L',
                'description' => 'Garrafa',
                'category' => 'bebidas',
                'price' => 10.00,
                'is_available' => true,
                'display_order' => 5,
            ],
            [
                'name' => 'Coca-Cola 1L',
                'description' => 'Garrafa',
                'category' => 'bebidas',
                'price' => 7.00,
                'is_available' => true,
                'display_order' => 6,
            ],
            [
                'name' => 'Fanta 1L',
                'description' => 'Garrafa',
                'category' => 'bebidas',
                'price' => 8.00,
                'is_available' => true,
                'display_order' => 7,
            ],
            [
                'name' => 'Água Mineral c/ Gás 350ml',
                'description' => 'Garrafa',
                'category' => 'bebidas',
                'price' => 7.00,
                'is_available' => true,
                'display_order' => 8,
            ],
            [
                'name' => 'Água Mineral 350ml',
                'description' => 'Garrafa',
                'category' => 'bebidas',
                'price' => 7.50,
                'is_available' => true,
                'display_order' => 9,
            ],
            [
                'name' => 'Água Tônica 510ml',
                'description' => 'Garrafa',
                'category' => 'bebidas',
                'price' => 2.50,
                'is_available' => true,
                'display_order' => 10,
            ],
            [
                'name' => 'Água Sprite Lemon 510ml',
                'description' => 'Garrafa',
                'category' => 'bebidas',
                'price' => 2.00,
                'is_available' => true,
                'display_order' => 11,
            ],

            // Cervejas
            [
                'name' => 'LATA',
                'description' => '269 ml',
                'category' => 'cervejas',
                'price' => 4.00,
                'is_available' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'Bohemia 350ml',
                'description' => 'Lata',
                'category' => 'cervejas',
                'price' => 5.00,
                'is_available' => true,
                'display_order' => 2,
            ],
            [
                'name' => 'Antarctica Original 350ml',
                'description' => 'Lata',
                'category' => 'cervejas',
                'price' => 5.00,
                'is_available' => true,
                'display_order' => 3,
            ],
            [
                'name' => 'Brahma Duplo Malte 350ml',
                'description' => 'Lata',
                'category' => 'cervejas',
                'price' => 5.00,
                'is_available' => true,
                'display_order' => 4,
            ],
            [
                'name' => 'Itaipava 600ml',
                'description' => 'Garrafa',
                'category' => 'cervejas',
                'price' => 8.00,
                'is_available' => true,
                'display_order' => 5,
            ],
            [
                'name' => 'Antarctica Original 600ml',
                'description' => 'Garrafa',
                'category' => 'cervejas',
                'price' => 10.00,
                'is_available' => true,
                'display_order' => 6,
            ],
            [
                'name' => 'Brahma Duplo Malte 600ml',
                'description' => 'Garrafa',
                'category' => 'cervejas',
                'price' => 10.00,
                'is_available' => true,
                'display_order' => 7,
            ],

            // Sorvetes
            [
                'name' => 'BOLA DE SORVETE',
                'description' => 'Sabores a escolher',
                'category' => 'sorvetes',
                'price' => 4.50,
                'is_available' => true,
                'display_order' => 1,
            ],

            // Adicionais
            [
                'name' => 'ADICIONAL DE BATATAS',
                'description' => 'Adicional para pizzas',
                'category' => 'adicionais',
                'price' => 10.00,
                'is_available' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'ADICIONAL DE LEITE',
                'description' => 'Adicional para pizzas',
                'category' => 'adicionais',
                'price' => 3.50,
                'is_available' => true,
                'display_order' => 2,
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
                    'price' => $item['price'] ?? 0.00,
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
                'price' => $item['price'] ?? 0.00,
                'sizes' => $item['sizes'] ?? null,
                'is_available' => $item['is_available'],
                'display_order' => $item['display_order'],
            ]);
        }

        $pizzaCategoryDefaults = [
            'tradicionais' => ['MÉDIA' => 40.00, 'GRANDE' => 50.00, 'FAMÍLIA' => 60.00, 'BIG' => 72.00],
            'especiais' => ['MÉDIA' => 50.00, 'GRANDE' => 60.00, 'FAMÍLIA' => 70.00, 'BIG' => 82.00],
            'nobres' => ['MÉDIA' => 60.90, 'GRANDE' => 70.00, 'FAMÍLIA' => 82.00, 'BIG' => 100.00],
        ];

        foreach ($pizzaCategoryDefaults as $category => $sizes) {
            $items = MenuItem::query()->where('category', $category)->get();

            foreach ($items as $item) {
                $item->sizes = $sizes;
                $item->price = (float) ($sizes['MÉDIA'] ?? 0.00);
                $item->save();
            }
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

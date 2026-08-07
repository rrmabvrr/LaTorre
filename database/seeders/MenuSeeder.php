<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Product::query()->delete();
        Category::query()->delete();

        $categories = [
            [
                'name' => 'Pizzas Tradicionais',
                'slug' => 'pizzas-tradicionais',
                'description' => 'Sabores clássicos com massa artesanal e molho especial da casa.',
                'cover_image' => 'https://picsum.photos/id/1059/1200/700.webp',
                'sort_order' => 1,
                'products' => [
                    [
                        'name' => 'Calabresa Especial',
                        'short_description' => 'Mussarela, calabresa fatiada e cebola roxa fresca.',
                        'description' => 'A clássica da casa com borda crocante, molho de tomate artesanal e toque de orégano.',
                        'ingredients' => ['mussarela', 'calabresa', 'cebola', 'molho de tomate', 'oregano'],
                        'image' => 'https://picsum.photos/id/1080/1200/800.webp',
                        'is_pizza' => true,
                        'is_highlight' => true,
                        'sort_order' => 1,
                        'prices' => [
                            ['label' => 'Média', 'price' => 40.00, 'sort_order' => 1],
                            ['label' => 'Grande', 'price' => 50.00, 'sort_order' => 2],
                            ['label' => 'Família', 'price' => 60.00, 'sort_order' => 3],
                            ['label' => 'Big', 'price' => 72.00, 'sort_order' => 4],
                        ],
                    ],
                    [
                        'name' => 'Portuguesa',
                        'short_description' => 'Mussarela, presunto, ovos, cebola e azeitonas.',
                        'description' => 'Receita tradicional equilibrada com ingredientes frescos e finalização perfumada.',
                        'ingredients' => ['mussarela', 'presunto', 'ovos', 'cebola', 'azeitona'],
                        'image' => 'https://picsum.photos/id/292/1200/800.webp',
                        'is_pizza' => true,
                        'is_highlight' => false,
                        'sort_order' => 2,
                        'prices' => [
                            ['label' => 'Média', 'price' => 42.00, 'sort_order' => 1],
                            ['label' => 'Grande', 'price' => 52.00, 'sort_order' => 2],
                            ['label' => 'Família', 'price' => 62.00, 'sort_order' => 3],
                            ['label' => 'Big', 'price' => 74.00, 'sort_order' => 4],
                        ],
                    ],
                    [
                        'name' => 'Mussarela',
                        'short_description' => 'Mussarela premium e molho de tomate suave.',
                        'description' => 'Sabor puro e marcante para quem valoriza uma pizza simples e perfeita.',
                        'ingredients' => ['mussarela', 'molho de tomate', 'oregano'],
                        'image' => 'https://picsum.photos/id/431/1200/800.webp',
                        'is_pizza' => true,
                        'is_highlight' => false,
                        'sort_order' => 3,
                        'prices' => [
                            ['label' => 'Média', 'price' => 38.00, 'sort_order' => 1],
                            ['label' => 'Grande', 'price' => 48.00, 'sort_order' => 2],
                            ['label' => 'Família', 'price' => 58.00, 'sort_order' => 3],
                            ['label' => 'Big', 'price' => 70.00, 'sort_order' => 4],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Pizzas Especiais',
                'slug' => 'pizzas-especiais',
                'description' => 'Combinações exclusivas criadas para impressionar no primeiro pedaço.',
                'cover_image' => 'https://picsum.photos/id/312/1200/700.webp',
                'sort_order' => 2,
                'products' => [
                    [
                        'name' => 'Frango com Catupiry',
                        'short_description' => 'Frango desfiado, catupiry original e toque verde.',
                        'description' => 'Cremosa e muito saborosa, com equilíbrio perfeito entre frango e catupiry.',
                        'ingredients' => ['frango', 'catupiry', 'mussarela', 'oregano'],
                        'image' => 'https://picsum.photos/id/1081/1200/800.webp',
                        'is_pizza' => true,
                        'is_highlight' => true,
                        'sort_order' => 1,
                        'prices' => [
                            ['label' => 'Média', 'price' => 46.00, 'sort_order' => 1],
                            ['label' => 'Grande', 'price' => 56.00, 'sort_order' => 2],
                            ['label' => 'Família', 'price' => 66.00, 'sort_order' => 3],
                            ['label' => 'Big', 'price' => 78.00, 'sort_order' => 4],
                        ],
                    ],
                    [
                        'name' => 'Quatro Queijos',
                        'short_description' => 'Mussarela, provolone, parmesão e catupiry.',
                        'description' => 'Intensa, cremosa e com final aveludado para os amantes de queijo.',
                        'ingredients' => ['mussarela', 'provolone', 'parmesao', 'catupiry'],
                        'image' => 'https://picsum.photos/id/1060/1200/800.webp',
                        'is_pizza' => true,
                        'is_highlight' => false,
                        'sort_order' => 2,
                        'prices' => [
                            ['label' => 'Média', 'price' => 48.00, 'sort_order' => 1],
                            ['label' => 'Grande', 'price' => 58.00, 'sort_order' => 2],
                            ['label' => 'Família', 'price' => 68.00, 'sort_order' => 3],
                            ['label' => 'Big', 'price' => 80.00, 'sort_order' => 4],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Pizzas Nobres',
                'slug' => 'pizzas-nobres',
                'description' => 'Ingredientes selecionados e acabamento premium para momentos especiais.',
                'cover_image' => 'https://picsum.photos/id/835/1200/700.webp',
                'sort_order' => 3,
                'products' => [
                    [
                        'name' => 'La Torre Prime',
                        'short_description' => 'Filé mignon, cebola caramelizada e queijo especial.',
                        'description' => 'Pizza assinatura da casa, sofisticada e marcante para compartilhar.',
                        'ingredients' => ['file mignon', 'cebola caramelizada', 'queijo especial', 'molho'],
                        'image' => 'https://picsum.photos/id/1062/1200/800.webp',
                        'is_pizza' => true,
                        'is_highlight' => true,
                        'sort_order' => 1,
                        'prices' => [
                            ['label' => 'Média', 'price' => 52.00, 'sort_order' => 1],
                            ['label' => 'Grande', 'price' => 62.00, 'sort_order' => 2],
                            ['label' => 'Família', 'price' => 72.00, 'sort_order' => 3],
                            ['label' => 'Big', 'price' => 86.00, 'sort_order' => 4],
                        ],
                    ],
                    [
                        'name' => 'Camarão Premium',
                        'short_description' => 'Camarão refogado, creme especial e ervas frescas.',
                        'description' => 'Uma opção nobre com sabor do mar e textura surpreendente.',
                        'ingredients' => ['camarao', 'creme especial', 'ervas', 'mussarela'],
                        'image' => 'https://picsum.photos/id/1040/1200/800.webp',
                        'is_pizza' => true,
                        'is_highlight' => false,
                        'sort_order' => 2,
                        'prices' => [
                            ['label' => 'Média', 'price' => 55.00, 'sort_order' => 1],
                            ['label' => 'Grande', 'price' => 65.00, 'sort_order' => 2],
                            ['label' => 'Família', 'price' => 75.00, 'sort_order' => 3],
                            ['label' => 'Big', 'price' => 89.00, 'sort_order' => 4],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Tira Gosto',
                'slug' => 'tira-gosto',
                'description' => 'Perfeito para compartilhar antes da pizza ou acompanhar bebidas.',
                'cover_image' => 'https://picsum.photos/id/1082/1200/700.webp',
                'sort_order' => 4,
                'products' => [
                    [
                        'name' => 'Batata',
                        'short_description' => 'Porção de batata dourada e crocante.',
                        'description' => 'Batatas sequinhas por fora, macias por dentro e prontas para dividir.',
                        'ingredients' => ['batata', 'sal'],
                        'image' => 'https://picsum.photos/id/488/1200/800.webp',
                        'base_price' => 18.00,
                        'sort_order' => 1,
                    ],
                    [
                        'name' => 'Batata com Calabresa',
                        'short_description' => 'Batata crocante com calabresa acebolada.',
                        'description' => 'Combinação irresistível para abrir o apetite.',
                        'ingredients' => ['batata', 'calabresa', 'cebola'],
                        'image' => 'https://picsum.photos/id/292/1200/800.webp',
                        'base_price' => 28.00,
                        'sort_order' => 2,
                    ],
                    [
                        'name' => 'Calabresa',
                        'short_description' => 'Calabresa acebolada na chapa.',
                        'description' => 'Porção bem servida e temperada no ponto certo.',
                        'ingredients' => ['calabresa', 'cebola'],
                        'image' => 'https://picsum.photos/id/824/1200/800.webp',
                        'base_price' => 24.00,
                        'sort_order' => 3,
                    ],
                ],
            ],
            [
                'name' => 'Sucos Naturais',
                'slug' => 'sucos-naturais',
                'description' => 'Sucos naturais refrescantes em sabores regionais.',
                'cover_image' => 'https://picsum.photos/id/429/1200/700.webp',
                'sort_order' => 5,
                'products' => [
                    ['name' => 'Suco de Maracujá', 'sort_order' => 1],
                    ['name' => 'Suco de Cupuaçu', 'sort_order' => 2],
                    ['name' => 'Suco de Acerola', 'sort_order' => 3],
                    ['name' => 'Suco de Goiaba', 'sort_order' => 4],
                    ['name' => 'Suco de Graviola', 'sort_order' => 5],
                    ['name' => 'Suco de Taperebá', 'sort_order' => 6],
                ],
            ],
            [
                'name' => 'Bebidas',
                'slug' => 'bebidas',
                'description' => 'Refrigerantes e águas geladas para acompanhar seu pedido.',
                'cover_image' => 'https://picsum.photos/id/1084/1200/700.webp',
                'sort_order' => 6,
                'products' => [
                    [
                        'name' => 'Coca-Cola 350ml',
                        'short_description' => 'Refrigerante lata bem gelado.',
                        'description' => 'Refrigerantes disponíveis em versões normal e zero.',
                        'ingredients' => ['refrigerantes'],
                        'image' => 'https://picsum.photos/id/1064/1200/800.webp',
                        'base_price' => 7.00,
                        'sort_order' => 1,
                    ],
                    [
                        'name' => 'Guaraná 1L',
                        'short_description' => 'Refrigerante família para compartilhar.',
                        'description' => 'Ideal para pedidos maiores e momentos em família.',
                        'ingredients' => ['refrigerantes'],
                        'image' => 'https://picsum.photos/id/1061/1200/800.webp',
                        'base_price' => 10.00,
                        'sort_order' => 2,
                    ],
                    [
                        'name' => 'Água Mineral 500ml',
                        'short_description' => 'Com gás ou sem gás.',
                        'description' => 'Hidratação na medida certa com água bem gelada.',
                        'ingredients' => ['aguas'],
                        'image' => 'https://picsum.photos/id/68/1200/800.webp',
                        'base_price' => 4.00,
                        'sort_order' => 3,
                    ],
                ],
            ],
            [
                'name' => 'Cervejas',
                'slug' => 'cervejas',
                'description' => 'Long neck e litrão sempre gelados para harmonizar com pizza.',
                'cover_image' => 'https://picsum.photos/id/1076/1200/700.webp',
                'sort_order' => 7,
                'products' => [
                    [
                        'name' => 'Heineken Long Neck',
                        'short_description' => 'Cerveja puro malte 330ml.',
                        'description' => 'Servida sempre gelada para melhor experiência.',
                        'ingredients' => ['cervejas'],
                        'image' => 'https://picsum.photos/id/100/1200/800.webp',
                        'base_price' => 9.00,
                        'sort_order' => 1,
                    ],
                    [
                        'name' => 'Skol Lata 350ml',
                        'short_description' => 'Leve, refrescante e popular.',
                        'description' => 'Excelente custo-benefício para a turma.',
                        'ingredients' => ['cervejas'],
                        'image' => 'https://picsum.photos/id/1025/1200/800.webp',
                        'base_price' => 6.50,
                        'sort_order' => 2,
                    ],
                ],
            ],
            [
                'name' => 'Sorvetes',
                'slug' => 'sorvetes',
                'description' => 'Final perfeito para a refeição com sabores cremosos e refrescantes.',
                'cover_image' => 'https://picsum.photos/id/431/1200/700.webp',
                'sort_order' => 8,
                'products' => [
                    [
                        'name' => 'Sorvete por Bola',
                        'short_description' => 'Escolha seu sabor favorito.',
                        'description' => 'Sabores variados disponíveis diariamente no balcão.',
                        'ingredients' => ['sorvetes'],
                        'image' => 'https://picsum.photos/id/493/1200/800.webp',
                        'base_price' => 3.50,
                        'is_highlight' => true,
                        'sort_order' => 1,
                    ],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $products = $categoryData['products'];
            unset($categoryData['products']);

            $category = Category::query()->create($categoryData);

            foreach ($products as $productData) {
                $prices = $productData['prices'] ?? [];
                unset($productData['prices']);

                $productData['slug'] = str($productData['name'])->slug();
                $productData['description'] = $productData['description'] ?? $productData['short_description'] ?? null;
                $productData['short_description'] = $productData['short_description'] ?? 'Preparado com ingredientes selecionados da La Torre.';
                $productData['ingredients'] = $productData['ingredients'] ?? [str($category->name)->lower()->toString()];
                $productData['image'] = $productData['image'] ?? $category->cover_image;
                $productData['is_pizza'] = $productData['is_pizza'] ?? false;
                $productData['is_highlight'] = $productData['is_highlight'] ?? false;

                $product = $category->products()->create($productData);

                if ($category->slug === 'sucos-naturais') {
                    $prices = [
                        ['label' => 'Copo', 'price' => 7.00, 'sort_order' => 1],
                        ['label' => 'Jarra', 'price' => 12.00, 'sort_order' => 2],
                        ['label' => 'Adicional de leite', 'price' => 3.00, 'sort_order' => 3],
                    ];
                }

                if ($prices !== []) {
                    $product->prices()->createMany($prices);
                }
            }
        }
    }
}

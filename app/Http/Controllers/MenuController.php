<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\View\View;

class MenuController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $categories = [
            'tradicionais' => [
                'nav' => 'TRADICIONAIS',
                'title' => 'Pizzas Tradicionais',
                'description' => 'Clássicos que conquistam paladares',
                'icon' => '🍕',
                'cardClass' => '',
            ],
            'especiais' => [
                'nav' => 'ESPECIAIS',
                'title' => 'Pizzas Especiais',
                'description' => 'Criações exclusivas do nosso pizzaiolo',
                'icon' => '⭐',
                'cardClass' => 'especial',
            ],
            'nobres' => [
                'nav' => 'NOBRES',
                'title' => 'Pizzas Nobres',
                'description' => 'Sabor refinado para ocasiões especiais',
                'icon' => '👑',
                'cardClass' => 'premium',
            ],
            'sucos_naturais' => [
                'nav' => 'SUCOS NATURAIS',
                'title' => 'Sucos Naturais',
                'description' => 'Refrescância e sabor natural',
                'icon' => '🥤',
                'cardClass' => 'bebida',
            ],
            'tira_gosto' => [
                'nav' => 'TIRA GOSTO',
                'title' => 'Tira Gosto',
                'description' => 'Petiscos para acompanhar',
                'icon' => '🍽️',
                'cardClass' => 'bebida',
            ],
            'bebidas' => [
                'nav' => 'BEBIDAS',
                'title' => 'Bebidas',
                'description' => 'Para acompanhar sua pizza',
                'icon' => '🥤',
                'cardClass' => 'bebida',
            ],
            'cervejas' => [
                'nav' => 'CERVEJAS',
                'title' => 'Cervejas',
                'description' => 'Geladas para alegrar o momento',
                'icon' => '🍺',
                'cardClass' => 'bebida',
            ],
            'sorvetes' => [
                'nav' => 'SORVETES',
                'title' => 'Sorvetes',
                'description' => 'Refrescância em cada colherada',
                'icon' => '🍨',
                'cardClass' => 'sorvete',
            ],
        ];

        $pizzaSizes = [
            'MÉDIA' => 39.90,
            'GRANDE' => 49.90,
            'FAMÍLIA' => 69.90,
            'BIG' => 89.90,
        ];

        $defaultItems = [
            'tradicionais' => [
                ['name' => 'Mussarela', 'description' => 'Molho de tomate, mussarela e orégano', 'sizes' => $pizzaSizes],
                ['name' => 'Calabresa', 'description' => 'Calabresa, cebola e mussarela', 'sizes' => array_map(fn($price) => $price + 5.00, $pizzaSizes)],
                ['name' => 'Frango com Catupiry', 'description' => 'Frango desfiado e catupiry', 'sizes' => array_map(fn($price) => $price + 7.50, $pizzaSizes)],
                ['name' => 'Pepperoni', 'description' => 'Pepperoni artesanal e mussarela', 'sizes' => array_map(fn($price) => $price + 8.00, $pizzaSizes)],
            ],
            'especiais' => [
                ['name' => 'Camarão', 'description' => 'Camarão com catupiry e cebolinha', 'sizes' => ['MÉDIA' => 44.90, 'GRANDE' => 54.90, 'FAMÍLIA' => 74.90, 'BIG' => 94.90]],
                ['name' => '4 Queijos', 'description' => 'Muçarela, catupiry, parmesão e gorgonzola', 'sizes' => ['MÉDIA' => 46.90, 'GRANDE' => 56.90, 'FAMÍLIA' => 76.90, 'BIG' => 96.90]],
                ['name' => 'Portuguesa', 'description' => 'Presunto, cebola, ovo e azeitona', 'sizes' => ['MÉDIA' => 45.90, 'GRANDE' => 55.90, 'FAMÍLIA' => 75.90, 'BIG' => 95.90]],
                ['name' => 'Brócolis com Bacon', 'description' => 'Brócolis, bacon e queijo', 'sizes' => ['MÉDIA' => 47.90, 'GRANDE' => 57.90, 'FAMÍLIA' => 77.90, 'BIG' => 97.90]],
            ],
            'nobres' => [
                ['name' => 'Trufada', 'description' => 'Molho trufado e queijo premium', 'sizes' => ['MÉDIA' => 49.90, 'GRANDE' => 59.90, 'FAMÍLIA' => 79.90, 'BIG' => 99.90]],
                ['name' => 'Alho e Óleo', 'description' => 'Alho, óleo e parmesão', 'sizes' => ['MÉDIA' => 48.90, 'GRANDE' => 58.90, 'FAMÍLIA' => 78.90, 'BIG' => 98.90]],
                ['name' => 'Mignon com Gorgonzola', 'description' => 'Mignon, gorgonzola e rúcula', 'sizes' => ['MÉDIA' => 52.90, 'GRANDE' => 62.90, 'FAMÍLIA' => 84.90, 'BIG' => 104.90]],
                ['name' => 'Salmão', 'description' => 'Salmão, cream cheese e cebola roxa', 'sizes' => ['MÉDIA' => 54.90, 'GRANDE' => 64.90, 'FAMÍLIA' => 86.90, 'BIG' => 106.90]],
            ],
            'sucos_naturais' => [
                ['name' => 'Laranja', 'description' => 'Suco natural de laranja', 'sizes' => ['COPO' => 12.00, 'JARRA' => 24.00, 'ADICIONAL DE LEITE' => 5.00]],
                ['name' => 'Morango', 'description' => 'Suco natural de morango', 'sizes' => ['COPO' => 12.00, 'JARRA' => 24.00, 'ADICIONAL DE LEITE' => 5.00]],
                ['name' => 'Maracujá', 'description' => 'Suco natural de maracujá', 'sizes' => ['COPO' => 12.00, 'JARRA' => 24.00, 'ADICIONAL DE LEITE' => 5.00]],
                ['name' => 'Abacaxi', 'description' => 'Suco natural de abacaxi', 'sizes' => ['COPO' => 12.00, 'JARRA' => 24.00, 'ADICIONAL DE LEITE' => 5.00]],
                ['name' => 'Acerola', 'description' => 'Suco natural de acerola', 'sizes' => ['COPO' => 12.00, 'JARRA' => 24.00, 'ADICIONAL DE LEITE' => 5.00]],
                ['name' => 'Limão', 'description' => 'Suco natural de limão', 'sizes' => ['COPO' => 12.00, 'JARRA' => 24.00, 'ADICIONAL DE LEITE' => 5.00]],
            ],
            'tira_gosto' => [
                ['name' => 'Porção de Batata Frita', 'description' => 'Porção crocante de batata frita', 'price' => 18.90],
                ['name' => 'Porção de Calabresa', 'description' => 'Calabresa frita com molho', 'price' => 24.90],
                ['name' => 'Porção de Cebola', 'description' => 'Cebola empanada e crocante', 'price' => 19.90],
                ['name' => 'Porção de Frango', 'description' => 'Frango crocante em tiras', 'price' => 26.90],
                ['name' => 'Anéis de Cebola', 'description' => 'Anéis de cebola dourados', 'price' => 21.90],
                ['name' => 'Porção Mista', 'description' => 'Mix de tira gosto da casa', 'price' => 29.90],
            ],
            'bebidas' => [
                ['name' => 'Refrigerante 600ml', 'description' => 'Lata ou garrafa', 'price' => 8.00],
                ['name' => 'Água Mineral 500ml', 'description' => 'Com gás ou sem gás', 'price' => 6.00],
            ],
            'cervejas' => [
                ['name' => 'LONG NECK', 'description' => 'Cerveja gelada', 'price' => 14.90],
                ['name' => 'LATA 350ml', 'description' => 'Cerveja gelada', 'price' => 9.90],
            ],
            'sorvetes' => [
                ['name' => 'Casquinha', 'description' => 'Sabor de escolha', 'price' => 8.00],
                ['name' => 'Taça', 'description' => 'Sabor de escolha', 'price' => 12.00],
            ],
        ];

        try {
            $groupedItems = MenuItem::query()
                ->where('is_available', true)
                ->orderBy('category')
                ->orderBy('display_order')
                ->orderBy('name')
                ->get()
                ->groupBy('category');
        } catch (\Throwable) {
            $groupedItems = collect();
        }

        foreach ($defaultItems as $categoryKey => $items) {
            if (! $groupedItems->has($categoryKey) || $groupedItems->get($categoryKey)->isEmpty()) {
                $groupedItems->put($categoryKey, collect($items));
            }
        }

        $extraBatataItem = MenuItem::query()
            ->where('category', 'adicionais')
            ->where('is_available', true)
            ->orderBy('display_order')
            ->first();

        return view('cardapio', [
            'categories' => $categories,
            'groupedItems' => $groupedItems,
            'extraBatataItem' => $extraBatataItem,
        ]);
    }
}

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

        $pizzaCategories = ['tradicionais', 'especiais', 'nobres'];
        $categoryPizzaSizes = [];

        foreach ($pizzaCategories as $cat) {
            try {
                $sample = MenuItem::query()
                    ->where('category', $cat)
                    ->whereNotNull('sizes')
                    ->first();

                if ($sample && ! empty($sample->sizes) && is_array($sample->sizes)) {
                    $categoryPizzaSizes[$cat] = $sample->sizes;
                }
            } catch (\Throwable) {
                // Ignore DB connection errors if any
            }
        }

        $defaultItems = [
            'tradicionais' => [
                ['name' => 'Mussarela', 'description' => 'Molho de tomate, mussarela e orégano', 'sizes' => $categoryPizzaSizes['tradicionais'] ?? null],
                ['name' => 'Calabresa', 'description' => 'Calabresa, cebola e mussarela', 'sizes' => $categoryPizzaSizes['tradicionais'] ?? null],
                ['name' => 'Frango com Catupiry', 'description' => 'Frango desfiado e catupiry', 'sizes' => $categoryPizzaSizes['tradicionais'] ?? null],
                ['name' => 'Pepperoni', 'description' => 'Pepperoni artesanal e mussarela', 'sizes' => $categoryPizzaSizes['tradicionais'] ?? null],
            ],
            'especiais' => [
                ['name' => 'Camarão', 'description' => 'Camarão com catupiry e cebolinha', 'sizes' => $categoryPizzaSizes['especiais'] ?? null],
                ['name' => '4 Queijos', 'description' => 'Muçarela, catupiry, parmesão e gorgonzola', 'sizes' => $categoryPizzaSizes['especiais'] ?? null],
                ['name' => 'Portuguesa', 'description' => 'Presunto, cebola, ovo e azeitona', 'sizes' => $categoryPizzaSizes['especiais'] ?? null],
                ['name' => 'Brócolis com Bacon', 'description' => 'Brócolis, bacon e queijo', 'sizes' => $categoryPizzaSizes['especiais'] ?? null],
            ],
            'nobres' => [
                ['name' => 'Trufada', 'description' => 'Molho trufado e queijo premium', 'sizes' => $categoryPizzaSizes['nobres'] ?? null],
                ['name' => 'Alho e Óleo', 'description' => 'Alho, óleo e parmesão', 'sizes' => $categoryPizzaSizes['nobres'] ?? null],
                ['name' => 'Mignon com Gorgonzola', 'description' => 'Mignon, gorgonzola e rúcula', 'sizes' => $categoryPizzaSizes['nobres'] ?? null],
                ['name' => 'Salmão', 'description' => 'Salmão, cream cheese e cebola roxa', 'sizes' => $categoryPizzaSizes['nobres'] ?? null],
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

        foreach ($pizzaCategories as $cat) {
            if (isset($categoryPizzaSizes[$cat]) && $groupedItems->has($cat)) {
                foreach ($groupedItems->get($cat) as $item) {
                    if (is_object($item)) {
                        $item->sizes = $categoryPizzaSizes[$cat];
                        $item->price = $categoryPizzaSizes[$cat]['MÉDIA'] ?? $item->price;
                    }
                }
            }
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

        $extraBatataConfig = [
            'name' => $extraBatataItem?->name ?? 'ADICIONAL DE BATATAS',
            'price' => (float) ($extraBatataItem?->price ?? 7.00),
        ];

        return view('cardapio', [
            'categories' => $categories,
            'groupedItems' => $groupedItems,
            'categoryPizzaSizes' => $categoryPizzaSizes,
            'extraBatataItem' => $extraBatataItem,
            'extraBatataConfig' => $extraBatataConfig,
        ]);
    }
}

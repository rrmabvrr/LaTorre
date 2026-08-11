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
                'description' => 'Classicos que conquistam paladares',
                'icon' => '🍕',
                'cardClass' => '',
            ],
            'especiais' => [
                'nav' => 'ESPECIAIS',
                'title' => 'Pizzas Especiais',
                'description' => 'Criacoes exclusivas do nosso pizzaiolo',
                'icon' => '⭐',
                'cardClass' => 'especial',
            ],
            'premium' => [
                'nav' => 'PREMIUM',
                'title' => 'Pizzas Premium',
                'description' => 'Para momentos especiais',
                'icon' => '👑',
                'cardClass' => 'premium',
            ],
            'doces' => [
                'nav' => 'DOCES',
                'title' => 'Pizzas Doces',
                'description' => 'Sobremesas irresistiveis',
                'icon' => '🍫',
                'cardClass' => 'doce',
            ],
            'bebidas' => [
                'nav' => 'BEBIDAS',
                'title' => 'Bebidas',
                'description' => 'Para acompanhar sua pizza',
                'icon' => '🥤',
                'cardClass' => 'bebida',
            ],
            'sorvetes' => [
                'nav' => 'SORVETES',
                'title' => 'Sorvetes',
                'description' => 'Refrescancia em cada colherada',
                'icon' => '🍨',
                'cardClass' => 'sorvete',
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

        return view('welcome', [
            'categories' => $categories,
            'groupedItems' => $groupedItems,
        ]);
    }
}

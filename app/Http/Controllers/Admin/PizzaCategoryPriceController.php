<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PizzaCategoryPriceController extends Controller
{
    /**
     * @var array<string, string>
     */
    private const CATEGORIES = [
        'tradicionais' => 'Pizzas Tradicionais',
        'especiais' => 'Pizzas Especiais',
        'nobres' => 'Pizzas Nobres',
    ];

    /**
     * @var array<int, string>
     */
    private const SIZES = ['MÉDIA', 'GRANDE', 'FAMÍLIA', 'BIG'];

    /**
     * @return View
     */
    public function index(): View
    {
        $categoriesData = [];

        foreach (self::CATEGORIES as $key => $label) {
            $items = MenuItem::query()
                ->where('category', $key)
                ->orderBy('display_order')
                ->orderBy('name')
                ->get();

            $currentSizes = [];
            foreach ($items as $item) {
                if (! empty($item->sizes) && is_array($item->sizes)) {
                    foreach (self::SIZES as $size) {
                        if (isset($item->sizes[$size])) {
                            $currentSizes[$size] = (float) $item->sizes[$size];
                        }
                    }
                    break;
                }
            }

            $categoriesData[$key] = [
                'key' => $key,
                'label' => $label,
                'sizes' => $currentSizes,
                'items' => $items,
                'item_count' => $items->count(),
            ];
        }

        return view('admin.pizza-prices.index', [
            'categoriesData' => $categoriesData,
            'sizes' => self::SIZES,
        ]);
    }

    /**
     * @param Request $request
     * @param string $category
     * @return RedirectResponse
     */
    public function update(Request $request, string $category): RedirectResponse
    {
        if (! array_key_exists($category, self::CATEGORIES)) {
            abort(404);
        }

        $rules = [
            'sizes' => ['required', 'array'],
        ];

        foreach (self::SIZES as $size) {
            $rules["sizes.$size"] = ['required', 'numeric', 'min:0'];
        }

        $validated = $request->validate($rules);

        $orderedSizes = [];
        foreach (self::SIZES as $size) {
            $orderedSizes[$size] = (float) $validated['sizes'][$size];
        }

        $mediaPrice = $orderedSizes['MÉDIA'] ?? 0;

        $items = MenuItem::query()->where('category', $category)->get();

        foreach ($items as $item) {
            $item->sizes = $orderedSizes;
            $item->price = $mediaPrice;
            $item->save();
        }

        $categoryName = self::CATEGORIES[$category];
        $count = $items->count();

        return redirect()
            ->route('admin.pizza-prices.index')
            ->with('success', "Preços da categoria \"{$categoryName}\" atualizados com sucesso! ({$count} pizzas atualizadas)");
    }
}

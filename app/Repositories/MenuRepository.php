<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class MenuRepository
{
    public function categoriesWithProducts(): Collection
    {
        return Cache::remember(
            'menu.categories.with-products',
            now()->addHours(6),
            fn(): Collection => Category::query()
                ->with([
                    'products' => fn($query) => $query->orderBy('sort_order'),
                    'products.prices',
                ])
                ->orderBy('sort_order')
                ->get()
        );
    }

    public function featuredProducts(int $limit = 6): Collection
    {
        return Cache::remember(
            "menu.products.featured.{$limit}",
            now()->addHours(6),
            fn(): Collection => Product::query()
                ->with(['category', 'prices'])
                ->where('is_highlight', true)
                ->orderBy('sort_order')
                ->take($limit)
                ->get()
        );
    }
}

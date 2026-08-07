<?php

namespace App\ViewModels;

use Illuminate\Support\Collection;

class MenuViewModel
{
    public function __construct(private readonly Collection $categories) {}

    public function products(): Collection
    {
        return $this->categories
            ->flatMap(function ($category) {
                return $category->products->map(function ($product) use ($category) {
                    return [
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug,
                        'short_description' => $product->short_description,
                        'description' => $product->description,
                        'ingredients' => $product->ingredients ?? [],
                        'image' => $product->image,
                        'category' => [
                            'name' => $category->name,
                            'slug' => $category->slug,
                        ],
                        'is_pizza' => (bool) $product->is_pizza,
                        'base_price' => $product->base_price,
                        'prices' => $product->prices->map(fn($price) => [
                            'label' => $price->label,
                            'price' => number_format((float) $price->price, 2, ',', '.'),
                            'value' => (float) $price->price,
                        ])->values()->all(),
                    ];
                });
            })
            ->values();
    }

    public function productsJson(): string
    {
        return $this->products()->toJson(JSON_UNESCAPED_UNICODE);
    }
}

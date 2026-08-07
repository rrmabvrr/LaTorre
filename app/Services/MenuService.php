<?php

namespace App\Services;

use App\Repositories\MenuRepository;

class MenuService
{
    public function __construct(private readonly MenuRepository $menuRepository) {}

    /**
     * @return array{categories: \Illuminate\Support\Collection, featuredProducts: \Illuminate\Support\Collection}
     */
    public function forHome(): array
    {
        return [
            'categories' => $this->menuRepository->categoriesWithProducts(),
            'featuredProducts' => $this->menuRepository->featuredProducts(),
        ];
    }

    /**
     * @return array{categories: \Illuminate\Support\Collection}
     */
    public function forMenu(): array
    {
        return [
            'categories' => $this->menuRepository->categoriesWithProducts(),
        ];
    }
}

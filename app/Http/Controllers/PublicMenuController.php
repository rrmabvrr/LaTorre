<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use App\ViewModels\MenuViewModel;
use Illuminate\Contracts\View\View;

class PublicMenuController extends Controller
{
    public function __construct(private readonly MenuService $menuService) {}

    public function home(): View
    {
        $data = $this->menuService->forHome();

        return view('pages.home', [
            'categories' => $data['categories'],
            'featuredProducts' => $data['featuredProducts'],
        ]);
    }

    public function menu(): View
    {
        $data = $this->menuService->forMenu();
        $viewModel = new MenuViewModel($data['categories']);

        return view('pages.menu', [
            'categories' => $data['categories'],
            'products' => $viewModel->products(),
            'productsJson' => $viewModel->productsJson(),
        ]);
    }
}

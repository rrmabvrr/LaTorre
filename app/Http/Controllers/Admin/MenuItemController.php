<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class MenuItemController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $categories = $this->categories();
        $search = trim((string) $request->query('search', ''));
        $category = (string) $request->query('category', '');

        if (! array_key_exists($category, $categories)) {
            $category = '';
        }

        $itemsQuery = MenuItem::query();

        if ($search !== '') {
            $itemsQuery->where(function ($query) use ($search): void {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($category !== '') {
            $itemsQuery->where('category', $category);
        }

        $items = $itemsQuery
            ->orderBy('category')
            ->orderBy('display_order')
            ->orderBy('name')
            ->paginate(20)
            ->withQueryString();

        return view('admin.items.index', [
            'items' => $items,
            'categories' => $categories,
            'filters' => [
                'search' => $search,
                'category' => $category,
            ],
        ]);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function create(Request $request): View
    {
        $item = new MenuItem();
        $selectedCat = (string) $request->query('category', 'tradicionais');
        if (array_key_exists($selectedCat, $this->categories())) {
            $item->category = $selectedCat;
        }

        if (in_array($item->category, ['tradicionais', 'especiais', 'nobres'], true)) {
            $sample = MenuItem::query()
                ->where('category', $item->category)
                ->whereNotNull('sizes')
                ->first();

            if ($sample && ! empty($sample->sizes)) {
                $item->sizes = $sample->sizes;
            }
        }

        return view('admin.items.create', [
            'item' => $item,
            'categories' => $this->categories(),
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        MenuItem::create($data);

        return redirect()
            ->route('admin.items.index')
            ->with('success', 'Item criado com sucesso.');
    }

    /**
     * @param MenuItem $item
     * @return View
     */
    public function edit(MenuItem $item): View
    {
        return view('admin.items.edit', [
            'item' => $item,
            'categories' => $this->categories(),
        ]);
    }

    /**
     * @param Request $request
     * @param MenuItem $item
     * @return RedirectResponse
     */
    public function update(Request $request, MenuItem $item): RedirectResponse
    {
        $data = $this->validatedData($request);
        $item->update($data);

        return redirect()
            ->route('admin.items.index')
            ->with('success', 'Item atualizado com sucesso.');
    }

    /**
     * @param MenuItem $item
     * @return RedirectResponse
     */
    public function destroy(MenuItem $item): RedirectResponse
    {
        $item->delete();

        return redirect()
            ->route('admin.items.index')
            ->with('success', 'Item removido com sucesso.');
    }

    /**
     * @return array<string, string>
     */
    private function categories(): array
    {
        return [
            'tradicionais' => 'Tradicionais',
            'especiais' => 'Especiais',
            'nobres' => 'Nobres',
            'sucos_naturais' => 'Sucos Naturais',
            'tira_gosto' => 'Tira Gosto',
            'bebidas' => 'Bebidas',
            'cervejas' => 'Cervejas',
            'sorvetes' => 'Sorvetes',
            'adicionais' => 'Adicionais',
        ];
    }

    /**
     * @return array<int, string>
     */
    private function pizzaSizes(): array
    {
        return ['MÉDIA', 'GRANDE', 'FAMÍLIA', 'BIG'];
    }

    /**
     * @return array<int, string>
     */
    private function juiceSizes(): array
    {
        return ['COPO', 'JARRA', 'ADICIONAL DE LEITE'];
    }

    /**
     * @param Request $request
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        $pizzaCategories = ['tradicionais', 'especiais', 'nobres'];
        $sizeCategories = ['tradicionais', 'especiais', 'nobres', 'sucos_naturais'];
        $rules = [
            'name' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string', 'max:1200'],
            'category' => ['required', Rule::in(array_keys($this->categories()))],
            'display_order' => ['required', 'integer', 'min:0', 'max:9999'],
            'is_available' => ['sometimes', 'boolean'],
        ];

        if (in_array($request->input('category'), $sizeCategories, true)) {
            $rules['price'] = ['nullable', 'numeric', 'min:0'];
            $rules['sizes'] = ['nullable', 'array'];

            $sizeKeys = in_array($request->input('category'), $pizzaCategories, true)
                ? $this->pizzaSizes()
                : $this->juiceSizes();

            foreach ($sizeKeys as $size) {
                $rules["sizes.$size"] = ['nullable', 'numeric', 'min:0'];
            }
        } else {
            $rules['price'] = ['required', 'numeric', 'min:0'];
        }

        $data = $request->validate($rules);

        if (in_array($data['category'], $sizeCategories, true)) {
            $sizeKeys = in_array($data['category'], $pizzaCategories, true)
                ? $this->pizzaSizes()
                : $this->juiceSizes();

            $orderedSizes = [];

            foreach ($sizeKeys as $size) {
                if (isset($data['sizes'][$size]) && (float) $data['sizes'][$size] > 0) {
                    $orderedSizes[$size] = (float) $data['sizes'][$size];
                }
            }

            if (in_array($data['category'], $pizzaCategories, true) && empty($orderedSizes)) {
                $sample = MenuItem::query()
                    ->where('category', $data['category'])
                    ->whereNotNull('sizes')
                    ->first();

                if ($sample && ! empty($sample->sizes) && is_array($sample->sizes)) {
                    $orderedSizes = $sample->sizes;
                }
            }

            $data['sizes'] = $orderedSizes;

            if (in_array($data['category'], $pizzaCategories, true)) {
                $data['price'] = $orderedSizes['MÉDIA'] ?? $data['price'] ?? 0;
            } elseif (isset($orderedSizes['COPO'])) {
                $data['price'] = $orderedSizes['COPO'];
            }
        }

        $data['is_available'] = $request->boolean('is_available');

        return $data;
    }
}

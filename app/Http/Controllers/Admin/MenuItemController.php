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
     * @return View
     */
    public function index(): View
    {
        $items = MenuItem::query()
            ->orderBy('category')
            ->orderBy('display_order')
            ->orderBy('name')
            ->paginate(20);

        return view('admin.items.index', [
            'items' => $items,
            'categories' => $this->categories(),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.items.create', [
            'item' => new MenuItem(),
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
     * @param Request $request
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        $pizzaCategories = ['tradicionais', 'especiais', 'nobres'];
        $rules = [
            'name' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string', 'max:1200'],
            'category' => ['required', Rule::in(array_keys($this->categories()))],
            'display_order' => ['required', 'integer', 'min:0', 'max:9999'],
            'is_available' => ['sometimes', 'boolean'],
        ];

        if (in_array($request->input('category'), $pizzaCategories, true)) {
            $rules['price'] = ['nullable', 'numeric', 'min:0'];
            $rules['sizes'] = ['nullable', 'array'];

            foreach ($this->pizzaSizes() as $size) {
                $rules["sizes.$size"] = ['nullable', 'numeric', 'min:0'];
            }
        } else {
            $rules['price'] = ['required', 'numeric', 'min:0'];
        }

        $data = $request->validate($rules);

        if (in_array($data['category'], $pizzaCategories, true)) {
            $orderedSizes = [];

            foreach ($this->pizzaSizes() as $size) {
                if (isset($data['sizes'][$size]) && (float) $data['sizes'][$size] > 0) {
                    $orderedSizes[$size] = (float) $data['sizes'][$size];
                }
            }

            $data['sizes'] = $orderedSizes;
            $data['price'] = $orderedSizes['MÉDIA'] ?? $data['price'] ?? 0;
        }

        $data['is_available'] = $request->boolean('is_available');

        return $data;
    }
}

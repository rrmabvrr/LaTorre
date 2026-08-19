<?php

namespace Tests\Feature;

use App\Models\MenuItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MenuItemIndexFilterTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_filter_item_list_by_search_and_category(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@latorre.com',
            'password' => 'admin123',
        ]);

        MenuItem::query()->create([
            'name' => 'Suco Laranja Especial',
            'description' => 'Natural sem açucar',
            'category' => 'sucos_naturais',
            'price' => 12.00,
            'display_order' => 1,
            'is_available' => true,
        ]);

        MenuItem::query()->create([
            'name' => 'Calabresa Picante',
            'description' => 'Pizza especial da casa',
            'category' => 'especiais',
            'price' => 49.90,
            'display_order' => 1,
            'is_available' => true,
        ]);

        MenuItem::query()->create([
            'name' => 'Suco de Morango',
            'description' => 'Com gelo',
            'category' => 'sucos_naturais',
            'price' => 12.00,
            'display_order' => 2,
            'is_available' => true,
        ]);

        $this->actingAs($user)
            ->get(route('admin.items.index'))
            ->assertOk()
            ->assertDontSee('Limpar');

        $this->actingAs($user)
            ->get(route('admin.items.index', [
                'search' => 'Laranja',
                'category' => 'sucos_naturais',
            ]))
            ->assertOk()
            ->assertSee('Suco Laranja Especial')
            ->assertDontSee('Calabresa Picante')
            ->assertDontSee('Suco de Morango')
            ->assertSee('Limpar');
    }
}

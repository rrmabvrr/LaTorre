<?php

namespace Tests\Feature;

use App\Models\MenuItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MenuExtraItemTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_has_adicional_de_batatas_category_for_price_edit(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@latorre.com',
            'password' => 'admin123',
        ]);

        $this->actingAs($user)
            ->get(route('admin.items.create'))
            ->assertOk()
            ->assertSee('Adicionais');
    }

    public function test_menu_exposes_extra_batata_config_for_comanda(): void
    {
        $this->get(route('welcome'))
            ->assertOk()
            ->assertSee('Adicional de batatas')
            ->assertSee('window.extraBatataConfig');
    }

    public function test_admin_allows_editing_suco_natural_sizes_and_values(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@latorre.com',
            'password' => 'admin123',
        ]);

        $item = MenuItem::query()->create([
            'name' => 'Suco natural',
            'description' => 'Suco natural da casa',
            'category' => 'sucos_naturais',
            'price' => 12.00,
            'sizes' => [
                'COPO' => 12.00,
                'JARRA' => 24.00,
                'ADICIONAL DE LEITE' => 5.00,
            ],
            'is_available' => true,
            'display_order' => 1,
        ]);

        $this->actingAs($user)
            ->get(route('admin.items.edit', $item))
            ->assertOk()
            ->assertSee('COPO')
            ->assertSee('JARRA')
            ->assertSee('ADICIONAL DE LEITE');
    }

    public function test_menu_has_six_suco_flavors_with_three_size_values(): void
    {
        $this->get(route('welcome'))
            ->assertOk()
            ->assertSee('Laranja')
            ->assertSee('Morango')
            ->assertSee('Maracujá')
            ->assertSee('COPO')
            ->assertSee('JARRA')
            ->assertSee('ADICIONAL DE LEITE');
    }

    public function test_menu_has_six_tira_gosto_options(): void
    {
        $this->get(route('welcome'))
            ->assertOk()
            ->assertSee('Porção de Batata Frita')
            ->assertSee('Porção de Calabresa')
            ->assertSee('Porção de Cebola')
            ->assertSee('Porção de Frango')
            ->assertSee('Anéis de Cebola')
            ->assertSee('Porção Mista');
    }

    public function test_tira_gosto_items_show_visible_price_in_card_footer(): void
    {
        $this->get(route('welcome'))
            ->assertOk()
            ->assertSee('R$ 18,90')
            ->assertSee('R$ 29,90');
    }

    public function test_database_seeder_realigns_tira_gosto_admin_items(): void
    {
        MenuItem::query()->create([
            'name' => 'PORÇÃO',
            'description' => 'Item antigo',
            'category' => 'tira_gosto',
            'price' => 18.90,
            'is_available' => true,
            'display_order' => 1,
        ]);

        $this->seed();

        $names = MenuItem::query()
            ->where('category', 'tira_gosto')
            ->pluck('name')
            ->toArray();

        $this->assertContains('Porção de Batata Frita', $names);
        $this->assertContains('Porção de Calabresa', $names);
        $this->assertContains('Porção de Cebola', $names);
        $this->assertContains('Porção de Frango', $names);
        $this->assertContains('Anéis de Cebola', $names);
        $this->assertContains('Porção Mista', $names);
        $this->assertNotContains('PORÇÃO', $names);
    }

    public function test_public_menu_reflects_updated_suco_values_after_admin_edit(): void
    {
        $item = MenuItem::query()->create([
            'name' => 'Laranja',
            'description' => 'Suco natural da casa',
            'category' => 'sucos_naturais',
            'price' => 12.00,
            'sizes' => [
                'COPO' => 12.00,
                'JARRA' => 24.00,
                'ADICIONAL DE LEITE' => 5.00,
            ],
            'is_available' => true,
            'display_order' => 1,
        ]);

        $item->update([
            'sizes' => [
                'COPO' => 15.00,
                'JARRA' => 28.00,
                'ADICIONAL DE LEITE' => 7.00,
            ],
        ]);

        $this->get(route('welcome'))
            ->assertOk()
            ->assertSee('R$ 15,00')
            ->assertSee('R$ 28,00')
            ->assertSee('R$ 7,00');
    }
}

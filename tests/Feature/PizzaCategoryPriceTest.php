<?php

namespace Tests\Feature;

use App\Models\MenuItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PizzaCategoryPriceTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_pizza_category_prices_page(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@latorre.com',
            'password' => 'admin123',
        ]);

        MenuItem::query()->create([
            'name' => 'Calabresa',
            'description' => 'Calabresa e cebola',
            'category' => 'tradicionais',
            'price' => 39.90,
            'sizes' => [
                'MÉDIA' => 39.90,
                'GRANDE' => 49.90,
                'FAMÍLIA' => 69.90,
                'BIG' => 89.90,
            ],
            'display_order' => 1,
            'is_available' => true,
        ]);

        $this->actingAs($user)
            ->get(route('admin.pizza-prices.index'))
            ->assertOk()
            ->assertSee('Preços por Categoria de Pizzas')
            ->assertSee('Pizzas Tradicionais')
            ->assertSee('Pizzas Especiais')
            ->assertSee('Pizzas Nobres')
            ->assertSee('Calabresa');
    }

    public function test_admin_can_bulk_update_prices_for_entire_pizza_category(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@latorre.com',
            'password' => 'admin123',
        ]);

        $pizza1 = MenuItem::query()->create([
            'name' => 'Calabresa',
            'description' => 'Calabresa e cebola',
            'category' => 'tradicionais',
            'price' => 39.90,
            'sizes' => [
                'MÉDIA' => 39.90,
                'GRANDE' => 49.90,
                'FAMÍLIA' => 69.90,
                'BIG' => 89.90,
            ],
            'display_order' => 1,
            'is_available' => true,
        ]);

        $pizza2 = MenuItem::query()->create([
            'name' => 'Mussarela',
            'description' => 'Queijo mussarela',
            'category' => 'tradicionais',
            'price' => 39.90,
            'sizes' => [
                'MÉDIA' => 39.90,
                'GRANDE' => 49.90,
                'FAMÍLIA' => 69.90,
                'BIG' => 89.90,
            ],
            'display_order' => 2,
            'is_available' => true,
        ]);

        $pizzaEspecial = MenuItem::query()->create([
            'name' => 'Camarão',
            'description' => 'Camarão e queijo',
            'category' => 'especiais',
            'price' => 44.90,
            'sizes' => [
                'MÉDIA' => 44.90,
                'GRANDE' => 54.90,
                'FAMÍLIA' => 74.90,
                'BIG' => 94.90,
            ],
            'display_order' => 1,
            'is_available' => true,
        ]);

        $response = $this->actingAs($user)
            ->post(route('admin.pizza-prices.update', 'tradicionais'), [
                'sizes' => [
                    'MÉDIA' => 42.00,
                    'GRANDE' => 52.00,
                    'FAMÍLIA' => 72.00,
                    'BIG' => 92.00,
                ],
            ]);

        $response->assertRedirect(route('admin.pizza-prices.index'));
        $response->assertSessionHas('success');

        $pizza1->refresh();
        $pizza2->refresh();
        $pizzaEspecial->refresh();

        // Both pizzas in category tradicionais must be updated to new prices
        $this->assertEquals(42.00, (float) $pizza1->price);
        $this->assertEquals([
            'MÉDIA' => 42.00,
            'GRANDE' => 52.00,
            'FAMÍLIA' => 72.00,
            'BIG' => 92.00,
        ], $pizza1->sizes);

        $this->assertEquals(42.00, (float) $pizza2->price);
        $this->assertEquals([
            'MÉDIA' => 42.00,
            'GRANDE' => 52.00,
            'FAMÍLIA' => 72.00,
            'BIG' => 92.00,
        ], $pizza2->sizes);

        // Pizza in category especiais must remain untouched
        $this->assertEquals(44.90, (float) $pizzaEspecial->price);
        $this->assertEquals([
            'MÉDIA' => 44.90,
            'GRANDE' => 54.90,
            'FAMÍLIA' => 74.90,
            'BIG' => 94.90,
        ], $pizzaEspecial->sizes);

        // Public menu reflects the updated price
        $this->get(route('cardapio'))
            ->assertOk()
            ->assertSee('R$ 42,00')
            ->assertSee('R$ 52,00')
            ->assertSee('R$ 72,00')
            ->assertSee('R$ 92,00');
    }

    public function test_pizzas_without_individual_sizes_inherit_category_prices_on_public_menu(): void
    {
        MenuItem::query()->create([
            'name' => 'Frango com Catupiry',
            'description' => 'Frango e catupiry',
            'category' => 'especiais',
            'price' => 45.00,
            'sizes' => [
                'MÉDIA' => 45.00,
                'GRANDE' => 55.00,
                'FAMÍLIA' => 75.00,
                'BIG' => 95.00,
            ],
            'display_order' => 1,
            'is_available' => true,
        ]);

        // Pizza in same category without sizes explicitly set
        MenuItem::query()->create([
            'name' => '4 Queijos',
            'description' => '4 queijos',
            'category' => 'especiais',
            'price' => 0.00,
            'sizes' => null,
            'display_order' => 2,
            'is_available' => true,
        ]);

        $this->get(route('cardapio'))
            ->assertOk()
            ->assertSee('R$ 45,00')
            ->assertSee('R$ 55,00')
            ->assertSee('R$ 75,00')
            ->assertSee('R$ 95,00');
    }

    public function test_database_seed_populates_default_category_prices_for_all_pizza_categories(): void
    {
        $this->seed();

        $this->assertEquals([
            'MÉDIA' => 39.90,
            'GRANDE' => 49.90,
            'FAMÍLIA' => 69.90,
            'BIG' => 89.90,
        ], MenuItem::query()->where('category', 'tradicionais')->first()->sizes);

        $this->assertEquals([
            'MÉDIA' => 44.90,
            'GRANDE' => 54.90,
            'FAMÍLIA' => 74.90,
            'BIG' => 94.90,
        ], MenuItem::query()->where('category', 'especiais')->first()->sizes);

        $this->assertEquals([
            'MÉDIA' => 49.90,
            'GRANDE' => 59.90,
            'FAMÍLIA' => 79.90,
            'BIG' => 99.90,
        ], MenuItem::query()->where('category', 'nobres')->first()->sizes);
    }
}

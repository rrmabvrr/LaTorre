<?php

namespace Tests\Feature;

use App\Models\MenuItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MenuItemEditTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_pizza_with_sizes_and_values(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@latorre.com',
            'password' => 'admin123',
        ]);

        $this->actingAs($user)
            ->post(route('admin.items.store'), [
                'name' => 'Calabresa Nova',
                'description' => 'Pizza criada no admin',
                'category' => 'tradicionais',
                'sizes' => [
                    'MÉDIA' => 41.90,
                    'GRANDE' => 51.90,
                    'FAMÍLIA' => 71.90,
                    'BIG' => 91.90,
                ],
                'display_order' => 3,
                'is_available' => true,
            ])
            ->assertRedirect(route('admin.items.index'));

        $item = MenuItem::query()->where('name', 'Calabresa Nova')->first();

        $this->assertNotNull($item);
        $this->assertEquals(41.90, (float) $item->price);
        $this->assertEqualsCanonicalizing([
            'MÉDIA' => 41.90,
            'GRANDE' => 51.90,
            'FAMÍLIA' => 71.90,
            'BIG' => 91.90,
        ], $item->sizes);
    }

    public function test_admin_can_edit_pizza_sizes_and_values(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@latorre.com',
            'password' => 'admin123',
        ]);

        $item = MenuItem::create([
            'name' => 'Mussarela',
            'description' => 'Pizza tradicional',
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
            ->put(route('admin.items.update', $item), [
                'name' => 'Mussarela Especial',
                'description' => 'Pizza tradicional atualizada',
                'category' => 'tradicionais',
                'sizes' => [
                    'MÉDIA' => 42.90,
                    'GRANDE' => 52.90,
                    'FAMÍLIA' => 72.90,
                    'BIG' => 94.90,
                ],
                'display_order' => 2,
                'is_available' => true,
            ])
            ->assertRedirect(route('admin.items.index'));

        $this->assertDatabaseHas('menu_items', [
            'id' => $item->id,
            'name' => 'Mussarela Especial',
            'category' => 'tradicionais',
            'display_order' => 2,
        ]);

        $item->refresh();

        $this->assertEqualsCanonicalizing([
            'MÉDIA' => 42.90,
            'GRANDE' => 52.90,
            'FAMÍLIA' => 72.90,
            'BIG' => 94.90,
        ], $item->sizes);
    }
}

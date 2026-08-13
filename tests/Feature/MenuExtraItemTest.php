<?php

namespace Tests\Feature;

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
}

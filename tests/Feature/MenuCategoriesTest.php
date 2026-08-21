<?php

namespace Tests\Feature;

use Tests\TestCase;

class MenuCategoriesTest extends TestCase
{
    public function test_menu_has_only_required_categories_in_the_expected_order(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('TRADICIONAIS');
        $response->assertSee('ESPECIAIS');
        $response->assertSee('NOBRES');
        $response->assertSee('SUCOS NATURAIS');
        $response->assertSee('#sucos_naturais');
        $response->assertSee('TIRA GOSTO');
        $response->assertSee('BEBIDAS');
        $response->assertSee('CERVEJAS');
        $response->assertSee('SORVETES');

        $response->assertDontSee('PREMIUM');
        $response->assertDontSee('DOCES');
    }
}

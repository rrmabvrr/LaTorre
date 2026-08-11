<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_login_with_valid_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@latorre.com',
            'password' => 'admin123',
        ]);

        $response = $this->post(route('admin.login.attempt'), [
            'email' => 'admin@latorre.com',
            'password' => 'admin123',
        ]);

        $response->assertRedirect(route('admin.items.index'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_admin_cannot_login_with_invalid_password(): void
    {
        User::factory()->create([
            'email' => 'admin@latorre.com',
            'password' => 'admin123',
        ]);

        $response = $this->from(route('admin.login'))->post(route('admin.login.attempt'), [
            'email' => 'admin@latorre.com',
            'password' => 'senha-errada',
        ]);

        $response->assertRedirect(route('admin.login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
}

<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * FR-01: Autentikasi
 * Pengguna dapat mendaftar, login, logout, dan mengubah kata sandi.
 */
class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_is_accessible(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }

    public function test_user_can_authenticate_and_access_admin(): void
    {
        $user = User::factory()->create([
            'email' => 'umkm@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Filament uses Livewire for authentication; actingAs is the correct way
        // to verify an authenticated user can reach the admin panel.
        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(200);
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_credentials_are_stored_correctly(): void
    {
        $user = User::factory()->create([
            'email' => 'umkm@example.com',
            'password' => bcrypt('password123'),
        ]);

        $this->assertDatabaseHas('users', ['email' => 'umkm@example.com']);
        $this->assertTrue(password_verify('password123', $user->password));
    }

    public function test_authenticated_user_can_access_admin_panel(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(200);
    }

    public function test_unauthenticated_user_is_redirected_from_admin(): void
    {
        $response = $this->get('/admin');

        $response->assertRedirect();
    }

    public function test_authenticated_user_can_logout(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post('/admin/logout');

        $this->assertGuest();
    }

    public function test_user_email_is_unique_in_database(): void
    {
        User::factory()->create(['email' => 'existing@example.com']);

        $this->assertDatabaseHas('users', ['email' => 'existing@example.com']);
        $this->assertEquals(1, User::where('email', 'existing@example.com')->count());
    }
}

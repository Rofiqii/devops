<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_login_with_correct_credentials()
    {
        // Seed the admin
        $this->seed(\Database\Seeders\AdminSeeder::class);

        // First visit the initial login page
        $response = $this->get('/logincustomer');
        $response->assertStatus(200);

        // Then visit the admin login page
        $response = $this->get('/loginadmin');
        $response->assertStatus(200);

        // Now attempt the login with proper form fields
        $response = $this->withSession(['_token' => csrf_token()])
            ->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class)
            ->post('/konfirmasiloginadmin', [
                'username_admin' => 'admin',
                'pw_admin' => '123456789',
                'password' => '123456789' // Adding both password fields to be sure
            ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticated('admin');
    }

    public function test_admin_cannot_login_with_incorrect_password()
    {
        // Seed the admin
        $this->seed(\Database\Seeders\AdminSeeder::class);

        // First visit the initial login page
        $response = $this->get('/logincustomer');
        $response->assertStatus(200);

        // Then visit the admin login page
        $response = $this->get('/loginadmin');
        $response->assertStatus(200);

        // Now attempt the login with wrong password
        $response = $this->withSession(['_token' => csrf_token()])
            ->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class)
            ->post('/konfirmasiloginadmin', [
                'username_admin' => 'admin',
                'pw_admin' => 'wrongpassword',
                'password' => 'wrongpassword'
            ]);

        $response->assertRedirect('/loginadmin');
        $this->assertGuest();
    }

    public function test_admin_can_access_dashboard_when_authenticated()
    {
        // Create and authenticate as admin
        $admin = Admin::create([
            'username_admin' => 'testadmin',
            'pw_admin' => bcrypt('password123'),
            'fullname_admin' => 'Test Administrator',
            'pertanyaan' => 'Test Question',
            'jawaban' => 'Test Answer'
        ]);

        $this->actingAs($admin, 'admin');

        $response = $this->get('/admin/dashboard');
        $response->assertStatus(200);
    }

    public function test_guest_cannot_access_admin_dashboard()
    {
        $response = $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class)
            ->get('/admin/dashboard');
        
        $response->assertRedirect('/loginadmin');
    }
} 
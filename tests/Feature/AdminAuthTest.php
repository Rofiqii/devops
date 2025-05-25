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

        $response = $this->post('/konfirmasiloginadmin', [
            'username_admin' => 'admin',
            'pw_admin' => '123456789'
        ]);

        $response->assertStatus(302); // Expecting a redirect after successful login
        $this->assertAuthenticated('admin');
    }

    public function test_admin_cannot_login_with_incorrect_password()
    {
        // Seed the admin
        $this->seed(\Database\Seeders\AdminSeeder::class);

        $response = $this->post('/konfirmasiloginadmin', [
            'username_admin' => 'admin',
            'pw_admin' => 'wrongpassword'
        ]);

        $response->assertStatus(302); // Expecting a redirect back
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
        $response = $this->get('/admin/dashboard');
        $response->assertStatus(302); // Expecting redirect to login
    }
} 
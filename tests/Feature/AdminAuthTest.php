<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_login_with_correct_credentials()
    {
        // Seed the admin with hashed password
        Admin::create([
            'username_admin' => 'admin',
            'pw_admin' => Hash::make('123456789'),
            'fullname_admin' => 'Administrator',
            'pertanyaan' => 'Apa makanan favoritmu?',
            'jawaban' => 'nasi goreng'
        ]);

        $response = $this->post('/konfirmasiloginadmin', [
            'username_admin' => 'admin',
            'pw_admin' => '123456789'
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticated('admin');
    }

    public function test_admin_cannot_login_with_incorrect_password()
    {
        // Seed the admin with hashed password
        Admin::create([
            'username_admin' => 'admin',
            'pw_admin' => Hash::make('123456789'),
            'fullname_admin' => 'Administrator',
            'pertanyaan' => 'Apa makanan favoritmu?',
            'jawaban' => 'nasi goreng'
        ]);

        $response = $this->post('/konfirmasiloginadmin', [
            'username_admin' => 'admin',
            'pw_admin' => 'wrongpassword'
        ]);

        $response->assertRedirect('/loginadmin');
        $this->assertGuest('admin');
    }

    public function test_admin_can_access_dashboard_when_authenticated()
    {
        $admin = Admin::create([
            'username_admin' => 'testadmin',
            'pw_admin' => Hash::make('password123'),
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
        $response->assertRedirect('/loginadmin');
    }
} 
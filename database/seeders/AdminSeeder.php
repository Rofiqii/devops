<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['username_admin' => 'admin'], // The unique identifier to check
            [
                'pw_admin' => Hash::make('123456789'),
                'fullname_admin' => 'Administrator',
                'pertanyaan' => 'Apa makanan favoritmu?',
                'jawaban' => 'nasi goreng',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
} 
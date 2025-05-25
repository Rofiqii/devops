<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin')->insert([
            'username_admin' => 'admin',
            'pw_admin' => Hash::make('admin123'),
            'fullname_admin' => 'Administrator',
            'pertanyaan' => 'Apa makanan favoritmu?',
            'jawaban' => 'nasi goreng',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
} 
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
            'pw_admin' => Hash::make('123456789'),
            'fullname_admin' => 'Administrator',
            'pertanyaan' => 'Siapa nama ibu kandung Anda?',
            'jawaban' => 'Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
} 
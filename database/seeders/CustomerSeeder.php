<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customer')->insert([
            'username_cus' => 'Customer',
            'pw_cus' => Hash::make('password123'),
            'fullname_cus' => 'Customer Test',
            'pertanyaan' => 'Siapa nama ibu kandung Anda?',
            'jawaban' => 'Ibu',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
} 
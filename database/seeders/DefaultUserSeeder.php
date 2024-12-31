<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@ehb.be'], // Unique column to check
            [
                'name' => 'Admin User',
                'email' => 'admin@ehb.be',
                'password' => Hash::make('Password123!'), // Secure password
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
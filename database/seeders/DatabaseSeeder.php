<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // <--- Make sure this line is present!
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@ehb.be'],
            [
                'name'  => 'Admin User',
                'email' => 'admin@ehb.be',
                'password' => Hash::make('Password!321'),
                'username' => 'admin', 
                'role' => 'admin'
            ]
        );
    }
}

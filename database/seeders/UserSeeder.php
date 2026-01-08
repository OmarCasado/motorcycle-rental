<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@test.com',
            'password' => Hash::make('test123'),
            'role'     => 'admin',
        ]);

        // Normal user
        User::create([
            'name'     => 'User',
            'email'    => 'user@test.com',
            'password' => Hash::make('test123'),
            'role'     => 'user',
        ]);
    }
}


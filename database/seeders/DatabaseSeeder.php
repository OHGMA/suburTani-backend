<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // akun admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@suburtani.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // akun user
        User::create([
            'name' => 'User',
            'email' => 'user@suburtani.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'fadel', // Nama pengguna
            'username' => 'fadel', // Username
            'email' => 'dummy@gmail.com', // Email pengguna
            'password' => Hash::make('123456789'), // Password yang telah di-hash
        ]);
    }
}

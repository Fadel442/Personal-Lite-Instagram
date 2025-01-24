<?php

namespace Database\Seeders;

use App\Models\Profiles;
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
        $user = User::create([
            'email' => 'dummy@gmail.com', 
            'password' => Hash::make('123456789'), 
        ]);

        Profiles::create([
            'user_id' => $user->id, 
            'username' => 'fadel442',
        ]);

    }
}

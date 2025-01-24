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
       // Akun pertama
        $user1 = User::create([
            'email' => 'dummy1@gmail.com', 
            'password' => Hash::make('123456789'), 
        ]);

        Profiles::create([
            'user_id' => $user1->id, 
            'username' => 'Dummy_01', 
        ]);

        // Akun kedua
        $user2 = User::create([
            'email' => 'dummy2@gmail.com',
            'password' => Hash::make('123456789'), 
        ]);

        Profiles::create([
            'user_id' => $user2->id, 
            'username' => 'f04_dlt', 
            'name' => 'Fadel Muhammad',
            'Bio' => '22 Tahun, berusaha menjadi orang yang berguna dan ingin menjadi menggapai mimpi sebagai developer yang hebat',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' =>bcrypt('123123123'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' =>bcrypt('123123123'),
            'email_verified_at' => now(),
        ]);

    }
}

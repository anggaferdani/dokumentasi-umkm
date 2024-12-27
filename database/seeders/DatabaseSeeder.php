<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@umkm.com',
                'password' => bcrypt('adminumkm123*'),
                'password_last_changed' => now(),
                'role' => 1,
            ],
        ];

        User::insert($users);
    }
}

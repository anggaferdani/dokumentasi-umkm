<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Wilayah;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@umkm.com',
                'password' => bcrypt('adminumkm123*'),
                'role' => 1,
            ],
        ];

        User::insert($users);

        $wilayahs = [
            [
                'nama' => 'Solo',
            ],
        ];

        Wilayah::insert($wilayahs);

        $this->call(CitiesSeeder::class);
        $this->call(DistrictsSeeder::class);
        $this->call(ProvincesSeeder::class);
        $this->call(SubdistrictsSeeder::class);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'type' => 1,
        ]);

        // reservations manager
        User::factory()->create([
            'name' => 'Manager 1',
            'email' => 'manager@admin.com',
            'password' => Hash::make('123456'),
            'type' => 2,
        ]);

        // import other seeders
        $this->call([
            BuildingsSeeder::class,
            RoomsSeeder::class,
            SeasonsSeeder::class,
            SeasonsRoomsSeeder::class,
            AddonsSeeder::class,
            ReservationsSeeder::class,
            ReservationsAddonsSeeder::class,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Reservations;
use App\Models\Rooms;
use App\Models\Buildings;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // get all buildings
        $buildings = Buildings::all();

        // get all rooms
        $rooms = Rooms::all();

        // create 5 reservations with random rooms and buildings
        Reservations::factory()->count(5)->create([
            'room_id' => $rooms->random()->id,
            'building_id' => $buildings->random()->id,
        ]);
    }
}

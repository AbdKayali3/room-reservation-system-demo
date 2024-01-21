<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\SeasonsRooms;
use App\Models\Rooms;
use App\Models\Seasons;

class SeasonsRoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // get all rooms
        $rooms = Rooms::all();

        // get all seasons
        $seasons = Seasons::all();

        // create 10 seasons_rooms with random rooms and seasons
        for ($i = 0; $i < 10; $i++) {
            SeasonsRooms::factory()->create([
                'room_id' => $rooms->random()->id,
                'season_id' => $seasons->random()->id,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Rooms;
use App\Models\Buildings;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // get all buildings
        $buildings = Buildings::all();

        // create 3 rooms for each building
        foreach ($buildings as $building) {
            Rooms::factory()->count(3)->create([
                'building_id' => $building->id,
            ]);
        }
    }
}

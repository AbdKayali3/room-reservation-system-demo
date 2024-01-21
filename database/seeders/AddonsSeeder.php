<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Addons;

class AddonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = ["addon1.png", "addon2.png", "addon3.png"]; 
        $names = ["Breakfast", "Lunch", "Dinner",  "Dry cleaning", "Massage", "Gym", "Swimming pool"];

        for ($i = 0; $i < 7; $i++) {
            Addons::factory()->create([
                'name' => $names[$i],
                'price' => rand(100, 1000),
                'image' => $images[array_rand($images)],
            ]);
        }
        

    }
}

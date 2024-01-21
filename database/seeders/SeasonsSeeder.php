<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Seasons;

class SeasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seasons::factory()->create([
            'name' => "Summer",
            'start_date' => "2021-06-01",
            'end_date' => "2021-08-31",
        ]);
        
        Seasons::factory()->create([
            'name' => "Winter",
            'start_date' => "2021-12-01",
            'end_date' => "2022-02-28",
        ]);

        Seasons::factory()->create([
            'name' => "Spring",
            'start_date' => "2021-03-01",
            'end_date' => "2021-05-31",
        ]);

        Seasons::factory()->create([
            'name' => "Autumn",
            'start_date' => "2021-09-01",
            'end_date' => "2021-11-30",
        ]);
    }
}

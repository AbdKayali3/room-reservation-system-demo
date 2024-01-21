<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeasonsRooms>
 */
class SeasonsRoomsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'season_id' => \App\Models\Seasons::factory(),
            'room_id' => \App\Models\Rooms::factory(),
            'price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rooms>
 */
class RoomsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = ["room1.png", "room2.png", "room3.png"]; 
        return [
            'name' => "Room No. " . $this->faker->randomDigit(),
            'image' => $images[array_rand($images)],
            'building_id' => \App\Models\Buildings::factory(),
            'space' => $this->faker->randomDigit() . 'x' . $this->faker->randomDigit(),
            'default_price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}

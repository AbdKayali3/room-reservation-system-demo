<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buildings>
 */
class BuildingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = ["building1.png", "building2.png", "building3.png"]; 
        return [
            // buildings names contain a name and a number
            'name' => $this->faker->name() . ' ' . $this->faker->randomDigit(),
            'image' => $images[array_rand($images)],
            'Address' => $this->faker->address(),
        ];
    }
}

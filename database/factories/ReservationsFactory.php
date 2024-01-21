<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservations>
 */
class ReservationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),

            'room_id' => \App\Models\Rooms::factory(),
            'building_id' => \App\Models\Buildings::factory(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'duration' => $this->faker->randomDigit(),
            'duration_price' => $this->faker->numberBetween(100, 1000),
            'total_price' => $this->faker->numberBetween(100, 1000),
            'status' => $this->faker->randomElement([1,2,3]),
        ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ReservationsAddons;


class ReservationsAddonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservations = \App\Models\Reservations::all();
        $addons = \App\Models\Addons::all();

        foreach ($reservations as $reservation) {
            $randomAddons = $addons->random(rand(0, 3));
            foreach ($randomAddons as $addon) {
                ReservationsAddons::factory()->create([
                    'reservation_id' => $reservation->id,
                    'addon_id' => $addon->id,
                    'price' => $addon->price,
                ]);
            }
        }
    }
}

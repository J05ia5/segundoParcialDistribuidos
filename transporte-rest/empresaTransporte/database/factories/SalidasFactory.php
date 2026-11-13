<?php

namespace Database\Factories;

use App\Models\salidas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<salidas>
 */
class SalidasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "destino"=> fake()->country(),
            "fecha"=> fake()->date('now'),
            "hora"=> fake()->time('now'),
            "bus"=> fake()->company(),
            "precio"=> fake()->randomElement([200, 300, 400]),
            "capacidad"=> fake()->randomElement([50, 60, 70]),
        ];
    }
}

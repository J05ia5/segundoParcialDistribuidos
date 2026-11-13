<?php

namespace Database\Factories;

use App\Models\asientos;
use App\Models\salidas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<asientos>
 */
class AsientosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $salida = salidas::count(10)->get();
        return [
            "salida"=> fake()->time(),
            "numeroAsiento"=>fake()->randomElement([1,4, 13, 11]),
            "CIPasajero"=> fake()->creditCardNumber()
        ];
    }
}

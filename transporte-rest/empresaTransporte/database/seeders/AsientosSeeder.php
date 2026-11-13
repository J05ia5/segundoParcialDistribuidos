<?php

namespace Database\Seeders;

use App\Models\asientos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        asientos::factory()->count(10)->create();
    }
}

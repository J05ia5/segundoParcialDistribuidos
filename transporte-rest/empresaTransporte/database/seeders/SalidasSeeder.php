<?php

namespace Database\Seeders;

use App\Models\salidas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalidasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        salidas::factory()->count(10)->create();
    }
}

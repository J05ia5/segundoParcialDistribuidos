<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory()->create([
            'name' => 'Josias',
            'email' => 'josias@example.com',
            'password'=> Hash::make('admin'),
            'role'=> 'admin'
        ]);
        User::factory()->create([
            'name' => 'Asael',
            'email' => 'asael@example.com',
            'password'=> Hash::make('user'),
            'role'=> 'user'
        ]);
        $this->call(AsientosSeeder::class);
        $this->call(SalidasSeeder::class);
    }
}

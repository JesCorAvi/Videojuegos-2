<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Desarrolladora;
use App\Models\Distribuidora;
use App\Models\Etiqueta;
use App\Models\Videojuego;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Desarrolladora::factory()->count(10)->create();
        Distribuidora::factory()->count(10)->create();
        Videojuego::factory()->count(10)->create();
        Etiqueta::factory()->count(10)->create();
    }
}

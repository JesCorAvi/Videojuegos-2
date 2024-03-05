<?php

namespace Database\Factories;

use App\Models\Distribuidora;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Desarrolladora>
 */
class DesarrolladoraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'distribuidora_id' => function () {
                return Distribuidora::factory()->create()->id;
            },
        ];
    }
}

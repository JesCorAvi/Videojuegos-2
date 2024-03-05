<?php

namespace Database\Factories;

use App\Models\Desarrolladora;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Videojuego>
 */
class VideojuegoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->title(),
            'anyo' => $this->faker->year(),
            'portada' =>$this->faker->url(),
            "desarrolladora_id" => function () {
                return Desarrolladora::factory()->create()->id;
            },
        ];
    }
}

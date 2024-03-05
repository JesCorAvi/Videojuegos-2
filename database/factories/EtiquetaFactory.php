<?php

namespace Database\Factories;

use App\Models\Etiqueta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etiqueta>
 */
class EtiquetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /*
        $models = ['App\Models\Videojuego', 'App\Models\Desarrolladora'];
        $model = $this->faker->randomElement($models);

        return [
            'nombre' => $this->faker->unique()->word(),
            'tageable_id' => function () use ($model) {
                return $model::factory()->create()->id;
            },
            'tageable_type' => $model,
        ];
        */
        return [
            'nombre' => $this->faker->unique()->word(),
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Etiqueta $etiqueta) {
            $models = ['App\Models\Videojuego', 'App\Models\Desarrolladora'];
            $modelClass = $this->faker->randomElement($models);

            $model = $modelClass::factory()->create();

            $model->etiquetas()->attach($etiqueta);
        });
    }
}

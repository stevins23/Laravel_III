<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publicaciones>
 */
class PublicacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'usuario_id' => \App\Models\Usuario::all()->random()->id,
            'titulo' => $this->faker->sentence(3),
            'publicacion' => $this->faker->sentence(10),
            'fecha' => $this->faker->date(),
        ];
    }
}

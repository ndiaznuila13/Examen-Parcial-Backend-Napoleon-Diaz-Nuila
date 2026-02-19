<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $copias_totales = $this->faker->numberBetween(1, 10);
        $copias_disponibles = $this->faker->numberBetween(0, $copias_totales);
        return [
            'titulo' => $this->faker->sentence(3),
            'descripcion' => $this->faker->sentence(6),
            'isbn' => $this->faker->unique()->isbn13(),
            'copias_totales' => $copias_totales,
            'copias_disponibles' => $copias_disponibles,
            'estado' => $copias_disponibles > 0, 
        ];
    }
}

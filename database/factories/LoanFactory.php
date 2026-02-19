<?php

namespace Database\Factories;

use App\Models\Loan;
use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    protected $model = Loan::class;

    public function definition(): array
    {
        $libro = Libro::where('copias_disponibles', '>', 0)->inRandomOrder()->first();
        return [
            'nombre_solicitante' => $this->faker->name(),
            'fecha_hora' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'fecha_devolucion' => null,
            'libro_id' => $libro ? $libro->id : 1,
        ];
    }
}

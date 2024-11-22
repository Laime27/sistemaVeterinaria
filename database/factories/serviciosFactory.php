<?php

namespace Database\Factories;

use App\Models\servicios;
use Illuminate\Database\Eloquent\Factories\Factory;

class serviciosFactory extends Factory
{
    protected $model = servicios::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(), // Nombre del servicio
            'descripcion' => $this->faker->sentence(), // Descripción corta
            'precio' => $this->faker->randomFloat(2, 10, 500), // Precio entre 10 y 500
            'estado' => $this->faker->randomElement(['activo', 'inactivo']), // Estado aleatorio
        ];
    }
}

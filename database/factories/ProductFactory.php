<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique->word(10);
        $random = Carbon::today()->subDays(rand(0, 365));

        return [
            'nombre' => $name,
            'tipo' => $this->faker->randomElement(['Tabaco','Agua','Distribucion','Cafe','Snack']),
            'stock' => $this->faker->numerify('###'),
            'fechaCaducidad' => $random,
            'lote' => $this->faker->numerify('####')
        ];
    }
}

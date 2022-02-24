<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class FailureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $random = Carbon::today()->subDays(rand(0, 365));
        return [
            'descripcion' => $this->faker->text(),
            'fecha'=> $random,
            'estado'=> $this->faker->randomElement(['arreglado','pendiente']),
            'machine_id' => rand(1,100),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
class VehicleFactory extends Factory
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
            'descripcion' => $this->faker->randomElement(['Berlingo','Jumpy','Jumper','C-15']),
            'matricula' => $this->faker->unique()->bothify('###'.'CMS'),
            'kilometros' => $this->faker->numerify('#####'),
            'itv' => $random,
        ];
    }
}

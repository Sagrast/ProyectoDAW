<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'direccion'=> $this->faker->streetAddress(),
            'CIF' => $this->faker->dni(),
            'nombre' => $this->faker->company(),
            'servicio' => $this->faker->randomElement(['Cafe','Tabaco','Distribucion','Agua']),
            'telefono' => $this->faker->phoneNumber(),
            'email' => $this->faker->companyEmail(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'marca' => $this->faker->randomElement(['Azkoyen','Jofemar','Saeco','GM']),
            'modelo' => $this->faker->word(5),
            'tipo' => $this->faker->randomElement(['Cafe','Snacks','Tabaco','Agua']),
            'lectura' => $this->faker->numerify('#####'),
            'serial' => $this->faker->macAddress()
        ];
    }
}

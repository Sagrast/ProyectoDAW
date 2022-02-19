<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Carbon\Carbon;

class NodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //Metodos de creación de datos para la BDD mediante Faker.

        $name = $this->faker->unique->word(10);
        $random = Carbon::today()->subDays(rand(0, 365));

        return [
            'titulo' => $name,
            'contidoHTML' => $this->faker->text(2000),
            'subtitulo' =>$this->faker->text(100),
            'user_id' => User::all()->random()->id,
            'data' => $random,
            'img' => $this->faker->randomElement(
                ['botella.jpg','cafe.jpg','azkoyen.png','logistica.jpg']
            ),
            'category_id'=> Category::all()->random()->id
        ];
    }
}

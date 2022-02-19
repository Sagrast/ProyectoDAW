<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\Nodo;
use App\Models\User;

class CommentFactory extends Factory
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

                'comentario'=> $this->faker->text(500),
                'dataComentario' => $random,
                'nodo_id' => Nodo::all()->random()->id,
                'user_id' => User::all()->random()->id,
        ];
    }
}

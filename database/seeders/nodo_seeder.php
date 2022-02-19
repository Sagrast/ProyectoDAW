<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nodo;


class nodo_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Nodo::factory(10)->create();



        foreach ($posts as $post) {
            $post->Labels()->attach([
                rand(1, 4),
                rand(4, 8)
            ]);
        }
    }
}

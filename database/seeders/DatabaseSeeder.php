<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(user_seeder::class);
        $this->call(category_seeder::class);
        $this->call(label_seeder::class);
        $this->call(nodo_seeder::class);
        $this->call(vehicle_seeder::class);
    }
}

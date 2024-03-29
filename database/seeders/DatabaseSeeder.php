<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Machine;
use App\Models\Failure;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //comentados para usar una BDD ya definitiva.


       /*  Client::factory(100)->create();
        Machine::factory(100)->create();
        Failure::factory(100)->create();
        Product::factory(100)->create(); */


        $this->call(user_seeder::class);
        $this->call(category_seeder::class);
        $this->call(label_seeder::class);
        $this->call(nodo_seeder::class);
        $this->call(vehicle_seeder::class);
        /* $this->call(client_user_seeder::class);
        $this->call(client_machine_seeder::class);
        $this->call(machine_product_seeder::class); */
    }
}

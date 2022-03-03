<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class machine_product_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i <= 100; $i++) {
            DB::table('machine_product')->insert([
                'machine_id' => rand(1,10),
                'product_id' => rand(1,100),
                'fechaCarga' => Carbon::today()->subDays(rand(0, 365)),
                'unidades' => rand(1,40),
            ]);
        }
    }
}

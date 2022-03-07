<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory;

class client_user_seeder extends Seeder
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
            DB::table('client_user')->insert([
                'user_id' => rand(1,15),
                'client_id' => rand(1,100),
                'Fecha' => Carbon::today()->subDays(rand(0, 365)),
                'MotivoVisita' => $faker->text(100),
                'Albaran' =>  rand(1,10000)
            ]);
        }
    }
}

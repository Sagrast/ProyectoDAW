<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class client_machine_seeder extends Seeder
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
            DB::table('client_machine')->insert([
                'machine_id' => rand(1,10),
                'client_id' => rand(1,100),
                'instalacion' => Carbon::today()->subDays(rand(0, 365)),
            ]);
        }
    }
}

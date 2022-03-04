<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class vehicle_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = Vehicle::factory(4)->create();

        foreach ($cars as $car) {
            $car->users()->attach([
                rand(1, 4),
                rand(4, 8)
            ]);
        }

    }
}

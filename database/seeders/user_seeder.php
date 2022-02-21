<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Faker\Factory;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        User::factory(10)->create();



        for ($i = 0; $i <= 5; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => bcrypt('Abc123.'),
                'rol' =>  $faker->randomElement(['empleado', 'comercial'])
            ]);
        }

        DB::table('users')->insert([
            'name' => 'OscarGM',
            'email' => 'admin@correo.es',
            'password' => bcrypt('Abc123.'),
            'rol' => 'admin'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();


        DB::table('users')->insert([
            'name' => 'OscarGM',
            'email' => 'admin@correo.es',
            'password' => bcrypt('Abc123.'),
            'rol' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Carlos',
            'email' => 'soy@unaputa.es',
            'password' => bcrypt('abc123.'),
            'rol' => 'admin'
        ]);
    }
}

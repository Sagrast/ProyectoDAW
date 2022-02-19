<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class category_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['Cafe','Tabaco','Agua','Distribucion'];

        for ($i = 0; $i < count($name);$i++){
        DB::table('categories')->insert([
            'name' => $name[$i],
        ]);
        }
    }
}

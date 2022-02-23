<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class label_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['tabaco','agua','distribucion','servicios','calidad','cafe','vending','eficiencia'];
        $color = ['red','yellow','green','blue','purple','pink'];
        for ($i = 0; $i < count($name);$i++){
            $val = random_int(0,count($color)-1);
        DB::table('labels')->insert([
            'labelName' => $name[$i],
            'color' => $color[$val],
        ]);
        }
    }
}

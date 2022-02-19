<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Label;
use App\Models\Comment;

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
    }
}

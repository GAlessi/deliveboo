<?php

use Illuminate\Database\Seeder;
use App\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Dish::class, 60) -> create();
    }
}

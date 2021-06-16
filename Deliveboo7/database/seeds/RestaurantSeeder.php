<?php

use Illuminate\Database\Seeder;
use App\Restaurant;
use App\Type;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //factory(Restaurant::class, 50) -> create();

      factory(Restaurant::class, 50) -> create()
      -> each(function($restaurant) {

        $types = Type::inRandomOrder()
        -> limit(rand(1, 2))
        -> get();
        $restaurant -> types() -> attach($types);
        $restaurant -> save();
      });
    }
}

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

    //Many to Many  Restaurants to Types
    factory(Restaurant::class, 10) -> create()
    -> each(function($restaurant)
    {
      $types = Type::inRandomOrder()
      -> limit(rand(1, 3))
      -> get();
      $restaurant -> types() -> attach($types);
      $restaurant -> save();
    });

  }
}

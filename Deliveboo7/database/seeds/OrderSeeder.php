<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Dish;

class OrderSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {

    //Many to Many  Dishes to Orders
    factory(Order::class, 100) -> create()
           -> each(function($order) {

            $dishes = Dish::all();

            $dishes = Dish::where('restaurant_id', "=", rand(1,50))
            -> get();

            $order-> dishes() -> attach($dishes);
            $order-> save();
    });
  }
}

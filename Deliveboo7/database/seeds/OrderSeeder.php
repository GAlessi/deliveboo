<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Restaurant;
class OrderSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    //One to Many  Restaurant to Orders
    factory(Order::class, 50) -> make() -> each(function($order) {
      $restaurant = Restaurant::inRandomOrder() -> first();
      $order -> restaurant() -> associate($restaurant);
      $order -> save();
    });
  }
}

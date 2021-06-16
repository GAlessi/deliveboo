<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //One to Many    Restaurant to Dishes
      Schema::table('dishes', function (Blueprint $table) {
        $table -> foreign('restaurant_id', 'dishrestaurant')
        -> references('id')
        -> on('restaurants');
      });

      //One to Many    Restaurant to Orders
      Schema::table('orders', function (Blueprint $table) {
        $table -> foreign('restaurant_id', 'orderrestaurant')
        -> references('id')
        -> on('restaurants');
      });

      //Many to Many  Restaurants to Types
      Schema::table('restaurant_type', function (Blueprint $table) {

        $table -> foreign('restaurant_id', 'restauranttype')
        -> references('id')
        -> on('restaurants');

        $table -> foreign('type_id', 'typerestaurant')
        -> references('id')
        -> on('types');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      //One to Many    Restaurant to Dishes
      Schema::table('dishes', function (Blueprint $table) {
        $table -> dropForeign('dishrestaurant');
      });

      //One to Many    Restaurant to Orders
      Schema::table('orders', function (Blueprint $table) {
        $table -> dropForeign('orderrestaurant');
      });

      //Many to Many   Restaurants to Types
      Schema::table('restaurant_type', function (Blueprint $table) {
        $table -> dropForeign('restauranttype');
        $table -> dropForeign('typerestaurant');
      });

    }
}

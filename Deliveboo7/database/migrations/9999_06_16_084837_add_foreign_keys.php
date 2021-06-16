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

    }
}

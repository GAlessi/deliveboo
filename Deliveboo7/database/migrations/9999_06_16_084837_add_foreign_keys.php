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
      Schema::table('dishes', function (Blueprint $table) {
      $table -> foreign('restaurant_id', 'dishrestaurant')
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
      Schema::table('dishes', function (Blueprint $table) {
      $table -> dropForeign('dishrestaurant');
    });
    }
}

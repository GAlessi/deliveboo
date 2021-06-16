<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();

            $table -> string('nome', 64) -> nullable(false);
            $table -> text('descrizione') -> nullable(false);
            $table -> integer('prezzo_cent') -> nullable(false);
            $table -> boolean('visibilita') -> nullable(false);


            //one to many   Restaurant to Dishes
            $table -> bigInteger('restaurant_id') -> unsigned() -> index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();

            $table -> string('email', 64) -> nullable(false);
            $table -> string('password', 64) -> nullable(false);
            $table -> string('nome_attivita', 64) -> nullable(false);
            $table -> string('via', 64) -> nullable(false);
            $table -> string('n_civico', 8) -> nullable(false);
            $table -> string('citta', 64) -> nullable(false);
            $table -> string('cap', 16) -> nullable(false);
            $table -> string('p_iva', 16) -> nullable(false);

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
        Schema::dropIfExists('restaurants');
    }
}

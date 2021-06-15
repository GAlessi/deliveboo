<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dish;
use Faker\Generator as Faker;

$factory->define(Dish::class, function (Faker $faker) {
    return [

        'nome' => $faker -> sentence($nbWords = 3, $variableNbWords = true),
        'descrizione' => $faker -> text($maxNbChars = 300),
        'prezzo_cent' => $faker -> numberBetween(100, 30000),
        'visibilita' => $faker -> boolean($chanceOfGettingTrue = 70),
    ];
});

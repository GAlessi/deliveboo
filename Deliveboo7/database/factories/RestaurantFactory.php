<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [

        'email' => $faker -> email,
        'password' => $faker -> password,
        'nome_attivita' => $faker -> sentence($nbWords = 2, $variableNbWords = true),
        'via' => $faker -> streetName,
        'n_civico' => $faker -> buildingNumber,
        'citta' => $faker -> city,
        'cap' => $faker -> postcode,
        'p_iva' => $faker -> ean13,
    ];
});

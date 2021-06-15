<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [

        'nome_cliente' => $faker -> firstname,
        'cognome_cliente' => $faker -> lastname,
        'via' => $faker -> streetName,
        'n_civico' => $faker -> buildingNumber,
        'citta' => $faker -> city,
        'cap' => $faker -> postcode,
        'telefono' => $faker -> phoneNumber,
        'n_carta' => $faker -> creditCardNumber,
        'note' => $faker -> text,
    ];
});

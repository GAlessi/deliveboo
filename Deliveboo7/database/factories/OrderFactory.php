<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {

    $status = [
        'pagato', 'in esecuzione', 'rifiutato'
    ];

    $index = $faker -> numberBetween(0, 2);
    $stato = $status[$index];

    return [

        'nome_cliente' => $faker -> firstname,
        'cognome_cliente' => $faker -> lastname,
        'via' => $faker -> streetName,
        'n_civico' => $faker -> buildingNumber,
        'citta' => $faker -> city,
        'cap' => $faker -> postcode,
        'telefono' => $faker -> phoneNumber,
        'note' => $faker -> text,
        'status' => $stato,
    ];
});

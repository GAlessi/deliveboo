<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
  $restaurants = [
    [
      'nome_attivita' =>'Mattarallo',
      'via' =>'Via le mani dal naso',
      'n_civico' =>'30',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'Guybrush',
      'email'=>'guybrush@gmail.com',
      'password'=>'123456789'

    ],
    [
      'nome_attivita' =>'Da Gabbo',
      'via' =>'Via del grano',
      'n_civico' =>'300',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'Gabbo',
      'email'=>'gabbo@gmail.com',
      'password'=>'123456789'
    ],
    [
      'nome_attivita' =>'Da Mirko',
      'via' =>'Via del pero',
      'n_civico' =>'500',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'Mirko',
      'email'=>'mirko@gmail.com',
      'password'=>'123456789'
    ],
    [
      'nome_attivita' =>'Da Natale',
      'via' =>'Via del melograno',
      'n_civico' =>'20',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'Natale',
      'email'=>'natale@gmail.com',
      'password'=>'123456789'
    ],
    [
      'nome_attivita' =>'Da Vale & Figlia',
      'via' =>'Via del pesco',
      'n_civico' =>'33',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'Vale',
      'email'=>'vale@gmail.com',
      'password'=>'123456789'
    ],
    [
      'nome_attivita' =>'Bella Roma',
      'via' =>'Via della pila',
      'n_civico' =>'1',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'Totti',
      'email'=>'totti@gmail.com',
      'password'=>'123456789'
    ],
    [
      'nome_attivita' =>'Cho Tutto',
      'via' =>'Via del riso',
      'n_civico' =>'3',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'Mulan',
      'email'=>'mulan@gmail.com',
      'password'=>'123456789'
    ],
    [
      'nome_attivita' =>'El Pepe',
      'via' =>'Via del piccante',
      'n_civico' =>'753',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'Consuelo',
      'email'=>'consuelo@gmail.com',
      'password'=>'123456789'
    ],
    [
      'nome_attivita' =>'Pizza Pazza',
      'via' =>'Via della farina',
      'n_civico' =>'78',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'Gennaro',
      'email'=>'gennaro@gmail.com',
      'password'=>'123456789'
    ],
    [
      'nome_attivita' =>'Gelati gelati',
      'via' =>'Via del nord',
      'n_civico' =>'13',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'John',
      'email'=>'john@gmail.com',
      'password'=>'123456789'
    ]

  ];

  $index = $faker -> unique()-> numberBetween(0, 9);
  $restaurant = $restaurants[$index];


  return [
    'name' => $restaurant['name'],
    'email' => $restaurant['email'],
    'email_verified_at' => now(),
    'password' =>  Hash::make($restaurant['password']),
    'remember_token' => Str::random(10),
    'nome_attivita' => $restaurant['nome_attivita'],
    'via' => $restaurant['via'],
    'n_civico' => $restaurant['n_civico'],
    'citta' => $restaurant['citta'],
    'cap' => $restaurant['cap'],
    'p_iva' => $restaurant['p_iva'],
  ];
});

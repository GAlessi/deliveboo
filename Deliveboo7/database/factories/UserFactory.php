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
      'via' =>'Via del grano',
      'n_civico' =>'300',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'GuyBrush',
      'email'=>'ciao@gmail.com',
      'password'=>'cuiciicoco'

    ],
    [
      'nome_attivita' =>'Da Gabbo',
      'via' =>'Via del grano',
      'n_civico' =>'300',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'GuyBrush',
      'email'=>'ciao@gmail.com',
      'password'=>'cuiciicoco'
    ],
    [
      'nome_attivita' =>'Da Mirko',
      'via' =>'Via del grano',
      'n_civico' =>'300',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'GuyBrush',
      'email'=>'ciao@gmail.com',
      'password'=>'cuiciicoco'
    ],
    [
      'nome_attivita' =>'Da Natale',
      'via' =>'Via del grano',
      'n_civico' =>'300',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'GuyBrush',
      'email'=>'ciao@gmail.com',
      'password'=>'cuiciicoco'
    ],
    [
      'nome_attivita' =>'Da Vale & Figlia',
      'via' =>'Via del grano',
      'n_civico' =>'300',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'GuyBrush',
      'email'=>'ciao@gmail.com',
      'password'=>'cuiciicoco'
    ],
    [
      'nome_attivita' =>'Bella Roma',
      'via' =>'Via del grano',
      'n_civico' =>'300',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'GuyBrush',
      'email'=>'ciao@gmail.com',
      'password'=>'cuiciicoco'
    ],
    [
      'nome_attivita' =>'Cho Tutto',
      'via' =>'Via del grano',
      'n_civico' =>'300',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'GuyBrush',
      'email'=>'ciao@gmail.com',
      'password'=>'cuiciicoco'
    ],
    [
      'nome_attivita' =>'El Pepe',
      'via' =>'Via del grano',
      'n_civico' =>'300',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'GuyBrush',
      'email'=>'ciao@gmail.com',
      'password'=>'cuiciicoco'
    ],
    [
      'nome_attivita' =>'Pizza Pazza',
      'via' =>'Via del grano',
      'n_civico' =>'300',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'GuyBrush',
      'email'=>'ciao@gmail.com',
      'password'=>'cuiciicoco'
    ],
    [
      'nome_attivita' =>'Gelato Gelati',
      'via' =>'Via del grano',
      'n_civico' =>'300',
      'citta' =>'Roma',
      'cap' =>'00014',
      'p_iva'=>'0126641452',
      'name'=>'GuyBrush',
      'email'=>'ciao@gmail.com',
      'password'=>'cuiciicoco'
    ]

  ];

  $index = $faker -> unique()-> numberBetween(0, 9);
  $restaurant = $restaurants[$index];


  return [
    'name' => $faker->name,
    'email' => $faker->unique()->safeEmail,
    'email_verified_at' => now(),
    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    'remember_token' => Str::random(10),
    'nome_attivita' => $restaurant['nome_attivita'],
    'via' => $restaurant['via'],
    'n_civico' => $restaurant['n_civico'],
    'citta' => $restaurant['citta'],
    'cap' => $restaurant['cap'],
    'p_iva' => $restaurant['p_iva'],
  ];
});

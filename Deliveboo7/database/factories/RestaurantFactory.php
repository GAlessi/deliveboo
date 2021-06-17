<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {


    $restaurants = [
        [
          'email' => 'mirko1@gmail.com',
          'password' =>'ciao',
          'nome_attivita' =>'Mattarallo',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',

        ],
        [
          'email' => 'gabbo1@gmail.com',
          'password' =>'ciao',
          'nome_attivita' =>'Mattarallo',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',
        ],
        [
          'email' => 'mirko1@gmail.com',
          'password' =>'ciao',
          'nome_attivita' =>'Mattarallo',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',
        ],
        [
          'email' => 'mirko1@gmail.com',
          'password' =>'ciao',
          'nome_attivita' =>'Mattarallo',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',
        ],
        [
          'email' => 'mirko1@gmail.com',
          'password' =>'ciao',
          'nome_attivita' =>'Mattarallo',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',
        ],
        [
          'email' => 'mirko1@gmail.com',
          'password' =>'ciao',
          'nome_attivita' =>'Mattarallo',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',
        ],
        [
          'email' => 'mirko1@gmail.com',
          'password' =>'ciao',
          'nome_attivita' =>'Mattarallo',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',
        ],
        [
          'email' => 'mirko1@gmail.com',
          'password' =>'ciao',
          'nome_attivita' =>'Mattarallo',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',
        ],
        [
          'email' => 'mirko1@gmail.com',
          'password' =>'ciao',
          'nome_attivita' =>'Mattarallo',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',

        ]
    ];

    $index = $faker -> unique()-> numberBetween(0, 8);
    $restaurant = $restaurants[$index];

    return [

        'email' => $restaurant['email'],
        'password' => $restaurant['password'],
        'nome_attivita' => $restaurant['nome_attivita'],
        'via' => $restaurant['via'],
        'n_civico' => $restaurant['n_civico'],
        'citta' => $restaurant['citta'],
        'cap' => $restaurant['cap'],
        'p_iva' => $restaurant['p_iva'],
    ];
});

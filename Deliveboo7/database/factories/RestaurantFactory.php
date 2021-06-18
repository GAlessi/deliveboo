<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {


    $restaurants = [
        [
          'nome_attivita' =>'Mattarallo',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',

        ],
        [
          'nome_attivita' =>'Da Gabbo',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',

        ],
        [
          'nome_attivita' =>'Da Mirko',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',

        ],
        [
          'nome_attivita' =>'Da Natale',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',

        ],
        [
          'nome_attivita' =>'Da Vale & Figlia',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',

        ],
        [
          'nome_attivita' =>'Bella Roma',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',

        ],
        [
          'nome_attivita' =>'Cho Tutto',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',

        ],
        [
          'nome_attivita' =>'El Pepe',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',

        ],
        [
          'nome_attivita' =>'Pizza Pazza',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',

        ],
        [
          'nome_attivita' =>'Gelato Gelati',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',

        ]

    ];

    $index = $faker -> unique()-> numberBetween(0, 9);
    $restaurant = $restaurants[$index];

    return [

        'nome_attivita' => $restaurant['nome_attivita'],
        'via' => $restaurant['via'],
        'n_civico' => $restaurant['n_civico'],
        'citta' => $restaurant['citta'],
        'cap' => $restaurant['cap'],
        'p_iva' => $restaurant['p_iva'],
    ];
});

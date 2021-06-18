<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [

    'nome_cliente',
    'cognome_cliente',
    'via',
    'n_civico',
    'citta',
    'cap',
    'telefono',
    'note',
    'status',
  ];

  //One to Many   Restaurant to Orders
  public function restaurant(){
    return $this -> belongsTo(Restaurant::class);
  }

  //Many to Many  Dishes to orders
  public function dishes() {

    return $this -> belongsToMany(Dish::class);
  }
}

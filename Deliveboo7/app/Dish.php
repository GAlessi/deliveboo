<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Dish extends Model
{
  protected $fillable = [

    'nome',
    'descrizione',
    'prezzo_cent',
    'visibilita',
    'restaurant_id',

  ];


  //One to Many    Restaurant to Dishes
  public function restaurant()
  {
    return $this -> belongsTo(Restaurant::class);
  }

  //Many to Many  Dishes to orders
  public function orders() {

    return $this -> belongsToMany(Order::class);
  }
}

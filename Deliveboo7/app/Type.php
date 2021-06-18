<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
  protected $fillable = [
    'nome',
  ];

  //Many to Many  Restaurants to Types
  public function restaurants() {

    return $this -> belongsToMany(Restaurant::class);
  }
}

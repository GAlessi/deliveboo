<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
  protected $fillable = [

    'email',
    'password',
    'nome_attivita',
    'via',
    'n_civico',
    'citta',
    'cap',
    'p_iva',
  ];

  public function dishes()
  {
    return $this -> hasMany(Dish::class);
  }
}

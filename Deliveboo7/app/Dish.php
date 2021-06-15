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
    ];
}

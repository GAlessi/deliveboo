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
        'n_carta',
        'note',
    ];
}

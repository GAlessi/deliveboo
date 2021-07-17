<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [

        'nome',
        'ingredienti',
        'descrizione',
        'prezzo',
        'visibilita',
        'user_id',
        'deleted_at'
    ];


    //One to Many    Restaurant to Dishes
    public function user()
    {
        return $this -> belongsTo(User::class);
    }

    //Many to Many  Dishes to orders
    public function orders() {

        return $this -> belongsToMany(Order::class);
    }
}

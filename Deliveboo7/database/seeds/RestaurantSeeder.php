<?php

use Illuminate\Database\Seeder;
use App\Restaurant;
use App\Type;

class RestaurantSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    if(DB::table('restaurants')->count() == 0){
      DB::table('restaurants')->insert([
        [
          'email' => 'mirko1@gmail.com',
          'password' =>'ciao',
          'nome_attivita' =>'Mattarallo',
          'via' =>'Via del grano',
          'n_civico' =>'300',
          'citta' =>'Roma',
          'cap' =>'00014',
          'p_iva'=>'0126641452',
          'type_id'=> ['1','2','3']

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
          'type_id'=> ['1','2','3']
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
          'type_id'=> ['1','2','3']
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
          'type_id'=> ['1','2','3']
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
          'type_id'=> ['1','2','3']
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
          'type_id'=> ['1','2','3']
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
          'type_id'=> ['1','2','3']
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
          'type_id'=> ['1','2','3']
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
          'type_id'=> ['1','2','3']

        ]
      ]);

    } else { echo "\e[31mTable is not empty, therefore NOT "; }
    // //Many to Many  Restaurants to Types
    // factory(Restaurant::class, 50) -> create()
    // -> each(function($restaurant)
    // {
    //   //$restaurant = Restaurant::all();
    //   $types = Type::inRandomOrder()
    //   -> limit(rand(1, 2))
    //   -> get();
    //   $restaurant -> types() -> attach($types);
    //   $restaurant -> save();
    // });
    // $users = DB::table('users')
    //         ->join('contacts', 'users.id', '=', 'contacts.user_id')
    //         ->join('orders', 'users.id', '=', 'orders.user_id')
    //         ->select('users.*', 'contacts.phone', 'orders.price')
    //         ->get();
  }
}

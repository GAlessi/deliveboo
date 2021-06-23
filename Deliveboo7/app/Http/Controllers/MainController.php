<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Type;
use App\User;

class MainController extends Controller
{
  // generica
  public function main(){

    $types = Type::all();
    $users = User::all();
    $user = Auth::user();

    return view('pages.main', compact('types','users', 'user'));
  }

  //pagina show ristoranti
  public function restaurant($id){

    $user = User::findOrFail($id);
    return view('pages.showRestaurant', compact('user'));
  }

  // funzione per ricerca dinamica dei ristoranti in homepage
  public function search(Request $request) {

    $filters = $request -> filters;
    $users = User::with('types')->orderBy('nome_attivita');

    foreach ($filters as $filter) {
      $users->whereHas('types', function ($query) use ($filter) {
                $query->where('nome', $filter);
             });
    }

    return response () -> json($users->get(), 200);
  }




}

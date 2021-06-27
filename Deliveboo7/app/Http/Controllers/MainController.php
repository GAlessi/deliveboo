<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Type;
use App\User;
use App\Order;

class MainController extends Controller
{
  public function main(){

    $types = Type::all();
    $users = User::all();
    $user = Auth::user();

    return view('pages.main', compact('types','users', 'user'));
  }

  public function restaurant($id){

    $user = User::findOrFail($id);
    return view('pages.showRestaurant', compact('user'));
  }

  public function createOrder($totalPrice)
  {
      return view('pages.createOrder', compact('totalPrice'));
  }

  public function storeOrder(Request $request, $totalPrice) {
      // dd($request -> all());

      $validated = $request -> validate([
          'nome_cliente' => 'required|string|min:3',
          'cognome_cliente' => 'required|string|min:3',
          'via' => 'required|string|min:3',
          'n_civico' => 'required|string',
          'citta' => 'required|string',
          'cap' => 'required|string',
          'telefono' => 'required|string|min:3',
          'note' => 'max:255',
      ]);
      // dd($validated);

      $order = Order::make($validated);
      // $order -> dishes() -> attach($request -> get('dish_id'));

      $order -> save();


      return redirect() -> route('pay', compact('totalPrice'));
      // return Redirect::route('pay')->with('totalPrice');
  }
}

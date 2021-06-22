<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use App\User;

class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }


//creazione nuovo piatto
    public function createDish()
    {
        return view('pages.createDish');
    }


    //salvataggio in DB
    public function storeDish(Request $request) {
        // dd($request -> all());

        $validated = $request -> validate([
            'nome' => 'required|string|min:3',
            'ingredienti' => 'required|string|min:3',
            'descrizione' => 'required|string|min:3',
            'prezzo' => 'required|integer',
            'visibilita' => 'required|boolean'

        ]);
        //dd($validated);

        $user = User::findOrFail($request->user()->id);
        // dd($user);

        $dish = Dish::make($validated);
        $dish -> user() -> associate($user);
        $dish -> save();

        return redirect() -> route('show', $user);
    }

//eliminazione Piatto
public function destroy($id, $userid) {
    // dd($id, $userid);
    $dish = Dish::findOrFail($id);
    //$dish -> delete();

    $user = $userid;
    $dish -> deleted = true;
    $dish -> save();


    return redirect() -> route('show', $user);
  }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */

}

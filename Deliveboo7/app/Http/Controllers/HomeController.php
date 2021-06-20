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

    public function createDish()
    {
        return view('pages.createDish');
    }

    public function storeDish(Request $request) {
        // dd($request -> all());

        $validated = $request -> validate([
            'nome' => 'required|string|min:3',
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

        return redirect() -> route('main');
    }



    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */

}

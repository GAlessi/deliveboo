<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\User;
use Validator,Redirect,Response;

class AuthController extends Controller
{
    public function registration()
    {
        $types = Type::all();
        return view('auth.register', compact('types'));
    }


    public function postRegistration(Request $request)
    {
        // dd($request -> all());

        $validated = $request -> validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'nome_attivita'=>['required','string','max:64'],
        'via'=>['required','string','max:64'],
        'n_civico'=>['required','string','max:8'],
        'citta'=>['required','string','max:64'],
        'cap'=>['required','string','max:16'],
        'p_iva'=>['required','string','max:16'],
        'types_id' => 'required|exists:types,id|array',
        'types_id.*' => 'integer',
        ]);

        // dd($validated)
        $restaurant = User::make($validated);
        $restaurant -> save();

        $restaurant -> types() -> attach($request -> get('types_id'));

        $restaurant -> save();

        return Redirect::to("/")->withSuccess('Great! You have Successfully loggedin');
    }
}

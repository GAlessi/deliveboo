<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Type;
use App\User;

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


}

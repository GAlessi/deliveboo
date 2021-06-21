<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\User;

class MainController extends Controller
{
  public function main(){

    $types = Type::all();
    $users = User::all();

    return view('pages.main', compact('types', 'users'));
  }

  public function restaurant($id){

    $user = User::findOrFail($id);
    return view('pages.showRestaurant', compact('user'));
  }


}

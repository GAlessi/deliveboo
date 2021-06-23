<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Type;

class ApiController extends Controller
{
    public function index(request $request){

        // $restaurants = User::all();
        // $types = Type::all();


        return response() -> json("Tutto bene" . " (" . $request -> data .")", 200);



    }
}

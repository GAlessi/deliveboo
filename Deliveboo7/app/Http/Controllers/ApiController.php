<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Type;

class ApiController extends Controller
{
    public function getFiltered(Request $request) {

        dd($request);
        $typesID = get_object_vars($request));

        dd($typesID);

        $users = User::all();

        $selectedRestaurants = array();

        foreach ($users as $user) {
            foreach ($user->types as $type) {
                // if (in_array($type->id, $typeID)) {
                    array_push($selectedRestaurants, "hello");
                // }
            }
        }


        return response() -> json($selectedRestaurants, 200);

    }
}

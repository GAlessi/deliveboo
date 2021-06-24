<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Type;

class ApiController extends Controller
{

    public function getCategories(){
        $categories = Type::all();
        json_encode($categories);
        return $categories;
    }


    public function getAllRestaurants(){

        $restaurants = User::all();

        $category_restaurant = [];

        foreach ($restaurants as $restaurant) {
            $query = DB::table('type_user')
                                -> join('types', 'type_user.type_id', '=', 'types.id')
                                -> select('type_user.user_id as res_id','types.id', 'types.nome')
                                -> where('type_user.user_id', $restaurant -> id)
                                -> get();

            array_push($category_restaurant, $query);
        }

        for ($i=0; $i < count($restaurants); $i++) {
            // $restaurants[$i]['category'] = [ 'id' => 0];
            for ($j=0; $j < count($category_restaurant[$i]); $j++) {
                // if(count($restaurants[$i]['category']) <1){
                //     $restaurants[$i]['category'] = [
                //         'id' => $category_restaurant[$i][$j] ->id
                //     ];
                // }
            }
            // $restaurants[$i]['category'] [] = [ 'id' => 0];
            // $restaurants[$i]['category'] = [
            //     'id' => $category_restaurant[$i]['id'],
            // ];
        }

        return [$restaurants, $category_restaurant];
        // return $restaurants[0] -> category;
        // return $category_restaurant[0]['id'];
        // return json_encode($category_restaurant[0][0] -> id);
        // return [$restaurants, $restaurantsList, $prova];
    }
}
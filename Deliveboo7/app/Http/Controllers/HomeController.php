<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Dish;
use App\User;
use App\Order;

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


    // modifica Piatto
    public function editDish($id) {

        $dish = Dish::findOrFail($id);

        return view('pages.editDish', compact('dish'));
    }

    public function updateDish(Request $request, $id)
    {
        // dd($request -> all());

        $validated = $request -> validate([
            'nome' => 'required|string|min:3',
            'ingredienti' => 'required|string|min:3',
            'descrizione' => 'required|string|min:3',
            'prezzo' => 'required|integer',
            'visibilita' => 'required|boolean'

        ]);

        $dish = Dish::findOrFail($id);
        $dish -> update($validated);

        $dish -> save();
        $user = User::findOrFail($request->user()->id);

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


    //mostra ordini
    public function showOrders($id)
    {
        $user = User::findOrFail($id);
        $orders = Order::all();

        $ordersId = array();
        $restaurantOrders = array();

        //pusha in array i piatti di un ristorante
        foreach ($user -> dishes as $dish) {
            foreach ($dish -> orders as $order){
                if (!in_array($order->id, $ordersId)) {
                    array_push($ordersId, $order->id);
                }
            }
        }

        //pusha in array gli di un ristorante
        foreach ($orders as $order) {
            if (in_array($order->id, $ordersId)) {
                array_push($restaurantOrders, $order);
            }
        }


        return view('pages.showOrders', compact('user', 'restaurantOrders'));
    }
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */

}

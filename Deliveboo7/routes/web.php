<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Auth::routes();

//MAIN
Route::get('/', 'MainController@main')
->name('main');

//show restaurant
Route::get('/showRestaurant/{id}', 'MainController@restaurant')
-> name('show');

//Creazione nuovo piatto
Route::get('/createDish', 'HomeController@createDish')
->name('createDish');

Route::post('/store', 'HomeController@storeDish')
-> name('storeDish');

//modifica Piatto
Route::get('/editDish/{id}', 'HomeController@editDish')
-> name('editDish');
Route::post('/updateDish/{id}', 'HomeController@updateDish')
-> name('updateDish');

//eliminazione Piatto
Route::get('destroy/{id}/{userid}', 'HomeController@destroy')
-> name('destroy');

//mostra ordini
Route::get('/showOrders/{id}', 'HomeController@showOrders')
-> name('showOrders');

//LOGIN
Route::get('/testlogin', 'AuthController@index')
-> name('getLogin');
Route::post('post-login', 'AuthController@postLogin')
-> name('postLogin');

//REGISTER
Route::get('/registration', 'AuthController@registration')
-> name('getRegistration');
Route::post('/post-registration', 'AuthController@postRegistration')
-> name('postRegistration');

//Creazione nuovo ordine
Route::get('/createOrder', 'MainController@createOrder')
->name('createOrder');

Route::post('/storeOrder', 'MainController@storeOrder')
-> name('storeOrder');


//braintree
Route::get('/pay', function (){
    $gateway = new \Braintree\Gateway([
        'environment' => config('services.braintree.enviroment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);

    $token = $gateway->ClientToken()->generate();

    return view('pages.braintree', [
        'token' => $token
    ]);
})-> name('pay');

Route::post('/checkout', function(Request $request){

    $gateway = new \Braintree\Gateway([
        'environment' => config('services.braintree.enviroment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);

    $amount = $request -> amount;
    $nonce = $request -> payment_method_nonce;

    $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => true
        ]
    ]);

    if ($result->success) {
        $transaction = $result->transaction;
        // header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);

        return redirect() -> route('main') -> with('success_message','transazione id: '.$transaction->id.'  eseguita');
    } else {
        $errorString = "";

        foreach($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }

        // $_SESSION["errors"] = $errorString;
        // header("Location: " . $baseUrl . "index.php");
        return redirect() -> route('main') -> withErrors('Si è verificato un errore:'.$result->message);

    }
});

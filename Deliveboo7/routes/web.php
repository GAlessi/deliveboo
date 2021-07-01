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
Route::post('/createOrder/{carrello}', 'MainController@createOrder')
->name('createOrder');

Route::post('/storeOrder/{carrello}', 'MainController@storeOrder')
-> name('storeOrder');


//braintree
Route::post('/paymentDetails','BrainController@paymentDetails')
-> name('paymentDetails');

Route::get('/pay/{order}','BrainController@pay')
-> name('pay');

Route::post('/checkout/{order}', 'BrainController@checkout')
-> name('checkout');

//statistiche
Route::get('/statistiche/{id}', 'HomeController@statistiche')
-> name('statistiche');

//chi siamo
Route::get('/chiSiamo', 'MainController@chiSiamo')
-> name('chiSiamo');

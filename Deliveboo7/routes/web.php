<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/showRestaurant/{id}', 'MainController@restaurant')
    -> name('show');

//MAIN
Route::get('/', 'MainController@main')
    ->name('main');


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



// route per la ricerca in homepage
Route::post('/search', 'MainController@Search')
    -> name('search');

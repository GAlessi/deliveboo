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

//eliminazione Piatto
Route::get('destroy/{id}/{userid}', 'HomeController@destroy')
    -> name('destroy');

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

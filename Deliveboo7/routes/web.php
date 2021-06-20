<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'MainController@main')
//        ->name('main');;

Auth::routes();

Route::get('/showRestaurant/{id}', 'MainController@restaurant') -> name('show');

//MAIN
// Route::get('main', 'MainController@main')
//        ->name('main');
Route::get('/', 'MainController@main')
       ->name('main');

// //MAIN
// Route::get('main', 'MainController@main')
//        ->name('main');


//Creazione nuovo piatto
Route::get('/createDish', 'HomeController@createDish')
        ->name('createDish');

Route::post('/store', 'HomeController@storeDish')
        -> name('storeDish');

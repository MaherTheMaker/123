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

Route::get('/', 'RestoController@index');

Route::get('/list', 'RestoController@list');

Route::get('/delete/{id}', 'RestoController@delete');

Route::view('/add', 'add');
Route::post('/add', 'RestoController@add');


Route::get('/edit/{id}', 'RestoController@edit');
Route::post('/edit/{id}', 'RestoController@updateResto')->name('restaurant.update');


Route::view('/searchList', 'searchList');
Route::get('/search/', 'RestoController@searchbyname')->name('restaurant.search');


<?php

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

//TODO: Change the shit out of
Route::get('/', function () {
    return view('welcome');
});


//NOTE: the path name effects the type hinting in the controller,
//makes a litte sense, look into it more
Route::resource('user', 'UserController');
Route::resource('character', 'CharacterController');
Route::resource('item', 'ItemController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

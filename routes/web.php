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

Route::get('/', function () {
    return view('welcome');
});

//NOTE: the path name effects the type hinting in the controller,
//makes a litte sense, look into it more
Route::resource('character', 'DndCharacterController');
Route::resource('item', 'ItemController');

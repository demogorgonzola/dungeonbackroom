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

// Auth Routes: Login, Register, Password Reset, etc...
Auth::routes();

// Account Routes
Route::get('/account', 'AccountController@index')->name('account.index');
Route::get('/account/edit', 'AccountController@edit')->name('account.edit');
Route::match(['put', 'patch'], '/account/update', 'AccountController@update')
    ->name('account.update');

//NOTE: the path name effects the type hinting in the controller,
//makes a litte sense, look into it more
Route::resource('/user', 'UserController');
Route::resource('/character', 'CharacterController');
Route::resource('/item', 'ItemController');

Route::get('/home', 'HomeController@index')->name('home');



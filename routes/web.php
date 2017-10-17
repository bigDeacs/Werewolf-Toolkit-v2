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

Auth::routes();

Route::get('/home', 'WebControllers\HomeController@index')->name('home');

Route::get('/games', 'WebControllers\HomeController@games')->name('games');

Route::get('/roles', 'WebControllers\HomeController@roles')->name('roles');

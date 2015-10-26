<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MenuController@index');

Route::get('create', 'MenuController@create');

Route::get('edit', 'MenuController@edit');

Route::post('update', 'MenuController@update');
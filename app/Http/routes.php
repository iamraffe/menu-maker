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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('create', 'MenuController@create');

//1. create routes:
Route::get('test', ['uses' => 'TestController@index']);
Route::post('test/update/{id}', ['as' => 'test/update', 'uses' => 'TestController@update']);
Route::post('test/bulk_update', ['as' => 'test/bulk_update', 'uses' => 'TestController@bulk_update']);
<?php

Route::get('password/reset', 'Auth\PasswordController@getReset')

/**
 * Auth handling
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);



Route::group(['prefix' => 'admin'], function()
{
	Route::get('pdf/{menu_name}/download', 'PDFController@download');

	Route::get('menus/{menu_name}', 'MenuController@show');
	Route::get('menus/{menu_name}/edit', 'MenuController@edit');
	Route::get('menus/{menu_name}/save', 'MenuController@storeOrUpdate');
  Route::get('menus/{menu_name}/archive', 'MenuController@archive');
  
  Route::put('items/positions', 'ItemsController@positions');

  Route::get('archives/{menu}', 'ArchivesController@show');

  Route::resource('menus', 'MenuController');
  Route::resource('pdf', 'PDFController');
  Route::resource('items', 'ItemsController');
  Route::resource('categories', 'CategoriesController');
  Route::resource('subcategories', 'SubCategoriesController');

});

Route::get('/', 'MenuController@index');

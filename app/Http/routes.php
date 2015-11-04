<?php

/**
 * Auth handling
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/**
 * Admin area - Backend routes.
 */
// Route::get('admin', ['middleware' => 'auth', 'uses' => 'AdminController@index']);




Route::group(['prefix' => 'admin'], function()
{
	Route::get('pdf/{menu_name}/download', 'PDFController@download');

	Route::get('menus/{menu_name}', 'MenuController@show');
	Route::get('menus/{menu_name}/edit', 'MenuController@edit');
	Route::get('menus/{menu_name}/save', 'MenuController@storeOrUpdate');
  Route::put('items/positions', 'ItemsController@positions');

  Route::get('archives/{menu}', 'ArchivesController@show');

  Route::resource('menus', 'MenuController');
  Route::resource('pdf', 'PDFController');
  Route::resource('items', 'ItemsController');
  Route::resource('categories', 'CategoriesController');

});

Route::get('/', function () {
    return redirect('admin/menus');
});

// Route::get('/', 'MenuController@index');

// Route::get('create', 'MenuController@create');

// Route::get('edit', 'MenuController@edit');

// Route::post('update', 'MenuController@update');

// Route::post('store', 'MenuController@store');

// Route::get('save', 'MenuController@save');

// Route::get('download', 'MenuController@download');

// Route::delete('delete/{objectId}', 'MenuController@delete');


//Route::resource('menu', 'MenuController');

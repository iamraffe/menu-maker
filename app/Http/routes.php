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
    Route::resource('menus', 'MenuController');
    Route::resource('pdf', 'PDFController');
});

Route::get('admin/menus/{menu-name}', 'MenuController@show');

Route::get('/', 'Auth\AuthController@getLogin');

// Route::get('create', 'MenuController@create');

// Route::get('edit', 'MenuController@edit');

// Route::post('update', 'MenuController@update');

// Route::post('store', 'MenuController@store');

// Route::get('save', 'MenuController@save');

// Route::get('download', 'MenuController@download');

// Route::delete('delete/{objectId}', 'MenuController@delete');


//Route::resource('menu', 'MenuController');

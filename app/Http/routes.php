<?php
Route::get('/home', 'Auth\AuthController@getLogout');

Route::group(['domain' => '{account}.'.env('APP_DOMAIN')], function () {
  Route::get('/', 'GroupController@index');

Route::group(['prefix' => 'admin'], function()
{
	Route::get('pdf/{menu_name}/download', 'PDFController@download');
  Route::get('pdf/{menu_name}/{version?}/download', 'PDFController@download');

	Route::get('menus/{menu_name}', 'MenuController@show');
	Route::get('menus/{menu_name}/edit', 'MenuController@edit');
	Route::get('menus/{menu_name}/save', 'MenuController@storeOrUpdate');
  Route::get('menus/{menu_name}/archive', 'MenuController@archive');

  Route::get('menus/{menu_name}/{version}', 'MenuController@show');
  Route::get('menus/{menu_name}/{version}/edit', 'MenuController@edit');
  Route::get('menus/{menu_name}/{version}/save', 'MenuController@storeOrUpdate');
  Route::get('menus/{menu_name}/{version}/archive', 'MenuController@archive');

  Route::put('items/positions', 'ItemsController@positions');

  Route::get('archives/{menu}/{version?}', 'ArchivesController@show');

  Route::resource('menus', 'MenuController');
  Route::resource('pdf', 'PDFController');
  Route::get('pdf/{menu_name}/{version}', 'PDFController@show');
  Route::resource('items', 'ItemsController');
  Route::resource('categories', 'CategoriesController');
  Route::resource('subcategories', 'SubCategoriesController');
  Route::resource('users', 'UsersController');
  Route::resource('groups', 'GroupsController');

  Route::post('/group/create/step/{step}', 'GroupController@step');

  Route::get('password/reset/success', 'Auth\PasswordController@getResetSuccess');
  Route::get('password/reset', 'Auth\PasswordController@getReset');

  /**
   * Auth handling
   */
  Route::controllers([
      'auth' => 'Auth\AuthController',
      'password' => 'Auth\PasswordController',
  ]);



  // Route::group(['prefix' => 'admin'], function()
  // {
  // 	Route::get('pdf/{menu_name}/download', 'PDFController@download');


  	// Route::get('menus/{menu_name}', 'MenuController@show');
  	// Route::get('menus/{menu_name}/edit', 'MenuController@edit');
  	// Route::get('menus/{menu_name}/save', 'MenuController@storeOrUpdate');
   //  Route::get('menus/{menu_name}/archive', 'MenuController@archive');

    // Route::put('items/positions', 'ItemsController@positions');

    // Route::get('archives/{menu}', 'ArchivesController@show');

    // Route::resource('menus', 'MenuController');
    Route::resource('pdf', 'PDFController');
    // Route::resource('items', 'ItemsController');
    // Route::resource('categories', 'CategoriesController');
    // Route::resource('subcategories', 'SubCategoriesController');
    // Route::resource('users', 'UsersController');
    // Route::resource('groups', 'GroupsController');

  });
});

Route::get('/', 'GroupController@index');



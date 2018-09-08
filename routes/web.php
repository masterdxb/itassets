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


Route::group(['prefix' => 'admin'], function(){

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/', 'HomeController@index')->name('home');
	Route::group(['middleware' => ['role:admin|staff']], function(){
		Route::resource('itassets', 'ITAssetController', ['as' => 'admin']);
		Route::resource('users', 'UserController', ['as' => 'admin']);
		Route::resource('clients', 'OauthClientController', ['as' => 'admin']);
		Route::resource('roles', 'RoleController', ['as' => 'admin']);
		Route::resource('permissions', 'PermissionController', ['as' => 'admin']);
	});

	Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});
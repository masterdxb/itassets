<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => Config::get('settings.auth-api')], function() {
	
	Route::post('login', 'API\UserController@login');
	Route::post('register', 'API\UserController@register');
	// Route::resource('user', 'API\UserController');

	Route::group(['middleware' => ['client']], function() {
		Route::get('/authenticate_mo', 'API\UserController@mo_request');
		Route::get('/authenticate_nt', 'API\UserController@nt_request');
	});

	Route::group(['middleware' => ['client']], function() {
		Route::get('/authenticate_staff', function(Request $request){
			return response()->json(['Success' => 'You are authorized'], 200);
		});
	});
});

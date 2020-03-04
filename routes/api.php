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

// Route::middleware('auth:api')->get('/users', 'Api\UserController@index');

// Route::resource('users', 'Api\UserController', ['except' => ['show']]);

Route::post('login', 'Api\LoginController@login');
Route::post('register', 'Api\LoginController@register');
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('details', 'Api\LoginController@details');

//Scope: match at least 1 scope, Scopes: match all scopes
Route::get('users', 'Api\UserController@index')->middleware('scope:admin');
});

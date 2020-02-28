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

// Route for guest
Route::get('/', function () {
    return view('index');
})->name('index');

Auth::routes();
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

// Route for Auth user
Route::group(['middleware' => 'auth'], function () {
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

// Route for Admin or Field Owner
Route::group(['middleware' => 'can:isAdminOrFieldOwner'], function () {
	Route::get('dashboard', 'HomeController@index')->name('dashboard');
});

// Route for Admin
Route::group(['middleware' => 'can:isAdmin'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
});

// Route for Field Owner


// Route for Captain
Route::group(['middleware' => 'can:isCaptain'], function () {
});

// Route for Player
Route::group(['middleware' => 'can:isPlayer'], function () {
});

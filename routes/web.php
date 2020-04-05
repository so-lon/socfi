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

    // Stadium
    Route::resource('stadium', 'StadiumController');
    Route::match(['get', 'post'], 'stadium/search', 'StadiumController@search')->name('stadium.search');

    // Promotion
    Route::resource('promotion', 'PromotionController');
    Route::match(['get', 'post'], 'promotion/search', 'PromotionController@search')->name('promotion.search');
    Route::get('schedule', 'BookingController@index')->name('schedule');
});

// Route for Admin
Route::group(['middleware' => 'can:isAdmin'], function () {
    // User
    Route::resource('user', 'UserController', ['except' => ['show'], 'parameters' => ['user' => 'username']]);
    Route::put('user/{username}/restore', 'UserController@restore')->name('user.restore');
    Route::match(['get', 'post'], 'user/search', 'UserController@search')->name('user.search');

    // News
    Route::resource('news', 'NewsController');
    Route::match(['get', 'post'], 'news/search', 'NewsController@search')->name('news.search');
});

// Route for Field Owner
Route::group(['middleware' => 'can:isFieldOwner'], function () {
    // Field
    Route::resource('field', 'FieldController');

    // Booking
    Route::resource('booking', 'BookingController');
});


// Route for Captain
Route::group(['middleware' => 'can:isCaptain'], function () {
});

// Route for Player
Route::group(['middleware' => 'can:isPlayer'], function () {
});

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

Route::group(['middleware' => ['web']], function () {
	//----------------Index root----------------------
	Route::get('/', 'HomeController@index')->name('index');
	//----------------Authentication------------------
	//--Sign-Up
	Route::get('/signup', 'Auth\AuthController@getSignup')->name('auth.signup');
	Route::post('/signup', 'Auth\AuthController@postSignup');
	//--Sign-In
	Route::get('/signin', 'Auth\AuthController@getSignin')->name('auth.signin');
	Route::post('/signin','Auth\AuthController@postSignin');
	//--Sign-Out
	Route::get('/signout', 'Auth\AuthController@getSignout')->name('auth.signout');

});

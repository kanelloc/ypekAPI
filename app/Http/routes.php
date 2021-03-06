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

//----------------User Section-------------------------
Route::group(['middleware'=> ['web', 'auth']], function (){
	Route::get('/profile', 'UserController@showProfile')->name('user.profile');
	Route::post('/profile', 'UserController@getApiKey')->name('user.getApikey');
});

//---------------Use api Section------------------------
Route::group(['middleware'=> ['web', 'apiKey']], function (){
	Route::get('/api/v1/{api_key}/stations', 'ApiController@showApiStations')->name('api.showApiStations');
	Route::get('/api/v1/{api_key}/{stationPass}/{type}/{date}/{hour}', 'ApiController@showSpesificValue')->name('api.showSpesificValue');
	Route::get('/api/v1/{api_key}/range/{stationPass}/{type}/{date1}/{date2}', 'ApiController@showRangeValue')->name('api.showRangeValue');
});

//-------------------Admin Section-------------------------
Route::group(['middleware'=> ['web','isAdmin']], function (){
	Route::get('/adminpanel', 'AdminController@adminPanel')->name('adminpanel');
	Route::resource('stations', 'StationsController');
	//Post and delete Csv Files for each station
	Route::post('stations/{stationPass}/edit', 'StationsController@editUpload')->name('admin.editUpload');
	Route::delete('measures/{stationsPass}/{fileName}', 'StationsController@destroyCsv')->name('admin.destroyCsv');
});



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

Route::name('home')->get('/', function () {
    return view('welcome');
});

Route::prefix('user')->group(function() {

	Route::resource('/products', 'User\ProductController');
	Route::resource('/settings/address', 'User\AddressController');
	Route::resource('/settings/profile', 'User\ProfileController');
	
	Route::name('user.dashboard')->get('/', 'HomeController@index');
	Route::name('user.settings')->get('/settings', 'User\SettingsController@index');

	Route::get('/ajax-places/{region}', 'User\AddressController@ajaxCities');
	Route::name('user.avatar')->post('/ajax-avatar/{profile}', 'User\AvatarController@ajaxAvatar');
	Route::name('ucare.increment')->post('/ucare-increment', 'User\UcareController@increment');
});


Auth::routes();
Route::get('register/verify/{token}', 'Auth\RegisterController@verify');

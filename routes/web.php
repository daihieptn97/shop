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

Route::get('login', function(){
	return view('admin.login');
});

Route::post('login', 'User@login')->name('login');
Route::get('logout', function()
{
	Auth::logout();
    return redirect()->route('login');
})->name('logout');
/*
* Router for page of admin
*/
Route::group(['prefix'=>'admin','as'=>'admin.', 'middleware' => ['auth']], function() {
	Route::resource('user', 'User');
	Route::get('index','Dashboard@index')->name('index');
	Route::resource('bill','Bill');
	Route::get('profile','User@profile')->name('profile');
	Route::resource('product', 'Product');
    Route::resource('shop', 'Shop');
	Route::get('statistical', 'Dashboard@getStatistical');
});

Route::group(['prefix' => 'user'], function() {
    Route::get('index', 'User\Dashboard@index');
    Route::get('about', 'User\About@index');
    Route::get('contact', 'User\contact@index');
    Route::get('ListProduct/{id?}', 'User\ListProduct@index');
    Route::get('product/{id?}', 'User\Products@index');
    Route::resource('cart', 'User\Cart');
    Route::get('getDistance/{origin}/{destination}', 'User\Cart@getDistance');
});

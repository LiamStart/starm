<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/create', 'UserController@create')->name('user.create');
Route::get('/user/editr/{id}', 'UserController@edit')->name('users.edit');
Route::post('/user/update/{id}', 'UserController@update')->name('users.update');
Route::post('/user/store', 'UserController@store')->name('users.store');
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
Route::get('/movie', 'MovieController@index')->name('movie');
Route::get('/movie/crear', 'MovieController@create')->name('movie.create');
Route::get('/movie/edit/{id}', 'MovieController@edit')->name('movie.edit');
Route::post('/movie/store', 'MovieController@store')->name('movie.store');
Route::post('/movie/update/{id}', 'MovieController@update')->name('movie.update');

#tabla hermana episodios
Route::get('/episodies', 'EpisodiesController@index')->name('episodies');
Route::get('/episodies/crear', 'EpisodiesController@create')->name('episodies.create');
Route::get('/episodies/edit/{id}', 'EpisodiesController@edit')->name('episodies.edit');
Route::post('/episodies/store', 'EpisodiesController@store')->name('episodies.store');
Route::post('/episodies/update/{id}', 'EpisodiesController@update')->name('episodies.update');
Route::post('/profile/photo','ProfileController@upload_photo')->name('profile_photo');
Route::post('/servicio/login', 'ApkController@login');

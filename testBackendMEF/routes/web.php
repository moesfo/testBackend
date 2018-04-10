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

Route::get('/user', 'UserController@create');

Route::get('/list', 'UserController@list');

Route::get('/', 'UserController@login');

Route::get('/edit/{id}', 'UserController@update', ['id' => '{id}']);

Route::post('/user/create', 'UserController@created');

Route::post('/user/update', 'UserController@updateUser');

Route::post('/login', 'UserController@loginUser');

Route::get('/delete/{id}', 'UserController@delete', ['id' => '{id}']);

Route::get('/profile/{id}', 'UserController@profile', ['id' => '{id}']);

Route::post('/doc/import', 'UserController@import');

Route::post('/doc/export', 'UserController@export');

Route::get('/importDoc', function () {
    return view('csv');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/redirect', 'SocialAuthFacebookController@redirect');

Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/home', 'HomeController@index')->name('home');

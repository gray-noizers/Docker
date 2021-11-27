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


Route::get('/', 'ReviewController@index')->name('top');
Route::get('/show/{post_id}','ReviewController@show')->name('posts.show');
Route::get('/create','ReviewController@create')->name('posts.create');
Route::get('/edit/{post_id}','ReviewController@edit')->name('posts.edit');
Route::post('/store', 'ReviewController@store')->name('posts.store');
Route::delete('/destroy/{post_id}', 'ReviewController@destroy')->name('posts.destroy');
Route::put('/update/{post_id}', 'ReviewController@update')->name('posts.update');

Route::get('/home', 'HomeController@index')->name('home');

//ユーザー登録用のルーティング
Auth::Routes();
//Route::match(['post','put']);
//Route::resource('auth', 'Auth\LoginController',['only'=>['login','logout']]);
Route::post('/register','Auth\RegisterController@register')->name('auth.register');
Route::put('/login', 'Auth\LoginController@ulogin')->name('auth.login');
Route::get('/logout', 'Auth\LoginController@logout')->name('auth.logout');
//Route::get('')
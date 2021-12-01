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

//Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/register', 'Auth\RegisterController@index')->name('register');

// contentsの詳細画面を表示
Route::get('/contents/{id}', 'ContentsController@showDetail')->name('detail');

// user選択画面を表示
Route::get('/users/{id}', 'UserController@showUserList')->name('user');

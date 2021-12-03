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
Route::get('/contents/{id}', 'Contents\ContentsController@showDetail')->name('detail');

// user選択画面を表示
Route::get('/users/{id}', 'User\UserController@showUserList')->name('user');

// ログインしたユーザーの画像投稿画面を表示
Route::get('/contents/{id}/images/contribution', 'Contents\ContentsController@showImageContribution')->middleware('auth');

// ログインしたユーザーの画像URLを投稿
Route::post('/contents/{id}/images/contribution', 'Contents\ContentsController@imageUrlStore')->middleware('auth');

// ログインしたユーザーの画像アップロード投稿画面を表示
Route::get('/contents/{id}/images/upload', 'Contents\ContentsController@showImageUpload')->middleware('auth');

// ログインしたユーザーの画像ファイルを投稿
Route::post('/contents/{id}/images/upload', 'Contents\ContentsController@imageFileStore')->middleware('auth');

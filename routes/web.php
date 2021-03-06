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


Route::get('/', function () {
    return view('welcome');
});
*/
//API取得テスト用
Route::get('/', 'ShopsController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ユーザ機能
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['show']]);
});

// 店舗詳細ページ

Route::get('shops/show/{id}', 'ShopsController@show')->name('shops.show');
Route::get('shops/{id}/reviews', 'ReviewsController@index')->name('shops.api_shop_id');

Route::post('shops/:id/reviews', 'ReviewsController@store')->name('reviews.store');
Route::resource('reviews', 'ReviewsController', ['only' => ['destroy']]);


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

Route::group(['middleware' => 'admin'], function () {
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/admin', 'AdminController@index')->name('admin');
        Route::get('/users', 'AdminController@users')->name('users');
        Route::get('/list', 'AdminController@list')->name('list');
        Route::get('/admin/delete-user', 'AdminController@deleteUser')->name('delete-user');
    });

    Route::get('/admin/login', 'AdminController@login');
    Route::post('/admin/login', 'AdminController@postLogin')->name('login-admin');
    
    Route::get('/admin/logout', 'AdminController@logout')->name('logout-admin');
    // Route::get('/admin', function () {
    //     return view('admin/login');
    // });
});


Route::group(['middleware' => 'web'], function () {
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/ranking', 'RankingController@index')->name('ranking');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/bet', 'BetController@index')->name('bet');

    Route::get('/', function () {
        return view('auth/login');
    });
});

//Auth::routes();


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

// "Welcome view" route
Route::get('/', function () {
    return view('welcome');
});

// Scaffolded Authentication Routes
Auth::routes();

// "Home view" route
Route::get('/home', 'HomeController@index')->name('home');

// Google Login Routes
Route::get('auth/google', ['as' => 'auth/google', 'uses' => 'Auth\LoginController@redirectToProvider']);
Route::get('auth/google/callback', ['as' => 'auth/google/callback', 'uses' => 'Auth\LoginController@handleProviderCallback']);
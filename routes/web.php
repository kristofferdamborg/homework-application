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

// Home / dashboard routes
Route::get('/', 'HomeController@index')->name('home');

// Scaffolded Authentication Routes
Auth::routes();

// Fetching schools in register view
Route::get('register', 'Auth\RegisterController@index')->name('register');

// Fetching classes for selected school in register view (AJAX Call)
Route::get('/findClass','Auth\RegisterController@findClass');

// "Home view" route
Route::get('/home', 'HomeController@index')->name('home');

// Google Login Routes
Route::get('auth/google', ['as' => 'auth/google', 'uses' => 'Auth\LoginController@redirectToProvider']);
Route::get('auth/google/callback', ['as' => 'auth/google/callback', 'uses' => 'Auth\LoginController@handleProviderCallback']);

// School Admin role ONLY routes
Route::group(['middleware' => ['role:school-admin']], function() {
   
    Route::resource('class', 'SchoolClassController');
    Route::resource('subject', 'SubjectController');

});

// Admin and School Admin role ONLY routes
Route::group(['middleware' => ['role:admin|school-admin']], function() {
   
    Route::resource('user', 'UserController');

});

// Admin role ONLY routes
Route::group(['middleware' => ['auth', 'role:admin']], function() {
   
    Route::resource('role', 'RoleController');
    Route::resource('school', 'SchoolController');

});

Route::group(['middleware' => ['auth', 'role:teacher|pupil']], function() {
   
    Route::resource('homework', 'HomeworkController'); 
    Route::resource('session', 'SessionController');

});

Route::group(['middleware' => ['auth', 'role:teacher|school-admin|pupil']], function() {
   
    Route::resource('event', 'EventController'); 
});


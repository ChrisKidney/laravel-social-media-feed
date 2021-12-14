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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/users', 'AdminController@index');
Route::get('/admin/users/create', 'AdminController@create');
Route::get('/admin/users/{user}', 'AdminController@show');
Route::get('/admin/users/{user}/edit', 'AdminController@edit');
Route::patch('/admin/users/{user}', 'AdminController@update');
Route::delete('/admin/users/{user}', 'AdminController@destroy');
Route::post('/admin/users', 'AdminController@store');

Route::get('/themes', 'ThemeController@index');
Route::get('/themes/create', 'ThemeController@create');
Route::get('/themes/{theme}', 'ThemeController@show');
Route::get('/themes/{theme}/edit', 'ThemeController@edit');
Route::patch('/themes/{theme}', 'ThemeController@update');
Route::delete('/themes/{theme}', 'ThemeController@destroy');
Route::post('/themes', 'ThemeController@store');
Route::post('/themes/set', 'ThemeController@set');

Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts', 'PostController@store');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::patch('/posts/{post}', 'PostController@update');
Route::delete('/posts/{post}', 'PostController@destroy');



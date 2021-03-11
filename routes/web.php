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
    return view('article.index');
});

Route::get('/master', function () {
    return view('adminlte.master');
});

//Profile CRUD
Route::get('/profile', 'ProfileController@index');
Route::get('/profile/create', 'ProfileController@create');
Route::post('/profile', 'ProfileController@store');
Route::get('profile/{id}/edit', 'ProfileController@edit');
Route::put('/profile/{id}', 'ProfileController@update');
Route::delete('/profile/{id}', 'ProfileController@destroy');

//Article CRUD
Route::get('/article', 'articleController@index');
Route::get('/article/create', 'articleController@create');
Route::post('/article', 'articleController@store');
Route::get('article/{id}/edit', 'articleController@edit');
Route::put('/article/{id}', 'articleController@update');
Route::delete('/article/{id}', 'articleController@destroy');


// Route::resource('pertanyaan', 'pertanyaanController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

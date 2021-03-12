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

Route::get('/', 'MainController@index');

Route::get('/master', function () {
    return view('adminlte.master');
});

//Profile CRUD
Route::get('/profile', 'ProfileController@index');
Route::get('/profile/create', 'ProfileController@create');
Route::post('/profile', 'ProfileController@store');
Route::get('/profile/{id}/edit', 'ProfileController@edit');
Route::put('/profile/{id}', 'ProfileController@update');
Route::delete('/profile/{id}', 'ProfileController@destroy');

//Main CRUD
Route::get('/main', 'MainController@index');
Route::get('/main/create', 'MainController@create');
Route::post('/main', 'MainController@store');
Route::get('/main/{id}/edit', 'MainController@edit');
Route::put('/main/{id}', 'MainController@update');
Route::delete('/main/{id}', 'MainController@destroy');

//Comment CRUD
Route::get('/comment/{artikel_id}/create', 'CommentController@create');
Route::post('/comment/{artikel_id}', 'CommentController@store');
Route::get('/comment/{id}/edit', 'CommentController@edit');
Route::put('/comment/{id}', 'CommentController@update');
Route::delete('/comment/{id}', 'CommentController@destroy');

// Route::resource('pertanyaan', 'pertanyaanController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

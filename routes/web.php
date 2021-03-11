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
    return view('welcome');
});

Route::get('/master', function () {
    return view('adminlte.master');
});

Route::get('/profile', 'ProfileController@index');
Route::get('/profile/create', 'ProfileController@create');
Route::post('/profile', 'ProfileController@store');
Route::get('profile/{id}/edit', 'ProfileController@edit');
Route::put('/profile/{id}', 'ProfileController@update');
Route::delete('/profile/{id}', 'ProfileController@destroy');

//Article CRUD
Route::get('/article', function () {
    return view('article.index');
});
Route::get('/article/create', 'ArticleController@create');

// Route::get('/pertanyaan', 'pertanyaanController@index')->name('home');
// Route::get('/pertanyaan/create', 'pertanyaanController@create');
// Route::post('/pertanyaan', 'pertanyaanController@store');
// Route::get('/pertanyaan/{pertanyaan_id}', 'pertanyaanController@show');
// Route::get('/pertanyaan/{pertanyaan_id}/edit', 'pertanyaanController@edit');
// Route::put('/pertanyaan/{pertanyaan_id}', 'pertanyaanController@update');
// Route::delete('/pertanyaan/{pertanyaan_id}', 'pertanyaanController@destroy');
// Route::resource('pertanyaan', 'pertanyaanController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('/', 'GlobalController@index');

Route::get('/genre/create', 'GenreController@create');

Route::post('/genre/store', 'GenreController@store');


Route::get('/artist/create', 'ArtistController@create');

Route::post('/artist/store', 'ArtistController@store');

Route::get('/artist/{id}', 'ArtistController@edit');

Route::patch('/artist/{id}', 'ArtistController@update');

Route::delete('/artist/{id}/delete', 'ArtistController@destroy');

/* fetch all the artists of a certain genre */
Route::get('/genres/{genre}', 'ArtistController@byGenre');


Route::get('/song/create', 'SongController@create');

Route::post('/song/store', 'SongController@store');

Route::get('/songs/{id}', 'SongController@edit');

Route::patch('/songs/{id}', 'SongController@update');

Route::delete('/song/{id}/delete', 'SongController@destroy');

/* fetch all the songs of an artist */
Route::get('/artists/{artist}', 'SongController@byArtist');

Route::get('/search/{q}', 'GlobalController@search');

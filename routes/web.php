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

Route::get('/welcome', function () {
    return view('welcome');
});
// view routes
Route::get('/', 'HouzeoController@index');
Route::get('/browse/movies', 'HouzeoController@browseMovies');
Route::get('/browse/people', 'HouzeoController@browsePeople');
Route::get('/movie/{movie_id}/people', 'HouzeoController@people');
Route::get('/person/{person_id}/movies', 'HouzeoController@movies');

//person related routes
Route::get('/api/people', 'PeopleController@getAll');
Route::get('/api/person/{person_id}/movies', 'PeopleController@getAllMovies');
Route::post('/api/people', 'PeopleController@saveAll');

//movie related routes
Route::get('/api/movies', 'MoviesController@getAll');
Route::get('/api/movie/{movie_id}/people', 'MoviesController@getAllPeople');
Route::post('/api/movies', 'MoviesController@saveAll');
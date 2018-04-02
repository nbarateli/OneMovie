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
    return redirect(route('all_movies', ['page' => 1]));
})->name('index');
Route::get('/movies/all/{page}', 'MoviesController@allMovies')->name('all_movies');
Route::get('/genre/{genre}/{page}', 'MoviesController@findByGenre')->name('genre');

Route::get('/movie/{id}', 'MoviesController@findById')->name('movie');
Route::any('movies/search', 'MoviesController@searchMovies')->name('search_movies');

Auth::routes();

Route::post('/movies/rate/{id}', 'MoviesController@rate_movie')->name('rate_movie');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('login', 'Auth\LoginController@doLogin');
Route::post('/comments/addComment', 'CommentsController@addComment')->name('add_comment');
Route::get('/admin/', 'AdminController@index')->name('admin');
Route::get('/admin/add_movie', 'AdminController@addMovie')->name('add_movie');
Route::post('/admin/store_movie', 'AdminController@storeMovie')->name('store_movie');
Route::post('/admin/delete_movie/{id}', 'AdminController@deleteMovie')->name('delete_movie');
Route::any('/countries', 'MoviesController@all_countries');
Route::any('/genres', 'MoviesController@allGenres');
Route::any('/movies/rating/{id}', 'MoviesController@get_ratings_of')->name('movie_ratings');

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
})->name('index');
Route::get('/genre/{genre}/{page}', 'MoviesController@findByGenre')->name('genre');

Route::get('/movie/{id}', 'MoviesController@findById')->name('movie');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

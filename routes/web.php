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

Route::get('/api/books', 'APIBookController@index');

Route::get('/books', 'BookController@index');
// Route::get('/books/create', 'BookController@create');
// Route::post('/books', 'BookController@store');

Route::get('/books-orm', 'BookORMController@index');
Route::get('/books-orm/create', 'BookORMController@create');
Route::get('/books-orm/{id}', 'BookORMController@show');   // previous overrides all the next
Route::post('/books-orm', 'BookORMController@store');
Route::get('/books/{id}/edit', 'BookORMController@edit');
Route::post('/books/{id}/edit', 'BookORMController@update');
Route::get('/books/{id}/delete', 'BookORMController@delete');

Route::get('/publishers', 'PublisherController@index');
Route::get('/publishers/create', 'PublisherController@create');
Route::get('/publishers/{publisher_id}', 'PublisherController@show');   
Route::post('/publishers', 'PublisherController@store');

Route::get('/genres', 'GenreController@index');
Route::get('/genres/create', 'GenreController@create');
Route::get('/genres/{id}', 'GenreController@show');
Route::post('/genres', 'GenreController@store');

Route::get('/cart', 'CartController@index');
Route::get('/cart/add/{id}', 'CartController@add');
Route::post('/cart/add/', 'CartController@postAdd');

Route::post('/rewiews/{id}', 'ReviewController@store');


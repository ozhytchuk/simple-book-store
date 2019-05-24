<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'BooksController@showAllBooks')->name('books');
Route::get('/books/{id}', 'BooksByIdController@show')->name('books_by_id');
Route::get('/sort/{param}', 'SortBooksController@show')->name('sort_by');
Route::get('/search', 'SearchBooksController@show')->name('search');
Route::get('/tags/{tag_id}', 'TagsController@show')->name('tags');
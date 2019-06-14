<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'BooksController@index')->name('home');
Route::get('/books/{book}', 'BooksController@show')->name('books_by_id');
Route::get('/sort/{param}', 'BooksController@sort')->name('sort_by');
Route::get('/search', 'BooksController@search')->name('search');
Route::get('/tags/{tag}', 'TagsController@show')->name('tags');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::resource('admin', 'Admin\AdminController')->parameters([
            'admin' => 'book'
        ]);
    });
});
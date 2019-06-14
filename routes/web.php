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

Route::get('/', 'BooksController@index')->name('site.index');
Route::get('/books/{book}', 'BooksController@show')->name('site.by_id');
Route::get('/sort/{param}', 'BooksController@sort')->name('site.sort');
Route::get('/search', 'BooksController@search')->name('site.search');
Route::get('/tags/{tag}', 'TagsController@show')->name('site.tags');

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::group(['middleware' => 'admin'], function () {
            Route::resource('books', 'Admin\BookController')->parameters([
                'books' => 'book'
            ]);
            Route::resource('tags', 'Admin\TagController')->parameters([
                'tags' => 'tag'
            ]);
        });
    });
});

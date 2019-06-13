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
        /*Route::get('/', 'Admin\AdminController@dashboard')->name('admin');

        Route::get('/books/add', 'Admin\AdminController@addBook')->name('add-book');
        Route::post('/books/add', 'Admin\AdminController@addBookRequest');

        Route::get('/books/{id}', 'Admin\AdminController@show')->name('show-book');

        Route::get('/books/edit/{id}', 'Admin\AdminController@editBook')->name('edit-book');
        Route::post('/books/edit/{id}', 'Admin\AdminController@editBookRequest');

        Route::get('/delete-book/{id}', 'Admin\AdminController@deleteBook')->name('delete-book');*/
    });
});

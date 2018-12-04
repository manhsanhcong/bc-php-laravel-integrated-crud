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

Route::group(['prefix' => 'book'], function () {
    Route::get('/', 'BookController@index')->name('book.index')->middleware('auth');
    Route::get('/create', 'BookController@create')->name('book.create');
    Route::post('/create', 'BookController@store')->name('book.store');
    Route::get('/view', 'BookController@view')->name('book.view');
    Route::get('/edit/{id}', 'BookController@edit')->name('book.edit');
    Route::post('/edit/{id}', 'BookController@update')->name('book.update');
    Route::get('/delete/{id}', 'BookController@destroy')->name('book.destroy');
    Route::get('/search', 'BookController@search')->name('book.search');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

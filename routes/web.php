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
    return view('home');
})->name('home');

Auth::routes();

Route::group(['prefix' => 'album'], function () {
    Route::get('/', 'AlbumController@index')->name('album.index');
    Route::get('/create', 'AlbumController@create')->name('album.create')->middleware('auth');
    Route::post('/create', 'AlbumController@store')->name('album.store');
    Route::get('/{id}', 'AlbumController@show')->name('album.show');
    Route::get('/{id}/edit', 'AlbumController@edit')->name('album.edit')->middleware('auth');;
    Route::post('/{id}/update', 'AlbumController@update')->name('album.update');
    Route::get('/{id}/delete', 'AlbumController@delete')->name('album.delete');
    Route::post('/photo/upload', 'AlbumPhotoController@upload');
});

Route::group(['prefix' => 'spot'], function () {
    Route::get('/search/{keyword?}', 'SpotController@search');
});


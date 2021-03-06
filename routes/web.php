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
    Route::post('/create', 'AlbumController@store')->name('album.store')->middleware('auth');
    Route::get('/{id}', 'AlbumController@show')->name('album.show');
    Route::get('/{id}/edit', 'AlbumController@edit')->name('album.edit')->middleware('auth');
    Route::post('/{id}/update', 'AlbumController@update')->name('album.update')->middleware('auth');
    Route::get('/{id}/delete', 'AlbumController@delete')->name('album.delete')->middleware('auth');
    Route::post('/photo/upload', 'AlbumPhotoController@upload')->middleware('auth');
});

Route::group(['prefix' => 'spot'], function () {
    Route::get('/search/{keyword?}', 'SpotController@search');
});

Route::group(['prefix' => 'settings'], function () {
    Route::get('/', 'UserController@edit')->name('settings.profile')->middleware('auth');
    Route::post('/update', 'UserController@update')->name('settings.update')->middleware('auth');
});

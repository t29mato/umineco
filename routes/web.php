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

Route::get(
    '/', function () {
        return view('welcome');
    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'album'], function () {
    Route::get('/', 'AlbumController@index');
    Route::get('/create', 'AlbumController@create');
    Route::post('/create', 'AlbumController@store');
    Route::post('/photo/create', 'AlbumPhotoController@store');
});

Route::group(['prefix' => 'spot'], function () {
    Route::get('/search/{keyword?}', 'SpotController@search');
});


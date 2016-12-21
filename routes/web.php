<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'GalleryController@index');

Route::resource('gallery', 'GalleryController');

Route::resource('photo', 'PhotoController');

Route::get('/gallery/show/{id}', 'GalleryController@show');

Route::get('/photo/create/{id}', 'PhotoController@create');

Route::get('/photo/details/{id}', 'PhotoController@details');

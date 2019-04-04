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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/beranda', 'UsersController@index')->name('index');
Route::get('/post', 'UsersController@upload')->name('upload');
Route::get('/mygallery', 'UsersController@mygallery')->name('mygallery');
Route::get('/photo/{id}', 'UsersController@post')->name('post');
Route::get('/user/{by}', 'UsersController@userGallery')->name('user');

Route::post('/postaction', 'UsersController@uploadAction')->name('uploadaction');
Route::post('/commentaction', 'UsersController@commentAction')->name('commentaction');

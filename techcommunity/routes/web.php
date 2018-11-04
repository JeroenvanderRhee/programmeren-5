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
    return view('pages.homepage');
});

Route::resource('posts', 'PostController');

Route::get('getposts', 'AdminController@getposts')->middleware('auth', 'roleadmin');
Route::resource('admin', 'AdminController')->middleware('auth', 'roleadmin');;

Route::get('/searching', 'PostController@search');

Route::get('/editprofile', 'UpdateUser@edit');
Route::post('/updateprofile', 'UpdateUser@update');

Route::post('/active', 'PostController@statue');


Route::post('comments', 'CommentController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

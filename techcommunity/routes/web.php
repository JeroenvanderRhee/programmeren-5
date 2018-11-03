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

Route::get('contact', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/search', function () {
    return view('pages.filtering');
});

// Route::get('/news', function () {
// 	$description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vehicula augue id commodo auctor. Mauris in justo sollicitudin, suscipit augue non, cursus lacus. ";
//     $description = substr_replace ($description , "..." , 200);

// 	$url = "1/";
// 	$url .= str_replace(" ","-","Titel van dit project");
	
// 	$data = array(
// 		'id' => "1",
// 		'title' => "Titel van het project",
// 		'description' => $description,
// 		'url' => $url,);
//     return view('pages.news') -> with($data);
// });

Route::resource('posts', 'PostController');

Route::get('/searching', 'PostController@search');

Route::post('/active', 'PostController@statue');

Route::resource('comments', 'CommentController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

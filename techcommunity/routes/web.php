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

Route::get('/news', function () {
	$url = "1/";
	$url .= str_replace(" ","-","Titel van dit project");
	$data = array(
		'id' => "1",
		'title' => "Titel",
		'description' => "Beschrijving",
		'url' => $url,);
    return view('pages.news') -> with($data);
});

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
	$description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vehicula augue id commodo auctor. Mauris in justo sollicitudin, suscipit augue non, cursus lacus. ";
    $description = substr_replace ($description , "..." , 200);

	$url = "1/";
	$url .= str_replace(" ","-","Titel van dit project");
	$data = array(
		'id' => "1",
		'title' => "Titel van het project",
		'description' => $description,
		'url' => $url,);
    return view('pages.news') -> with($data);
});

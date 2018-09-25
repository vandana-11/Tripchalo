<?php

use App\Page;
use App\Package;
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

Route::prefix('dashboard')->group(function() {
	Route::get('/page/add', 'PageController@create');  
	Route::get('/page', 'PageController@index');
	Route::get('/page/{id}', 'PageController@show');
	Route::post('/page', 'PageController@store');
	Route::put('/page/{id}', 'PageController@update'); 
	Route::delete('/page/{id}', 'PageController@destroy');

	Route::get('/package/add', 'PackageController@create'); 
	Route::get('/package', 'PackageController@index');
	Route::get('/package/{id}', 'PackageController@show'); //here u can display form
	Route::post('/package', 'PackageController@store');
	Route::put('/package/{id}', 'PackageController@update'); // here u can sent request
	Route::delete('/package/{id}', 'PackageController@destroy');

	Route::get('/contact/add', 'ContactController@create');
	Route::get('/contact', 'ContactController@index');
	Route::get('/contact/{id}', 'ContactController@show');
	Route::post('/contact', 'ContactController@store');
	Route::put('/contact/{id}', 'ContactController@update'); 
	Route::delete('/contact/{id}', 'ContactController@destroy');

	Route::get('/image/add', 'ImageController@create');
	Route::get('/image', 'ImageController@index');
	Route::get('/image/{id}', 'ImageController@show');
	Route::post('/image', 'ImageController@store');
	Route::put('/image/{id}', 'ImageController@update'); 
	Route::delete('/image/{id}', 'ImageController@destroy');
});


Route::get('/packages', function() { 
	// Do the fetch here and add data
	$packages = Package::all(); 
	return view('packages', ['packages' => $packages]);
});

Route::get('/{slug}', function($slug) {
	$page = Page::where('slug', $slug)->first();
	return view('page', ['page' => $page]);
	
});





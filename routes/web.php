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

Route::get('/page', 'PageController@index');
Route::get('/page/{id}', 'PageController@show');
Route::post('/page', 'PageController@store');
Route::put('/page/{id}', 'PageController@update'); 
Route::delete('/page/{id}', 'PageController@destroy');



// Route::get('/package', 'PackageController@index');
// Route::get('/package/{id}', 'PackageController@show');
// Route::post('/package', 'PackageController@store');
// Route::put('/package/{id}', 'PackageController@update'); 
// Route::delete('/package/{id}', 'PackageController@destroy');
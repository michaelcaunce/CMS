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

// Register a list of Routes for authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Use resource to get all functions inside the CategoriesController
Route::resource('categories', 'CategoriesController');
// Use resource to get all functions inside the CategoriesController
Route::resource('posts', 'PostsController');

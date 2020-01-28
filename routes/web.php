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


//goes to the PostsController and hits the create method
Route::get('/p/create', 'PostsController@create');

//restful Resource Controller with Action show
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
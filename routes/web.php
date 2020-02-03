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


//{post}- variabel is going to hit our PostsController 
Route::get('/p/{post}', 'PostsController@show');

//goes to the PostsController and hits the create method
Route::get('/p/create', 'PostsController@create');

Route::post('/p', 'PostsController@store');


//restful Resource Controller with Action show
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
//that will show us the form
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
//that will do the process of updating
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
//Route::get('/profile/{user}', 'ProfilesController@test');
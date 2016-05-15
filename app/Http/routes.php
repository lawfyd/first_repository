<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('post', 'PostController@index');
Route::get('/', ['as' => 'posts', 'uses' => 'PostController@index']);
Route::get('unpublished', ['as' => 'posts.unpublished', 'uses' => 'PostController@unpublished']);

//Route::get('post/create', ['as' => 'post.create', 'uses' => 'PostController@create']);
//Route::post('post', ['as' => 'posts.store', 'uses' => 'PostController@store']);
//Route::get('post/{post}', ['as' => 'post.show', 'uses' => 'PostController@show']);
//Route::get('post/{post}/edit', ['as' => 'posts.edit', 'uses' => 'PostController@edit']);
//Route::post('post/{post}', ['as' => 'post.update', 'uses' => 'PostController@update']);

$router->resource('post', 'PostController');


Route::auth();

Route::get('/home', 'HomeController@index');

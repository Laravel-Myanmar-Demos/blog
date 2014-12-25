<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', 'HomeController@showWelcome');
Route::get('/blog/{id}', 'HomeController@showBlogDetail');
Route::post('/blog/comment/{id}', 'CommentController@comment');
Route::get('/admin', 'AuthController@create');
Route::post('/admin', 'AuthController@store');

Route::group(array('before' => 'auth'), function()
{
    Route::get('/admin/logout', 'AuthController@logout');

	Route::resource('admin/posts', 'PostsController');
});



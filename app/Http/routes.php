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

Route::get('/', 'HomeController@showWelcome');

Route::get('/increment/{number?}', 'HomeController@increment');

Route::get('/decrement/{number?}', 'HomeController@decrement');

Route::get('/uppercase/{name}', 'HomeController@uppercase');

Route::get('/add/{number}/{number2}', 'HomeController@add');

Route::get('/sayhello/{name}', 'HomeController@hello');

Route::get('/rolldice/{guess}', 'HomeController@roll');

Route::post('votes/vote', 'VotesController@store');

Route::get('posts/account', 'PostsController@account');
Route::get('posts/search_name', 'PostsController@search');
Route::get('posts/search_title', 'PostsController@search');
Route::get('posts/show', 'PostsController@show');

Route::resource('posts', 'PostsController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'UsersController@store');

Route::get('orm-test', function ()
{
    // test code here
    $post = \App\Post::all();
    return $post;

});

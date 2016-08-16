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

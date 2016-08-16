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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/uppercase/{name}', function($name)
{
    if ($name == "Chris") {
        return redirect('/');
    }
    $nameUpCase = strtoupper($name);
    return "Hello, $nameUpCase!";
});

Route::get('/add/{number}/{number2}', function($number, $number2) {
    return $number + $number2;
});

Route::get('/sayhello/{name}', function($name)
{
    return view('my-first-view');
});

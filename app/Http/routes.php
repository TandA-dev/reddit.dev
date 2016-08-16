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

Route::get('/increment/{number}', function ($number) {
    $data = ['number' => ($number + 1)];
    return view('increment', $data);
});

Route::get('/uppercase/{name}', function($name)
{
    if ($name == "Chris") {
        return redirect('/');
    }
    $nameUpCase = strtoupper($name);
    $data = ['name' => $nameUpCase, 'original' => $name];
    return view('uppercase', $data);
});

Route::get('/add/{number}/{number2}', function($number, $number2) {
    return $number + $number2;
});

Route::get('/sayhello/{name}', function($name)
{
  $data = array('name' => $name);
    return view('my-first-view', $data);
});

Route::get('/rolldice/{guess}', function($guess) {
  $diceRoll = mt_rand(1,6);
  if($diceRoll == $guess) {
    header('Location: http://youtube.com');
    exit;
  }
  $data = array('diceRoll' => $diceRoll, 'guess' => $guess);
  return view('roll-dice', $data);
});

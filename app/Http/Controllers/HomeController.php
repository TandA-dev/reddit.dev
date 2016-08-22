<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class HomeController extends Controller {
  public function showWelcome(){
    return view('welcome');
  }

  public function increment($number = 0) {
      $data = ['number' => ($number + 1)];
      return view('increment', $data);
  }

  public function decrement($number = 0) {
      $data = ['number' => ($number - 1)];
      return view('increment', $data);
  }

  public function uppercase($name){
      if ($name == "Chris") {
          return redirect('/');
      }
      $nameUpCase = strtoupper($name);
      $data = ['name' => $nameUpCase, 'original' => $name];
      return view('uppercase', $data);
  }

  public function add($number, $number2) {
      return $number + $number2;
  }

  public function hello($name)
  {
    $data = array('name' => $name);
      return view('my-first-view', $data);
  }

  public function roll($guess) {
    $diceRoll = mt_rand(1,6);
    if($diceRoll == $guess) {
      header('Location: http://youtube.com');
      exit;
    }
    $data = array('diceRoll' => $diceRoll, 'guess' => $guess);
    return view('roll-dice', $data);
  }
}

@extends('layouts.master')

@section('content')
    <h1>I am adding! {{ $number }}</h1>
    <a href="{{ action('HomeController@increment', $number )}}">+</a>
    <a href="{{ action('HomeController@decrement', $number )}}">-</a>

@stop

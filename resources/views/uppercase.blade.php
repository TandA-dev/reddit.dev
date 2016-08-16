@extends('layouts.master')

@section('content')
    <h1>From, {{ $original }} </h1>
    <h1>To, {{ $name }}</h1>


    <ul>
      <li><a href="{{ action('HomeController@uppercase', 'Brad' ) }}">Brad</a></li>
      <li><a href="{{ action('HomeController@uppercase', 'jon') }}">jon</a></li>
      <li><a href="{{ action('HomeController@uppercase', 'aNThone') }}">aNThone</a></li>
    </ul>
@stop

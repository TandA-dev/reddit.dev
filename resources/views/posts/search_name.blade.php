@extends('layouts.master')

@section('content')

@foreach($users as $user)

<h1><a href="{{ action('PostsController@show', $user->id) }}">{{ $user->name }}</a></h1>

@endforeach
@stop

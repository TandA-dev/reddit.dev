@extends('layouts.master')

@section('content')

<h1>Create Account</h1>
<form class="" action="{{ action('UsersController@store') }}" method="post">
  {!! csrf_field() !!}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="email">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" id="email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="text" class="form-control" name="password" id="password">
  </div>
  <button type="submit" class="btn btn-primary" name="button">Login</button>
</form>

@stop

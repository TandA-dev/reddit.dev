@extends('layouts.master')

@section('content')

<form class="" action="{{ action('Auth\AuthController@postRegister') }}" method="post">
  {{ csrf_field() }}
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
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <button type="submit" class="btn btn-primary" name="button">Register</button>
</form>

@stop

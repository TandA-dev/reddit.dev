@extends('layouts.master')

@section('content')

<form class="" action="{{ action('UsersController@update', $user->id) }}" method="POST">
  {!! csrf_field() !!}
  {{ method_field('PUT') }}

  <div class="form-group">
     <label for="name">Name</label>
     <input type="text" class="form-control" id="name" name="name" placeholder="Email" value="{{ $user->name }}">
   </div>
   <div class="form-group">
     <label for="email">Email</label>
     <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com" value="{{ $user->email }}">
   </div>
   <div class="form-group">
     <label for="password">Password</label>
     <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ $user->password }}">
   </div>

   <input class="btn btn-primary" type="submit">

</form>
@stop

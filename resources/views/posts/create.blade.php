@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('PostsController@store') }}">
{!! csrf_field() !!}

Title: <input type="text" name="title"  value="{{ old('title') }}">
@if($errors->has('title'))
{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
@endif

Content: <input type="text" name="content" value="{{ old('content') }}">

URL: <input type="text" name="url" value="{{ old('url') }}">
@if($errors->has('url'))
{!! $errors->first('url', '<span class="help-block">:message</span>') !!}
@endif

</textarea>
<input type="submit">
</form>

@stop

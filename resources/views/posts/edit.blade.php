@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('PostsController@update', $post->id) }}">
{!! csrf_field() !!}
{{ method_field('PUT') }}

Title: <input type="text" name="title"  value="{{ $post->title }}">
@if($errors->has('title'))
{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
@endif

Content: <input type="text" name="content" value="{{ $post->content }}">

URL: <input type="text" name="url" value="{{ $post->url }}">
@if($errors->has('url'))
{!! $errors->first('url', '<span class="help-block">:message</span>') !!}
@endif

</textarea>
<input type="submit">
</form>

@stop

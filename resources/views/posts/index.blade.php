@extends('layouts.master')

@section('content')

@foreach ($posts as $post)
    <h1><em>{{ $post->title }}</em></h1>
    <p>
      {{ $post->content }}
    </p>
@endforeach


@stop

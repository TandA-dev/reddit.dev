@extends('layouts.master')

@section('content')

    <h1><em>{{ $post->title }}</em></h1>
    <p>
      {{ $post->content }}
    </p>


@stop

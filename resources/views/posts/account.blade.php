@extends('layouts.master')

@section('content')

<div class="card-columns">
    @foreach ($posts as $post)
    <div class="card">
      <form class="" action="{{ action('PostsController@destroy', $post->id)}}" method="post">

      {!! csrf_field() !!}
      {{ method_field('DELETE') }}

      <h4 class="card-title title">{{ $post->title }}</h4>
        <img class="card-img-top" src="{{ $post->img }}" alt="Card image cap">
        <div class="card-block">
          <p class="card-text">{{ $post->content }}</p>
          <p class="card-text url"><small class="text-muted">{{ $post->url }}</small></p>
          <p class="card-text time"><small class="text-muted">{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</small></p>
          <p class="card-text content">Created by {{ $post->user->name }}</p>
          </form>
        </div>
      </div>
      @endforeach
    </div>


@stop
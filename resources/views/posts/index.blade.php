@extends('layouts.master')

@section('content')

  <div class="card-columns">
    @foreach ($posts as $post)
      <div class="card">
        <form class="" action="{{ action('PostsController@destroy', $post->id)}}" method="post">

        {!! csrf_field() !!}
        {{ method_field('DELETE') }}

          <img class="card-img-top" src="{{ $post->img }}" alt="Card image cap">
          <div class="card-block">
            <h4 class="card-title">{{ $post->title }}</h4>
            <p class="card-text">{{ $post->content }}</p>
            <p class="card-text url"><small class="text-muted">{{ $post->url }}</small></p>
            <p class="card-text time"><small class="text-muted">{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</small></p>
            <p class="card-text content">Created by user {{ $post->user->name }}</p>
            <a href="{{ action('PostsController@edit', $post->id)}}">Edit</a>
            <button type="submit" name="delete">Delete</button>
            </form>
          </div>
      </div>
    @endforeach
  </div>
  {!! $posts->render() !!}

@stop

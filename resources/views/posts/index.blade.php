@extends('layouts.master')

@section('content')

  <div class="card-columns">
    @foreach ($posts as $post)

    <div class="card">
        <img class="card-img-top" src="{{ $post->img }}" alt="Card image cap">
        <h4 class="card-title title">{{ $post->title }}</h4>
        <div class="card-block">
          <p class="card-text">{{ $post->content }}</p>
          <form method="POST" action="{{ action('PostsController@index' )}}">
          {!! csrf_field() !!}
            <button type="submit" class="btn btn-success" value="up" name="vote"><span>{{ $post->positive_votes }}</span> UP</button>
            <button type="submit" class="btn btn-danger" value="down" name="vote"><span>{{ $post->negative_votes }}</span> DOWN</button>
          </form>
          <p class="card-text url"><small class="text-muted">{{ $post->url }}</small></p>
          <p class="card-text time"><small class="text-muted">{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</small></p>
          <p class="card-text content">Created by {{ $post->user->name }}</p>
        </div>
      </div>
      @endforeach
    </div>

  

@stop

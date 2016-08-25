@extends('layouts.master')

@section('content')

  <div class="card-columns">
    @foreach ($posts as $post)

    <div class="card">
        <img class="card-img-top" src="{{ $post->img }}" alt="Card image cap">
        <h4 class="card-title title">{{ $post->title }}</h4>
        <div class="card-block">
          <p class="card-text">{{ $post->content }}</p>
          <form class="" action="{{ action('VotesController@store') }}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="vote" value="up">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <button class="btn btn-success" type="submit" name="up"><span>{{ $post->positive_votes }}</span> Up</button>
          </form>
          <form class="" action="{{ action('VotesController@store') }}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="vote" value="down">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <button class="btn btn-danger" type="submit" name="down"><span>{{ $post->negative_votes }}</span> Down</button>
          </form>
          <p class="card-text url"><small class="text-muted">{{ $post->url }}</small></p>
          <p class="card-text time"><small class="text-muted">{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</small></p>
          <p class="card-text content">Created by {{ $post->user->name }}</p>
        </div>
      </div>
      @endforeach
    </div>

{!! $posts->render() !!}
@stop

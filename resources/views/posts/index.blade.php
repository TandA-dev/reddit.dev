@extends('layouts.master')

@section('content')

  <div class="card-columns">
    <div class="card" style="max-width: 319px;">
      <img src="http://www.bannerinspiration.com/assets/uploads/r_27_f.jpg" alt="" />
      <div class="card-block text-right">
        <h4 class="card-title">McDonald's</h4>
        <p class="card-text">
          I am loving it so hard that I am rolling in the patties!
        </p>
      </div>
    </div>
    @foreach ($posts as $post)
      <div class="card card-block">
        <h4 class="card-title title">{{ $post->title }}</h4>
        <p class="card-text content">{{ $post->content }}</p>
        <p class="card-text url"><small class="text-muted">{{ $post->url }}</small></p>
        <p class="card-text time"><small class="text-muted">{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</small></p>
      </div>
    @endforeach
  </div>

  {!! $posts->render() !!}

@stop

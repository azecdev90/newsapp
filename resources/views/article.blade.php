@extends('layouts.public')


@section('content')

  <div class="container">
          <img src="{{URL($article->picture)}}"/>
          <h1>{{$article->title}}</h1>
          <h4>{{$article->author}}</h4>
          <p>{{$article->article}}</p>
</div>

@endsection

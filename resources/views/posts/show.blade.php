@extends('layouts.index')
@section('title')
  {{$post->title}}
@endsection
@section('content')    
<br>
<div class="container">
    <div class="title">
      <h2>{{$post->title}}</h2>
    </div>
    <div class="body">
      {!! $post->content !!}
    </div>
  </div>
@endsection

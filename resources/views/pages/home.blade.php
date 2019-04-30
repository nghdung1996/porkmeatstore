@extends('layouts.index')
@section('title')
  Home
@endsection
@section('content')
@include('layouts.slide')
  <!-- section -->
  <div class="section">
    <!-- container -->
    <div class="container">
      <div class="lastest">
        @include('pages.lastestproducts')
      </div>
    </div>
    <!-- /container -->
  </div>
  <!-- /section -->
@endsection
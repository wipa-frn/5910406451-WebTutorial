
@extends('layouts.master')
@section('content')
    
<div class="jumbotron">
  <h1 class="display-4">{{ $news->title }}</h1>
  <p class="lead"></p>
  <hr class="my-4">
  <p>{{ $news->detail }}</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>
    
@endsection
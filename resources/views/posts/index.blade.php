@extends('layouts.master')
@section('content')

<div class="container">

    <h1>All Posts </h1>

    <!-- @if(Gate::allows('create-post')) --> 
    <!-- ถ้ายังไม่ล็อกอิน Auth::user() จะเป็น null -->
    @if(Auth::user() and Auth::user()->can('create',\App\Post::class)) 
        <a href="{{ action('PostsController@create') }}">Create New Post</a>
        <hr><hr>
    @endif

        @foreach($posts as $post)
            <div>
            <a href="{{ action('PostsController@show',['id' => $post->id ]) }}">
                Title: {{ $post->title }}</a>
                
            </div>
            <hr>
        @endforeach

</div> 


 

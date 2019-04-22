@extends('layouts.master')
@section('content')

<div class="container">

    <h1>All Posts </h1>

    <a href="{{ action('PostsController@create') }}">Create New Post
    <hr><hr>

    @foreach($posts as $post)
        <div>
        <a href="{{ action('PostsController@show',['id' => $post->id ]) }}">
            Title: {{ $post->title }}
            
        </div>
        <hr>
    @endforeach



</div> 


 

@extends('layouts.master')
@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->detail }}</p>
      
</div>
<hr>
@if(Auth::user() and Auth::user()->can('create',$post)) 
<div>
    
    <a href="{{ action('PostsController@edit',['id' => $post->id ]) }}">Edit this post</a>

</div>
@endif

@if(Auth::user() and Auth::user()->can('delete',$post)) 
<!--comments section-->
<section class="comments">

    <div class="container">

        @foreach($post->comments as $comment)
            <div class="row">
            {{ $comment->detail }}
            <a href="{{ action('PostsController@edit_comment',['post_id' => $post->id ,'comment_id' => $comment->id])}}"> (edit)</a>
            </div>
        @endforeach
        
    </div>

</section>
@endif

<!--end comments section-->
@endsection

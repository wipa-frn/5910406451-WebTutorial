@extends('layouts.master')
@section('content')

<div class="container">

    <h1>Edit Comment</h1>
    <form action="{{ action('PostsController@update_comment',['post_id' => $comment->post_id , 'comment_id' => $comment->id ] ) }}" method ="POST">
    @csrf
    @method('PUT')


    <div>
        <label for="title" >Comment Detail : <label> 
        <textarea name="detail" id="detail" cols="30" rows = "10">{{ $comment->detail }}</textarea>
    </div>

    
    <div>
        <button type="submit" class="btn btn-success">Update</button> 
        <button type="reset" class="btn btn-secondary">Reset</button> 
       
    </div>
    </form>
    <br>
   
    
    


</div> 


@endsection



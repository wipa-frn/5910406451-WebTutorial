@extends('layouts.master')
@section('content')

<div class="container">

    @if(Auth::user()->can('update'$post))

    <h1>Edit POST</h1>

    @endif
    
    <form action="{{ action('PostsController@update',['id' => $post->id ]) }}" method ="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title" >Title : <label> 
        <input class ="form-control {{ $errors->has('title') ? 'is-invalid':'' }}" type="text" value="{{ old('title',$post->title) }}" name="title" id="title"/>    
        @if($errors->has('title'))
        <div class = "invalid-feedback">{{ $errors->first('title')}}</div>
        @endif
    </div>

    <div>
        <label for="title" >Detail : <label> 
        <input class="form-control {{ $errors->has('detail') ? 'is-invalid':'' }}" type="text"value="{{  old('detail',$post->detail) }}" name="detail" id="detail"/>    
        @if($errors->has('detail'))
        <div class = "invalid-feedback">{{ $errors->first('detail')}}</div>
        @endif
    </div>

    
    <div>
        <button type="submit" class="btn btn-success">Update</button> 
        <button type="reset" class="btn btn-secondary">Reset</button> 
       
    </div>
    </form>
    <br>
     <div>
    
    
    <!-- delete -->
     <form action="{{ action('PostsController@destroy',['id' => $post->id ]) }}" method ="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class = "btn btn-danger delete-post">Delete this post</button> 
        
     
     </form>

     
     </div>

    <br>

     @if($errors->any()) <!-- ถ้ามีerror -->
    <div class ="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        
        </ul>
    </div>
    @endif

    <br>
    <br>

</div> 


@endsection


@section('script')
<script>
    $(document).ready(function(){
        $('.delete-post').click(function(e){
            e.preventDefault(); 
            var is_confirm = confirm('Are you sure to delete this post'); //alert ok and cancle
            console.log(is_confirm);
            if(is_confirm){
                $(e.target).closest('form').submit(); //หาฟอร์มที่ใกล้ที่สุดด
            }
        });
        console.log('Jquery is working');
    });
</script>
@endsection


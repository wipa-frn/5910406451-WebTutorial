@extends('layouts.master')
@section('content')

<div class="container">

    <h1>Create New POST</h1>
    <form action="{{ action('PostsController@store') }}" method ="POST">
    @csrf
    <div>
        <label for="title">Title : </label> 
        <input class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}" type="text" name="title" id="title" value=" {{ old('title')}}"/>    
        @if($errors->has('title'))
        <div class = "invalid-feedback">{{ $errors->first('title')}}</div>
        @endif
    </div>
    <br>

    <div>
        <label for="title">Detail : </label> 
        <!-- <textarea class="form-control {{ $errors->has('detail') ? 'is-invalid':'' }}" id="detail" name="detail" rows="3"> {{ old('title')}}</textarea> -->
        <input class="form-control {{ $errors->has('detail') ? 'is-invalid':'' }}" type="text" name="detail" id="detail" value=" {{ old('title')}}" />    
        @if($errors->has('detail'))
        <div class = "invalid-feedback">{{ $errors->first('detail')}}</div>
        @endif
    </div>

    <br>
    <div>
        <button class="btn btn-success" type="submit">Create</button> 
        <button class="btn btn-secondary" type="reset">Reset</button> 
       
    
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
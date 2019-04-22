
@extends('layouts.master')
@section('content')
    <h1>All News</h1>
    <div>

        <h2>Highligth</h2>
        <p> Thailad Election 2019</p>

        @foreach($news as $n)

            <div class="card" style="width: 30rem;">
            <img src="https://ichef.bbci.co.uk/news/660/cpsprodpb/4769/production/_106018281_gettyimages-486155290.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $n->title }}</h5>
                <p class="card-text">{{ $n->detail }}</p>
                <!-- <a href="{{ url('/news/'. $n['id']) }}" class="btn btn-primary">Go somewhere</a> -->
                <a href="{{ action('NewsController@show', ['id' => $n->id]) }}" class="btn btn-primary">More Detail</a>
            </div>
            </div>

        @endforeach
        
        
    </div>
@endsection
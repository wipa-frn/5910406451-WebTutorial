@extends('layouts.master')

@section('content')
     <div class="container" id="app"> <!--จะเชื่อมกับ app ใน app.js -->
    
        <h1 v-if ="showTitle" > @{{ title }}</h1> 
        <button v-on:click="toggleTitle">Toggle</button>


        <example-component></example-component><hr>
        <user-info user-id="1"></user-info><hr>
        <user-info user-id="2"></user-info><hr>
        <user-info user-id="3"></user-info><hr>
        <!-- kabub case -->

        </div>













@endsection
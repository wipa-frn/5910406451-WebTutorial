@extends('layouts.master')

@section('content')
     <div class="container" id="app"> <!--จะเชื่อมกับ app ใน app.js -->
    
        <h1 v-if ="showTitle" > @{{ title }}</h1> 
        <button v-on:click="toggleTitle">Toggle</button>


        <example-component></example-component>
        <user-info user-id="1"></user-info>
        <!-- kabub case -->

        </div>













@endsection
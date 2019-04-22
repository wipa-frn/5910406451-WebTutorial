<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        //dd(action('NewController@show',['id' => 2]));
        
        $news = \App\Post::all();


        //dd($news); //dump and die

        return view('news.all-news',['news' => $news]); //return 'All News';//use . for access subfolder
        
        //return view('news.all-news')->with('news' ,$news);
        //return view('news.all-news',compact('news')); //compact('news') return ['news' => $news]
        //All the same result

    }
    
    
        public function show($id){
            
            
            $news = \App\Post::findOrFail($id); // if not found show '404 not found'
            //$news = \App\Post::find($id); // if not found show 'red & black err'
            return view('news.show',['news' => $news]);
      
    
        }
}

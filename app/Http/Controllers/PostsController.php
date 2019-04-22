<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource. ----resource of Model post
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',['posts' => $posts]);

    }

    /**
     * Show the form for creating a new resource. แสดงหน้าฟอร์มสำหรับ create กรอกเสร็จส่ง post -> store
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->all()); 
        
        //mass assignment --> name ในฟอร์มชื่อต้องตรงกับฟิล
        //$post = Post::create($request->all));
        //return redirect()->action('PostsController@show',['id' => $post->id]);
        
        $attributes = request()->validate([
            'title' => ['required','min:3'],
            'detail' => ['required','min:3']
        ]);

        $post = Post::create($attributes);

        // //ชื่อไม่ตรงกันก็ได้
        // $post = new Post;
        // $post->title = $request->input('title');
        // $post->detail = $request->input('detail');
        // $post->save();
        return redirect()->action('PostsController@show',['id' => $post->id]);
    
    }

    /**
     * Display the specified resource. ส่งไอดีเข้ามา แล้วเอาไปดึงในdbว่าจะเอาเบอร์ไรมาแสดง
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource. โชว์ไอดีที่จะแก้
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage. 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    
        $attributes = request()->validate([
            'title' => ['required','min:3'],
            'detail' => ['required','min:3']
        ]);
        

        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->detail = $request->input('detail');
        $post->save();
        return redirect()->action('PostsController@show', ['id' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->action('PostsController@index');
    }

    public function edit_comment($post_id, $comment_id){
        $post = Post::findOrFail($post_id);
        $comment = $post->comments()->findOrFail($comment_id);
        return view('posts.edit-comment',['comment' => $comment]);
    }

    public function update_comment(Request $request,$post_id,$comment_id){
        $post = Post::findOrFail($post_id);
        $comment = $post->comments()->findOrFail($comment_id);
        $comment->detail = $request->input('detail');
        $comment->save();
        return redirect()->action('PostsController@show',['id' => $post_id]);
    }
}

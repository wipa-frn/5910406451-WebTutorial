<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index'.'show']); //auth= บังคับว่า controller page นี้ ต้อง login ก่อนถึงเข้ามาได้ ยกเว้นหน้า index
    }


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
        $this->authorize('create',Post::class); //มีสิทธิ์ไหม
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
        
        $this->authorize('create',Post::class); //มีสิทธิ์ไหม เข้า/post/create ไม่ได้ถ้าเป็น viewer
        
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
        
        $post = Post::findOrFail($id);

        $this->authorize('update', $post);

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

        $this->authorize('update', $post);

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

        $this->authorize('delete', $post);

        $post->delete();
        return redirect()->action('PostsController@index');
    }

    //create Gate
    public function edit_comment($post_id, $comment_id){

        $post = Post::findOrFail($post_id);

        $comment = $post->comments()->findOrFail($comment_id);

        $this->authorize('update', $comment);

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

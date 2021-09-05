<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()

    {
       // $this->authorizeResource(Post::class, 'post');
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->isAdmin){
            return redirect('/');
        }else{


        return view('admin.posts' , ['posts' => Post::paginate(5)]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createPost')->with('categories',Category::get())
        ->with('tags',Tag::get(['id','name']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:posts|max:255',
             'body' => 'required',
        ]);
           //$post=Post::create($request->except('tag_id'));

        $post=new Post();

        $post->title=$request->title;
        $post->body=$request->body;
        $post->auther=$request->auther;
        $post->category_id=$request->category_id;
        $post->published=true;
        $post->save();
        $post->tags()->attach($request->tag_id);
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      //  $this->authorize('view',$post)
        // if(request()->user->cannot('view',$post) ){
        //     return "hhh";
        // }
        return view('admin.showPost')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.editPost')->with('post',$post)->with('categories',Category::get())
        ->with('tags',Tag::get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title=$request->title;
        $post->body=$request->body;
        $post->category_id=$request->category_id;
        $post->auther=$request->auther;
        $post->save();
        $post->tags()->sync($request->tag_id);
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $post->tags()->detach();
        return redirect('posts');
    }

    public function published(Post $post)
    {
        $post->published=!$post->published;
        $post->save();
        return redirect('posts');
    }

}

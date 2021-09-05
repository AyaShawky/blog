<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function __construct()

    {
$this->middleware('auth');
    }

 public function index()
{

   return view('home')->with('posts', post::get())->with('tags',Tag::get());
}

public function show($id){
    return view('post')->with('post', post::find($id));
}

public function saveComment(Request $request ,Post $post)
    {
         $post->comments()->create([
             'comment' => $request->content
         ]);
        // $comment = new Comment();
        // $comment->content = $request->content;
        // $comment->post_id = $id;
        // $comment->save();
        return redirect("post/" . $post->id);
    }


public function search($text)
    {
        $posts = Post::where('title' , 'LIKE' , "%$text%")->get();
        return view("_posts" , ['posts' => $posts]);
    }

}

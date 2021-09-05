<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use TagSeeder;

class dashbordController extends Controller
{
    public function index(){
        return view('admin.dashboard',
[
    'userCount' => User::count(),
    'postCount' => Post::count(),
    'categoryCount' => Category::count(),
    'tagsCount'=> Tag::count()
]
    );

    }
}


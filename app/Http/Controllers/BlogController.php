<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts=Post::latest()->where('approved',1)->orderBy('id','DESC')->paginate(4);
        return view('ui.blog.index',[
            'posts'=>$posts
        ]);
    }

    public function show(Post $post)
    {
        return view('ui.blog.show',['post'=>$post]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        return view('post.index')->withPosts(Post::all());
    }

    public function show($id)
    {      
        $post = Post::findOrFail($id);

        return view('post')->withPost($post);
    }
}

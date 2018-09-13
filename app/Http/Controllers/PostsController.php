<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index($id)
    {        
        $post = Post::find($id);

        return view('post')->withPost($post);
    }
}

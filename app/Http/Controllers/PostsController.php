<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
  function show($id){
    $post = Post::find($id);
    return view('posts.show',['post' => $post]);
  }
}

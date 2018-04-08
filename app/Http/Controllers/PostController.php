<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryPost;
use App\Post;

class PostController extends Controller
{
    public function blog()
    {
    	$categorypost =CategoryPost::all();
    	$post = Post::where('status','=',1)->paginate(2); 
    	return view('page.blog.blog',compact('categorypost','post')); 
    }
    public function post($post_id)
    {
    	$pt = Post::find($post_id);
    	return view('page.blog.post',compact('pt'));
    }
}

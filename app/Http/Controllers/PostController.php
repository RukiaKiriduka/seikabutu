<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Time;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
  

    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    
    
    public function create(Time $time)
{
    return view('posts.create')->with(['times' => $time->get()]);
}
    
    

   // public function create(Category $category)
    //{
    //    return view('posts/create')->with(['categories' => $category->get()]);
   // }

    public function store(Post $post, Request $request)
    {
        $input = $request['post'];
        $user = $request->user();
        $input += ['user_id' => $user->id]; 
        $post = new Post();
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
{
    $post->delete();
    return redirect('/');
}
    
    

}

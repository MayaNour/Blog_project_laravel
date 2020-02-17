<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        // render a single article

        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        // show a view to create a new resource
        return view('posts.create'); 

    }

    public function store()
    {
        //Persist the new resource 

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = request('title');
        $post->body = request('body');

        $post->save();

        return redirect(route('posts.user'));
        
    }

    public function edit(Post $post)
    {
        // show a view to edit an existing resource

        return view('posts.edit', compact('post'));

    }

    public function update(Post $post)
    {
        //Persist the edited resource
        $post->update([
            'title' => request('title'),
            'body' => request('body')
        ]);
        // $post->user_id = Auth::id();
        // $post->user_name = Auth::user()->name;
        // $post->title = request('title');
        // $post->body = request('body');

        // $post->save();

        return redirect(route('posts.user'));
    }

    public function destroy(Post $post){
        Post::destroy($post->id);
        return redirect(route('posts.user'));
    }

    public function get_user_post(Post $post){
        $posts = Post::where('user_id', $post->user->id)->get();
    
        return view('welcome', [
            'posts' => $posts,
            'tags' => App\Tag::all(),
            'page_no' => 4,
            'user_name' => $post->user->name
        ]);
    }

}

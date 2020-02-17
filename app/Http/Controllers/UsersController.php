<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Tag;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(User $user) {
        $posts = Post::where('user_id', $user->id)->get();
    
        return view('welcome', [
            'posts' => $posts,
            'page_no' => 4,
            'user_name' => $user->name,
            'tags' => Tag::all()
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag){
        
        $posts = $tag->posts;

        return view('welcome', ['posts' => $posts,
                                'tags' => Tag::all(),     
                                'page_no' => 5,
                                'tag_name' => $tag->name]);
    }
}

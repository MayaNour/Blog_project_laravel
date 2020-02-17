<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Comment;
use App\User;

class CommentsController extends Controller
{
    public function store()
    {
        //Persist the new resource 

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = request('post_id');
        $comment->body = request('body');

        $comment->save();

        $user = User::where('id', request('user_id'))->first();

        Mail::raw("A new comment has been added to your post.", function($message) use (&$user){
            
            $message->to($user->email)->subject("New Comment");
        });

        return  redirect()->back();
        
    }

    public function destroy(Comment $comment){
        Comment::destroy($comment->id);
        return  redirect()->back();
    }
}

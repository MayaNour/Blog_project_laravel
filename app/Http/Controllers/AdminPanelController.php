<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Charts\UserChart;
use App\AdminPanel;
use App\User;
use App\Post;
use App\Comment;

class AdminPanelController extends Controller
{
    public function index()
    {
        $users_count = User::all()->count();
        $posts_count = Post::all()->count();

        

        $last_week_users_count = DB::table('users')->whereDate('created_at', '>=', 
                                                    date('Y-m-d H:i:s',
                                                    strtotime('-7 days')) )->count();

        $last_week_posts_count = DB::table('posts')->whereDate('created_at', '>=', 
                                                    date('Y-m-d H:i:s',
                                                    strtotime('-7 days')) )->count();
                                                    
        return view('adminpanel', [
            'users_count' => $users_count,
            'posts_count' => $posts_count,
            'last_week_users_count' => $last_week_users_count,
            'last_week_posts_count' => $last_week_posts_count
        ]);
    }

    public function chart()
    {
        $users = User::select('created_at')->get();
        $posts = Post::select('created_at')->get();
        $comments = Comment::select('created_at')->get();

        $user_result = array_fill(0, 12, 0);
        
        foreach($users as $user)
        {
          $user_result[$user->created_at->month - 1] = $user_result[$user->created_at->month - 1] + 1;
        }

        $post_result = array_fill(0, 12, 0);

        foreach($posts as $post)
        {
          $post_result[$post->created_at->month - 1] = $post_result[$post->created_at->month - 1] + 1;
        }


        $comment_result = array_fill(0, 12, 0);

        foreach($comments as $comment)
        {
          $comment_result[$comment->created_at->month - 1] = $comment_result[$comment->created_at->month - 1] + 1;
        }

        $result = array(
          'user_result' => $user_result,
          'post_result' => $post_result,
          'comment_result' => $comment_result
        );

        return response()->json($result);
      }

      // private function get_array_count(Model $model)
      // {
      //   $models = $model::select('created_at')->get();

      //   $result = array_fill(0, 12, 0);

      //   foreach($models as $m)
      //   {
      //     $result[$m->created_at->month - 1] = $result[$m->created_at->month - 1] + 1;
      //   }

      //   return $result;
      // }
}

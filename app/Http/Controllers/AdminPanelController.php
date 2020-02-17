<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\AdminPanel;
use App\User;
use App\Post;

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
}

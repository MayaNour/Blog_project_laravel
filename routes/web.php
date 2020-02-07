<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome', [
        'posts' => App\Post::take(4)->get(),
        'page' => 1
    ]);
})->name('home');

Auth::routes();

// Route::get('/posts', function () {
//     $posts = App\Post::latest()->get();

//     return view('welcome', [
//         'posts' => $posts,
//         'page' => 2
//     ]);
// })->name('posts.all');

// Route::get('/posts/user', function () {
//     $posts = App\Post::where('user_id', Auth::id())->get();

//     return view('posts.userPosts', [
//         'posts' => $posts,
//         'page' => 3
//     ]);
// })->name('posts.user');

// Route::get('/posts/delete/{post}', 'PostsController@destroy')->name('posts.delete');
// Route::get('/posts/edit/{post}', 'PostsController@edit')->name('posts.edit');
// Route::put('/posts/{post}', 'PostsController@update')->name('posts.update');
// Route::post('/posts', 'PostsController@store')->name('posts.index');
// Route::get('/create', 'PostsController@create')->name('posts.create');
// Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');

// Route::post('/comments', 'CommentsController@store')->name('comments.add');
// Route::get('/comments/delete/{comment}', 'CommentsController@destroy')->name('comments.delete');

// Route::get('/tags/{tag}', 'TagsController@index')->name('tags.index');

// Route::get('/adminpanel', 'AdminPanelController@index')->name('adminpanel');
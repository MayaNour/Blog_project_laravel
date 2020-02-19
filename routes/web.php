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
        'posts' => App\Post::latest()->take(5)->get(),
        'tags' => App\Tag::all(),
        'page_no' => 1
        // 'tags' => App\Post::latest()->get()
    ]);
})->name('welcome');

// Auth::routes();

Route::get('/posts', function () {
    return view('welcome', [
        'posts' => App\Post::latest()->get(),
        'tags' => App\Tag::all(),
        'page_no' => 2
    ]);
})->name('posts.all');

Route::get('/posts/authuser', function () {
    $posts = App\Post::where('user_id', Auth::id())->get();

    return view('welcome', [
        'posts' => $posts,
        'tags' => App\Tag::all(),
        'page_no' => 3
    ]);
})->name('posts.authuser');

Route::get('/posts/users/{user}', 'UsersController@index')->name('posts.user');

Route::get('/posts/delete/{post}', 'PostsController@destroy')->name('posts.delete');
Route::get('/posts/edit/{post}', 'PostsController@edit')->name('posts.edit');
Route::put('/posts/{post}', 'PostsController@update')->name('posts.update');
Route::post('/posts', 'PostsController@store')->name('posts.index');
Route::get('/create', 'PostsController@create')->name('posts.create');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');

Route::post('/comments', 'CommentsController@store')->name('comments.add');
Route::get('/comments/delete/{comment}', 'CommentsController@destroy')->name('comments.delete');

Route::get('/tags/{tag}', 'TagsController@index')->name('tags.index');

Auth::routes();

Route::get('/adminpanel', 'AdminPanelController@index')->name('adminpanel');
Route::get('/adminpanel/chart', 'AdminPanelController@chart')->name('adminpanel.chart');

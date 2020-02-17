@extends('layout')

@if ($page_no == 1)
@section('header')
<div id="header-featured">
  <div id="banner-wrapper">
    <div id="banner" class="container">
      <h2>First Blog</h2>
      <p>This is <strong>First blog project</strong>, a project done by <a href="https://www.linkedin.com/in/maya-noor-allah/" rel="nofollow">Maya Nour Alah</a>, in her way to learn more about back end development, especially PHP language and Laravel framework</p>
      <a href="{{ route('posts.all') }}" class="button">All posts</a> </div>
  </div>
</div>  
@endsection    
@endif

@section('content')
		<div id="content">
      @if ($page_no == 1)
        <h1>Recent posts</h1>
      @elseif($page_no == 2)
        <h1>All posts</h1>  
      @elseif($page_no == 3)
        <h1>My posts</h1>
      @elseif($page_no == 4)
        <h1>{{ $user_name }} posts</h1>
      @elseif($page_no == 5)
        <h1>{{ $tag_name }} posts</h1>
      @endif
			<ul class="style1">
        @foreach ($posts as $post)
          <li>
            <h3>{{ $post->title }}</h3>
            @foreach ($post->tags as $tag)
            <a href="/tags/{{ $tag->id }}"> #{{ $tag->name }}</a>
            @endforeach
            <p>written by <a href="/posts/users/{{ $post->user->id }}"><strong> {{ $post->user->name   }}</strong></a>, {{ $post->created_at }}</p>
            <p>{{ $post->body }}</p>
            <a href="/posts/{{ $post->id }}"><u><b>read more</b></u></a>
            @if (Auth::id() == $post->user->id)
              <div>
                <a href="/posts/edit/{{ $post->id }}">edit</a>
                <a href="/posts/delete/{{ $post->id }}">delete</a>
              </div>
            @endif
          </li>    
        @endforeach
      </ul>
    </div>
@endsection
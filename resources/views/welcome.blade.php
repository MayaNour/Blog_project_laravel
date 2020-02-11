@extends('layout')

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

@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
      <h1>Recent posts</h1>
			<ul class="style1">
        @foreach ($posts as $post)
          <li>
            <h3>{{ $post->title }}</h3>
            <p>written by <a href=""><strong>{{ $post->user->name }}</strong></a>, {{ $post->created_at }}</p>
            <p>{{ $postpost->body }}</p>
            <a href="/posts/{{ $->id }}"><u><b>read more</b></u></a>
          </li>    
        @endforeach
      </ul>
    </div>
    <div id="sidebar">
      <div id="stwo-col">
        <div class="sbox1">
          <h2>Category</h2>
          <ul class="style2">
            <li><a href="#">Semper quis egetmi dolore</a></li>
            <li><a href="#">Quam turpis feugiat dolor</a></li>
            <li><a href="#">Amet ornare hendrerit lectus</a></li>
            <li><a href="#">Quam turpis feugiat dolor</a></li>
          </ul>
        </div>
      </div>
    </div>
		</div>
	</div>
</div>
    
@endsection
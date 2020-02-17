@extends('layout')

@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
        <h1>All posts</h1>
			<ul class="style1">
                @foreach ($posts as $post)
                    <li>
                    <h3>{{ $post->title }}</h3>
                    <p>written by <a href=""><strong>{{ $post->user->name }}</strong></a>, {{ $post->created_at }}</p>
                    <p>{{ $post->body }}</p>
                    <a href="/posts/{{ $post->id }}"><u><b>read more</b></u></a>
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
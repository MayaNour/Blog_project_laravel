@extends('layout')

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>{{ $post->title }}</h2>
				<p>written by <a href="/posts/users/{{ $post->user->id }}"><strong>{{ $post->user->name }}</strong></a>, {{ $post->created_at }}</p>			<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			<p>{{ $post->body }}</p>
			<br/>
            <h2>Comments</h2>
			<ul class="style1">
				@if ($post->comments->count() == 0)
				@if (Auth::check())
					<p>Be the first to write a comment</p>
				@else
					<p>Login and be the first to write a comment</p>
				@endif
				@else
					@foreach ($post->comments as $comment)
					<li class="first">
						<h3>{{ $comment->user->name }}</h3>
						<p>{{ $comment->body }}</p>
						@if (Auth::id() == $comment->user->id)
						<div>
							<a href="/comments/delete/{{ $comment->id }}">delete</a>
						</div>
						@endif
					</li>
					@endforeach
				@endif
			</ul>
			@auth
			<h3>Leave a comment</h3>
			<form method="POST" action="/comments">
				@csrf
				<div>
					<input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}"/>
					<input type="hidden" id="user_id" name="user_id" value="{{ $post->user_id }}"/>
					<textarea type="textarea" 
						class="form-control {{ $errors->has('body') ? 'is-danger' : ''}}" 
						id="body"
						name="body">{{ old('body') }}
					</textarea>
					@error('body')    
						<p class="help is-danger">{{ $errors->first('body') }}</p>
					@enderror
				</div>
			<div>
				<input type="submit" value="Post Comment">
			</div>

			</form>
			@endauth
	</div>
</div>
    
@endsection
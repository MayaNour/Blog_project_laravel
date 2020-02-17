@extends('layout')

@section('content')
<h3>Number of users</h3>    
<p>{{ $users_count }}</p>

<h3>Number of posts</h3>
<p>{{ $posts_count }}</p>

<h3>Number of users that registered last week</h3>
<p>{{ $last_week_users_count }}</p>

<h3>Number of posts that added last week</h3>
<p>{{ $last_week_posts_count }}</p>
@endsection
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>First Blog</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/fonts.css" rel="stylesheet" type="text/css" media="all" />

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
		<div class="container">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- Left Side Of Navbar -->
				<ul class="navbar-nav mr-auto">

				</ul>

				<!-- Right Side Of Navbar -->
				<ul class="navbar-nav ml-auto">
					<!-- Authentication Links -->
					@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
							</li>
						@endif
					@else
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								@if (Auth::user()->is_admin)
								<a class="dropdown-item" href="{{ route('adminpanel') }}">
									Admin panel
								</a>
								@endif
								<a class="dropdown-item" href="{{ route('posts.authuser') }}">
									My posts
								</a>

								<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</li>
					@endguest
				</ul>
			</div>
		</div>
	</nav>
<div id="header-wrapper">
	@if (Route::current()->getName() != 'welcome')
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="{{ route('welcome') }}">First Blog</a></h1>
			</div>
			<div id="menu">
				<ul>
					<li><a href="{{ route('welcome') }}" accesskey="1" title="">Homepage</a></li>
					<li class="{{ Request::path() === 'posts' ? 'current_page_item' : ''  }}"><a href="{{ route('posts.all') }}" accesskey="2" title="">All posts</a></li>
					@auth
					<li class="{{ Request::path() === 'create' ? 'current_page_item' : ''  }}"><a href="{{ route('posts.create') }}" accesskey="3" title="">Add new post</a></li>
					@endauth
				</ul>
			</div>
		</div>	
	@endif

    @yield('header')
</div>
<div id="wrapper">
	<div id="page" class="container">
	@yield('content')
	
	</div>
</div>
</body>
</html>

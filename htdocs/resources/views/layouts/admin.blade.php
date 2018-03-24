<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link href="{{ asset('assets/stylesheets/styles.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
			<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
			</div>
            <ul class="nav navbar-top-links navbar-right">
                @guest
                    <li><a href="{{ route('login') }}">登入</a></li>
                    <li><a href="{{ route('register') }}">註冊（暫不開放）</a></li>
                @else
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="fa fa-user fa-fw"></i>{{ Auth::user()->name }} <span class="caret"></span>
                    </a>
					<ul class="dropdown-menu" style="min-width:50px;">
                        <li><a href="{{ url('/') }}"><i class="fa fa-home fa-fw"></i>回首頁</a></li>
                        <li><a href="{{ route('oauth') }}"><i class="fa fa-key fa-fw"></i>金鑰管理</a></li>
                        <li><a href="{{ route('profile') }}"><i class="fa fa-edit fa-fw"></i>修改個資</a></li>
                        <li><a href="{{ route('changeAccount') }}"><i class="fa fa-tag fa-fw"></i>變更帳號</a></li>
                        <li><a href="{{ route('changePassword') }}"><i class="fa fa-lock fa-fw"></i>變更密碼</a></li>
                        <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i>登出</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
            	@endguest
				</ul>
			</div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>
</html>
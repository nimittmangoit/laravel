<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laravel Project</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{asset('css/default.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('css/fonts.css')}}" rel="stylesheet" type="text/css" media="all" />  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body>
    <div id="header-wrapper">
        <div id="header" class="container">
            <div id="logo">
                <h1><a href="#">Laravel Project</a></h1>
            </div>
            <div id="menu">
                <ul>
                    <li class="{{ (request()->segment(1) == '') ? 'current_page_item' : '' }}" ><a href="{{url('/')}}" accesskey="1" title="">Home</a></li>
                    <li class="{{ (request()->segment(1) == 'articles') ? 'current_page_item' : '' }}"><a href="{{url('articles')}}" accesskey="2" title="">Articles</a></li>
                    <li class="{{ (request()->segment(1) == 'notes') ? 'current_page_item' : '' }}"><a href="{{url('notes')}}" accesskey="4" title="">Notes</a></li>
                    <li class="{{ (request()->segment(1) == 'api_home') ? 'current_page_item' : '' }}"><a href="{{url('api_home')}}" accesskey="4" title="">API's</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li class="{{ (request()->segment(1) == 'home') ? 'current_page_item' : '' }}"><a href="{{url('/home')}}" accesskey="3" title="">Dashboard</a></li>
                            <li class="active-class-about"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >{{ __('Logout') }}</a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <li class="{{ (request()->segment(1) == 'login') ? 'current_page_item' : '' }}"><a href="{{route('login')}}" accesskey="5" title="">Login</a></li>
                            <li class="{{ (request()->segment(1) == 'register') ? 'current_page_item' : '' }}"><a href="{{route('register')}}" accesskey="5" title="">Register</a></li>
                        @endauth
                    @endif

                </ul>
            </div>
        </div>

        @yield('header-background')

    </div>
    <div id="wrapper">
        <div id="page" class="container">

            @yield('welcome-content')

            @yield('welcome-content-side')

            @yield('career-cards')
        </div>
    </div>
    <div id="copyright" class="container">
        <p>&copy; 2020. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
    </div>
</body>

</html>

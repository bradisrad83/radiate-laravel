<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Radiate</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        @yield('css')

    <style>
        html, body {
            background-color: black;
            background-size: cover;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100%;
            width: 100%;
            margin: 0;
        }
        .btn{
          color:green;
          border: 1px solid green;
        }
        .btn:hover{
          background-color:#fff;
          color:green;
        }
        label{
            color:green;
        }
        h1{
            color:green;
        }
        .btn-primary.focus, .btn-primary:focus {
          color: #fff;
          background-color: black;
          color: green;
        }
        .navbar-inverse .navbar-brand {
          color: green;
        }
        .links>a:hover{
          color: white;
        }
        a {
            color: green;
            text-decoration: none;
        }
        .navbar-inverse .navbar-nav>li>a, .navbar-inverse .navbar-text {
            color: green;
        }
        .form-control {
            width: 100%;
            height: 36px;
            padding: 6px 12px;
            background-color: black;
            border: 1px solid green;
            border-radius: 4px;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }
        .form-control, output {
            font-size: 14px;
            line-height: 1.6;
            color: green;
            display: block;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar-inverse navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/blog') }}">All Blogs</a>
                    <a class="navbar-brand" href="{{ url('/blog/create') }}">Add Blog Entry</a>
                    <a class="navbar-brand radiate" data-toggle="modal" data-target="#myModalradio">Radiate</a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            @yield('content')
        </nav>

    <footer>
        <nav class="navbar-inverse navbar-default navbar-fixed-bottom">
          <div class="container" align="center">
            <h5>© Radiate 2017 ©</h5>
          </div>
        </nav>
    </footer>
      <!--Modals for radio and DJs-->
    <div class="modal fade" id="myModalradio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header"></div>
              <div class="modal-body">
                <audio controls autoplay="true">
                    <source src="http://67.212.189.122:8008/stream" type="audio/mpeg" crossOrigin="use-credentials"/>
                </audio>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary navbar-inverse pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    <!-- Javascript Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/dat.gui.min.js') }}"></script>
        <script src="{{ asset('js/visualize.js') }}"></script>
        @yield('js')
</body>
</html>

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Radiate</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/player.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                background-image:url('/images/2.png');
                background-size: cover;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: green;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;

            }
            .links>a:hover{
              color: white;
            }
            .navbar-inverse .navbar-brand {
                color: green;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            h5{
              color: green;
            }
            .mainbar{
              align-content: center;
            }
            .radiate{
              max-width: 100;
            }
            .modal-content{
              background-image: url("/images/1.jpg");
              background-size: contain;
            }
            video{
              opacity: 0.5;
            }
            .btn{
              color:green;
            }
            .btn:hover{
              background-color:#fff;
              color:green;
            }
            .btn-primary.focus, .btn-primary:focus {
              color: #fff;
              background-color: black;
              color: green;
            }
        </style>
    </head>
    <body>
      <nav class="navbar navbar-default navbar-static-top navbar-inverse">
          <div class="container">
            <!--Branding Image-->
              <div class="mainbar">
                <a class="navbar-brand" href="#djs">DJs</a>
                <a class="navbar-brand" href="#scheule">Schedule</a>
                <a class="navbar-brand" href="#public_blog">Blog</a>
                <a class="navbar-brand" href="#contact">Contact</a>
              </div>
          <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <div class="flex-center position-ref">
              @if (Route::has('login'))
                <div class="top-right links pull-left">
                  @if (Auth::check())
                    <a href="{{ url('/home') }}">Main</a>
                  @else
                    <a href="{{ url('/login') }}">Admin</a>
                  @endif
                </div>
              @endif
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-primary navbar-inverse btn-md btn-block" data-toggle="modal" data-target="#myModalradio">
          Radiate Radio</button>
      </nav>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <div class="content">
      </div>
      <div class="container" align="center">
        <div class="row">
        </div>
      </div>
      <footer>
        <nav class="navbar-inverse navbar-default navbar-fixed-bottom">
          <div class="container" align="center">
            <h5>© Radiate Radio 2017 ©</h5>
          </div>
        </nav>
      </footer>
      <div class="modal fade" id="myModalradio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div align="center">
              <video controls autoplay="true" name="media">
                <source src="http://67.212.189.122:8008/stream" type="audio/mpeg">
              </video>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary navbar-inverse pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

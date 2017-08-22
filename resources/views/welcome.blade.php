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
        <link href="{{ asset('css/visualize.css') }}" rel="stylesheet">

    </head>
    <body>

      <canvas id="canvas"></canvas>
      <div id="fps"></div>
      <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
          <div class="container">
            <!--Branding Image-->
              <div class="mainbar">
                <a class="navbar-brand djs">DJs</a>
                <a class="navbar-brand schedule">Schedule</a>
                <a class="navbar-brand public_blog">Blog</a>
                <a class="navbar-brand contact">Contact</a>
              </div>
          <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <div class="flex-center position-ref">
              @if (Route::has('login'))
                <div class="top-right links pull-left">
                  @if (Auth::check())
                    <a href="{{ url('/home') }}">Admin</a>
                  @else
                    <a href="{{ url('/login') }}">Login</a>
                  @endif
                </div>
              @endif
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-primary navbar-inverse btn-md btn-block" data-toggle="modal" data-target="#myModalradio">
          Radiate Radio</button>
      </nav>
      <canvas id="canvas"></canvas>
      <div id="fps"></div>
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

      <script src="{{ asset('js/dat.gui.min.js') }}"></script>
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/visualize.js') }}"></script>
      <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>

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
      <div class="container">
        <div id="djs" align="center">
          <div class="row">
            <div class="col-sm-4"> 
              <img src ="/images/dj1.jpg" height="200" width="200" id="dj1"></img> 
              <h1>Peter</h1>
            </div> 
            <div class="col-sm-4"> 
              <img src ="/images/dj2.jpg" height="200" width="200"></img> 
            </div> 
            <div class="col-sm-4"> 
              <img src ="/images/dj3.jpg" height="200" width="200"></img> 
            </div> 
          </div>
           <br>
          <div class="row">
            <div class="col-sm-4"> 
              <img src ="/images/dj4.jpg" height="200" width="200"></img> 
            </div> 
            <div class="col-sm-4"> 
              <img src ="/images/dj5.jpg" height="200" width="200"></img> 
            </div> 
            <div class="col-sm-4"> 
              <img src ="/images/dj6.jpg" height="200" width="200"></img> 
            </div> 
          </div>
        </div>
      </div>
      <div class="container">
        <div id="schedule">
          <div class="row"> 
            <div class = "col-md-1"> 
              <h4>Time(EST)</h4> 
                <p>12:00am</p> 
                <p>12:30am</p>
                <p>1:00am</p>
                <p>1:30am</p>
                <p>2:00am</p>
                <p>2:30am</p>
                <p>3:00am</p>
                <p>3:30am</p>
                <p>4:00am</p>
                <p>5:00am</p>
                <p>6:00am</p>
                <p>6:30am</p>
                <p>7:00am</p>
                <p>7:30am</p>
                <p>8:00am</p>
                <p>8:30am</p>
                <p>9:00am</p>
                <p>9:30am</p>
                <p>10:00am</p>
                <p>10:30am</p>
                <p>11:00am</p>
                <p>11:30am</p>
                <p>12:00pm</p>
                <p>12:30pm</p>
                <p>1:00pm</p>
                <p>1:30pm</p>
                <p>2:00pm</p>
                <p>2:30pm</p>
                <p>3:00pm</p>
                <p>3:30pm</p>
                <p>4:00pm</p>
                <p>5:00pm</p>
                <p>6:00pm</p>
                <p>6:30pm</p>
                <p>7:00pm</p>
                <p>7:30pm</p>
                <p>8:00pm</p>
                <p>8:30pm</p>
                <p>9:00pm</p>
                <p>9:30pm</p>
                <p>10:00pm</p>
                <p>10:30pm</p>
                <p>11:00pm</p>
                <p>11:30pm</p>
            </div>                
        </div> 
      </div>
      <div class="container">
        <div id="public_blog">
        </div>
      </div>
      <div class="container">
        <div id="contact">
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
            <div class="modal-header"></div>
              <div class="modal-body">
                <audio controls autoplay="true">
                    <source src="http://67.212.189.122:8008/stream" type="audio/mpeg" crossOrigin="use-credentials"/>
                </audio>
                <div style="white-space: nowrap; overflow: hidden; margin-right: 8px">
			              Now playing: <a href="/tunein/pcasti00.pls" id="cc_strinfo_summary_pcasti00" class="cc_streaminfo" style="text-overflow: ellipsis">Loading...</a> (<span id="cc_strinfo_server_pcasti00" class="cc_streaminfo"></span>)<br />
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary navbar-inverse pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/dat.gui.min.js') }}"></script>
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/visualize.js') }}"></script>
      <script src="{{ asset('js/ondemand.js') }}"></script>
      <script src="{{ asset('js/player.js') }}"></script>
      <script src="{{ asset('js/request.js') }}"></script>
      <script src="{{ asset('js/streaminfo.js') }}"></script>
      <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>

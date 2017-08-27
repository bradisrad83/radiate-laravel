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
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/visualize.css" rel="stylesheet">

          
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
                <a class="navbar-brand visualizer">Visualizer(On/Off)</a>
              </div>
          <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <div class="flex-center position-ref">
              @if (Route::has('login'))
                <div class="top-right links pull-left">
                  @if (Auth::check())
                    <a href="{{ url('/home') }}">Admin</a>
                  @else
                    <a href="{{ url('/register') }}">Admin</a>
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
      <br> 
      <br> 
          <div class="row">
            <div class="col-sm-4"> 
              <img src ="/images/dj1.jpg" height="200" width="200" id="dj1" data-toggle="modal" data-target="#myModaldj1"></img> 
              <h1>DeeLeeT</h1>
            </div> 
            <div class="col-sm-4"> 
              <img src ="/images/dj2.jpg" height="200" width="200" id="dj2" data-toggle="modal" data-target="#myModaldj2"></img> 
              <h1>Johnny Midnite</h1>
            </div> 
            <div class="col-sm-4"> 
              <img src ="/images/dj3.jpg" height="200" width="200" id="dj3" data-toggle="modal" data-target="#myModaldj3"></img> 
              <h1>Doug</h1>
            </div> 
          </div>
           <br>
          <div class="row">
            <div class="col-sm-4"> 
              <img src ="/images/dj4.jpg" height="200" width="200" id="dj4" data-toggle="modal" data-target="#myModaldj4"></img> 
              <h1>Special K</h1>
            </div> 
            <div class="col-sm-4"> 
              <img src ="/images/dj5.jpg" height="200" width="200" id="dj5" data-toggle="modal" data-target="#myModaldj5"></img> 
              <h1>Torgo</h1>
            </div> 
            <div class="col-sm-4"> 
              <img src ="/images/dj6.jpg" height="200" width="200" id="dj6" data-toggle="modal" data-target="#myModaldj6"></img> 
              <h1>J-Nige</h1>
            </div> 
          </div>
        </div>
      </div>
      <div class="container">
        <div id="schedule">
          <div class="row"> 
            <div class = "col-sm-2"> 
              <h4 class="sunday">Sunday</h4>
              <h4 class="monday">Monday</h4>
              <h4 class="tuesday">Tuesday</h4>
              <h4 class="wednesday">Wednesday</h4> 
              <h4 class="thursday">Thursday</h4>
              <h4 class="friday">Friday</h4>
              <h4 class="saturday">Saturday</h4>
            </div> 
           <div class="col-sm-2" id="times"> 
              <p>Time (EST)</p>
              <p>12:00am</p>
              <p>12:30am</p>
              <p>1:00am</p>
              <p>1:30am</p>
              <p>2:00am</p>
              <p>2:30am</p>
              <p>3:00am</p>
              <p>3:30am</p>
              <p>4:00am</p>
              <p>4:30am</p>
              <p>5:00am</p>
              <p>5:30am</p>
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
              <p>4:30pm</p>
              <p>5:00pm</p>
              <p>5:30pm</p>
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
            <div class="col-sm-6" id="sunday"> 
              <p><strong>Sunday (Rock)</strong></p>
              <p>Insomniac Bootleg Theatre (Concert Recordings)</p>
              <p>Insomniac Bootleg Theatre (Concert Recordings)</p>
              <p>Insomniac Bootleg Theatre (Concert Recordings)</p>
              <p>Insomniac Bootleg Theatre (Concert Recordings)</p>
              <p>Insomniac Bootleg Theatre (Concert Recordings)</p>
              <p>Insomniac Bootleg Theatre (Concert Recordings)</p>
              <p>Insomniac Bootleg Theatre (Concert Recordings)</p>
              <p>Insomniac Bootleg Theatre (Concert Recordings)</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>CritFail (Gaming)</p>
              <p>CritFail (Gaming)</p>
              <p>CritFail (Gaming)</p>
              <p>CritFail (Gaming)</p>
              <p>CritFail (Gaming)</p>
              <p>CritFail (Gaming)</p>
              <p>CritFail (Gaming)</p>
              <p>CritFail (Gaming)</p>
          </div>
          <div class="col-sm-6" id="monday"> 
              <p><strong>Monday</strong></p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>The Vundacast (Pop Culture Talk Show)</p>
              <p>The Vundacast (Pop Culture Talk Show)</p>
              <p>The Vundacast (Pop Culture Talk Show)</p>
              <p>The Vundacast (Pop Culture Talk Show)</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>Legends Presents: Prince (Funk/Soul/R&B/Rock)</p>
              <p>Legends Presents: Prince (Funk/Soul/R&B/Rock)</p>
              <p>-</p>
              <p>-</p>
              <p>MadSounds (Reggae/Dancehall)</p>
              <p>MadSounds (Reggae/Dancehall)</p>
          </div>
          <div class="col-sm-6" id="tuesday"> 
              <p><strong>Tuesday (Electronic)</strong></p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>In the Year 2525 (Early Synth Pop/Experimental)</p>
              <p>In the Year 2525 (Early Synth Pop/Experimental)</p>
              <p>Coupled Data (IDM/Experimental Music/Sound Collage</p>
              <p>Coupled Data (IDM/Experimental Music/Sound Collage</p>
              <p>Coupled Data (IDM/Experimental Music/Sound Collage</p>
              <p>Coupled Data (IDM/Experimental Music/Sound Collage</p>
              <p>Coupled Data (IDM/Experimental Music/Sound Collage</p>
              <p>Coupled Data (IDM/Experimental Music/Sound Collage</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
          </div>
            <div class="col-sm-6" id="friday"> 
              <p><strong>Friday (Dance)</strong></p>
              <p>Nocturnal Emissions (Glam/Punk/Industrial)</p>
              <p>Nocturnal Emissions (Glam/Punk/Industrial)</p>
              <p>Dead City Radio (Experimental Sounds/Radio Drama)</p>
              <p>Dead City Radio (Experimental Sounds/Radio Drama)</p>
              <p>Dead City Radio (Experimental Sounds/Radio Drama)</p>
              <p>Dead City Radio (Experimental Sounds/Radio Drama)</p>
              <p>Dead City Radio (Experimental Sounds/Radio Drama)</p>
              <p>Dead City Radio (Experimental Sounds/Radio Drama)</p>
              <p>Miami Roller Disco Party 2000 (Latin/Freestyle/Electro/Dance Pop)</p>
              <p>Miami Roller Disco Party 2000 (Latin/Freestyle/Electro/Dance Pop)</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>Miami Roller Disco Party 2000 (Latin/Freestyle/Electro/Dance Pop)</p>
              <p>Miami Roller Disco Party 2000 (Latin/Freestyle/Electro/Dance Pop)</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>Muisc is Fantasay (Italo Disco)</p>
              <p>Muisc is Fantasay (Italo Disco)</p>
              <p>Radiate Legends Presents: Prince (Funk/Soul/R&B/Rock)</p>
              <p>Radiate Legends Presents: Prince (Funk/Soul/R&B/Rock)</p>
              <p>Softer Than Satin (Disco/Mambo)</p>
              <p>Softer Than Satin (Disco/Mambo)</p>
              <p>The Witching Hour (Electro/Industrial/Witch House)</p>
              <p>The Witching Hour (Electro/Industrial/Witch House)</p>
          </div>
            <div class="col-sm-6" id="thursday"> 
              <p><strong>Thursday (Rock)</strong></p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>-</p>
              <p>Johnny Midnite's Rock n' Roll Radio (Hard Rock/Hardcore)</p>
              <p>Johnny Midnite's Rock n' Roll Radio (Hard Rock/Hardcore)</p>
              <p>Johnny Midnite's Rock n' Roll Radio (Hard Rock/Hardcore)</p>
              <p>Johnny Midnite's Rock n' Roll Radio (Hard Rock/Hardcore)</p>
              <p>Johnny Midnite's Rock n' Roll Radio (Hard Rock/Hardcore)</p>
              <p>Johnny Midnite's Rock n' Roll Radio (Hard Rock/Hardcore)</p>
              <p>Nocturnal Emissions (Glam/Punk/Industrial)</p>
              <p>Nocturnal Emissions (Glam/Punk/Industrial)</p>
          </div>
        </div> 
      </div>
      <div class="container">
        <div id="public_blog">
          @foreach($blogs as $blog => $values)
            <h4 class="blog">{{$values->created_at->format('M d Y')}}</h4> 
            <h4 class="blog">{{$values->blog_title}}</h4> 
            <p class="blog">{{$values->blog_post}}</p> 
            <hr> 
          @endforeach
        </div>
      </div>
      <div class="container" align="center">
        <div id="contact">
          <div class = "row">
            <div class = "col-sm-6">
              <h1>Contact Radiate</h1>
                <p>Do you have any comments/concerns/suggestions?  Please feel free to fill out
                  the following form and let me know what I can do to help.  Please keep in mind
                  this is a free application brought to you buy a coding bootcamp student.  I will do
                  my best to keep up with and try to make everyone happy.  I kindly thank you for
                  using my web app and hope you have a wonderful day.
                </p>
                  <div id="contact-form" align="center">
                      <form method="POST" action="https://formspree.io/programmingradiate@gmail.com">
                        <input type="hidden"
                              name="_subject"
                              value="Contact request from Radiate" />
                        <input type="email"
                              name="_replyto"
                              placeholder="Your Email Address"
                              class="form-control">
                        <br>
                        <textarea name="message"
                                  placeholder="Your message"
                                  class="form-control"
                                  rows="5"
                                  required></textarea>
                        <br>
                        <button class="btn btn-primary navbar-inverse" type="submit">Send</button>
                      </form>
                  </div>
            </div>
          </div>
        </div>                   
        </div>
      </div>
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

      <div class="modal fade" id="myModaldj1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header"></div>
              <h3 class="modal-text header"><strong>DeeLeeT</strong></h3>
                <div class="modal-body">
                  <p class="modal-text">DJ DeeLeeT is a New York City born retro music junkie. He first started in radio 
                    in 2007 with WRGP and now serves as programming director for Radiate. You can 
                    hear him on the HUMPday show and Nocturnal Emissions. He is also the brains 
                    behind Dead City Radio, Miami Roller Disco Party 2000, Radiate Legends and In 
                    the Year 2525. If you’d like to get your music on air please contact him at
                    <a href="mailto:ProgrammingRadiate@gmail.com" target="_top">ProgrammingRadiate@gmail.com</a>.</p>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary navbar-inverse pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="myModaldj2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header"></div>
              <h3 class ="modal-text header"><strong>Johnny Midnite</strong></h3>
                <div class="modal-body">
                  <p class="modal-text">Johnny Midnite is back and louder than ever! Kicking ass and taking names, 
                    calling up thunder and lightning, and making your eardrums bleed, it’s Johnny Midnite's Rock 
                    & Roll Radio! Bringing you the best in rock & roll from rockabilly to metal, and everything 
                    in between every Thursday from 7-10 PM! Turn on, tune in, and drop dead!</p>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary navbar-inverse pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="myModaldj3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header"></div>
              <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary navbar-inverse pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="myModaldj4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header"></div>
              <h3 class ="modal-text header"><strong>Special K</strong></h3>
                <div class="modal-body">
                  <p class="modal-text">She's, she's, she's a Bombshell. The unforgettable Special K is a newcomer to the radio 
                    scene. She is a career punk rocker moonlighting as a paralegal and plans on nuking the system from the very 
                    center of it. When she’s not stalking Mark Hoppus, uppercutting shady men in dark alleys or spreading her 
                    seeds of love in the form of drunk make out sessions and creepy dad jokes, she’s bringing you the 
                    Anti-Corporate Mid Day Punk show on Saturdays at noon.  Follow her on twitter/Instagram and send her your 
                    song request @mofoagogo</p>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary navbar-inverse pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="myModaldj5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header"></div>
             <h3 class="modal-text header"><strong>Torgo</strong></h3>
                <div class="modal-body">
                  <p class="modal-text">From the warehouses and seedy 8th street bars in Miami, DJ Torgo is a motherfucker 
                    (literally). He made his radio debut in 2010 and hasn’t looked back. He began his radio career with 
                    his 90s love letter: Going Blank Again and then moved on to critically praised shows such as One Hour 
                    Party People and the syndicated Wall of Sound. He now still travels around the world and began a teaching 
                    career in 2017.</p>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary navbar-inverse pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="myModaldj6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header"></div>
            <h3 class ="modal-text header"><strong>J-Nige</strong></h3>
              <div class="modal-body">
                <p class="modal-text">J-Nige was born in the Island of Ohio. His wisdom and reggae vibes can be heard on Down 
                  By The Beach. He is currently living in a rainbow colored tent on a beach.<p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary navbar-inverse pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      
      <script src="/js/app.js"></script>
      <script src="/js/jquery.min.js"></script>
      <script src="/js/dat.gui.min.js"></script>
      <script src="/js/visualize.js"></script>
      <script src="/js/main.js"></script>
    </body>
</html>

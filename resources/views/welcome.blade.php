<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Radiate</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Rock+Salt" rel="stylesheet">

        <!-- Styles 
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/visualize.css') }}" rel="stylesheet">
        @yield('css')

      -->
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
                <a class="navbar-brand visualizer">Visualizer</a>
                <a class="navbar-brand radiate" data-toggle="modal" data-target="#myModalradio">Radiate</a>
              </div>
          <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <div class="flex-center position-ref">
              @if (Route::has('login'))
                <div class="top-right links pull-left">
                  @if (Auth::check())
                    <a href="{{ url('/home') }}">Admin</a>
                  @else
                    <a href="{{ url('/login') }}">Admin</a>
                  @endif
                </div>
              @endif
            </div>
          </div>
        </div>
      </nav>
      <canvas id="canvas"></canvas>
      <div id="fps"></div>
      <div class="container">
        <div id="djs" align="center">
      <br> 
      <br> 
          <div class="row">
            <div class="col-sm-3"> 
              <img src ="/images/dj1.jpg" height="150" width="150" id="dj1" data-toggle="modal" data-target="#myModaldj1"></img> 
              <h1 class="dj-name">DeeLeeT</h1>
            </div> 
            <div class="col-sm-3"> 
              <img src ="/images/dj2.jpg" height="150" width="150" id="dj2" data-toggle="modal" data-target="#myModaldj2"></img> 
              <h1 class="dj-name">Johnny Midnite</h1>
            </div> 
            <div class="col-sm-3"> 
              <img src ="/images/dj3.jpg" height="150" width="150" id="dj3" data-toggle="modal" data-target="#myModaldj3"></img> 
              <h1 class="dj-name">Pervus Pervolous</h1>
            </div> 
            <div class="col-sm-3"> 
              <img src ="/images/dj4.jpg" height="150" width="150" id="dj4" data-toggle="modal" data-target="#myModaldj4"></img> 
              <h1 class="dj-name">Special K</h1>
            </div>           
           <br>
          </div>
          <div class="row">
            <div class="col-sm-3"> 
              <img src ="/images/dj5.jpg" height="150" width="150" id="dj5" data-toggle="modal" data-target="#myModaldj5"></img> 
              <h1 class="dj-name">Torgo</h1>
            </div> 
            <div class="col-sm-3"> 
              <img src ="/images/dj6.jpg" height="150" width="150" id="dj6" data-toggle="modal" data-target="#myModaldj6"></img> 
              <h1 class="dj-name">J-Nige</h1>
            </div> 
            <div class="col-sm-3"> 
              <img src ="/images/dj7.jpg" height="150" width="150" id="dj7" data-toggle="modal" data-target="#myModaldj7"></img> 
              <h1 class="dj-name">Madsounds</h1>
            </div> 
            <div class="col-sm-3"> 
              <img src ="/images/dj8.jpg" height="150" width="150" id="dj8" data-toggle="modal" data-target="#myModaldj8"></img> 
              <h1 class="dj-name">Mamey Disco</h1>
            </div> 
          </div>
          <br>
          <div class="row">
            <div class="col-md-3 offset-md-3"> 
              <img src ="/images/dj9.jpg" height="150" width="150" id="dj9" data-toggle="modal" data-target="#myModaldj9"></img> 
              <h1 class="dj-name">Vundacast</h1>
            </div> 
            <div class="col-md-3"> 
              <img src ="/images/dj10.jpg" height="150" width="150" id="dj10" data-toggle="modal" data-target="#myModaldj10"></img> 
              <h1 class="dj-name">Critfail</h1>
            </div> 
          </div>
        </div>
      </div>
      <div class="container">
        <div id="schedule">
          <div class="row"> 
            <div class = "col-sm-2"> 
              <h4 class="sunday day">Sunday</h4>
              <h4 class="monday day">Monday</h4>
              <h4 class="tuesday day">Tuesday</h4>
              <h4 class="wednesday day">Wednesday</h4> 
              <h4 class="thursday day">Thursday</h4>
              <h4 class="friday day">Friday</h4>
              <h4 class="saturday day">Saturday</h4>
            </div> 
            <div class="col-sm-8" id="sunday"> 
              <p><strong>Sunday</strong></p>
              <p>12:00am Insomniac Bootleg Theater</p>
              <p>1:00am Insomniac Bootleg Theater</p>
              <p>2:00am Insomniac Bootleg Theater</p>
              <p>3:00am Insomniac Bootleg Theater</p>
              <p>8:00pm Critfail</p>
              <p>9:00pm Critfail</p>
              <p>10:00pm Critfail</p>
              <p>11:00pm Critfail</p>
            </div>
            <div class="col-sm-8" id="monday"> 
              <p><strong>Monday</strong></p>
              <p>4:00pm Vundacast</p>
              <p>5:00pm Vundacast</p>
              <p>6:00pm Vundacast</p>
              <p>7:00pm Vundacast</p>
              <p>9:00pm Radiate Legends: Prince</p>
            </div>
            <div class="col-sm-8" id="tuesday"> 
                <p><strong>Tuesday</strong></p>
                <p>1:00am Dead City Radio</p>
                <p>2:00am Dead City Radio</p>
                <p>3:00am Dead City Radio</p>
                <p>6:00pm In The Year 2525</p> 
                <p>7:00pm Coupled Data</p>
                <p>8:00pm Coupled Data</p>
                <p>9:00pm Coupled Data</p>
            </div>
            <div class="col-sm-8" id="wednesday"> 
                <p><strong>Wednesday</strong></p>
                <p>7:00pm HUMPday Show</p>
                <p>8:00pm HUMPday Show</p>
                <p>9:00pm HUMPday Show</p>
            </div>
            <div class="col-sm-8" id="thursday"> 
              <p><strong>Thursday</strong></p>
              <p>3:00pm Down By The Beach</p> 
              <p>7:00pm Johnny Midnite's Rock N' Roll Radio</p>
              <p>8:00pm Johnny Midnite's Rock N' Roll Radio</p>
              <p>9:00pm Johnny Midnite's Rock N' Roll Radio</p>
              <p>10:00pm Nocturnal Emissions</p>
              <p>11:00pm Nocturnal Emissions</p>
            </div>
            <div class="col-sm-8" id="friday"> 
              <p><strong>Friday</strong></p>
              <p>12:00am Nocturnal Emissions</p> 
              <p>1:00am Dead City Radio</p>
              <p>2:00am Dead City Radio</p>
              <p>3:00am Dead City Radio</p>
              <p>5:00am Miami Roller Disco Party 2000</p>
              <p>5:00pm Miami Roller Disco Party 2000</p>
              <p>8:00pm Music is Fantasy</p> 
              <p>9:00pm Radiate Legends: Prince</p> 
              <p>10:00pm Softer Than Satin</p> 
              <p>11:00pm Witching Hour</p>
            </div>
            <div class="col-sm-8" id="saturday"> 
              <p><strong>Satuday</strong></p> 
              <p>12:00pm Anti-Corporate Mid Day Punk Show</p> 
              <p>8:00pm DreamEater</p>
              <p>9:00pm DreamEater</p>
              <p>10:00pm DreamEater</p>
              <p>11:00pm DreamEater</p>
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
                <p class="contact-text">Thank you all so very much for listening and visiting Radiate.  We are all so happy 
                   to have you here.  If there is any type of programming/music you would like to hear, 
                   please fill out the form below and let us know.  Want your music/show on here to, you 
                   guessed it, fill out the form below.  Enjoy listening and have fun with our visuals.  
                   Radiate, OUT!!!!!!!!!
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

      <div class="modal fade" id="myModaldj7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header"></div>
            <h3 class ="modal-text header"><strong>Madsounds</strong></h3>
              <div class="modal-body">
                <p class="modal-text">MadSounds is truly a first-class DJ. He has expertise in many different genres of music 
                  but specialize in house and reggae.  He has over fifteen years of DJ experience and has been known to 
                  set-the-vibe at mobile parties, on mix tapes, and at nightclubs. He was the resident DJ at “Foxes,” a Jersey 
                  City mainstay that happened to be one of the hottest clubs in the tri-state area. He also was no stranger to 
                  spinning at other hot-spots such as Drama, Sandbar, Albert’s, Renaissance, and the Supper Club. MadSounds 
                  utilizes his West Indian heritage to help him channel the skills to flawlessly mix soul-thumping reggae.  He 
                  has had a life-long love of reggae and it shows with the way he blends reggae with seamless perfection. In 
                  February of 2008, MadSounds created worldofdjs. In July of that same year, worldofdjs made its debut and 
                  went live.<p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary navbar-inverse pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="myModaldj8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header"></div>
            <h3 class ="modal-text header"><strong>Mamey Disco</strong></h3>
              <div class="modal-body">
                <p class="modal-text">The enigmatic Mamey Disco has been lighting up dancefloors since 2011. The Cuban connoisseur 
                  is an avid baker, farmer and collector of vinyl in his spare time when he isn’t lighting up your ears with his 
                  sounds on Softer Than Satin or challenging your senses on Coupled Data.<p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary navbar-inverse pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="myModaldj9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header"></div>
            <h3 class ="modal-text header"><strong>Mamey Disco</strong></h3>
              <div class="modal-body">
                <p class="modal-text">The Vundacast is the official podcast (available on iTunes and stitcher) of Vundablog.com. 
                  Vundablog.com is a place on the inter webs for pop-cultural opinions and by proxy the Vundacast is the apex of 
                  pop-cultural opinions on the topics that really matter like for example: Ripley from Aliens, Saved by the Bell, 
                  dogs, 90's Wrestling, etc, Hosted by Stephen and Danielle aka Chicken Nugget, with special guests hosts Mr. J, 
                  D-Rock, and editor extraordinaire Blockbuster Guy Frank. The Vundacast can reached on Facebook or Twitter @Vundablog 
                  or @vundacast or be email <a href="mailto:Vundacast@gmail.com" target="_top">Vundacast@gmail.com</a> or 
                  <a href="mailto:Vundablog@gmail.com" target="_top">Vundablog@gmail.com</a> 
                  <a href="https://www.facebook.com/vundablog" target="_top">https://www.facebook.com/vundablog</a> 
                  <a href="https://twitter.com/vundacast" target="_top">https://twitter.com/vundacast</a>.<p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary navbar-inverse pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="myModaldj10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header"></div>
            <h3 class ="modal-text header"><strong>Critfail</strong></h3>
              <div class="modal-body">
                <p class="modal-text">Heyo, I'm Kel. I run the Critfail show. The guys you'll hear on the show are Pat, Joe, Brandon, 
                  Cody, Jim and occasionally other guests (Lackey being the most recent). We play table top RPG's, stuff like D&D. 
                  I do my best to edit out the bs, but lets be honest, most gaming groups are just an excuse to make each other 
                  laugh and hopefully you'll get a few laughs too<p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary navbar-inverse pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
  <!--    
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/dat.gui.min.js') }}"></script>
  <script src="{{ asset('js/visualize.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  @yield('js')
-->

      
      <script src="/js/app.js"></script>
      <script src="/js/jquery.min.js"></script>
      <script src="/js/dat.gui.min.js"></script>
      <script src="/js/visualize.js"></script>
      <script src="/js/main.js"></script>
      @yield('js')
    </body>
</html>

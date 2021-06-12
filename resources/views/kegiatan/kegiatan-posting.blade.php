<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>SILEBAR</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Your page description here" />
  <meta name="author" content="" />

  <!-- css -->
  <link href="{{asset('Remember/css/bootstrap.css')}}" rel="stylesheet" />
  <link href="{{asset('Remember/css/bootstrap-responsive.css')}}" rel="stylesheet" />
  <link href="{{asset('Remember/css/prettyPhoto.css')}}" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="{{asset('Remember/css/style.css')}}" rel="stylesheet">

  <!-- Theme skin -->
  <link id="t-colors" href="{{asset('Remember/color/default.css')}}" rel="stylesheet" />

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('Remember/ico/apple-touch-icon-144-precomposed.png')}}" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('Remember/ico/apple-touch-icon-114-precomposed.png')}}" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('Remember/ico/apple-touch-icon-72-precomposed.png')}}" />
  <link rel="apple-touch-icon-precomposed" href="{{asset('Remember/ico/apple-touch-icon-57-precomposed.png')}}" />
  <link rel="shortcut icon" href="{{asset('Remember/ico/favicon.png')}}" />

  <!-- =======================================================
    Theme Name: Remember
    Theme URL: https://bootstrapmade.com/remember-free-multipurpose-bootstrap-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>

  <div id="wrapper">
    <!-- start header -->
    <header>
      <div class="top">
        <div class="container">
          <div class="row">
            <div class="span6">
              <ul class="topmenu">
                <li><a href="{{Route('kegiatan.index')}}">Home</a></li>
                <!-- <li><a href="#">Terms</a> &#47;</li>
                <li><a href="#">Privacy policy</a></li> -->
              </ul>
            </div>
            <div class="span6">

              <ul class="social-network">
                <li><a href="#" data-placement="bottom" title="Facebook"><i class="icon-circled icon-bglight icon-facebook"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Twitter"><i class="icon-circled icon-bglight icon-twitter"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Linkedin"><i class="icon-circled icon-linkedin icon-bglight"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Pinterest"><i class="icon-circled icon-pinterest  icon-bglight"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Google +"><i class="icon-circled icon-google-plus icon-bglight"></i></a></li>
              </ul>

            </div>
          </div>
        </div>
      </div>
      <div class="container">


        <div class="row nomargin">
          <div class="span4">
            <div class="logo">
              <h1><a href="index.html"><i class="icon-tint"></i> SILEBAR</a></h1>
            </div>
          </div>
          <div class="span8">
            <div class="navbar navbar-static-top">
              <div class="navigation">
                <nav>
                  <ul class="nav topnav">
                    <li><a href="index.html">Home</a></li>
                    <li class="dropdown active">
                      <a href="#">Kegiatan</a>
                    </li>
                    <li>
                      <a href="{{ route('login') }}">Login</a>
                    </li>
                    <li>
                      <a href="{{ route('register') }}">Register</a>
                    </li>
                    <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                    </li>

                  </ul>
                </nav>
              </div>
              <!-- end navigation -->
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header -->

    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Kegiatan</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="index.html">Home</a> <i class="icon-angle-right"></i></li>
              <li class="active">Kegiatan Warga</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section id="content">
      <div class="container">
        <div class="row">

          <div class="span4">

            <aside class="left-sidebar">

              <div class="widget">
                <form>
                  <div class="input-append">
                    <input class="span2" id="appendedInputButton" type="text" placeholder="Type here">
                    <button class="btn btn-color" type="submit">Search</button>
                  </div>
                </form>
              </div>

              <div class="widget">

                <h5 class="widgetheading">Categories</h5>

                <ul class="cat">
                  <li><i class="icon-angle-right"></i> <a href="#">Web design</a><span> (20)</span></li>
                  <li><i class="icon-angle-right"></i> <a href="#">Online business</a><span> (11)</span></li>
                  <li><i class="icon-angle-right"></i> <a href="#">Marketing strategy</a><span> (9)</span></li>
                  <li><i class="icon-angle-right"></i> <a href="#">Technology</a><span> (12)</span></li>
                  <li><i class="icon-angle-right"></i> <a href="#">About finance</a><span> (18)</span></li>
                </ul>
              </div>

              <div class="widget">

                <h5 class="widgetheading">Recent posts</h5>

                <ul class="cat">
                  <li><i class="icon-angle-right"></i> <a href="#">Lorem ipsum dolor sit amet</a></li>
                  <li><i class="icon-angle-right"></i> <a href="#">Ancillae senserit scribentur ea vel</a></li>
                  <li><i class="icon-angle-right"></i> <a href="#">Persius nostrum eleifend ad has</a></li>
                  <li><i class="icon-angle-right"></i> <a href="#">Facilis mediocrem urbanitas ad sed</a></li>
                  <li><i class="icon-angle-right"></i> <a href="#">Eripuit veritus docendi cum ut</a></li>
                </ul>
              </div>

              <div class="widget">

                <h5 class="widgetheading">Video widget</h5>
                <div class="video-container">
                  <iframe src="http://player.vimeo.com/video/30585464?title=0&amp;byline=0"></iframe>
                </div>
              </div>

              <div class="widget">
                <h5 class="widgetheading">Flickr photostream</h5>
                <div class="flickr_badge">
                  <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=8&amp;display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user=34178660@N03"></script>
                </div>
                <div class="clear"></div>
              </div>
              <div class="widget">

                <h5 class="widgetheading">Text widget</h5>
                <p>
                  Lorem ipsum dolor sit amet, quo everti torquatos rationibus an, graeci splendide mel cu. Sed ad vidisse eruditi maluisset, et duo mazim placerat adipiscing.
                </p>

              </div>
            </aside>
          </div>
          <div class="span8">
              @foreach ($data as $row)
            <article class="single">
              <div class="row">

                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{$row->judul}}</a></h3>
                    </div>
                    <center>
                    @if ($row->foto !=null)
                        <img src="{{ asset('img/images/'.$row->foto) }}" >
                            @else
                            <img src="{{ asset('img/images/default.png') }}" alt="user image" class="" width="300">
                        @endif</td>
                    </center>
                  </div>
                  <div class="meta-post">
                    <a href="#" class="author">By<br /> {{$row->user_id}}</a>
                    <a href="#" class="date">Tanggal<br /> {{$row->tanggal}}</a>
                  </div>
                  <p>
                   {{$row->deskripsi}}
                  </p>
                  <div>
                    <ul class="meta-bottom">
                      <li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
                      <li><i class="icon-tags"></i> <a href="#">Web design</a>, <a href="#">Tutorial</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </article>
            @endforeach
            <!-- author info -->
          </div>

        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="widget">
              <div class="footer_logo">
                <h3><a href="index.html"><i class="icon-tint"></i> Remember</a></h3>
              </div>
              <address>
							  <strong>Remember company Inc.</strong><br>
  							Somestreet KW 101, Park Village W.01<br>
  							Jakarta 13426 Indonesia
  						</address>
              <p>
                <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891 <br>
                <i class="icon-envelope-alt"></i> email@domainname.com
              </p>
            </div>
          </div>
          <div class="span4">
            <div class="widget">
              <h5 class="widgetheading">Browse pages</h5>
              <ul class="link-list">
                <li><a href="#">Our company</a></li>
                <li><a href="#">Terms and conditions</a></li>
                <li><a href="#">Privacy policy</a></li>
                <li><a href="#">Press release</a></li>
                <li><a href="#">What we have done</a></li>
                <li><a href="#">Our support forum</a></li>
              </ul>

            </div>
          </div>
          <div class="span4">
            <div class="widget">
              <h5 class="widgetheading">From flickr</h5>
              <div class="flickr_badge">
                <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=8&amp;display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user=34178660@N03"></script>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
      </div>
      <div id="sub-footer">
        <div class="container">
          <div class="row">
            <div class="span6">
              <div class="copyright">
                <p><span>&copy; Remember Inc. All right reserved</span></p>
              </div>

            </div>

            <div class="span6">
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Remember
                -->
                Created by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <a href="#" class="scrollup"><i class="icon-angle-up icon-rounded icon-bglight icon-2x"></i></a>

  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="{{asset('Remember/js/jquery.js')}}"></script>
  <script src="{{asset('Remember/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('Remember/js/bootstrap.js')}}"></script>
  <script src="{{asset('Remember/js/modernizr.custom.js')}}"></script>
  <script src="{{asset('Remember/js/toucheffects.js')}}"></script>
  <script src="{{asset('Remember/js/google-code-prettify/prettify.js')}}"></script>
  <script src="{{asset('Remember/js/jquery.prettyPhoto.js')}}"></script>
  <script src="{{asset('Remember/js/portfolio/jquery.quicksand.js')}}"></script>
  <script src="{{asset('Remember/js/portfolio/setting.js')}}"></script>
  <script src="{{asset('Remember/js/animate.js')}}"></script>

  <!-- Template Custom JavaScript File -->
  <script src="{{asset('Remember/js/custom.js')}}"></script>

</body>

</html>

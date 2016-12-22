<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Code to growth</title>

    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="/template/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="/template/css/responsive.css" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="/template/images/assets/favicon.png" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    @yield('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/template/js/ie9/html5shiv.min.js"></script>
    <script src="/template/js/ie9/respond.min.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body class="@yield('class') header3">
<div id="pageloader">
    <div class="pageloader">
        <div class="thecube">
            <div class="cube c1"></div>
            <div class="cube c2"></div>
            <div class="cube c4"></div>
            <div class="cube c3"></div>
        </div>

        <div class="textedit">
            <span class="site-name">CodeToGrowth</span>
            <span class="site-tagline">Learn to code and growth your business</span>
        </div>
    </div><!-- .pageloader -->
</div><!-- #pageloader -->

<div id="wrapper">

    <header id="header" class="site-header">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-7 col-xs-2">
                        <nav class="top-nav">
                            <span class="mobile-btn"><i class="fa fa-bars"></i></span>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-md-5 col-sm-5 col-xs-10">
                        <div class="top-right">


                        </div><!-- .top-right -->
                    </div>
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .top-header -->

        <div class="mid-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="site-brand">
                            <a class="logo" href="index.html">
                                <img src="https://s22.postimg.org/gpg1h1qw1/logo.png" alt="code to growth" />
                            </a>
                        </div><!-- .site-brand -->
                    </div>

                    <div class="col-md-8">
                        <div class="header-info">
                            <nav>
                            <ul>
                                @if(Auth::guest())
                                    <li><a href="{{ url('/login') }}"><i class="fa fa-btn fa-sign-in"></i> Login</a></li>
                                    <li><a href="{{ url('/register') }}"><i class="fa fa-graduation-cap"></i> Join</a></li>
                                @else

                                    <li>
                                        <ul class="sub-menu">

                                            @if(Auth::user()->hasRole('admin'))
                                                <li><a href="{{ url('/admin')}}"><i class="fa fa-btn fa-dashboard"></i>Dashboard</a></li>
                                                <li><a href="{{ url('/user/profile')}}"><i class="fa fa-btn fa-user"></i> My profile </a></li>
                                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                                            @elseif(Auth::user()->hasRole('teacher'))
                                                <li><a href="{{ url('/teacher/dashboard')}}"><i class="fa fa-btn fa-dashboard"></i>Dashboard</a></li>
                                                <li><a href="{{ url('/user/my-courses')}}"><i class="fa fa-btn fa-book"></i> My courses </a></li>
                                                <li><a href="{{ url('/user/profile')}}"><i class="fa fa-btn fa-user"></i> My profile </a></li>
                                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                                @else
                                                <li><a href="{{ url('/user/my-courses')}}"><i class="fa fa-btn fa-book"></i> My courses </a></li>
                                                <li><a href="{{ url('/user/profile')}}"><i class="fa fa-btn fa-user"></i> My profile </a></li>
                                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                                @endif
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                                </nav>
                        </div><!-- .header-info -->
                    </div>
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .mid-header -->

        <div class="bot-header">
            <div class="container">
                <nav class="main-menu">
                    <span class="mobile-btn"><i class="fa fa-bars"></i></span>
                    <ul>
                        <li><a href="{{ url('/')}}">Home</a></li>
                        <li><a href="{{ url('/courses')}}">Courses</a></li>
                        <li><a href="{{ url('user/plans')}}">Pricing</a></li>
                        <li><a href="{{ url('user/blog')}}">Blog</a></li>
                    </ul>
                </nav>
            </div><!-- .container -->
        </div><!-- .bot-header -->
    </header><!-- .site-header -->


    @yield('content')
    <!-- .site-content -->

    <div id="bottom" class="site-bottom">
        <div class="container">
            <div class="footer-widget bottom1">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h3 class="widget-title">About Us</h3>
                            <div class="text-widget">
                                <p> We are codetogrowth , our plateform built to all people who want to learn or share there knowledge  </p>
                            </div>
                        </div><!-- .widget -->
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <div class="widget">
                                <h3 class="widget-title">What do u will learn ?</h3>
                                <div class="text-widget">
                                    <p>You wil learn how to do a real project by building a real apps.</p>
                                </div>
                            </div><!-- .widget -->
                        </div>
                    </div>


                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h3 class="widget-title">Our Socials</h3>
                            <p>Follow our socials media</p>
                            <div class="socials">
                                <ul>
                                    <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- .widget -->
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="widget contact-widget">
                            <h3 class="widget-title">Contact Us</h3>
                            <ul>
                                <li class="address">Agadir, Morocco</li>
                                <li class="mobile">+(212) 666 7689711627<br /></li>
                                <li class="email"><a href="mailto:mustapha.achtaou@gmail.com">mustapha.achtaou@gmail.com</a></li>
                            </ul>
                        </div><!-- .widget -->
                    </div>

                       </div>
                </div>
            </div><!-- .bottom1 -->
        </div><!-- .container -->
    </div><!-- .site-bottom -->
    <div class="footer-widget bottom2">
        <div class="row">
        </div>
    </div>
    <footer id="footer" class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="copyright">
                        <p>Copyright © 2016 CodeToGrowth. <a href="#"></a></p>
                    </div><!-- .copyright -->
                </div>

                <div class="col-md-6 col-sm-6">
                    <nav class="nav-footer">
                        <ul>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Disclaimer</a></li>
                            <li><a href="#">Feedback</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div><!-- .container -->
    </footer><!-- .site-footer -->
</div><!-- #wrapper -->


<!-- jQuery -->
<script src="/template/js/jquery-1.11.3.js"></script>
<!-- Boostrap -->
<script src="/template/js/vendor/bootstrap.min.js"></script>
<!-- Jquery Parallax -->
<script src="/template/js/vendor/parallax.min.js"></script>
<!-- jQuery UI -->
<script src="/template/js/vendor/jquery-ui.min.js"></script>
<!-- jQuery Sticky -->
<script src="/template/js/vendor/jquery.sticky.js"></script>
<!-- OWL CAROUSEL Slider -->
<script src="/template/js/vendor/owl.carousel.js"></script>
<!-- PrettyPhoto -->
<script src="/template/js/vendor/jquery.prettyPhoto.js"></script>
<!-- Jquery Isotope -->
<script src="/template/js/vendor/isotope.pkgd.min.js"></script>
<!-- Main -->
<script src="/template/js/main.js"></script>
<!-- Custom Script -->
<script type="text/javascript">
    (function($) {
        "use strict";
        $(document).ready(function() {
            $( '.course-list-table li li' ).on( 'click', function() {
                $( this ).toggleClass('selector');
            });
        });
    })(jQuery);
</script>
@yield('js')

</body>
</html>

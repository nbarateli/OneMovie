<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
@php
    $all_genres = (new \App\Genre())->all();
$columns = intval(count($all_genres) / 8) + 1;
$genre_columns = [];
for ($i = 0, $k = 0; $i < $columns; $i++){
    $genre_columns[$i] =  [];
    for ($j = 0; $j < 8 && $k < count($all_genres); $j++,$k++){
        $genre_columns[$i][$j] = $all_genres[$k];
    }
}
@endphp

        <!DOCTYPE html>
<html lang="en">
<head>

    @hasSection('title')
        @yield('title')
    @else
        <title>One Movies an Entertainment Category Flat Bootstrap Responsive Website Template | Home ::
            w3layouts</title>
@endif
<!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="One Movies Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            // window.scrollTo(0, 1);
        } </script>
    <!-- //for-mobile-apps -->
        <link href="{{asset('vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">

        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{ asset('css/contactstyle.css') }}" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{ asset('css/faqstyle.css') }}" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css" media="all"/>
        <link rel="stylesheet" href="{{ asset('css/search.css') }}" type="text/css" media="all"/>
        <link rel="stylesheet" href="{{asset('vendor/jquery-ui-1.12.1/jquery-ui.theme.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/jquery-ui-1.12.1/jquery-ui.structure.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/jquery-ui-1.12.1/jquery-ui.min.css')}}">
    <link href="{{ asset('css/single.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{ asset('css/medile.css') }}" rel='stylesheet' type='text/css'/>
    <!-- banner-slider -->
    <link href="{{ asset('css/jquery.slidey.min.css') }}" rel="stylesheet">
    <!-- //banner-slider -->
    <!-- pop-up -->
    <link href="{{ asset('css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all"/>

    <!-- //pop-up -->
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"/>
    <!-- //font-awesome icons -->
    <!-- js -->
    <script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
    <!-- //js -->
    <!-- banner-bottom-plugin -->
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" type="text/css" media="all">
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#owl-demo").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds

                items: 5,
                itemsDesktop: [640, 4],
                itemsDesktopSmall: [414, 3]

            });

        });
    </script>
    <!-- //banner-bottom-plugin -->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' ) }}
          rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="{{ asset('js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

            });
        });
    </script>

    <!-- start-smoth-scrolling -->
</head>

<body>
<!-- header -->
<div class="header">
    <div class="container">
        <div class="w3layouts_logo">
            <a href="{{route('index')}}"><h1>One<span>Movies</span></h1></a>
        </div>
        <div class="w3_search">
            <form id="search" action="{{route('search_movies')}}" method="get">
                <input autocomplete="off" autocomplete="false" type="text" name="title" placeholder="Search"
                       required="">
                <input type="submit" value="Go">
                @hasSection('search_parameters')
                    @yield('search_parameters')
                @endif
                <ul id="search-results">

                </ul>
            </form>
        </div>
        <div class="w3l_sign_in_register">
            <ul>
                <li><i class="fa fa-phone" aria-hidden="true"></i> (+000) 123 345 653</li>
                @if(Auth::check())
                    @php($user = Auth::user())
                    <li>Logged in as {{$user->name}}</li>
                    <li>
                        <form method="post" action="{{route('logout')}}"><input type="submit" value="Log Out"></form>
                    </li>
                    <li>
                        <form action="{{route('admin')}}"><input type="submit" value="Admin Panel"></form>
                    </li>

                @else
                    <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
            </ul>
            @endif
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header -->
<!-- bootstrap-pop-up -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Sign In & Sign Up
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <section>
                <div class="modal-body">
                    <div class="w3_login_module">
                        <div class="module form-module">
                            <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                                <div class="tooltip">Click Me</div>
                            </div>
                            <div class="form">
                                <h3>Login to your account</h3>
                                <form action="{{route('login')}}" id='login-form' method="post">
                                    <input type="text" id="mail" name="email" placeholder="Username" required="">
                                    <label for="mail" id="ajax_error"></label>
                                    <input type="password" name="password" placeholder="Password" required="">
                                    <input type="submit" value="Login">
                                </form>
                            </div>
                            <div class="form">
                                <h3>Create an account</h3>
                                <form action="{{route('register')}}" id='register-form' method="post">
                                    <input type="text" name="name" placeholder="Username" required="">
                                    <input type="password" name="password" placeholder="Password" required="">
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                           required="">
                                    <input type="email" name="email" placeholder="Email Address" required="">
                                    <input type="hidden" name="profile_picture" placeholder="Phone Number" required="">
                                    <input type="submit" value="Register">
                                </form>
                            </div>
                            <div class="cta"><a href="#">Forgot your password?</a></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    $('.toggle').click(function () {
        // Switches the Icon
        $(this).children('i').toggleClass('fa-pencil');
        // Switches the forms
        $('.form').animate({
            height: "toggle",
            'padding-top': 'toggle',
            'padding-bottom': 'toggle',
            opacity: "toggle"
        }, "slow");
    });
</script>
<!-- //bootstrap-pop-up -->
<!-- nav -->
<div class="movies_nav">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <nav>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{route('index')}}">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Genres <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <li>
                                    @foreach($genre_columns as $genres)
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                @foreach($genres as $genre)
                                                    <li>
                                                        <a href="{{route('genre',
                                                        ['genre_name' => $genre->genre_name,
                                                         'page' => 1]
                                                         )}}">{{$genre->genre_name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{asset('series.html')}}">tv - series</a></li>
                        <li><a href="{{asset('news.html')}}">news</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Country <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <li>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href="{{asset('genres.html')}}">Asia</a></li>
                                            <li><a href="{{asset('genres.html')}}">France</a></li>
                                            <li><a href="{{asset('genres.html')}}">Taiwan</a></li>
                                            <li><a href="{{asset('genres.html')}}">United States</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href="{{asset('genres.html')}}">China</a></li>
                                            <li><a href="{{asset('genres.html')}}">HongCong</a></li>
                                            <li><a href="{{asset('genres.html')}}">Japan</a></li>
                                            <li><a href="{{asset('genres.html')}}">Thailand</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href="{{asset('genres.html')}}">Euro</a></li>
                                            <li><a href="{{asset('genres.html')}}">India</a></li>
                                            <li><a href="{{asset('genres.html')}}">Korea</a></li>
                                            <li><a href="{{asset('genres.html')}}">United Kingdom</a></li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{asset('short-codes.html')}}">Short Codes</a></li>
                        <li><a href="{{asset('list.html')}}">A - z list</a></li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
</div>
@yield('slidey')
<!-- //banner -->
<!-- banner-bottom -->
@hasSection('banner_bottom')
    @yield('banner_bottom')
@endif
<!-- //banner-bottom -->
<div class="general_social_icons">
    <nav class="social">
        <ul>
            <li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
            <li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
            <li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
            <li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>
        </ul>
    </nav>
</div>
<!-- general -->
@yield('content')
<!-- //general -->
<!-- Latest-tv-series -->
@hasSection('most_popular')
    @yield('most_popular')
@endif
<!-- pop-up-box -->
<div class="footer">
    <div class="container">
        <div class="w3ls_footer_grid">
            <div class="col-md-6 w3ls_footer_grid_left">
                <div class="w3ls_footer_grid_left1">
                    <h2>Subscribe to us</h2>
                    <div class="w3ls_footer_grid_left1_pos">
                        <form action="#" method="post">
                            <input type="email" name="email" placeholder="Your email..." required="">
                            <input type="submit" value="Send">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 w3ls_footer_grid_right">
                <a href="index.html"><h2>One<span>Movies</span></h2></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-5 w3ls_footer_grid1_left">
            <p>&copy; 2016 One Movies. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
        </div>
        <div class="col-md-7 w3ls_footer_grid1_right">
            <ul>
                <li>
                    <a href="genres.html">Movies</a>
                </li>
                <li>
                    <a href="faq.html">FAQ</a>
                </li>
                <li>
                    <a href="horror.html">Action</a>
                </li>
                <li>
                    <a href="genres.html">Adventure</a>
                </li>
                <li>
                    <a href="comedy.html">Comedy</a>
                </li>
                <li>
                    <a href="icons.html">Icons</a>
                </li>
                <li>
                    <a href="contact.html">Contact Us</a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $(".dropdown").hover(
            function () {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function () {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- //Bootstrap Core JavaScript -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<script src="{{asset('js/auth.js')}}"></script>
<script type="x-template/mustache" id='search-item'>
    <li class="movie-entry">
        <img src="{{image}}">
        <a href="{{url}}">{{title}}</a>
    </li>
</script>
<!-- //here ends scrolling icon -->
</body>
@hasSection('scripts')
    <script src="{{asset('/vendor/socket.io.js')}}"></script>
    <script src="{{asset('/vendor/lodash.js')}}"></script>
    <script src="{{asset('js/search.js')}}"></script>
    @yield('scripts')
@endif
</html>
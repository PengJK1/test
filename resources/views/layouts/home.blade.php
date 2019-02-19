
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PengJK-Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
    <meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />




    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet"> -->

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('resources/views/home/style/css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('resources/views/home/style/css/icomoon.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('resources/views/home/style/css/bootstrap.css')}}">
    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{asset('resources/views/home/style/css/flexslider.css')}}">
    <!-- Theme style  -->
    <link rel="stylesheet" href="{{asset('resources/views/home/style/css/style.css')}}">

    <!-- Modernizr JS -->
    <script src="{{asset('resources/views/home/style/js/modernizr-2.6.2.min.js')}}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="{{asset('resources/views/home/style/js/respond.min.js')}}"></script>
    <![endif]-->

</head>
<body>
<div id="fh5co-page">
    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
    <aside id="fh5co-aside" role="complementary" class="border js-fullheight">

        <h1 id="fh5co-logo"><a href="index.html">PengJK</a></h1>
        <nav id="fh5co-main-menu" role="navigation">
            <ul>
                @foreach($navs as $k=>$v)
                    <li><a href="{{url($v->nav_url)}}">{{$v->nav_name}}</a></li>
                @endforeach
            </ul>
        </nav>

        <div class="fh5co-footer">
            <p><small>&copy; 2018 PengJK. All Rights Reserved.</span> </small></p>
            <ul>
                <li><a href="#" title="分享到QQ空间" onclick="window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(document.location.href)+'&desc=分享知识的快乐&summary=分享知识的快乐&title=PengJK');return false;"><i class="icon-twitch"></i></a></li>
                <!--<li><a href="#" title="分享到朋友圈"><i class="icon-vimeo2"></i></a></li>-->
            </ul>
        </div>

    </aside>

    @yield('content')

            <div class="fh5co-narrow-content">
                <div class="row">
                    <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                        <h1 class="fh5co-heading-colored">友情链接</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    @if($links)
                        @foreach($links as $k=>$v)
                            <a href="{{url($v->link_url)}}" title="{{$v->link_title}}">{{$v->link_name}}</a><br />
                        @endforeach
                    @else
                        <p class="fh5co-lead">暂时没有友情链接</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>

</div>

<!-- jQuery -->
<script src="{{asset('resources/views/home/style/js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{asset('resources/views/home/style/js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('resources/views/home/style/js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('resources/views/home/style/js/jquery.waypoints.min.js')}}"></script>
<!-- Flexslider -->
<script src="{{asset('resources/views/home/style/js/jquery.flexslider-min.js')}}"></script>
<!-- MAIN JS -->
<script src="{{asset('resources/views/home/style/js/main.js')}}"></script>

</body>
</html>

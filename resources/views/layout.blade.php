<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <title>Photo Maker</title>
    <link rel="icon" type="image/png" href="{{asset('images/icon.png')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('tcss/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('tcss/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('owl-carousel/owl.carousel.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('image-popup/source/jquery.fancybox.css?v=2.1.5')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('image-popup/source/helpers/jquery.fancybox-buttons.css?v=1.0.5')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('tcss/style.css')}}">
    @if(app()->getLocale() == 'ar')
    <link rel="stylesheet" type="text/css" href="{{asset('tcss/style-ar.css')}}">
    @elseif(app()->getLocale() == 'en')
    <link rel="stylesheet" type="text/css" href="{{asset('tcss/style-en.css')}}">
    @endif
    <style>
        input[type="file"] {
            padding: 0;
        }

        .black-box.margin-bottom {
            margin: 0 0 15px;
        }

        .checkbox-holder {
            font-weight: 100;
            position: relative;
            cursor: pointer;
            margin-bottom: 10px;
            display: block;
        }

        .checkbox-holder span {
            vertical-align: middle;
        }

        .checkbox-holder .checkbox-icon {
            width: 13px;
            height: 13px;
            line-height: 7px;
            display: inline-block;
            border: 1px solid #000;
            background: #000;
            text-align: center;
            margin: 0 4px;
        }

        .checkbox-holder input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkbox-holder .checkbox-icon:after {
            content: '';
            background: #000;
            width: 7px;
            height: 7px;
            display: block;
            margin: 2px;
        }

        .checkbox-holder input[type="checkbox"]:checked + .checkbox-icon {
            border-color: #00bcd4;
        }

        .checkbox-holder input[type="checkbox"]:checked + .checkbox-icon:after {
            background: #00bcd4;
        }

        .main-label {
            border-bottom: 1px dashed #00bcd4;
        }

        .check-open {
            margin-top: 10px;
        }
    </style>
    @yield('style')
</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--===============================
    NAV
===================================-->

<nav class="navbar navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                    <span class="fa fa-bars"></span>
                </button>

                <a href="index.html" class="navbar-brand hidden-sm hidden-md hidden-lg"><img src="{{asset('images/logo.png')}}" alt="LOGO"></a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right text-align-left">
                <li class="active"><a href="{{url('/')}}">{{__('header.home')}}</a></li>
                <li><a href="{{url('/about')}} ">{{__('header.aboutus')}}</a></li>
                <li><a href="{{url('/services')}} ">{{__('header.services')}}</a></li>
                </ul>

                <a href="index.html" class="navbar-brand hidden-xs text-center"><img src="{{asset('images/logo.png')}}" alt="LOGO"></a>

                <ul class="nav navbar-nav navbar-left text-align-right">
                <li><a href="{{url('/gallery')}}">{{__('header.photosgallery')}}</a></li>
                <li><a href="{{url('/contact')}}">{{__('header.contactus')}}</a></li>
                @if(app()->getLocale() == 'ar')
                <li><a href="{{url('/locale/en')}}">English</a></li>
                @elseif(app()->getLocale() == 'en')
                <li><a href="{{url('/locale/ar')}}">العربية</a></li>
                @endif
            </ul>
            </div>
        </div>
    </div>
</nav>


<!--===============================
Content
===================================-->
@yield('carousel')
<div class="main-content">
                @yield('content')
</div>
<!--===============================
    FOOTER
===================================-->

<footer class="navbar-fixed-bottom text-center">
    <div class="container">

        <p>{{__('main.footer')}}  &copy; 2005-{{date('Y')}} </p>

        @if($social['facebook'])
        <a href="{{$social['facebook']}} "><i class="fa fa-facebook"></i></a>
        @endif
        @if($social['twitter'])
        <a href="{{$social['twitter']}} "><i class="fa fa-twitter"></i></a>
        @endif
        @if($social['googleplus'])
        <a href="{{$social['googleplus']}} "><i class="fa fa-google-plus"></i></a>
        @endif
        @if($social['instagram'])
        <a href="{{$social['instagram']}} "><i class="fa fa-instagram"></i></a>
        @endif
        @if($social['youtube'])
        <a href="{{$social['youtube']}} "><i class="fa fa-youtube"></i></a>
        @endif
        @if($social['pinterest'])
        <a href="{{$social['pinterest']}} "><i class="fa fa-pinterest"></i></a>
        @endif        
    </div>
</footer>


<!--===============================
    SCRIPT
===================================-->

<script src="{{asset('tjs/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('tjs/bootstrap.min.js')}}"></script>
<script src="{{asset('owl-carousel/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('image-popup/source/jquery.fancybox.js?v=2.1.5')}}"></script>
<script type="text/javascript" src="{{asset('image-popup/source/helpers/jquery.fancybox-buttons.js?v=1.0.5')}}"></script>
    <script src="{{asset('tjs/script.js')}}"></script>
    @yield('script')
<script>
    $(document).ready(function (){
        $('.check-open').slideUp(0);

        $('.main-label .checkbox-holder').click(function (){
            if($(this).find('input').is(':checked')) {
                $(this).parents('.main-label').next('.check-open').stop().slideDown();
            } else {
                $(this).parents('.main-label').next('.check-open').stop().slideUp();
            }
        });
    });
</script>

</body>
</html>
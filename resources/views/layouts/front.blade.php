<!DOCTYPE html>
<html lang="{{getLocale()}}" dir="{{getLocale() == "ar" ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#BE8D1D"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ isset($title) ? trans('title.'.$title) : trans('front.title')}}</title>

    <link type="text/css" rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}"/>
    @if (getLocale() == "ar")
        <link type="text/css" rel="stylesheet" href="{{ asset('front/css/bootstrap-rtl.min.css') }}"/>
    @endif
    <link type="text/css" rel="stylesheet" href="{{ asset('front/css/bootstrap-select.min.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('front/css/all.min.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('front/css/animate.min.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('front/css/aos.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('front/css/zoomy.css') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('front/css/main.css') }}"/>
    @if (getLocale() == "ar")
        <link type="text/css" rel="stylesheet" href="{{ asset('front/css/rtl.css') }}"/>
    @endif
    <link rel="shortcut icon" href="{{ asset('front/imgs/icon.ico') }}"/>

</head>
<body>

<!-- Start goTop -->
<div id="goTop" class="rounded-circle">
    <a href="#main-header">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>
<!-- End goTop -->
<div class="popup" id="popupimg">
    <div class="closeView">
        <i class="fa fa-times"></i>
    </div>
    <!--//closeView-->
    <div class="content w-100 h-100">
    </div>
</div>
<!-- End popup -->
<!-- Start Main Header-->
<section id="main-header" class="main-header pt-3">
    <div class="top-bar" id="top-bar">
        <div class="container-fluid">
            <div class="container">
                <div class="row p-0">
                    <div class="col-xl-3 col-lg-3 col-4">
                        <a class="navbar-brand" href="{{ route('front.home') }}">
                            <span><img src="{{ asset('front/imgs/logo.png') }}" alt=""/></span>
                        </a>
                    </div>

                    <nav class="col-xl-9 col-lg-9 col-8 navbar navbar-expand-lg navbar-light">

                        <a href="#" class="d-lg-none d-inline-block nav-link h3 ml-auto coll-butn"><i
                                    class="fas fa-list"></i></a>
                        <div class="navbar-collapse" id="mainNavBar">
                            <ul class="navbar-nav ml-auto">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.home') }}">{{ trans('front.home') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.menu') }}">{{ trans('front.menu') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">{{ trans('front.booking') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.taif') }}">{{ trans('front.taif') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                       href="{{ route('front.contact') }}">{{ trans('front.contact') }}</a>
                                </li>
                                <li class="nav-item">
                                    @if(getLocale() == "en")
                                        <a class="nav-link"
                                           href="{{ LaravelLocalization::getLocalizedURL("ar", null, [], true) }}">
                                            العربية</a>
                                    @else
                                        <a class="nav-link"
                                           href="{{ LaravelLocalization::getLocalizedURL("en", null, [], true) }}">English</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
    </div>
    @yield('slide')

</section>
<!-- End Main Header-->
@yield('content')
<!-- Start Owner-->
<section id="owner" class="owner @yield('class')">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 ">
                <div class="wrap wcolorBG p-5 logo shadow">
                    <div class="d-block text-center main-title h3 mb-0 text-uppercase">
                        <span class="mb-3 d-block">
                          <img src="{{ asset('front/imgs/title.svg') }}" class="d-block m-auto" style="height: 70px"
                               alt=""/>
                        </span>
                        <span class="f-light d-block blackTxt" data-aos="zoom-in">{{trans('front.shop')}}</span>
                        <span class="f-light d-block blackTx" data-aos="zoom-out">{{ trans('front.owner') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12 p-5 cont">
                <span class="f-bold d-block blackTxt h3" data-aos="fade-up">{{ trans('front.omRamy') }}</span>
                <span class="d-block blackTx jLeft">
                    {!! html_entity_decode(getTranslatedAttribute(App\Addition::first(), 'owner')) !!}
                </span>
            </div>
        </div>
    </div>
</section>
<!-- End Owner-->

<!-- Start Main Blog -->
<section id="main-blog" class="main-banners over secPad-top  bg-fx-img"
         style="background-image: url('{{asset("front/imgs/bg.png")}}')">
    <div class="container">
        <div class="row text-center">
            @foreach(App\Blog::take(3)->get() as $blog)
                <div class="col-lg-4 col-12">
                    <a href="{{ route('front.blog', ['id'=> $blog->id]) }}" class="w-100 mb-3 wrap" data-aos="fade-up"
                       data-aos-delay="100">
                        <span class="w-100 d-block mb-3 img"><img src="{{ asset('storage/'.$blog->image) }}"
                                                                  class="w-100" alt=""/></span>
                        <span class="d-block h4 wcolorTxt cont f-bold">{{ getTranslatedAttribute($blog, 'title') }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Main Blog -->
<!-- Start footer-->
<footer id="footer" class="blackBG wcolorTxt pt-5">
    <div class="container pos-rel">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="d-block "><img src="{{ asset('front/imgs/logo.png') }}" class="w-75" alt=""/></div>
            </div>
            <div class="col-lg-3 col-12 mb-1 mt-lg-5 mt-2 follow-links">
                @if(isset(App\Contact::first()->face))
                    <a href="{{App\Contact::first()->face}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if(isset(App\Contact::first()->twitter))
                    <a href="{{App\Contact::first()->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a>
                @endif
                @if(isset(App\Contact::first()->insta))
                    <a href="{{App\Contact::first()->insta}}" target="_blank"><i class="fab fa-instagram"></i></a>
                @endif
                @if(isset(App\Contact::first()->youtube))
                    <a href="{{App\Contact::first()->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a>
                @endif
                @if(isset(App\Contact::first()->linked_in))
                    <a href="{{App\Contact::first()->linked_in}}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                @endif
                @if(isset(App\Contact::first()->snap))
                    <a href="{{App\Contact::first()->snap}}" target="_blank"><i class="fab fa-snapchat"></i></a>
                @endif

            </div>
            <div class="col-lg-6 col-12 mt-lg-5 mt-2">
                <ul class="list-unstyled">
                    <li><a href="{{ route('front.home') }}">{{ trans('front.home') }}</a></li>
                    <li><a href="{{ route('front.menu') }}">{{ trans('front.menu') }}</a></li>
                    <li><a href="#">{{ trans('front.booking') }}</a></li>
                    <li><a href="{{ route('front.taif') }}">{{ trans('front.taif') }}</a></li>
                    <li><a href="{{ route('front.contact') }}">{{ trans('front.contact') }}</a></li>
                </ul>
            </div>

            <div class="text-center col-12">
                <div class="d-inline-block h6 copyrights">
                    <span>{{ trans('front.designed') }}<i class="fas fa-heart" style="color: red"></i> {{ trans('front.by') }}
                        <a href="https://mntsher.com" target="_blank">{{ trans('front.mntsher') }}</a> -
                    </span>
                    <span>{{ trans('front.all_rights') }} &copy; <script>document.write(new Date().getFullYear());</script></span>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- End footer-->
<script type="text/javascript" src="{{ asset('front/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/jquery.nicescroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/fontawesome.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/aos.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/main.js') }}"></script>
</body>
</html>
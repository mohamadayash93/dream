<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
    {{--<div class="navbar-brand">--}}
    {{--<a href="{{route('home')}}" class="d-inline-block">--}}
    {{--<img style="height: 100px;" src="{{asset('images/HajarLogo-full.png')}}" alt="{{trans('app.title')}}">--}}
    {{--</a>--}}
    {{--</div>--}}

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <span class="navbar-text ml-md-3">
				<span class="badge badge-mark border-orange-300 mr-2"></span>
				{{trans('app.welcome')}}, {{Auth::user()->name}} !
			</span>

        <ul class="navbar-nav ml-md-auto">
            <li class="nav-item">
                @if(getLocale() == "en")
                    <a rel="alternate" hreflang="ar" class="navbar-nav-link"
                       href="{{ LaravelLocalization::getLocalizedURL("ar", null, [], true) }}">
                        <i class="icon-earth mr-2"></i>
                        العربية
                        <span class="d-md-none ml-2">العربية</span>
                    </a>
                @else
                    <a rel="alternate" hreflang="en" class="navbar-nav-link"
                       href="{{ LaravelLocalization::getLocalizedURL("en", null, [], true) }}">
                        <i class="icon-earth mr-2"></i>
                        English
                        <span class="d-md-none ml-2">English</span>
                    </a>
                @endif
            </li>

            <li class="nav-item">
                <a class="navbar-nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                    <i class="icon-switch2"></i>
                    <span class="d-md-none ml-2">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->
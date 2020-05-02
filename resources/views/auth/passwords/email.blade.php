@extends('layouts.app')

@section('content')

    <!-- Content area -->
    <div class="content d-flex justify-content-center align-items-center">

        <form class="login-form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img style="width: 50%; height: 50%;"
                             src="{{asset('images/mntsher-logo.png')}}" alt="{{trans('app.title')}}">
                        {{--<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>--}}
                        <h5 class="mb-0">{{ __('app.forget password') }}</h5>
                        <span class="d-block text-muted">{{ __('app.forget message') }}</span>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input id="email" type="text" placeholder="{{__('app.email')}}"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif

                        <div class="form-control-feedback">
                            <i class="icon-envelop text-muted"></i>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('app.send') }}<i
                                    class="icon-circle-{{getLocale() == "ar" ? 'left2' : 'right2'}} ml-2"></i></button>

                        <button id="btn-home" class="btn btn-outline btn-block">{{ __('app.home') }}<i
                                    class="icon-home ml-2"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@overwrite

@section('script')
    <script>
        $(document).on("click", "#btn-home", function (e) {
            e.preventDefault();
            window.location.href = '{{route('home')}}';
        });
    </script>
@stop

@section('footer items')
    @if(getLocale() == "en")
        <li class="nav-item">
            <a rel="alternate" hreflang="ar" class="navbar-nav-link"
               href="{{ LaravelLocalization::getLocalizedURL("ar", null, [], true) }}">
                <i class="icon-earth mr-2"></i>
                العربية
            </a>
        </li>
    @else
        <li class="nav-item">
            <a rel="alternate" hreflang="en" class="navbar-nav-link"
               href="{{ LaravelLocalization::getLocalizedURL("en", null, [], true) }}">
                <i class="icon-earth mr-2"></i>
                English
            </a>
        </li>
    @endif
@overwrite

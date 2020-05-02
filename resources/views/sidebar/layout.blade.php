@push('style')
    <style>
        .sidebar-user-material-body {
            background: url('{{asset('images/background.jpg')}}') center center no-repeat !important;
        }
    </style>
@endpush

<!-- Main sidebar -->
<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-right8"></i>
        </a>
        <span class="font-weight-semibold">{{trans('app.navigation')}}</span>
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">
        @include('partials.user-menu')
        @yield('sidebar-content')
    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->
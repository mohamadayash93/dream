@extends('sidebar.layout')
@section('sidebar-content')
    <!-- Main navigation -->
    <div class="card card-sidebar-mobile">
        <ul class="nav nav-sidebar" data-nav-type="accordion">

            <!-- Main -->
            <li class="nav-item-header">
                <div class="text-uppercase font-size-xs line-height-xs">{{trans('app.profile')}}</div>
                <i class="icon-menu" title="{{trans('app.profile')}}"></i>
            </li>

            <!--Exit-->
            <li class="nav-item">
                <a href="{{route('home')}}" class="nav-link">
                    <i class="icon-exit"></i>
                    <span>{{trans('requests.exit')}}</span>
                </a>
            </li>
            <!-- End Exit -->

            <!-- /main -->


        </ul>
    </div>
    <!-- /main navigation -->

@overwrite
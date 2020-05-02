@extends('layouts.app')

@section('navbar')
    @include('partials.navbar')
@overwrite

@section('sidebar')
    @include('sidebar.index')
@overwrite

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                @php($i = 0)
                @foreach($data["statistics"] as $statistic)
                    @if($i % 2 == 0)
                        <div class="col-sm-6 col-xl-3">
                            <div class="card card-body">
                                <div class="media">
                                    <div class="mr-3 align-self-center">
                                        <i class="icon-{{$statistic->icon}} icon-3x text-{{$statistic->color}}-400"></i>
                                    </div>

                                    <div class="media-body text-right">
                                        <h1 class="font-weight-semibold mb-0 text-{{$statistic->color}}-400">{{$statistic->value}}</h1>
                                        <span class="text-uppercase font-size-lg text-black">{{$statistic->name}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-sm-6 col-xl-3">
                            <div class="card card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <h1 class="font-weight-semibold mb-0 text-{{$statistic->color}}-400">{{$statistic->value}}</h1>
                                        <span class="text-uppercase font-size-lg text-black">{{$statistic->name}}</span>
                                    </div>

                                    <div class="ml-3 align-self-center">
                                        <i class="icon-{{$statistic->icon}} icon-3x text-{{$statistic->color}}-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @php($i++)
                @endforeach
            </div>
            @yield('home-content')
        </div>
    </div>
@overwrite

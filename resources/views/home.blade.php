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
                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-users4 icon-3x text-success-400"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{$data["users"]}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">{{trans('statistics.users')}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">{{$data["slides"]}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">{{trans('statistics.slides')}}</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-screen3 icon-3x text-blue-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-users4 icon-3x text-indigo-400"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{$data["partners"]}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">{{trans('statistics.partners')}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">{{$data["vendors"]}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">{{trans('statistics.vendors')}}</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-users2 icon-3x text-danger-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-address-book icon-3x text-success-400"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{$data["contacts"]}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">{{trans('statistics.contacts')}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">{{$data["addresses"]}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">{{trans('statistics.addresses')}}</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-location3 icon-3x text-blue-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-facebook2 icon-3x text-indigo-400"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{$data["socials"]}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">{{trans('statistics.socials')}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">{{$data["forms"]}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">{{trans('statistics.forms')}}</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-comment-discussion icon-3x text-danger-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-paragraph-center2 icon-3x text-success-400"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{$data["productCategories"]}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">{{trans('statistics.productCategories')}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">{{$data["products"]}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">{{trans('statistics.products')}}</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-stack icon-3x text-blue-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-versions icon-3x text-indigo-400"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{$data["services"]}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">{{trans('statistics.services')}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">{{$data["posts"]}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">{{trans('statistics.posts')}}</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-browser icon-3x text-danger-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-wall icon-3x text-success-400"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{$data["projects"]}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">{{trans('statistics.projects')}}</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@overwrite


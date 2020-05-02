<!-- Page header -->
<div class="page-header page-header-content">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><span class="font-weight-semibold">{{trans('app.'.$title)}}</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{route('home')}}" class="breadcrumb-item {{ Route::is('home') ? "active" : "" }}">
                    <i class="icon-home2 mr-2"></i>
                    {{trans('app.home')}}
                </a>
                <a href="{{route($route.'.index')}}"
                   class="breadcrumb-item {{ Route::is('*.index') ? "active" : "" }}">
                    {{trans('app.'.$title)}}
                </a>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<!-- /page header -->
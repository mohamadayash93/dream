@extends('layouts.front')

@section('slide')
    <div class="container-fluid secPad-top">
        <div class="row">
            <div class="col-lg-5 col-12 order-lg-1 order-2 p-lg-5 p-3">
                <div class="d-block text-uppercase mb-3 main-heading">
                    <div class="d-block lcolorTxt" data-aos="fade-up">{{trans('front.golden')}}</div>
                    <div class="d-block f-bold dcolorTxt" data-aos="fade-down">{{ trans('front.icon_cafe') }}</div>
                </div>
                <div class="d-block h6 mb-3 jLeft">
                    {!! html_entity_decode(getTranslatedAttribute(App\Slide::first(), 'body')) !!}
                </div>
                <a class="d-inline-block f-bold h5 p-3 butn butnBlack wcolorTxt" href="{{ route('front.menu') }}"
                   data-aos="fade-up">
                    <span class="mr-2"><i class="fas fa-coffee"></i></span>
                    <span>{{ trans('front.show_menu') }}</span>
                </a>
            </div>
            <div class="col-lg-7 col-12 order-lg-2 order-1">
                <img src="{{ asset('storage/'.App\Slide::first()->image) }}" class="w-100" alt=""/>
            </div>
        </div>
    </div>
@overwrite

@section('content')
    <!-- Start Featured Products -->
    <section id="featured-products" class="featured-products bg-fx-img secPad-top secPad-bottom blackBG startsvg"
             style="background-image: url('{{ asset("front/imgs/bg2.jpg") }}')">
        <div class="container secPad-top secPad-bottom">
            <div class="row wcolorTxt secPad-top text-center">
                <div class="col-12 text-center main-title h1 text-uppercase">
                <span class="mb-3 d-block">
                    <img src="{{ asset('front/imgs/titlew.svg') }}" class="d-block m-auto" style="height: 90px" alt=""/>
                </span>
                    <span class="f-light d-block wcolorTxt" data-aos="fade-up">{{ trans('front.features') }}</span>
                    <span class="f-bold lcolorTxt" data-aos="fade-down">{{ trans('front.products') }}</span>
                </div>
                <div class="col-lg-8 col-12 offset-lg-2 text-center">
                    <ul class="nav nav-tabs " id="menuTabs" role="tablist">
                        @php($activ = true)
                        @foreach(App\Category::all() as $category)
                            <li class="nav-item">
                                <a class="nav-link @if($activ) active @endif" id="{{ $category->id }}" data-toggle="tab"
                                   href="#{{$category->title_en}}" role="tab"
                                   aria-controls="{{ $category->title_en }}" aria-selected="true">
                            <span class="icon"> <img src="{{ asset('storage/'.$category->image) }}"
                                                     class="w-100 m-auto d-block" alt=""
                                                     data-aos="zoom-in"/></span>
                                    <span class="h4 f-bold"
                                          data-aos="fade-down">{{ getTranslatedAttribute($category, 'title') }}</span>

                                </a>
                            </li>
                            @php($activ = false)
                        @endforeach
                    </ul>
                </div>
                <div class="col-12 p-0 m-0 tab-content" id="menuTabsContent">
                    @php($active = true)
                    @foreach(App\Category::all() as $category)
                        <div class="tab-pane fade @if($active) show active @endif" id="{{$category->title_en}}"
                             role="tabpanel" aria-labelledby="{{$category->id}}">
                            <div class="row p-0 m-0 wrap products">
                                @foreach($category->products as $product)
                                <div class="col-xl-2dot4 col-lg-3 col-md-4 col-sm-6 col-12 product-item">
                                    <div class="d-block  mb-2 img">
                                        <img src="{{ asset('storage/'.$product->image) }}" alt=""
                                             class="w-100 m-auto d-block"/></div>
                                    <div class="d-block w-100 content">
                                        <span class="d-block h5 f-bold mb-2 title">
                                            {{ getTranslatedAttribute($product, 'title') }}
                                        </span>
                                        <div class="d-block f-light fz-9 mb-2 jCenter desc">
                                            {!! html_entity_decode(getTranslatedAttribute($product, 'body')) !!}
                                        </div>
                                        <div class="d-block h6 price lcolorTxt mb-2">
                                            <span class="h4 f-bold total">{{ $product->price }}</span>
                                            <span class="fz-12">{{trans('front.sar')}}</span>
                                        </div>
                                        @if(isset($product->offer))
                                            <div class="d-block features">
                                                <span class="discount">-{{$product->offer}}</span>
                                            </div>
                                        @endif
                                        @if($product->is_new == 1)
                                            <div class="d-block features">
                                                <span class="new">{{ trans('front.new') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div><!--//product-item-->
                                @endforeach
                            </div>

                        </div>
                        @php($active = false)
                    @endforeach
                </div>
                <div class="col-12 mt-5">
                    <a href="{{ route('front.menu') }}" class="butn butnGrad wcolorTxt h4 f-bold" data-aos="zoom-in">
                        <span class="mr-2"><i class="fas fa-coffee"></i></span>
                        <span>{{ trans('front.show_menu') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Products -->

    <!-- Start Main Banners -->
    <section id="main-banners" class="main-banners secPad-top secPad-bottom  bg-fx-img"
             style="background-image: url('{{ asset("front/imgs/bg.png") }}')">
        <div class="container">
            <div class="row text-center">
               @foreach(App\Offer::all() as $offer)
                    <div class="col-lg-4 col-12">
                    <a href="#" class="w-100 mb-3 wrap">
                    <span class="w-100 d-block mb-3 img"><img src="{{ asset('storage/'.$offer->image) }}" class="w-100" alt=""
                                                              data-aos="zoom-in"/></span>
                        <span class="d-block h4 blackTxt f-bold" data-aos="fade-up">{{ getTranslatedAttribute($offer, 'title') }}</span>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Main Banners -->

    <!-- Start Main partners-->
    <section id="main-clients" class="main-partners">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center main-title h1 text-uppercase">
                <span class="mb-3 d-block">
                    <img src="{{ asset('front/imgs/title.svg') }}" class="d-block m-auto" style="height: 90px" alt=""/>
                </span>
                    <span class="f-light d-block blackTxt" data-aos="fade-up">{{ trans('front.our') }}</span>
                    <span class="f-bold lcolorTxt" data-aos="fade-down">{{ trans('front.partners') }}</span>
                </div>
                <div class="owl-carousel part">
                    @php($i = 100)
                    @foreach(App\Partner::all() as $partner)
                    <div class="item">
                        <img src="{{ asset('storage/'.$partner->image) }}" data-aos="zoom-in" data-aos-delay="{{ $i }}"/>
                    </div>
                        @php($i += 100)
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Main partners-->
@overwrite
@extends('layouts.index')

@isset($aboutData['meta']['title'])
@section('title', $aboutData['meta']['title'])
@endisset
@isset($aboutData['meta']['description'])
@section('description', $aboutData['meta']['description'])
@endisset
@isset($aboutData['meta']['keywords'])
@section('keywords', $aboutData['meta']['keywords'])
@endisset

@section('carousel')
<div id="banner" class="carousel slide" data-ride="carousel">
    @if ($agent->isDesktop() || $agent->isTablet())
    <div class="home-page-search mobile-off">
        <h4 class="blue-text"> Search House Plans </h4>
        <form method="GET" action="{{ route('search') }}">
            <div class="std-search-form">
                <div class="std-search-form__row">
                    <span class="std-search-form__label">
                        Sq. Ft.
                    </span>
                    <div class="std-search-form__controls std-search-form__controls-pading">
                        <input type="number" placeholder="min" class="std-saerch-form__input" name="sq_min">
                        <span class="std-search-form__del">to</span>
                        <input type="number" placeholder="max" class="std-saerch-form__input" name="sq_max">
                    </div>
                </div>
                <div class="std-search-form__row">
                    <span class="std-search-form__label">
                        Beds
                    </span>
                    <div class="std-search-form__controls">
                        <button type="button" class="std-search-form__count-btn beds-remove"><i
                                class="fa fa-minus"></i></button>
                        <input type="number" class="std-saerch-form__input-row qty" name="beds" value="1">
                        <button type="button" class="std-search-form__count-btn beds-add"><i
                                class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="std-search-form__row">
                    <span class="std-search-form__label">
                        Baths
                    </span>
                    <div class="std-search-form__controls">
                        <button type="button" class="std-search-form__count-btn baths-remove"><i
                                class="fa fa-minus"></i></button>
                        <input type="number" class="std-saerch-form__input-row qty" name="baths" value="1">
                        <button type="button" class="std-search-form__count-btn baths-add"><i
                                class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="std-search-form__row">
                    <span class="std-search-form__label">
                        Garages
                    </span>
                    <div class="std-search-form__controls">
                        <button type="button" class="std-search-form__count-btn garage-remove"><i
                                class="fa fa-minus"></i></button>
                        <input type="number" class="std-saerch-form__input-row qty" name="garages" value="1">
                        <button type="button" class="std-search-form__count-btn garage-add"><i
                                class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="std-search-form__row">
                    <span class="std-search-form__label">
                        Stories
                    </span>
                    <div class="std-search-form__controls">
                        <button type="button" class="std-search-form__count-btn stories_reduce"><i
                                class="fa fa-minus"></i></button>
                        <input type="number" class="std-saerch-form__input-row qty" name="stories" value="1">
                        <button type="button" class="std-search-form__count-btn stories_add"><i
                                class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="std-search-form__row" style="margin-bottom:0;">
                    <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold" type="submit"
                        style="width :100%;"> SEARCH</button>
                </div>
                <div class="std-search-form__row" style="justify-content:center;">
                    <div class="text-center advanced_search_text mt-2"><a href="{{ route('advanced-search') }}"
                            class="red-links" style="font-size:14px;"> ADVANCED SEARCH</a>
                    </div>
                </div>
            </div>
            {{-- <TABLE class="home-search-new">
                <tr>
                    <Th>Sq. Ft.</Th>
                    <td> <input type="text" placeholder="min" size=5 class="center" name="sq_min"> to <input type="text"
                            placeholder="max" size=5 class="center" name="sq_max"></td>
                </tr>
                <tr>
                    <Th>Beds</Th>
                    <td>
                        <div><span class="min_icon  beds-remove"> <i class="fa fa-minus"> </i></span> <input type="text"
                                name="beds" value="1" class="qty">
                            <span class="max_icon  beds-add"><i class="fa fa-plus"></i></span></div>
                    </td>
                </tr>
                <tr>
                    <Th>Baths</Th>
                    <td>
                        <div><span class="min_icon  baths-remove"> <i class="fa fa-minus"> </i></span> <input
                                type="text" name="baths" value="1" class="qty">
                            <span class="max_icon  baths-add"><i class="fa fa-plus"></i></span></div>
                    </td>
                </tr>
                <tr>
                    <Th>Garages</Th>
                    <td>
                        <div><span class="min_icon garage-remove"> <i class="fa fa-minus"> </i></span> <input
                                type="text" name="garages" value="1" class="qty">
                            <span class="max_icon garage-add"><i class="fa fa-plus"></i></span></div>
                    </td>
                </tr>
                <tr>
                    <Th>Stories</Th>
                    <td>
                        <div><span class="min_icon  stories_reduce"> <i class="fa fa-minus"> </i></span> <input
                                type="text" name="stories" value="1" class="qty">
                            <span class="max_icon  stories_add"><i class="fa fa-plus"></i></span></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="">
                            <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold" type="submit"
                                style="width :100%;"> SEARCH</button>
                        </div>
                        <div class="text-center advanced_search_text mt-2"><a href="{{ route('advanced-search') }}"
            class="red-links" style="font-size:14px;"> ADVANCED SEARCH</a>
    </div>
    </td>
    </tr>

    </TABLE> --}}
    </form>
</div>
@endif
<ol class="carousel-indicators">
    @foreach($gallery as $img)
    <li data-target="#banner" data-slide-to="{{$loop->index}}" @if($loop->index == 0)class="active"@endif></li>
    @endforeach
</ol>
<div class="carousel-inner">
    @foreach($gallery as $img)
    <div class="carousel-item @if($loop->index == 0) active @endif">
        <a href="{{$img->url}}">
            <div class="embed-responsive embed-responsive-21by9">
                <img class="embed-responsive-item" src="{{asset('/storage/gallery/'.$img->file)}}" alt="{{$img->name}}">
            </div>
        </a>
        <div class="caption-quote-wrap">
            <div class="caption-quote @if(!$img->quote) custom_capt @endif">{{$img->description}}</div>
            <p class="@if($img->quote==1) caption-quote-author @else caption-quote-small @endif">{{$img->caption}}
            </p>
        </div>
        <div class="media planinfo text-left"> <img class="mr-1 align-self-end"
                src="{{asset('/images/icons/logo-placeholder.png')}}" alt="Generic placeholder image">
            <a href="{{route('plan.view', $img->plan)}}" style="text-decoration:none" class="media-body">
                <h5 class="mb-0 text-white">plan <span class="text-secondary">{{$img->plan}}</span></h5>
                <h5 class="m-0 text-white">houseplans<span class="text-secondary">bydavidwiggins.com</span></h5>
            </a>
        </div>
    </div>
    @endforeach
</div>
<a class="carousel-control-prev" href="#banner" role="button" data-slide="prev"> <span
        class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a
    class="carousel-control-next" href="#banner" role="button" data-slide="next"> <span
        class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
</div>
@endsection
@if ($agent->isDesktop() || $agent->isTablet())
@section('content')

<div class="row align-items-center py-2 pd_bottom_0">
    <div class="col-sm-3">
        <h4 class="m-0 font-weight-bold"><a href="/faq" class="text-primary">FAQs</a></h4>
        <p class="m-0 font-weight-light">Frequently Asked Questions</p>
    </div>
    <div class="col-sm-6">
        <p></p>
        <h1 class="text-center font-futura p-0 m-0">{{$descDesctop->title}}</h1>
    </div>
    <div class="col-sm-3 text-sm-right newsletter">
        <p class="mb-1 font-weight-semi-bold"><span>SIGN UP FOR </span> E-PUBS + DISCOUNTS</p>
        <div class="input-group input-group-sm">
            <input type="text" class="form-control rounded-0 border-secondary font-weight-bold"
                placeholder="Email Address">
            <div class="input-group-append">
                <button class="btn btn-secondary rounded-0 text-uppercase text-dark font-weight-bold" type="button">Sign
                    Up</button>
            </div>
        </div>
    </div>
</div>
<p></p>
<div class="text-center pt-0 br_none_sm home-main-text" style="margin-left:18px;margin-right :18px; word-spacing: 2px;">
    {!! $descDesctop->description !!}</div>
@if($deckBest->main_file)
<div class="plan-full position-relative mb-3"> <img src="{{asset('/storage/home-page/'.$deckBest->main_file)}}" alt=""
        class="img-fluid" />
    <div class="plan-caption position-absolute mw-315">
        <h3 class="font-weight-bold">{{$deckBest->main_title}}</h3>
        <p>{{$deckBest->main_desc}}</p>
        <a href="{{$deckBest->main_link}}" class="btn btn-dark rounded-0">Click Here</a>
    </div>
    <a href="{{$deckBest->main_plan_link}}"
        class="plan-name position-absolute btn btn-dark rounded-0">{{$deckBest->main_plan}}</a>
</div>
@endif
<div class="row">
    @if($deckBest->first_file)
    <div class="col-sm-4">
        <div class="plan-cta @if($deckBest->first_type == 'light') white @endif position-relative mb-2"> <img
                src="{{asset('/storage/home-page/'.$deckBest->first_file)}}" alt="" class="img-fluid" />
            <div class="plan-caption position-absolute">
                <h3>{{ $deckBest->first_title }}</h3>
                <p>{{ $deckBest->first_desc }}</p>
                <a href="{{ $deckBest->first_link }}" class="btn btn-dark rounded-0">Click Here</a>
            </div>
            <a href="{{$deckBest->first_plan_link}}"
                class="plan-name position-absolute btn btn-dark rounded-0">{{$deckBest->first_plan}}</a>
        </div>
    </div>
    @endif
    @if($deckBest->second_file)
    <div class="col-sm-4">
        <div class="plan-cta @if($deckBest->second_type == 'light') white @endif position-relative mb-2"> <img
                src="{{asset('/storage/home-page/'.$deckBest->second_file)}}" alt="" class="img-fluid" />
            <div class="plan-caption position-absolute">
                <h3>{{ $deckBest->second_title }}</h3>
                <p>{{ $deckBest->second_desc }}</p>
                <a href="{{ $deckBest->second_link }}" class="btn btn-dark rounded-0">Click Here</a>
            </div>
            <a href="{{$deckBest->second_plan_link}}"
                class="plan-name position-absolute btn btn-dark rounded-0">{{$deckBest->second_plan}}</a>

        </div>
    </div>
    @endif
    @if($deckBest->third_file)
    <div class="col-sm-4">
        <div class="plan-cta @if($deckBest->third_type == 'light') white @endif position-relative mb-2"> <img
                src="{{asset('/storage/home-page/'.$deckBest->third_file)}}" alt="" class="img-fluid" />
            <div class="plan-caption position-absolute">
                <h3>{{ $deckBest->third_title }}</h3>
                <p>{{ $deckBest->third_desc }}</p>
                <a href="{{ $deckBest->third_link }}" class="btn btn-dark rounded-0">Click Here</a>
            </div>
            <a href="{{$deckBest->third_plan_link}}"
                class="plan-name position-absolute btn btn-dark rounded-0">{{$deckBest->third_plan}}</a>

        </div>
    </div>
    @endif
</div>
<h1 class="text-center font-futura mb-2">AMERICA’S FAVORITE HOUSE PLANS!</h1>
<div class="row text-center">
    @if($deskFavor->first_file)
    <div class="col-sm-3">
        <div class="plan-grid">
            <a href="{{$deskFavor->first_plan_link}}">
                <div class="embed-responsive embed-responsive-4by3 percent-60">
                    <img src="{{asset('/storage/home-page/'.$deskFavor->first_file)}}" alt="{{$deskFavor->first_title}}"
                        class="embed-responsive-item" />
                </div>
            </a>
            <p class="plan-name text-truncate"><strong>{{$deskFavor->first_title}}</strong></p>
            <p class="plan-meta text-truncate"><a style="color:#231f20; font-size:13px"
                    href="{{$deskFavor->first_plan_link}}">{{$deskFavor->first_desc}}</a>
            </p>
            <p class="shop-link home"><a href="{{$deskFavor->first_link}}">{{$deskFavor->first_link_text}}</a></p>
        </div>
    </div>
    @endif
    @if($deskFavor->second_file)
    <div class="col-sm-3">
        <div class="plan-grid">
            <a href="{{$deskFavor->second_plan_link}}">
                <div class="embed-responsive embed-responsive-4by3 percent-60">
                    <img src="{{asset('/storage/home-page/'.$deskFavor->second_file)}}"
                        alt="{{$deskFavor->second_title}}" class="embed-responsive-item" />
                </div>
            </a>
            <p class="plan-name text-truncate"><strong>{{$deskFavor->second_title}}</strong></p>
            <p class="plan-meta text-truncate"><a style="color:#231f20; font-size:13px"
                    href="{{$deskFavor->second_plan_link}}">{{$deskFavor->second_desc}}</a></p>
            <p class="shop-link home"><a href="{{$deskFavor->second_link}}">{{$deskFavor->second_link_text}}</a></p>
        </div>
    </div>
    @endif
    @if($deskFavor->third_file)
    <div class="col-sm-3">
        <div class="plan-grid">
            <a href="{{$deskFavor->third_plan_link}}">
                <div class="embed-responsive embed-responsive-4by3 percent-60">
                    <img src="{{asset('/storage/home-page/'.$deskFavor->third_file)}}" alt="{{$deskFavor->third_title}}"
                        class="embed-responsive-item" />
                </div>
            </a>
            <p class="plan-name text-truncate"><strong>{{$deskFavor->third_title}}</strong></p>
            <p class="plan-meta text-truncate"><a style="color:#231f20; font-size:13px"
                    href="{{$deskFavor->third_plan_link}}">{{$deskFavor->third_desc}}</a></p>
            <p class="shop-link home"><a href="{{$deskFavor->third_link}}">{{$deskFavor->third_link_text}}</a></p>
        </div>
    </div>
    @endif
    @if($deskFavor->fourth_file)
    <div class="col-sm-3">
        <div class="plan-grid">
            <a href="{{$deskFavor->fourth_plan_link}}">
                <div class="embed-responsive embed-responsive-4by3 percent-60">
                    <img src="{{asset('/storage/home-page/'.$deskFavor->fourth_file)}}"
                        alt="{{$deskFavor->fourth_title}}" class="embed-responsive-item" />
                </div>
            </a>
            <p class="plan-name text-truncate"><strong>{{$deskFavor->fourth_title}}</strong></p>
            <p class="plan-meta text-truncate"><a style="color:#231f20; font-size:13px"
                    href="{{$deskFavor->fourth_plan_link}}">{{$deskFavor->fourth_desc}}</a></p>
            <p class="shop-link home"><a href="{{$deskFavor->fourth_link}}">{{$deskFavor->fourth_link_text}}</a></p>
        </div>
    </div>
    @endif
</div>
<div class="bg-secondary py-3 px-5 text-center home-about">
    <div class="row align-items-center">
        <div class="col-sm-6"> <img src="{{ asset('/storage/about/'.$aboutData['photo']) }}" alt="David"
                class="img-fluid" /> </div>
        <div class="col-sm-6">
            <h4 class="font-weight-bold mb-3">{{ $aboutData['title'] }}</h4>
            {!! $aboutData['description'] !!}
            <p class="text-center"><a data-fancybox="" href="{{ $aboutData['url'] }}" class=""><button
                        class="btn btn-primary rounded-0 text-uppercase text-dark font-weight-semi-bold" type="button"
                        style="color: white !important;padding: 9px 17px;font-size : 20px;">Watch the Video</button></a>
            </p>



        </div>
    </div>
</div>
<div class="py-3">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-primary text-center font-weight-bold">Browse by Architectural Style</h4>
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-unstyled text-primary text-center">
                        @foreach ($styles as $style)
                        <li><a href="{{ route('style.slug', $style->slug) }}">{{ $style->short_name }}</a></li>
                        @if( ($loop->iteration % round(($loop->count/2)) == 0) && (!$loop->last) )
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-unstyled text-primary text-center">
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <p class="text-right mb-0">
                <center><a href="{{ route('styles') }}" class="text-primary font-weight-bold text-center">View ALL
                        Architectural
                        Styles &gt;</a></center>
            </p>
        </div>
        <div class="col-md-6">
            <h4 class="text-primary text-center font-weight-bold"> Browse by Specialty Collection</h4>
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-unstyled text-primary text-center">
                        @foreach ($collections as $collection)
                        <li><a
                                href="{{ route('collection.slug', $collection->slug) }}">{{ $collection->short_name }}</a>
                        </li>
                        @if( ($loop->iteration % round(($loop->count/2)) == 0) && (!$loop->last) )
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-unstyled text-primary text-center">
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <p class="text-right mb-0">
                <center><a href="{{ route('collections') }}" class="text-primary font-weight-bold text-center">View ALL
                        Specialty Collections &gt;</a></center>
            </p>
        </div>
    </div>
</div>
<div class="">
    <div class="row">
        <div class="col-md-6">
            <div class="bg-dark py-3 px-4 mh-1">
                <h4 class="font-weight-bold text-white text-uppercase text-center">Why Buy From Us?</h4>
                <p class="text-center text-white font-weight-semi-bold mb-4">Complete Architectural Details | Free
                    Product Ideas
                    Best Price Guarantee</p>
                <div class="text-white">
                    {!! $aboutData->why_text !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mh-1">
                <div class="bg-secondary py-3 mb-2" style="background:#77787b !important">
                    <h4 class="font-weight-bold text-white text-uppercase text-center">Best Price Guarantee</h4>
                    <div class="px-3">
                        <div class="text-white mb-0">
                            {!! $aboutData->best_text !!}
                        </div>
                    </div>
                </div>
                <div class="bg-secondary py-3" style="background:#c6c8ca !important">
                    <h4 class="font-weight-bold text-dark text-uppercase text-center">FREE Modification/Change Estimates
                    </h4>
                    <div class="px-3">
                        <div class="text-dark">
                            {!! $aboutData->free_text !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@endif
@if ($agent->isMobile())
@section('content')
<h1 class="text-center font-futura">AMERICA’S FAVORITE HOUSE PLANS</h1>
<div class="plan-list my-1">
    <div class="position-relative">
        <div id="favorite_plans" class="carousel slide" data-ride="carousel" data-interval="6000">
            <ol class="carousel-indicators">
                @foreach($gallery as $img)
                <li data-target="#favorite_plans" data-slide-to="{{$loop->index}}" @if($loop->index ==
                    0)class="active"@endif>
                </li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($gallery as $img)
                <div class="carousel-item @if($loop->index == 0) active @endif">
                    <a href="{{$img->url}}">
                        <img class="d-block w-100" src="{{asset('/storage/gallery/'.$img->file)}}" alt="{{$img->name}}"
                            style="min-height : 210px !important;">
                    </a>
                    <div class="caption-quote-wrap">
                        <div class="caption-quote @if(!$img->quote) custom_capt @endif">{{$img->description}}</div>
                        <p class="@if($img->quote==1) caption-quote-author @else caption-quote-small @endif">
                            {{$img->caption}}</p>
                    </div>
                    <div class="media planinfo text-left top position-absolute mobile-planinfo"
                        style="background: black !important;opacity : .6"> <img class="mr-1 align-self-end"
                            src="{{asset('/images/icons/logo-placeholder.png')}}" alt="Generic placeholder image">
                        <a href="{{route('plan.view', $img->plan)}}" style="text-decoration:none" class="media-body">
                            <h5 class="mb-0 text-white">plan <span class="text-white">{{$img->plan}}</span></h5>
                            <h5 class="m-0 text-white">davidwiggins</h5>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#favorite_plans" role="button" data-slide="prev"> <span
                    class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span>
            </a> <a class="carousel-control-next" href="#favorite_plans" role="button" data-slide="next"> <span
                    class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
        </div>

    </div>
</div>
<div class="text-center page-name mt-1" style="">
    {{-- <div class="mobile-home-search">
    <form method="GET" action="{{ route('search') }}">
    <div class="row d-flex flex-column search-mobile-filter">
        <div class="row bottom_border">
            <div class="col-6 d-flex flex-row align-items-center justify-content-between">
                <span>Sq. ft.</span>
                <input type="number" placeholder="min" size=5 name="sq_min" class="center">
                <span class="small-font">to</span>
                <input type="number" placeholder="max" size=5 name="sq_max" class="center">
            </div>
            <div class="col-6 left_border d-flex flex-row align-items-center justify-content-between">
                <span>Stories</span>
                <div
                    class="buttons_round buttons_round_minus d-flex align-items-center justify-content-center stories_reduce-mobile">
                    <span>&ndash;</span></div>
                <input type="text" name="stories" value="1" class="qty">
                <div class="buttons_round d-flex align-items-center justify-content-center stories-add-mobile">
                    <span>+</span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 d-flex flex-row align-items-center justify-content-between">
                <span>Beds</span>
                <div
                    class="buttons_round buttons_round_minus d-flex align-items-center justify-content-center beds-remove-mobile">
                    <span>&ndash;</span></div>
                <input type="text" name="beds" value="1" class="qty">
                <div class="buttons_round d-flex align-items-center justify-content-center beds-add-mobile">
                    <span>+</span>
                </div>
            </div>
            <div class="col-6 left_border d-flex flex-row align-items-center justify-content-between">
                <span style="margin-right:8px">Baths</span>
                <div
                    class="buttons_round buttons_round_minus d-flex align-items-center justify-content-center baths-remove-mobile">
                    <span>&ndash;</span></div>
                <input type="text" name="baths" value="1" class="qty">
                <div class="buttons_round d-flex align-items-center justify-content-center baths-add-mobile">
                    <span>+</span>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top : 25px;"><button
            class="btn btn-primary rounded-0 text-white font-weight-semi-bold search-button1" type="submit">
            SEARCH</button></div>
    <div class="mt-3">
        <a href="{{ route('advanced-search') }}"
            class="btn btn-primary rounded-0 text-white font-weight-semi-bold grey-button"
            style="width :100%;padding : 6px 0;"> ADVANCED SEARCH</a>
    </div>
    </form>
</div> --}}
<div class="home-page-search home-mobile-search">
    <div class="font-weight-bold sidebar-heading">Find Your House Plan</div>
    <form method="GET" action="{{ route('search') }}">
        <TABLE class="home-search-new">
            <tr>
                <Th>Sq. Ft.</Th>
                <td align="center"> <input type="number" placeholder="min" size=5 class="center" name="sq_min"> to
                    <input type="number" placeholder="max" size=5 class="center" name="sq_max"></td>
            </tr>
            <tr>
                <Th>Beds</Th>
                <td align="center">
                    <div><span class="min_icon  beds-remove"> <i class="fa fa-minus"> </i></span> <input type="text"
                            name="beds" value="1" class="qty">
                        <span class="max_icon  beds-add"><i class="fa fa-plus"></i></span></div>
                </td>
            </tr>
            <tr>
                <Th>Baths</Th>
                <td align="center">
                    <div><span class="min_icon  baths-remove"> <i class="fa fa-minus"> </i></span> <input type="text"
                            name="baths" value="1" class="qty">
                        <span class="max_icon  baths-add"><i class="fa fa-plus"></i></span></div>
                </td>
            </tr>
            <tr>
                <Th>Garages</Th>
                <td align="center">
                    <div><span class="min_icon garage-remove"> <i class="fa fa-minus"> </i></span> <input type="text"
                            name="garages" value="1" class="qty">
                        <span class="max_icon garage-add"><i class="fa fa-plus"></i></span></div>
                </td>
            </tr>
            <tr>
                <Th>Stories</Th>
                <td align="center">
                    <div><span class="min_icon  stories_reduce"> <i class="fa fa-minus"> </i></span> <input type="text"
                            name="stories" value="1" class="qty">
                        <span class="max_icon  stories_add"><i class="fa fa-plus"></i></span></div>
                </td>
            </tr>
        </TABLE>
        <div class="">
            <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold" type="submit"
                style="width :60%;">
                SEARCH PLANS</button>
        </div>
    </form>
</div>

<div class="mt-3">
    <a href="{{ route('advanced-search') }}"
        class="btn btn-primary rounded-0 text-white font-weight-semi-bold grey-button"
        style="width :60%;padding : 6px 0;">
        ADVANCED SEARCH</a>
</div>
</div>
<div style="clear : both;"></div>
<div class="text-center text-uppercase lead font-weight-normal align-middle py-2 only_under_767 contact-method mf18"> <a
        href="{{ route('contact-us') }}" class="align-middle text-primary">Contact</a> | <a
        href="{{ route('contact-us') }}" class="align-middle text-primary">Email</a> |
    <a href="tel:832-521-5820" class="align-middle text-primary">832-521-5820</a> </div>

<div class="plan-list my-1">
    <div class="position-relative">
        <div id="new_plans" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
                @foreach($newMob as $img)
                <div class="carousel-item @if($loop->index == 0) active @endif">
                    <a href="{{$img->url}}">
                        <img src="{{asset('/storage/gallery/'.$img->file)}}" alt="{{$img->name}}"
                            class="img-fluid d-block w-100">
                    </a>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#new_plans" role="button" data-slide="prev"> <span
                    class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span>
            </a> <a class="carousel-control-next" href="#new_plans" role="button" data-slide="next"> <span
                    class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
        </div>
        <div class="media planinfo text-left top position-absolute mobile-planinfo"> <img
                class="mr-1 align-self-center logo-on-mobile" src="{{asset('/images/icons/logo-placeholder.png')}}"
                alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mb-0 text-white">plan <span class="text-secondary">4839</span></h5>
                <h5 class="m-0 text-white">davidwiggins</h5>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h4 class="font-weight-bold text-center mb-0 bigFont-xs">NEW HOUSE PLANS</h4>
    <p class="lead text-center font-weight-semi-bold mb-2 mt-1">by America’s Leading Architect </p>
    <div class="bg-secondary w-75 mx-auto mb-3 pb-1"></div>
    <div class="home-about">
        <div style="margin-bottom: 10px;">
            {!! $deskMob->description !!}
        </div>
    </div>
    <div class="sign_save">
        <input type="text" class="form-control rounded-0" placeholder="SIGN UP AND SAVE">
        <div class="input-group-append" style="display : inline-block;">
            <button class="btn btn-primary rounded-0  font-weight-semi-bold" type="button"><i
                    class="fa fa-chevron-right"></i></button>
        </div>
    </div>

    <div class="position-relative">

        <a href="/collection/best-selling-house-plans"><img src="{{asset('/storage/home-page/'.$bestMob->file)}}"
                alt="{{$bestMob->name}}" class="img-fluid w-100 my-2"></a>
        <div class="media planinfo text-left top position-absolute mobile-planinfo"
            style="padding-top : 20px !important;font-family:FuturaPT;"> <img
                class="mr-1 align-self-center logo-on-mobile" src="{{asset('/images/icons/logo-placeholder.png')}}"
                alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mb-0 text-white" style="font-size: 15px !important;">plan <span
                        class="text-secondary">4839</span>
                </h5>
                <h5 class="m-0 text-white" style="font-size: 15px !important;">davidwiggins</h5>
            </div>
        </div>
    </div>
    <h4 class="font-weight-bold text-center mb-0 mf18">BEST-SELLING HOUSE PLANS</h4>
    <p class="text-center font-weight-semi-bold mt-1">America’s Most Popular Designs</p>

    <div class="bg-secondary home-mobile py-3 px-5 text-center home-about">
        <div class="row align-items-center">
            <div class="col-sm-6"> <img src="{{ asset('/storage/about/'.$aboutData['photo']) }}" alt="David"
                    class="img-fluid" /> </div>
            <div class="col-sm-6  no-padding">
                <h4 class="font-weight-bold mb-3">{{ $aboutData['title'] }}</h4>
                <div class="text-left">{!! $aboutData['description'] !!}</div>
                <p class="text-center"><a data-fancybox="" href="{{ $aboutData['url'] }}" class=""><button
                            class="btn btn-primary rounded-0 text-uppercase text-dark font-weight-semi-bold"
                            type="button" style="color: white !important;padding: 9px 17px;font-size : 20px;">Watch the
                            Video</button></a></p>
            </div>
        </div>
    </div>

    <h4 class="font-weight-bold text-center text-primary">Browse Our Architectural Styles</h4>
    <div class="row">
        <div class="col-12 col-md-6">
            <ul class="list-unstyled text-primary text-center">
                @foreach ($styles as $style)
                <li><a href="{{ route('style.slug', $style->slug) }}">{{ $style->short_name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <p class="text-right mb-0 xs-text-center grey-text-mobile font-weight-bold"><a href="{{ route('styles') }}"
            class="d-block text-primary">View ALL Architectural Styles &gt;</a></p>
    <h4 class="font-weight-bold text-center text-primary"> Browse by Specialty Collection</h4>
    <div class="row">
        <div class="col-12 col-md-6">
            <ul class="list-unstyled text-primary text-center">
                @foreach ($collections as $collection)
                <li><a href="{{ route('collection.slug', $collection->slug) }}">{{ $collection->short_name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<p class="text-right mb-0 xs-text-center grey-text-mobile font-weight-bold"> <a href="{{ route('collections') }}"
        class="d-block text-primary mt-1">View ALL Specialty Collections &gt;</a></p>
<div class="home-about col-12">
    <div class="bg-dark py-3 px-4 mh-1 px-xs-0 bg-grey hp_sec-margin">
        <h4 class="text-center font-weight-bold mb-3">Why Buy From Us?</h4>

        <div>
            {!! $aboutData->why_text !!}
        </div>
    </div>
    <div class="bg-dark py-3 px-4 mh-1 px-xs-0 bg-grey hp_sec-margin">
        <h4 class="text-center font-weight-bold mb-3">Best Price Guarantee</h4>
        <div>
            {!! $aboutData->best_text !!}
        </div>
    </div>
    <div class="bg-dark py-3 px-4 mh-1 px-xs-0 bg-grey hp_sec-margin">
        <h4 class="text-center font-weight-bold mb-3">FREE Modification Estimates</h4>
        <div>
            {!! $aboutData->free_text !!}
        </div>
    </div>
</div>
</div>
@endsection
@endif
</div>
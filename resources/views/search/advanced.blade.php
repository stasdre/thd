@extends('layouts.index')

@section('content')
<div class="plan-full position-relative mb-3 mobile-off">
    <img src="/images/new-banner.jpg" alt="" class="img-fluid" />
    <h2 class="font-futura search-title-asp">Advanced House Plans Search</h2>
</div>
<div class="plan-full position-relative mb-3 desktop-off">
    <img src="/images/house.jpg" alt="" class="img-fluid" />
    <h2 class="font-futura search-title-asp-mobile">Advanced House Plans Search</h2>
</div>
<p class="br_none_sm top-content">Finding your perfect house plan has become a whole lot easier since builder-preferred,
    construction-ready home plans are now available online. Spending months or even longer working with an architect to
    fine tune a whole house blueprint is no longer necessary You can now easily and quickly
    <span class="mobile-off" id="content-scroll"> find house plans designed by best-selling architects by following a
        few easy search steps. Before you begin searching house designs, make sure you’re purchasing house plans from a
        site like ours where the plans meet the strict standards of the IRC (International Residential Code) and
        guarantee the full architectural detailing your builder needs to construct a safe home. You’ll also want to
        check with your local town building department to find out if there are any special engineering or structural
        details needed for permitting. All of our floor plans can be customized as well as modified to include any
        possible local engineering details for certain locations like California and Florida. After you’ve done this
        initial homework, you’ll simply determine the square footage range needed to coordinate with your budget, style
        of home you want and then your preferences for bedrooms, baths, number of stories and garages. If there are lot
        restrictions, you can also add width and depth parameters in your home plan search to narrow down your results.
        To have your questions answered by our team of house plan experts, simply <a href="#">email</a> or <a
            href="#">live chat</a> us today!</span>
</p>
<div class="desktop-off read_more" id="read_more"><span class="read-more-link-wrapper">Read More </span></div>
<div style="display : none;" id="read_less" class="read_less"><span class="read-less-link-wrapper">Read Less </span>
</div>

<div class="center mb-3 desktop-off"> <button class="btn btn-primary rounded-0 font-weight-semi-bold grey-button"
        type="button" style="width : 90%;">Search by plan # <i class="fa fa-search" style="color:white"></i></button>
</div>

<div class="row">

    <!-- SideBar Left -->
    <div class="sidebar-left col-md-5 col-lg-3">
        <div class="row">
            <div class="col-sm-12 adv-basicSearch">
                <div class="plan-cta position-relative mb-2">
                    <div class="search-grid search-grid1">
                        <div class="font-weight-bold sidebar-heading">House Plan Search</div>
                        <form method="GET" action="{{ route('search') }}">
                            <TABLE class="asp-basicsearch">
                                <tr>
                                    <TD>Sq. Ft.</TD>
                                    <td> <input type="text" placeholder="min" size=5 class="center" name="sq_min"> to
                                        <input type="text" placeholder="max" size=5 class="center" name="sq_max"></td>
                                </tr>
                                <tr>
                                    <TD>Beds</TD>
                                    <td>
                                        <div><span class="min_icon  beds-remove"> <i class="fa fa-minus"> </i></span>
                                            <input type="text" name="beds" value="1" class="qty">
                                            <span class="max_icon  beds-add"><i class="fa fa-plus"></i></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <TD>Baths</TD>
                                    <td>
                                        <div><span class="min_icon  baths-remove"> <i class="fa fa-minus"> </i></span>
                                            <input type="text" name="baths" value="1" class="qty">
                                            <span class="max_icon  baths-add"><i class="fa fa-plus"></i></span></div>
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <TD>Garages</TD>
                                    <td>
                                        <div><span class="min_icon   garage-remove"> <i class="fa fa-minus"> </i></span>
                                            <input type="text" name="garages" value="1" class="qty">
                                            <span class="max_icon  garage-add"><i class="fa fa-plus"></i></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <TD>Stories</TD>
                                    <td>
                                        <div><span class="min_icon  stories_reduce"> <i class="fa fa-minus"> </i></span>
                                            <input type="text" name="stories" value="1" class="qty">
                                            <span class="max_icon  stories_add"><i class="fa fa-plus"></i></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <TD>Width</TD>
                                    <td class="values"> <input type="text" name="width_min" placeholder="min" size=5
                                            class="center"> to <input type="text" placeholder="max" name="width_max"
                                            size=5 class="center"><span class="optional">Optional</span></td>

                                </tr>
                                <tr>
                                    <TD>Depth</TD>
                                    <td class="values"> <input type="text" name="depth_min" placeholder="min" size=5
                                            class="center"> to <input type="text" name="depth_max" placeholder="max"
                                            size=5 class="center"><span class="optional">Optional</span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="search-button">
                                            <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold"
                                                type="submit"> View Search Results</button>
                                        </div>
                                    </td>
                                </tr>
                            </TABLE>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 center">
                <div class="plan-cta position-relative mb-2 only_under_767" style="font-size: 16px;line-height: 29px;">
                    <div class="font-weight-bold view_plans">Sign Up + Save : <input type="text"
                            placeholder="Enter email address" class="text-center asp-save"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="plan-cta position-relative mb-2">
                    <div class="search-grid search-grid2">
                        <h4 class="font-weight-bold sidebar-heading">Narrow by Features</h4>
                        <div class="features">
                            <ul>
                                <li class="listname"><i class="fa fa-chevron-right"></i> Bedroom and Bathroom Features
                                </li>
                                <div id="bed-bath" class="features-list">
                                    <ul>
                                        @foreach ($beds as $item)
                                        <li><input type="checkbox" name="bf[]" value="{{$item->id}}">{{$item->name}}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <li class="listname"><i class="fa fa-chevron-right"></i> Kitchen Features</li>
                                <div id="bed-bath" class="features-list">
                                    <ul>
                                        @foreach ($kitchens as $item)
                                        <li><input type="checkbox" name="kf[]" value="{{$item->id}}">{{$item->name}}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <li class="listname"><i class="fa fa-chevron-right"></i> Interior Design Features</li>
                                <div id="bed-bath" class="features-list">
                                    <ul>
                                        @foreach ($roomsInteriors as $item)
                                        <li><input type="checkbox" name="rf[]" value="{{$item->id}}">{{$item->name}}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <li class="listname"><i class="fa fa-chevron-right"></i> Garage Features</li>
                                <div id="bed-bath" class="features-list">
                                    <ul>
                                        @foreach ($garages as $item)
                                        <li><input type="checkbox" name="gf[]" value="{{$item->id}}">{{$item->name}}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <li class="listname"><i class="fa fa-chevron-right"></i> Exterior Features</li>
                                <div id="bed-bath" class="features-list">
                                    <ul>
                                        @foreach ($outdoors as $item)
                                        <li><input type="checkbox" name="ef[]" value="{{$item->id}}">{{$item->name}}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <li class="listname"><i class="fa fa-chevron-right"></i> Architectural Styles</li>
                                <div id="bed-bath" class="features-list">
                                    <ul>
                                        @foreach ($styles as $item)
                                        <li><input type="checkbox" name="styles[]" value="{{$item->id}}">{{$item->name}}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <li class="listname"><i class="fa fa-chevron-right"></i> Specialty Home Collections</li>
                                <div id="bed-bath" class="features-list">
                                    <ul>
                                        @foreach ($collections as $item)
                                        <li><input type="checkbox" name="collections[]"
                                                value="{{$item->id}}">{{$item->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mobile-off">
            <div class="col-sm-12">
                <div class="plan-cta position-relative mb-2">
                    <div class="search-button">
                        <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding"
                            type="submit"> View Search Results</button>
                    </div>
                </div>

            </div>
        </div>
        </form>
        <div class="row">
            <div class="col-sm-12">
                <div class="plan-cta position-relative mb-2">
                    <div class="search-grid search-grid3 text-center">
                        <h4 class="font-weight-bold sidebar-heading">Architectural Styles </h4>
                        <div class="features">
                            <ul class="list-unstyled text-primary">
                                @foreach ($styles as $item)
                                <li><a href="{{ route('style.slug', $item->slug)}}">{{$item->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="plan-cta position-relative mb-2">
                    <div class="search-grid search-grid4 text-center">
                        <h4 class="font-weight-bold  sidebar-heading">Specialty Collections </h4>
                        <div class="features">
                            <ul class="list-unstyled text-primary">
                                @foreach ($collections as $item)
                                <li><a href="{{ route('collection.slug', $item->slug)}}">{{$item->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SideBar Left -->

    <!-- Content Right -->
    <div class="col-md-7 col-lg-9">
        <div class="row">
            <div class="col-md-12">
                <span class="pull-left">
                    <h5 class="font-weight-bold  text-size" style="margin-top : -3px;">View Our Most Popular House Plans
                    </h5>
                </span> <span class="pull-right search_span">
                    <form method="GET" action="{{ route('search') }}">Search <input type="text" name="txt"
                            placeholder="Plan# or name"></form>
                </span>
            </div>
        </div>
        <div class="row">
            @foreach ($mostPlans as $plan)
            <div class="col-md-6">
                <div class="plan-list mt-3">
                    <div class="row align-items-center py-2 px-1">
                        <div class="col-8">
                            <p class="plan-name font-weight-bold mb-0">{{$plan->square_ft['str_total']}} sq ft | <span
                                    class="text-white">plan {{$plan->plan_number}}</span></p>
                        </div>
                        <div class="col-4">
                            <ul class="list-inline mb-0 text-right font-icons">
                                <li class="list-inline-item icon-heart-mob"><a href="#"><i class="fa fa-heart-o"
                                            style="color:white"></i></a></li>
                                <li class="list-inline-item icon-search-mob"><a href="#" data-toggle="modal"
                                        data-target="#quickView"><i class="fa fa-search" style="color:white"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="position-relative">
                        <div id="plan{{$plan->plan_number}}" class="carousel slide" data-ride="carousel"
                            data-interval="false">
                            <a href="/plan/{{$plan->plan_number}}" class="carousel-inner">
                                @foreach ($plan->images as $img)
                                <div class="carousel-item @if($loop->iteration == 1) active @endif">
                                    <div class="embed-responsive embed-responsive-4by3 percent-69">
                                        <img src="/storage/plans/{{$plan->id}}/thumb/{{$img->file_name}}" alt=""
                                            class="embed-responsive-item">
                                    </div>
                                    @if ($img->camera_icon)
                                    <a href="#" class="position-absolute icon-camera"><img
                                            src="{{asset('images/icons/icon-camera.png')}}" alt=""></a>
                                    @endif
                                </div>
                                @endforeach
                            </a>
                            <a class="carousel-control-prev" href="#plan{{$plan->plan_number}}" role="button"
                                data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span> </a> <a class="carousel-control-next"
                                href="#plan{{$plan->plan_number}}" role="button" data-slide="next"> <span
                                    class="carousel-control-next-icon" aria-hidden="true"></span> <span
                                    class="sr-only">Next</span> </a> </div>
                        <div class="media planinfo text-left position-absolute placeholder-black"> <img
                                class="mr-1 align-self-center" src="/images/icons/logo-placeholder.png"
                                alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mb-0 text-white">plan <span
                                        class="text-secondary">{{$plan->plan_number}}</span></h5>
                                <h5 class="m-0 text-white">davidwiggins<span
                                        class="text-secondary">houseplans.com</span></h5>
                            </div>
                        </div>
                        <a href="#" class="position-absolute pinterest"><img src="/images/icons/icon-pinterest.png"
                                alt=""></a>
                    </div>
                    <div class="row no-gutters plan-info">
                        <div class="col bg-light"> bed<strong class="d-block">{{$plan->rooms['r_bedrooms']}}</strong>
                        </div>
                        <div class="col"> bath<strong class="d-block">{{$plan->rooms['r_full_baths']}}</strong> </div>
                        <div class="col bg-light"> story<strong
                                class="d-block">{{$plan->dimensions['stories']}}</strong> </div>
                        <div class="col"> gar<strong class="d-block">{{$plan->garage['car']}}</strong> </div>
                        <div class="col bg-light"> width<span class="d-block">{{$plan->dimensions['width_ft']}}’
                                {{$plan->dimensions['width_in']}}"</span> </div>
                        <div class="col"> depth<span class="d-block">{{$plan->dimensions['depth_ft']}}’
                                {{$plan->dimensions['depth_in']}}”</span> </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Content Right -->
</div>

@endsection
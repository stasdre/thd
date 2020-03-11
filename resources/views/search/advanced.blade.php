@extends('layouts.index')
@section('title', 'Search and customize house plans by David Wiggins')
@section('description', 'Search America’s favorite home designs and house plans, find beautiful, easy to customize
blueprints and floor plans and order direct from David Wiggins, Architect')

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
        To have your questions answered by our team of house plan experts, simply <a
            href="{{ route('contact-us') }}">email</a> or <a href="{{ route('contact-us') }}">live
            chat</a> us today!</span>
</p>
<div class="desktop-off read_more" id="read_more"><span class="read-more-link-wrapper">Read More </span></div>
<div style="display : none;" id="read_less" class="read_less"><span class="read-less-link-wrapper">Read Less </span>
</div>

<div class="center mb-3 desktop-off">
    {{-- <button class="btn btn-primary rounded-0 font-weight-semi-bold grey-button"
    type="button" style="width : 90%;">Search by plan # <i class="fa fa-search" style="color:white"></i></button> --}}
    <form style="width:91.5%;" class="input-group input-group-sm mb-1 plan_name_search" method="GET"
        action="{{ route('search') }}">
        <input type="text" name="txt" class="form-control rounded-0 border-secondary" placeholder="Search by plan #">
        <div class="input-group-append">
            <button class="btn btn-primary rounded-0 text-uppercase text-dark font-weight-semi-bold"
                style="margin: 0 !important; color: #fff !important;" type="submit">GO</button>
        </div>
    </form>

</div>

<div class="row">

    <!-- SideBar Left -->
    <div class="sidebar-left col-md-5 col-xl-3">
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
                                            class="center"> to
                                        <input type="text" placeholder="max" name="width_max" size=5 class="center">
                                        {{-- <span class="optional">Optional</span> --}}
                                    </td>

                                </tr>
                                <tr>
                                    <TD>Depth</TD>
                                    <td class="values"> <input type="text" name="depth_min" placeholder="min" size=5
                                            class="center"> to
                                        <input type="text" name="depth_max" placeholder="max" size=5 class="center">
                                        {{-- <span class="optional">Optional</span> --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="search-button">
                                            <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold"
                                                type="submit"> View
                                                Search Results</button>
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
                            type="submit"> View
                            Search Results</button>
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
    <div class="col-md-7 col-xl-9">
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
        <div class="search-results" id="plans-search" v-cloak>
            <plans-list :no-filter=true :colums=2 :view=10></plans-list>
        </div>
    </div>
    <!-- Content Right -->
</div>

@endsection

@push('scripts')
<script src="/js/plans-search.js"></script>
@endpush
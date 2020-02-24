@extends('layouts.index')

@section('content')
<div style="color : #212529;" class="info_text py-2 px-sm-5 mx-sm-3">
  Finding your perfect house plan has become a whole lot easier since builder-preferred, construction-ready home plans
  are now available online. Spending months or even longer working with an architect to fine tune a whole house
  blueprint is no longer necessary You can now easily and quickly
  <span class="mobile-off" id="content-scroll">find house plans designed by best-selling architects by following a few
    easy search steps. Before you begin searching house designs, make sure you’re purchasing house plans from a site
    like ours where the plans meet the strict standards of the IRC (International Residential Code) and guarantee
    the full architectural detailing your builder needs to construct a safe home. You’ll also want to check with
    your local town building department to find out if there are any special engineering or structural details
    needed for permitting. All of our floor plans can be customized as well as modified to include any possible
    local engineering details for certain locations like California and Florida. After you’ve done this initial
    homework, you’ll simply determine the square footage range needed to coordinate with your budget, style of home
    you want and then your preferences for bedrooms, baths, number of stories and garages. If there are lot
    restrictions, you can also add width and depth parameters in your home plan search to narrow down your results.
    To have your questions answered by our team of house plan experts, simply <a
      href="{{ route('contact-us') }}">email</a> or <a href="{{ route('contact-us') }}">live chat</a> us today!</span>
</div>
<div class="desktop-off read_more" id="read_more"><span class="read-more-link-wrapper">Read More </span></div>
<div style="display : none;" id="read_less" class="read_less"><span class="read-less-link-wrapper">Read Less </span>
</div>
<div class="row mobile-off">
  <div class="col-sm-12 center">
    <div><a href="{{ route('advanced-search') }}"
        class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding" style="margin-right:25px;">
        Quick Plan Search</a>
      <a href="{{ route('advanced-search') }}"
        class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding" style="padding : 10px 34px;">
        Advanced Plan Search</a>
    </div>
  </div>
</div>

<div class="row desktop-off">
  <div class="col-6 col-sm-6 set-left center">
    <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding" type="button"> Quick
      <br>Plan Search</button>
  </div>
  <div class="col-6 col-sm-6 set-left center">
    <a href="{{ route('advanced-search') }}"
      class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding"> Advanced <br>Plan
      Search</a>
  </div>
  <br>
</div>
<div style="clear : both;"></div>
<div class="search-results" id="plans-search" v-cloak>
  <plans-list></plans-list>
</div>
<br>
<!-- Sidebar content only for mobile -->
<div class="row desktop-off">
  <div class="col-sm-12">
    <div class="plan-cta position-relative mb-2">
      <div class="search-grid search-grid3 text-center">
        <h4 class="font-weight-bold">Architectural Styles </h4>
        <div class="features">
          <ul class="list-unstyled text-primary">
            @foreach($allStyles as $item)
            <li><a href="{{route('style.slug', $item->slug)}}">{{$item->name}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row desktop-off">
  <div class="col-sm-12">
    <div class="plan-cta position-relative mb-2">
      <div class="search-grid search-grid4 text-center">
        <h4 class="font-weight-bold">Specialty Collections </h4>
        <div class="features">
          <ul class="list-unstyled text-primary">
            @foreach($allCollections as $item)
            <li><a href="{{route('collection.slug', $item->slug)}}">{{$item->name}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Sidebar content only for mobile -->
@endsection

@push('scripts')
<script src="/js/plans-search.js"></script>
@endpush
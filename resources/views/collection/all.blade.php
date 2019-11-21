@extends('layouts.index')

@section('content')
<div class="plan-full position-relative d-none d-sm-block" style="width: 100%;">
  <div class="mobile-off">
    <img src="{{asset('storage/collections/'.$collectionData->image)}}" alt="" class="img-fluid" />
    <div class="plan-caption position-absolute top center">
      <h3 class="font-weight-semi-bold text-white pt-2 px-2 pb-1">{{ $collectionData->title }}</h3>
    </div>
    <div class="plan-name position-absolute">{{ $collectionData->subtitle }}</div>
  </div>
  <div class="desktop-off">
    <h5 class="center font-weight-bold no-margin mt-3"> Specialty Collections</h5>
  </div>
</div>
<div class="py-2 mx-sm-3 speciality-collection">

  <div class="px-sm-5 text-left col-12">
    {!! $collectionData->desc !!}
    <div class="desktop-off read_more" id="read_more" style="margin-top: -5px;"><span
        class="read-more-link-wrapper">Read More </span></div>
    <div style="display : none;" id="read_less" class="read_less"><span class="read-less-link-wrapper">Read Less </span>
    </div>
    <!-- <p class="no-margin">House Plans in our specialty collections allow you to narrow your home plan search to find the perfect house designs to accommodate any preference or budget.  Whether you’re looking for <a href="#">small house plans, energy efficient home plans, floor plans with in-law suites,</a> bonus spaces, outdoor living areas or <h5 class="desktop-off read_more"><span>Read More</span></h5><span class="mobile-off">  plans with walkout basements, quickly and easily produce search results with quality home plans that meet the strict standards of the IRC (International Residential Code) and have the full architectural detailing builders prefer.  Home plans in each collection represents the very best in residential architecture from leading architects and designers throughout the US and Canada.  If you need help finding your dream home, please <a href="#">live chat</a>, <a href="#">email</a> or <a href="#">call us</a> at XXX-XXX-XXXX and let our home plan experts assist you in making the right choice!</span></span></p>-->
  </div>

  <div class="row mobile-off">
    <div class="col-sm-12 center">
      <div class="py-2"><button class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding"
          type="button"> Quick Plan Search</button>
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
        class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding"> Advanced <br>Plan Search</a>
    </div>
    <br>
  </div>
  <div class="row desktop-off comunication_class">
    <div><span> <a href="{{ route('contact-us') }}">Live chat</a></span> | <span> <a
          href="{{ route('contact-us') }}">Email</a> </span> | <span class="black_text"><a
          href="tel:832-521-5820">832-521-5820</a></span>
    </div>
  </div>
  <div class="row desktop-off center">
    <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold new_style " type="button"> SEARCH OUR
      ARCHITECTURAL STYLES </button>
  </div><br>

  <div class="row ">

    <!-- SideBar Left -->
    @include('layouts.search-sidebar')
    <!-- SideBar Left -->

    <!-- Content Right -->
    <div class="col-md-7 col-lg-9 order-md-2 order-1">

      <div class="row text-center">
        @foreach($collections as $collection)
        <div class="col-sm-4 col-md-6 col-lg-4">
          <div class="plan-grid position-relative house-grid"> <a
              href="{{ route('collection.slug', $collection->slug) }}">
              <div class="embed-responsive embed-responsive-4by3 percent-70">
                @if($collection->image)
                <img src="{{asset('storage/collections/thumb/'.$collection->image)}}" alt="{{ $collection->name }}"
                  class="embed-responsive-item" />
                @else
                <img src="{{asset('images/plan-1.jpg')}}" alt="{{ $collection->name }}" class="embed-responsive-item" />
                @endif
              </div>
              <p class="shop-link no-margin-mobile">{{ $collection->name }}</p>
              <div class="plan-name position-absolute">plan {{ $collection->plan }}</div>
            </a> </div>
        </div>
        @endforeach
      </div>
    </div>
    <!-- Content Right -->
  </div>

</div>
@endsection
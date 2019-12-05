@extends('layouts.index')

@section('title', $data->title)

@section('content')
<div class="container align-items-center style-desc-container">
  <h1 class="text-center h2 about-page-title font-weight-bold">{{$data->title}}</h1>
  <div class="row">
    <div class="col-sm-6 about-page-desc">
      {!!$data->desc!!}
    </div>
    <div class="col-sm-6 about-page-img-container">
      <div class="embed-responsive embed-responsive-16by9">
        @if ($data->image)
        <a href="/collection/new-house-plans"><img src="{{ '/storage/about/'.$data->image }}"
            alt="{{$data->image_title}}" class="embed-responsive-item"></a>
        @endif
      </div>
      <h3 class="text-center font-weight-bold about-page-sub-title">Explore our New House Plan Collection</h3>
    </div>
  </div>
  <div class="row mobile-off">
    <div class="col-sm-12 center">
      <div>
        <a href="http://104.236.20.15:8080/plan/all"
          class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding" style="margin-right:25px;">
          Quick Plan Search</a>
        <a href="http://104.236.20.15:8080/advanced-search"
          class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding" style="padding : 10px 34px;">
          Advanced Plan Search</a>
      </div>
    </div>
  </div>
  <div class="row desktop-off">
    <div class="col-6 col-sm-6 set-left center">
      <a href="http://104.236.20.15:8080/plan/all"
        class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding">
        Quick<br> Plan Search</a>
    </div>
    <div class="col-6 col-sm-6 set-left center">
      <a href="http://104.236.20.15:8080/advanced-search"
        class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding"> Advanced <br>Plan
        Search</a>
    </div>
    <br>
  </div>
  <ul class="about-us-list">
    <li class="row about-us-item d-flex align-items-top">
      <div class="col-sm-3">
        <div class="embed-responsive embed-responsive-4by3">
          <img src="https://dummyimage.com/580x320" alt="" class="embed-responsive-item">
        </div>
      </div>
      <div class="col-sm-9">
        <h3 class="about-us-item-title">Our House Plans</h3>
        <div class="about-us-item-desc">Buying house plans on DavidWigginsHousePlans.com means you’re buying direct from
          America’s favorite
          residential architect, David E. Wiggins! When purchasing online house plans from our site, be confident in
          knowing that our home plans have been built in every state in the U.S. and many countries around the globe.
          David’s home designs are also guaranteed to include full architectural detailing that builders need to build
          safe and efficient houses From craftsman home plans to small house plans to modern floor plans, you’ll find
          easy
          to build and easy to customize house plans in a wide variety of styles and sizes.

          As you take your first step in building your new home by finding your perfect house plan, know that we’re
          here
          to assist you and answer all of your questions along the way. Feel free to contact us by live chat, email or
          phone at (XXX) XXX-XXXX. We’d be happy to help in any way that we can!
        </div>
      </div>
    </li>
    <li class="row about-us-item d-flex align-items-top">
      <div class="col-sm-3">
        <div class="embed-responsive embed-responsive-4by3">
          <img src="https://dummyimage.com/580x320" alt="" class="embed-responsive-item">
        </div>
      </div>
      <div class="col-sm-9">
        <h3 class="about-us-item-title">Our House Plans</h3>
        <div class="about-us-item-desc">Buying house plans on DavidWigginsHousePlans.com means you’re buying direct from
          America’s favorite
          residential architect, David E. Wiggins! When purchasing online house plans from our site, be confident in
          knowing that our home plans have been built in every state in the U.S. and many countries around the globe.
          David’s home designs are also guaranteed to include full architectural detailing that builders need to build
          safe and efficient houses From craftsman home plans to small house plans to modern floor plans, you’ll find
          easy
          to build and easy to customize house plans in a wide variety of styles and sizes.

          As you take your first step in building your new home by finding your perfect house plan, know that we’re
          here
          to assist you and answer all of your questions along the way. Feel free to contact us by live chat, email or
          phone at (XXX) XXX-XXXX. We’d be happy to help in any way that we can!
        </div>
      </div>
    </li>
    <li class="row about-us-item d-flex align-items-top">
      <div class="col-sm-3">
        <div class="embed-responsive embed-responsive-4by3">
          <img src="https://dummyimage.com/580x320" alt="" class="embed-responsive-item">
        </div>
      </div>
      <div class="col-sm-9">
        <h3 class="about-us-item-title">Our House Plans</h3>
        <div class="about-us-item-desc">Buying house plans on DavidWigginsHousePlans.com means you’re buying direct from
          America’s favorite
          residential architect, David E. Wiggins! When purchasing online house plans from our site, be confident in
          knowing that our home plans have been built in every state in the U.S. and many countries around the globe.
          David’s home designs are also guaranteed to include full architectural detailing that builders need to build
          safe and efficient houses From craftsman home plans to small house plans to modern floor plans, you’ll find
          easy
          to build and easy to customize house plans in a wide variety of styles and sizes.

          As you take your first step in building your new home by finding your perfect house plan, know that we’re
          here
          to assist you and answer all of your questions along the way. Feel free to contact us by live chat, email or
          phone at (XXX) XXX-XXXX. We’d be happy to help in any way that we can!
        </div>
      </div>
    </li>
    <li class="row about-us-item d-flex align-items-top">
      <div class="col-sm-3">
        <div class="embed-responsive embed-responsive-4by3">
          <img src="https://dummyimage.com/580x320" alt="" class="embed-responsive-item">
        </div>
      </div>
      <div class="col-sm-9">
        <h3 class="about-us-item-title">Our House Plans</h3>
        <div class="about-us-item-desc">Buying house plans on DavidWigginsHousePlans.com means you’re buying direct from
          America’s favorite
          residential architect, David E. Wiggins! When purchasing online house plans from our site, be confident in
          knowing that our home plans have been built in every state in the U.S. and many countries around the globe.
          David’s home designs are also guaranteed to include full architectural detailing that builders need to build
          safe and efficient houses From craftsman home plans to small house plans to modern floor plans, you’ll find
          easy
          to build and easy to customize house plans in a wide variety of styles and sizes.

          As you take your first step in building your new home by finding your perfect house plan, know that we’re
          here
          to assist you and answer all of your questions along the way. Feel free to contact us by live chat, email or
          phone at (XXX) XXX-XXXX. We’d be happy to help in any way that we can!
        </div>
      </div>
    </li>
    <li class="row about-us-item d-flex align-items-top">
      <div class="col-sm-3">
        <div class="embed-responsive embed-responsive-4by3">
          <img src="https://dummyimage.com/580x320" alt="" class="embed-responsive-item">
        </div>
      </div>
      <div class="col-sm-9">
        <h3 class="about-us-item-title">Our House Plans</h3>
        <div class="about-us-item-desc">Buying house plans on DavidWigginsHousePlans.com means you’re buying direct from
          America’s favorite
          residential architect, David E. Wiggins! When purchasing online house plans from our site, be confident in
          knowing that our home plans have been built in every state in the U.S. and many countries around the globe.
          David’s home designs are also guaranteed to include full architectural detailing that builders need to build
          safe and efficient houses From craftsman home plans to small house plans to modern floor plans, you’ll find
          easy
          to build and easy to customize house plans in a wide variety of styles and sizes.

          As you take your first step in building your new home by finding your perfect house plan, know that we’re
          here
          to assist you and answer all of your questions along the way. Feel free to contact us by live chat, email or
          phone at (XXX) XXX-XXXX. We’d be happy to help in any way that we can!
        </div>
      </div>
    </li>
    <li class="row about-us-item d-flex align-items-top">
      <div class="col-sm-3">
        <div class="embed-responsive embed-responsive-4by3">
          <img src="https://dummyimage.com/580x320" alt="" class="embed-responsive-item">
        </div>
      </div>
      <div class="col-sm-9">
        <h3 class="about-us-item-title">Our House Plans</h3>
        <div class="about-us-item-desc">Buying house plans on DavidWigginsHousePlans.com means you’re buying direct from
          America’s favorite
          residential architect, David E. Wiggins! When purchasing online house plans from our site, be confident in
          knowing that our home plans have been built in every state in the U.S. and many countries around the globe.
          David’s home designs are also guaranteed to include full architectural detailing that builders need to build
          safe and efficient houses From craftsman home plans to small house plans to modern floor plans, you’ll find
          easy
          to build and easy to customize house plans in a wide variety of styles and sizes.

          As you take your first step in building your new home by finding your perfect house plan, know that we’re
          here
          to assist you and answer all of your questions along the way. Feel free to contact us by live chat, email or
          phone at (XXX) XXX-XXXX. We’d be happy to help in any way that we can!
        </div>
      </div>
    </li>
    <li class="row about-us-item d-flex align-items-top">
      <div class="col-sm-3">
        <div class="embed-responsive embed-responsive-4by3">
          <img src="https://dummyimage.com/580x320" alt="" class="embed-responsive-item">
        </div>
      </div>
      <div class="col-sm-9">
        <h3 class="about-us-item-title">Our House Plans</h3>
        <div class="about-us-item-desc">Buying house plans on DavidWigginsHousePlans.com means you’re buying direct from
          America’s favorite
          residential architect, David E. Wiggins! When purchasing online house plans from our site, be confident in
          knowing that our home plans have been built in every state in the U.S. and many countries around the globe.
          David’s home designs are also guaranteed to include full architectural detailing that builders need to build
          safe and efficient houses From craftsman home plans to small house plans to modern floor plans, you’ll find
          easy
          to build and easy to customize house plans in a wide variety of styles and sizes.

          As you take your first step in building your new home by finding your perfect house plan, know that we’re
          here
          to assist you and answer all of your questions along the way. Feel free to contact us by live chat, email or
          phone at (XXX) XXX-XXXX. We’d be happy to help in any way that we can!
        </div>
      </div>
    </li>
  </ul>
</div>
@endsection
@extends('layouts.index')

@section('content')
<div class="row align-items-center style-desc-container">
  <div class="col-sm-7">
    <h1 class="text-center h3 font-weight-bold">{{ $style->name }}</h1>
    <div class="sidebar-box">
      <div class="sidebar-box__text">{!! $style->description !!}</div>
    </div>
    <div class="row justify-content-center align-items-center">
      <div class="col-3 style-desc-container__border"></div>
      <div class="col-auto"><a class="style-desc-container__link" href="#">Read More</a></div>
      <div class="col-3 style-desc-container__border"></div>
    </div>
  </div>
  <div class="col-sm-5 style-desc-container__img">
    <div class="embed-responsive embed-responsive-16by9">
      <img src="{{ '/storage/styles/'.$style->image }}" alt="{{$style->name}}" class="embed-responsive-item" />
    </div>
  </div>
</div>

<div class="search-wrap light py-2 text-center px-5 mobile-off">
  <form class="form-main-search text-center space_left" action="{{ route('search') }}" method="GET">
    <div class="row no-gutters">
      <div class="col-md-2 col-sm-3 common_width padd_bottom_10">
        <div class="form-group">
          <div class="select-custom-wrap select-custom-wrap-lg">
            <div class="select"><select name="style-or-collection" class="select-custom select-hidden">
                <option value="">Styles \ Collections</option>
                @foreach ($searchFilter as $item)
                <option value="{{$item}}">{{$item}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-1 col-sm-3 common_width padd_bottom_10">
        <div class="form-group">
          <div class="select-custom-wrap select-custom-wrap-sm">
            <div class="select"><select name="beds" class="select-custom select-hidden">
                <option value="">Beds</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-1 col-sm-3 common_width padd_bottom_10">
        <div class="form-group">
          <div class="select-custom-wrap select-custom-wrap-sm">
            <div class="select"><select name="baths" class="select-custom select-hidden">
                <option value="">Baths</option>
                <option value="1">1</option>
                <option value="1.5">1.5</option>
                <option value="2">2</option>
                <option value="2.5">2.5</option>
                <option value="3">3</option>
                <option value="3.5">3.5</option>
                <option value="4">4</option>
                <option value="4.5">4.5</option>
                <option value="5">5</option>
                <option value="5.5">5.5</option>
                <option value="6">6</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-1 col-sm-3 common_width padd_bottom_10">
        <div class="form-group">
          <div class="select-custom-wrap select-custom-wrap-sm">
            <div class="select"><select name="stories" class="select-custom select-hidden">
                <option value="">Stories</option>
                <option value="1">1</option>
                <option value="1.5">1.5</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-3 common_width padd_bottom_10 max-width">
        <div class="form-group">
          <div class="select-custom-wrap select-custom-wrap-md">
            <div class="select"><select name="garages" class="select-custom select-hidden">
                <option value="">Garages</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-1 col-sm-3 common_width">
        <div class="form-group">
          <input type="text" name="sq_min" placeholder="Min Sq Ft" class="center" style="font-size : 12px;padding :0;">
        </div>
      </div>
      <div class="col-md-1 col-sm-3 common_width">
        <div class="form-group">
          <input type="text" name="sq_max" placeholder="Max Sq Ft" class="center" style="font-size : 12px;padding :0;">
        </div>
      </div>
      <div class="col-md-1 col-sm-3 common_width">
        <div class="form-group">
          <button type="submit" class="btn btn-block btn-primary rounded-0">Search</button>
        </div>
      </div>
      <div class="col-md-2 col-sm-3 common_width comm_xs_btn text-right">
        <div class="form-group"> <a href="{{ route('advanced-search') }}"
            class="btn btn-link text-uppercase text-white advan_opts">Advanced Options</a> </div>
      </div>
    </div>
  </form>
</div>

<div class="row mobile-off">
  <div class="col-sm-12 center">
    <div><button class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding" type="button">
        Quick Plan Search</button>
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
  <plans-list :style-id={{$style->id}}></plans-list>
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
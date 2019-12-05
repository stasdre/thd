@extends('layouts.index')

@section('title', $data->title)

@section('content')
<div class="container align-items-center style-desc-container">
  <h1 class="text-center h2 about-page-title font-weight-bold">{{$data->title}}</h1>
  <div class="row">
    <div class="col-md-6 about-page-desc">
      {!!$data->desc!!}
    </div>
    <div class="col-md-6 about-page-img-container">
      <div class="embed-responsive embed-responsive-16by9">
        @if ($data->image)
        <a href="/collection/new-house-plans"><img src="{{ '/storage/about/'.$data->image }}"
            alt="{{$data->image_title}}" class="embed-responsive-item"></a>
        @endif
      </div>
      <h3 class="text-center font-weight-bold about-page-sub-title">Explore our New House Plan Collection</h3>
    </div>
  </div>
  <div class="row mobile-off" style="margin-bottom: 40px;">
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
  <div class="row desktop-off" style="margin-bottom: 20px;">
    <div class="row">
      <div class="col-6 col-sm-6 center">
        <a href="http://104.236.20.15:8080/plan/all"
          class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding">
          Quick<br> Plan Search</a>
      </div>
      <div class="col-6 col-sm-6 center">
        <a href="http://104.236.20.15:8080/advanced-search"
          class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding"> Advanced <br>Plan
          Search</a>
      </div>
    </div>
    <br>
  </div>
  @foreach ($articles as $article)
  <div class="row about-us-item">
    <div class="col-md-3">
      <div class="embed-responsive embed-responsive-4by3">
        @if ($article->image)
        <img src="{{'/storage/about/'.$article->image}}" alt="{{$article->name}}" class="embed-responsive-item">
        @endif
      </div>
    </div>
    <div class="col-md-9">
      <h3 class="about-us-item-title">{{$article->name}}</h3>
      <div class="about-us-item-desc">
        {!!$article->description!!}
      </div>
    </div>
  </div>
  @endforeach
  @endsection
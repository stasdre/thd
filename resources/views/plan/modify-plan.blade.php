@extends('layouts.index')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb mb-0 bg-white px-0">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item">Modify Plan</li>
  </ol>
</nav>
<div class="bg-secondary_new">
  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-8 col-sm-12 px-0 form-white">
        <div class="text-center">
          <h4 class="font-weight-bold mt-3">Modification Request Form</h4>
          <p><a href="#" class="text-primary">Helpful tips to know before you submit your modifications </a>
          </p>
          @if (session()->has('message'))
          @component('partials.alert', ['type'=>session()->get('message')['type']])
          @slot('title')
          {{ session()->get('message')['title'] }}
          @endslot
          {{ session()->get('message')['message'] }}
          @endcomponent
          @endif

        </div>

        {!! Form::open(['route' => ['modify-plan-submit', $plan->plan_number], 'id' => 'modification_form',
        'method' => 'post', 'files' => true]) !!}
        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }} col-lg-6 pull-left">
          {{ Form::label('first_name', 'First Name:') }}
          {{ Form::text('first_name', null, ['class'=>'form-control']) }}
        </div>
        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }} col-lg-6 pull-right">
          {{ Form::label('last_name', 'Last Name:') }}
          {{ Form::text('last_name', null, ['class'=>'form-control']) }}
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} col-lg-6 pull-left">
          {{ Form::label('email', 'Email:') }}
          {{ Form::email('email', null, ['class'=>'form-control']) }}
        </div>
        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }} col-lg-6 pull-right">
          {{ Form::label('phone', 'Phone:') }}
          {{ Form::text('phone', null, ['class'=>'form-control']) }}
        </div>
        <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }} col-lg-6 pull-left">
          <div class="select-custom-wrap select-custom-wrap-lg">
            {{ Form::label('state', 'State you are building in:') }}
            {{ Form::select('state', $states, null, ['class'=>'select-custom select-custom-jq', 'placeholder'=>'Select here']) }}
          </div>
        </div>
        <div class="form-group {{ $errors->has('when') ? 'has-error' : '' }} col-lg-6 pull-right">
          <div class="select-custom-wrap select-custom-wrap-lg">
            {{ Form::label('when', 'When you are planning to build?:') }}
            {{ Form::select('when', [
                              '0-3'=>'0-3 months', 
                              '3-6'=>'3-6 months', 
                              '6-9'=>'6-9 months', 
                              '9-12'=>'9-12 months', 
                              '12+'=>'12+ months', 
                              ], null, ['class'=>'select-custom select-custom-jq', 'placeholder'=>'Select here']) }}
          </div>
        </div>
        <div class="form-group {{ $errors->has('foundation') ? 'has-error' : '' }} col-lg-6 pull-left">
          <div class="select-custom-wrap select-custom-wrap-lg">
            {{ Form::label('foundation', 'If you know, select foundation type:') }}
            {{ Form::select('foundation', [
                              'slab'=>'Slab', 
                              'crawlspace'=>'Crawlspace', 
                              'basement'=>'Basement', 
                              'walkout_basement'=>'Walkout Basement', 
                              'daylight_basement'=>'Daylight Basement', 
                              ], null, ['class'=>'select-custom select-custom-jq', 'placeholder'=>'Select here']) }}
          </div>
        </div>
        <div class="form-group {{ $errors->has('builder') ? 'has-error' : '' }} col-lg-6 pull-right">
          <div class="select-custom-wrap select-custom-wrap-lg">
            {{ Form::label('builder', 'Do you have a builder?:') }}
            {{ Form::select('builder', [
                              'yes'=>'Yes', 
                              'no'=>'No', 
                              'builder'=>'I\'m a builder', 
                              ], null, ['class'=>'select-custom select-custom-jq', 'placeholder'=>'Select here']) }}
          </div>
        </div>
        <div class="form-group {{ $errors->has('land') ? 'has-error' : '' }} col-lg-6 pull-left">
          <div class="select-custom-wrap select-custom-wrap-lg">
            {{ Form::label('land', 'Do you have land?:') }}
            {{ Form::select('land', [
                              'yes'=>'Yes', 
                              'no'=>'No', 
                              'process'=>'In process of purchasing', 
                              'multiple'=>'Have multiple lots', 
                              ], null, ['class'=>'select-custom select-custom-jq', 'placeholder'=>'Select here']) }}
          </div>
        </div>
        <div class="form-group {{ $errors->has('framing') ? 'has-error' : '' }} col-lg-6 pull-right">
          <div class="select-custom-wrap select-custom-wrap-lg">
            {{ Form::label('framing', 'Framing Preference:') }}
            {{ Form::select('framing', [
                              '2x4'=>'2 x 4', 
                              '2x8'=>'2 X 8', 
                              'block'=>'8" block', 
                              ], null, ['class'=>'select-custom select-custom-jq', 'placeholder'=>'Select here']) }}
          </div>
        </div>

        <div class="col-lg-12 pull-left py-0">
          <h5 class="font-weight-bold">If you know the information below, include it with your request to
            receive your FREE modification estimate with 2 business days</h5>
          <ul class="list-style-none pl-0">
            <li>~ Specific dimensions for enlarging and reducing rooms</li>
            <li>~ If changing roof pitch, provide new pitch (10:12, 8:12: 4:12 etc)</li>
            <li>~ If raising or lower ceilings, give specific heights</li>
            <li>~ For basement changes indicate as many details as possible like walkout, daylight or
              partial.</li>
          </ul>
          <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
            {{ Form::textarea('message', null, ['class'=>'form-control z-depth-1', 'id'=>'modify_plan_changes', 'rows'=>"3", 'placeholder'=>"Type your plan modification changes here.."]) }}
          </div>
          <h6 class="font-weight-bold">Download plan by clicking floor plan image on right to send sketch of
            changes, if needed:</h6>
          <div class="custom-file {{ $errors->has('files') ? 'has-error' : '' }} col-sm-8">
            {{Form::file('files', ['class'=>"custom-file-input", 'id'=>"customFile"])}}
            {{ Form::label('files', 'Upload files here', ['class'=>"custom-file-label"]) }}
          </div>
          <br />
          <p></p>
          <div class="form-group">
            {{ Form::button('Submit your request', ['class'=>'btn btn-danger', 'type'=>'submit']) }}
          </div>
        </div>

        {!! Form::close() !!}
      </div>
      <div class="col-lg-4 col-sm-12">
        <h5 class="font-weight-bold mt-3">{{$plan->name}} | plan {{$plan->plan_number}}</h5>
        <div class="plan-list mt-0">
          <div class="row align-items-center py-2 px-1">
            <div class="col-8">
              <p class="plan-name font-weight-bold mb-0">{{$plan->square_ft['str_total']}} sq ft | <span
                  class="text-white">plan {{$plan->plan_number}}</span></p>
            </div>
            <div class="col-4">
              <ul class="list-inline mb-0 text-right">
                <li class="list-inline-item"><a href=""><img src="/images/icons/icon-favourite.png" alt=""></a></li>
                <li class="list-inline-item">
                  <button type="button" class="btn btn-link p-0" data-toggle="modal" data-target="#quickView"><img
                      src="/images/icons/icon-search-w.png" alt=""></button>
                </li>
              </ul>
            </div>
          </div>
          <div class="position-relative">
            <div id="plan{{$plan->plan_number}}" class="carousel slide" data-ride="carousel" data-interval="5000">
              <div class="carousel-inner">
                @foreach ($plan->images as $img)
                <div class="carousel-item @if($loop->iteration == 1) active @endif">
                  <img src="/storage/plans/{{$plan->id}}/thumb/{{$img->file_name}}" alt="{{$plan->name}}"
                    class="img-fluid d-block w-100">
                  @if($img->camera_icon)
                  <a href="#" class="position-absolute icon-camera"><img src="{{asset('images/icons/icon-camera.png')}}"
                      alt=""></a>
                  @endif

                </div>
                @endforeach
              </div>
              <a class="carousel-control-prev" href="#plan{{$plan->plan_number}}" role="button" data-slide="prev"> <span
                  class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span> </a> <a class="carousel-control-next"
                href="#plan{{$plan->plan_number}}" role="button" data-slide="next"> <span
                  class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
            </div>
            <div class="media planinfo text-left position-absolute placeholder-black"> <img
                class="mr-1 align-self-center" src="/images/icons/logo-placeholder.png" alt="Generic placeholder image">
              <div class="media-body">
                <h5 class="mb-0 text-white">plan <span class="text-secondary">{{$plan->plan_number}}</span></h5>
                <h5 class="m-0 text-white">houseplans<span class="text-secondary">bydavidwiggins.com</span></h5>
              </div>
            </div>
            <a href="#" class="position-absolute pinterest"><img src="/images/icons/icon-pinterest.png" alt=""></a>
          </div>
          <div class="row no-gutters plan-info">
            <div class="col bg-light"> bed<strong class="d-block">{{$plan->rooms['r_bedrooms']}}</strong>
            </div>
            <div class="col"> bath<strong class="d-block">{{$plan->rooms['r_full_baths']}}</strong> </div>
            <div class="col bg-light"> story<strong class="d-block">{{$plan->dimensions['stories']}}</strong> </div>
            <div class="col"> gar<strong class="d-block">{{$plan->garage['car']}}</strong> </div>
            <div class="col bg-light"> width<span class="d-block">{{$plan->dimensions['width_ft']}}'
                {{$plan->dimensions['width_in']}}"</span> </div>
            <div class="col"> depth<span class="d-block">{{$plan->dimensions['depth_ft']}}'
                {{$plan->dimensions['depth_in']}}"</span> </div>
          </div>
        </div>
        <p></p>
        <p></p>
        @foreach($plan->images_first as $image)
        <img src="{{asset('storage/plans/'.$plan->id.'/thumb/'.$image->file_name)}}" class="img-fluid d-block w-100"
          alt="First Floor Plan">
        <p class="plan_download_link"><a download="first-floor-Plan.png"
            href="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" title="{{$image->file_name}}">
            Click to enlarge and download
          </a></p>
        @endforeach
        <p></p>
        <p></p>
        @foreach($plan->images_second as $image)
        <img src="{{asset('storage/plans/'.$plan->id.'/thumb/'.$image->file_name)}}" class="img-fluid d-block w-100"
          alt="Second Floor Plan">
        <p class="plan_download_link"><a download="first-floor-Plan.png"
            href="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" title="{{$image->file_name}}">
            Click to enlarge and download
          </a></p>
        @endforeach
        <p></p>
        <p></p>
        <p></p>
      </div>
    </div>
  </div>
</div>

@endsection
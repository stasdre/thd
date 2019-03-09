@extends('layouts.index')
@section('title', $plan->meta_title)
@section('description', $plan->meta_description)
@section('content')
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 bg-white px-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item">Plan Page</li>
      </ol>
    </nav>
    
    @if($agent->isPhone())
    <div class="plan-list my-1"  style="margin-bottom : 0 !important;padding-bottom : 5px;">
      <div class="row no-gutters align-items-center py-2 px-2">
        <div class="col-8">
          <p class="plan-name font-weight-bold mb-0">{{$plan->square_ft['str_total']}} sq ft | <span class="text-white">plan {{$plan->plan_number}}</span></p>
        </div>
        <div class="col-4">
          <ul class="list-inline mb-0 text-right">
            <li class="list-inline-item"><a href=""><i class="fa fa-heart-o" style="color:white;font-size : 25px;"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    @endif
    <div class="bg-dark pb-2 position-relative padding-botton_0_xs">
      <div class="row no-gutters">
        <div class="col xs-hide-portrait"></div>
        <div class="col-10 xs_portrait_width_100">
          <div class="slider">
            @foreach($plan->images as $image)
                  <figure> <img src="{{ asset('storage/plans/'.$plan->id.'/'.$image->file_name) }}" alt="{{$image->alt_text}}" class="img-fluid">
                      @if($image->description)
                        <figcaption>{{$image->description}}</figcaption>
                      @endif
                      <div class="media planinfo text-left"> <img class="mr-1 align-self-end" src="{{asset('images/icons/logo-placeholder.png')}}" alt="Generic placeholder image">
                          <div class="media-body">
                              <h5 class="mb-0 text-white">plan <span class="text-secondary">{{$plan->plan_number}}</span></h5>
                              <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
                          </div>
                      </div>
                      @if ($agent->isPhone())
                          <a href="#" class="position-absolute pinterest"><img src="{{asset('images/icons/icon-pinterest.png')}}" alt=""></a>
                      @endif

                  </figure>
            @endforeach
          </div>
          
          <!-- THUMBNAILS -->
          <div class="slider-nav-thumbnails xs-hide-portrait">
              @foreach($plan->images as $image)
                  <div><img src="{{ asset('storage/plans/'.$plan->id.'/thumb/'.$image->file_name) }}" alt="{{$image->title}}" class="img-fluid"> </div>
              @endforeach
          </div>
        </div>
        <div class="col xs-hide-portrait">
          <ul class="list-unstyled single-plan-actions text-center">
            <li><a href="#" class="text-secondary"><img src="{{asset('images/icons/icon-heart.png')}}" alt="" class="img-fluid"></a></li>
            <li><a href="#" class="text-secondary"><img src="{{asset('images/icons/icon-print.png')}}" alt="" class="img-fluid"></a></li>
            <li><a href="#" class="text-secondary"><img src="{{asset('images/icons/icon-share.png')}}" alt="" class="img-fluid"></a></li>
          </ul>
        </div>
      </div>
      <div class="left preferred position-absolute pl-2 xs-hide-portrait"> <!--d-sm-none-->
        <p class="text-white mb-0 p1">Architect’s Preferred Products</p>
        <p class="text-secondary mb-0 p2">Interior Design | Exterior Products </p>
      </div>
      <div class="right position-absolute text-sm-right newsletter pr-2 mb-1 xs-hide-portrait"><!--d-sm-none-->
        <p class="mb-1 font-weight-semi-bold"><span class="gray_color">SIGN UP FOR</span>  E-PUBS + DISCOUNTS</p>
        <div class="input-group input-group-sm">
          <input type="text" class="form-control rounded-0 border-secondary" placeholder="Email Address">
          <div class="input-group-append">
            <button class="btn btn-secondary rounded-0 text-uppercase text-dark font-weight-semi-bold" type="button">SignUp</button>
          </div>
        </div>
      </div>
      <div class="position-absolute social-share xs-hide-portrait">
        <ul class="list-unstyled m-0 text-center">
          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="#"><i class="fab fa-youtube"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          <li><a href="#"><i class="fab fa-houzz"></i></a></li>
          <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
        </ul>
      </div>
    </div>
    <div class="px-4 position-relative padding-botton_0_xs">
      
      <div class="row text-center align-items-center mt-4 mb-4 mtrim-bottom">
        <div class="col-lg-6 col-sm-12 border-right_3 plan_details">
          <h5 class="text-uppercase font-weight-bold sm-font-1rem xs-hide-portrait">HOUSE PLAN DETAILS</h5>
          <div class="py-2 px-5 font-weight-bold">
           <div class="row text-center no-gutters">
               <div class="col py-1 border border-light font-weight-semi-bold">Sq. Ft. <span class="d-block text-secondary"><b>{{$plan->square_ft['str_total']}}</b></span></div>
      <div class="col py-1 border border-light font-weight-semi-bold bg-secondary">1st Fl <span class="d-block text-white"><b>{{$plan->square_ft['1_floor']}}</b></span></div>
      <div class="col py-1 border border-light font-weight-semi-bold">2nd Fl <span class="d-block text-secondary"><b>{{$plan->square_ft['2_floor']}}</b></span></div>
      <div class="col py-1 border border-light font-weight-semi-bold bg-secondary">Garages <span class="d-block text-white"><b>{{$plan->garage['car']}} car</b></span></div>
    </div>
           
    <div class="row text-center no-gutters">
      <div class="col py-1 border border-light font-weight-semi-bold bg-secondary">Beds <span class="d-block text-white"><b>{{$plan->rooms['r_bedrooms']}}</b></span></div>
      <div class="col py-1 border border-light font-weight-semi-bold">Baths <span class="d-block text-secondary"><b>{{$plan->rooms['r_full_baths']}}</b></span></div>
      <div class="col py-1 border border-light font-weight-semi-bold bg-secondary">Width <span class="d-block text-white"><b>{{$plan->dimensions['width_ft']}}' {{$plan->dimensions['width_in']}}"</b></span></div>
      <div class="col py-1 border border-light font-weight-semi-bold">Depth <span class="d-block text-secondary"><b>{{$plan->dimensions['depth_ft']}}' {{$plan->dimensions['depth_in']}}"</b></span></div>
    </div>
          </div>
          <a href="#floorPlan" class="btn btn-primary text-uppercase rounded-0 mt-3 xs-hide-portrait">View Floor Plans</a> </div>
        @if($agent->isDesktop() || $agent->isTablet())
        <div class="col-lg-4 col-md-6 col-sm-7 form-white padd_top">
            {!! Form::open(['route' => 'purchase', 'class' => 'form-horizontal', 'method' => 'post', 'files' => true]) !!}
            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
          <h5 class="text-uppercase font-weight-bold sm-font-1rem">SELECT THE RIGHT PACKAGE</h5>
          <p class=" d-sm-none">View ALL Available Options</p>
          <div class="row align-items-center no-gutters mb-1">
            <div class="col-2 text-right font-weight-bold pr-2">1</div>
            <div class="col-9 text-left">
              <div class="form-group mb-0">
                <div class="select-custom-wrap select-custom-wrap-lg">
                  <select name="plan_package" class="select-custom white_back" >
                    <option value="hide">Choose Your Plan Package</option>
                      @foreach($plan->packages as $package)
                        <option value="{{$package->id}}" data-cost="{{$package->pivot->price }}">{{$package->name}} ({{$package->pivot->price }}$)</option>
                      @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row align-items-center no-gutters mb-1">
            <div class="col-2 text-right font-weight-bold pr-2">2</div>
            <div class="col-9 text-left">
              <div class="form-group mb-0">
                <div class="select-custom-wrap select-custom-wrap-lg">
                  <select name="plan_foundation" class="select-custom white_back" >
                    <option value="hide">Choose Your Foundation</option>
                      @foreach($plan->foundationOptions as $foundat)
                        <option value="{{$foundat->id}}" data-cost="{{$foundat->pivot->price}}">{{$foundat->name}} ({{$foundat->pivot->price}}$)</option>
                      @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row align-items-center no-gutters mb-1">
            <div class="col-2 text-right font-weight-bold pr-2">3</div>
            <div class="col-9 text-left">
              <div class="form-group mb-0">
                <div class="select-custom-wrap select-custom-wrap-lg">
                  <select name="plan_features" class="select-custom white_back" >
                    <option value="hide">Optional Features</option>
                      @foreach($plan->addons as $addon)
                        <option value="{{$addon->id}}" data-cost="{{$addon->pivot->price}}">{{$addon->name}} ({{$addon->pivot->price}}$)</option>
                      @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary text-uppercase rounded-0 mt-1 offset-1">PURCHASE PLANS</button>
            {!! Form::close() !!}
        </div>
       
        <div class="col-lg-2 col-sm-5 padd_top pd-md-0"> <!--d-sm-none-->
          <div class="bg-secondary px-2 py-2 mb-1">
            <h5 class="text-primary">Get Your Plans in Minutes</h5>
            <!--<p class="small m-0">The PDF Plan Package offers Immediate delivery of your House Plans!</p>-->
          </div>
          <div class="bg-secondary px-2 py-2 mb-1">
            <h5 class="text-primary">What's Included with Your Plans</h5>
            <!--<p class="small m-0">The PDF Plan Package offers Immediate delivery of your House Plans!</p>-->
          </div>
          <div class="bg-secondary px-2 py-2">
            <h5 class="text-primary">Important Info Before You Buy</h5>
            <!--<p class="small m-0">The PDF Plan Package offers Immediate delivery of your House Plans!</p>-->
          </div>
        </div> @endif
      </div>
    </div>
     @if ($agent->isMobile())
     	<div class="tab-content bg-secondary px-5 py-3 mt-2" id="myTabContent" style="margin-top : 0 !important;">
        <div class="tab-pane fade show active" id="planDescription" role="tabpanel">
          <h6 class="font-weight-bold">{{$plan->name}} House Plan {{$plan->plan_number}}</h6>
            @if($plan->short_desc)
                <div class="margin_bt0-xs">{!! $plan->short_desc !!} <a href="#" data-toggle="collapse" data-target="#readMore" class="read_more"> READ MORE...</a>. <div id="readMore" class="collapse in">{!! $plan->description !!}</div></div>
            @else
                <div class="margin_bt0-xs">{!! $plan->description !!}</div>
            @endif
        </div>
        <div class="tab-pane fade" id="modifyPlan" role="tabpanel">Modify This Plan</div>
        <div class="tab-pane fade" id="costBuild" role="tabpanel">
        	<div class="row">
            	<div class="col-lg-2 text-center">
                	<h5 class="font-weight-bold mt-3">$29.95</h5> 
                    <h6>For a Single Plan</h6>
                    <a href="#" class="btn btn-primary text-uppercase rounded-0 mt-0">ORDER NOW</a>
                </div>
                <div class="col-lg-8 text-center">
                	<h5 class="font-weight-bold">Find Out the Cost-to-Build this Home! </h5>
                    <p><b>Quickly + Instantly</b> calculate the cost-to-build this home. This report will estimate the costs based
 on your building location, materials and  labor. You can select the construction quality levels to 
ensure you stay in budget, economy, standard and premium.</p>
			<p><a href="#" class="text-primary font-weight-bold free_videoLink">View a FREE demo </a></p>
            <span class="note text-danger">Note: The Home-Cost Instant Cost-to-Build Estimator purchase is non-refundable.</span>
                </div>
                <div class="col-lg-2 text-center">
                	<h5 class="font-weight-bold mt-3">$49.95</h5> 
                    <h6>For Unlimited Plan</h6>
                    <a href="#" class="btn btn-primary text-uppercase rounded-0 mt-0">ORDER NOW</a>
                </div>
            </div>
        </div>
      </div>
     @endif
    <div class="">
      <ul class="nav nav-pills plan-nav nav-justified text-uppercase mt-2" id="planDetails" role="tablist">
        <li class="nav-item xs-hide-portrait"> <a class="nav-link rounded-0 active" id="plandescription" data-toggle="tab" href="#planDescription" role="tab">Plan Description</a> </li>
        <li class="nav-item xs-hide-portrait"> <a class="nav-link rounded-0" id="planspecifications" data-toggle="tab" href="#planSpecifications" role="tab">Plan Specifications</a> </li>
        <li class="nav-item xs-hide-portrait"> <a class="nav-link rounded-0" id="planfeatures" data-toggle="tab" href="#planFeatures" role="tab">Plan <span class="d-sm-block d-md-inline">Features</span></a> </li>
        <li class="nav-item border-right-xs"> <a class="nav-link rounded-0" id="modifyplan" target="_blank" href="{{route('modify-plan', $plan->plan_number)}}" >Modify <span class="xs-hide-portrait"> This Plan</span></a> </li>
        <li class="nav-item border-left-xs"> <a class="nav-link rounded-0" id="costbuild" data-toggle="tab" href="#costBuild" role="tab">Cost to <span class="d-sm-block d-md-inline">Build</span></a> </li>
        <li class="nav-item xs-hide-portrait"> <a class="nav-link rounded-0" id="customerreviews" data-toggle="tab" href="#customerReviews" role="tab">Customer Reviews</a> </li>
      </ul>
      @if ($agent->isDesktop() || $agent->isTablet())
      <div class="tab-content bg-secondary px-5 py-3 mt-2" id="myTabContent">
        <div class="tab-pane fade show active" id="planDescription" role="tabpanel">
          <h6 class="font-weight-bold">{{$plan->name}} House Plan {{$plan->plan_number}}</h6>
            @if($plan->short_desc)
                <div class="margin_bt0-xs">{!! $plan->short_desc !!} <a href="#" data-toggle="collapse" data-target="#readMore" class="read_more"> READ MORE...</a>. <div id="readMore" class="collapse in">{!! $plan->description !!}</div></div>
            @else
                <div class="margin_bt0-xs">{!! $plan->description !!}</div>
            @endif

        </div>
        <div class="tab-pane fade" id="planSpecifications" role="tabpanel">
        	<div class="row">
            	<div class="col-sm-6 col-lg-4">
                	<p><b>Square Footage Breakdown</b></p>
                    <ul class="Planspec_con1 pl-0">
                        <li>Total Heated: <b>{{$plan->square_ft['str_total']}} s.f.</b></li>
                        <li>1st Floor: <b>{{$plan->square_ft['1_floor']}} s.f.</b></li>
                        <li>2nd Floor: <b>{{$plan->square_ft['2_floor']}} s.f.</b></li>
                        <li>Stories: <b>{{$plan->dimensions['stories']}}</b></li>
                        <li>Porch: <b>{{$plan->square_ft['porch']}} s.f.</b></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-4 p_padd_0">
                	<p><span class="left_boldTxt"><b>Beds/Bath</b></span><span class="text_paddindLeft">Bedrooms: {{$plan->rooms['r_bedrooms']}}</span> <span class="text_paddindLeft">Baths : {{$plan->rooms['r_full_baths']}}</span></p>
                    <p><span class="left_boldTxt"><b>Dimensions</b></span><span class="text_paddindLeft">Width: {{$plan->dimensions['width_ft']}}' {{$plan->dimensions['width_in']}}"</span><span class="text_paddindLeft">Depth : {{$plan->dimensions['depth_ft']}}' {{$plan->dimensions['depth_in']}}"</span></p>
                    <p><span class="left_boldTxt" style="color: transparent;">..</span><span class="text_paddindLeft">Height: {{$plan->dimensions['height_ft']}}' {{$plan->dimensions['height_in']}}"</span></p>
                    <p><span class="left_boldTxt"><b>Garages</b></span><span class="text_paddindLeft">{{$plan->garage['car']}} car; {{$plan->square_ft['garage']}} s.f.</span></p>
                    <p><span class="left_boldTxt"><b>Roof</b></span><span class="text_paddindLeft">{{$plan->construction['roof_frame']}}</span></p>
                    <p><span class="left_boldTxt"><b>Exterior Walls</b></span><span class="text_paddindLeft">{{$plan->construction['ext_walls']}}</span></p>
                </div>
                <div class="col-sm-6 col-lg-4">


                	<p><span class="left_boldTxt"><b>Foundation</b></span><span class="text_paddindLeft">Standard: Slab</span></p>
                    <p><span class="left_boldTxt" style="color: transparent;">..</span><span class="text_paddindLeft">Optional: Crawlspace, Basement</span></p>	
                    <p><span class="left_boldTxt"><b>Ceiling Height</b></span><span class="text_paddindLeft">1st floor: 10’; 2nd floor: 9’</span></p><br> 
                    <p class="small_bottomTxt">*Total heated does not include garages, porches/patios or bonus rooms </p>	

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="planFeatures" role="tabpanel">
        	<div class="row">
        		<div class="col-sm-6 col-lg-3">
            	<h6 class="font-weight-bold">INTERIOR DESIGN FEATURES:</h6>
                <ul class="spec_items float-left pr-3 pl-0">
                    @foreach($plan->roomsInterior as $interior)
                        <li>~ {{$interior->name}}</li>
                    @endforeach
               </ul>
               <ul class="spec_items float-left pl-0">
                   @foreach($plan->outdoors as $porch)
                       <li>~ {{$porch->name}}</li>
                   @endforeach
                </ul>
            </div>
            	<div class="col-sm-6 col-lg-3">
                    <h6 class="font-weight-bold">BEDROOM FEATURES:</h6>
                    <ul class="spec_items pl-0">
                        @foreach($plan->beds as $bed)
                            <li>~ {{$bed->name}}</li>
                        @endforeach
                   </ul>
            	</div>
            	<div class="col-sm-6 col-lg-3">
                    <h6 class="font-weight-bold">KITCHEN FEATURES:</h6>
                    <ul class="spec_items pl-0">
                        @foreach($plan->kitchens as $kitchen)
                            <li>~ {{$kitchen->name}}</li>
                        @endforeach
                   </ul>
                   
            	</div>
                <div class="col-sm-6 col-lg-3">
                    <h6 class="font-weight-bold">ARCHITECTURAL STYLE:</h6>
                    <ul class="spec_items pl-0">
                        @foreach($plan->styles as $style)
                            <li>~ {{$style->name}}</li>
                        @endforeach
                    </ul> 
                </div>
           </div>
        </div>
        <div class="tab-pane fade" id="modifyPlan" role="tabpanel">Modify This Plan</div>
        <div class="tab-pane fade" id="costBuild" role="tabpanel">
        	<div class="row">
            	<div class="col-lg-2 text-center">
                	<h5 class="font-weight-bold mt-3">$29.95</h5> 
                    <h6>For a Single Plan</h6>
                    <a href="#" class="btn btn-primary text-uppercase rounded-0 mt-0">ORDER NOW</a>
                </div>
                <div class="col-lg-8 text-center">
                	<h5 class="font-weight-bold">Find Out the Cost-to-Build this Home! </h5>
                    <p><b>Quickly + Instantly</b> calculate the cost-to-build this home. This report will estimate the costs based
 on your building location, materials and  labor. You can select the construction quality levels to 
ensure you stay in budget, economy, standard and premium.</p>
			<p><a href="#" class="text-primary font-weight-bold free_videoLink">View a FREE demo </a></p>
            <span class="note text-danger">Note: The Home-Cost Instant Cost-to-Build Estimator purchase is non-refundable.</span>
                </div>
                <div class="col-lg-2 text-center">
                	<h5 class="font-weight-bold mt-3">$49.95</h5> 
                    <h6>For Unlimited Plan</h6>
                    <a href="#" class="btn btn-primary text-uppercase rounded-0 mt-0">ORDER NOW</a>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="customerReviews" role="tabpanel">
        	<div class="col-lg-9 cust_reviews">
            	<p>“ Quickly + Instantly calculate the cost-to-build this home. This report will estimate the costs based
                     on your building location, materials and  labor. You can select the construction quality levels to 
                    ensure you stay in budget, economy, standard and premium. ”</p>
                   <h6 class="font-weight-bold pt-2">Cummings Family, Texas</h6> 
                   <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
            </div>
        
        </div>
      </div>    
      @endif
      <ul class="nav nav-pills nav-justified text-uppercase mt-2 xs-hide-portrait" id="floorPlan" role="tablist">
        <li class="nav-item"> <a class="nav-link rounded-0 active" id="first-floor" data-toggle="tab" href="#first" role="tab">First Floor Plan</a> </li>
        <li class="nav-item"> <a class="nav-link rounded-0" id="second-floor" data-toggle="tab" href="#second" role="tab">Second Floor Plan</a> </li>
        <li class="nav-item"> <a class="nav-link rounded-0" id="basement-floor" data-toggle="tab" href="#basement" role="tab">Basement Floor Plan</a> </li>
        <li class="nav-item"> <a class="nav-link rounded-0" id="bonus-floor" data-toggle="tab" href="#bonus" role="tab">Bonus Floor Plan</a> </li>
      </ul>
      <div class="tab-content bg-secondary_new" id="myTabContent1">
        <div class="tab-pane fade show active" id="first" role="tabpanel">
        	<div class="col-lg-10 m-auto">
            	<br/><br/>
                <div class="row show-portrait-xs">
                
                <div class="row collapse in" id="ViewallPlans">
                    <div class="col-lg-12">
                            <div class="col-lg-12">
                                <p><b>Square Footage Breakdown</b></p>
                                <ul class="Planspec_con1 pl-0">
                                    <li>Total Heated: <b>{{$plan->square_ft['str_total']}} s.f.</b></li>
                                    <li>1st Floor: <b>{{$plan->square_ft['1_floor']}} s.f.</b></li>
                                    <li>2nd Floor: <b>{{$plan->square_ft['2_floor']}} s.f.</b></li>
                                    <li>Stories: <b>{{$plan->dimensions['stories']}}</b></li>
                                    <li>Porch: <b>{{$plan->square_ft['porch']}} s.f.</b></li>
                                </ul>
                            </div>
                            <div class="col-lg-12">
                                <p><span class="left_boldTxt"><b>Beds/Bath</b></span><span class="text_paddindLeft">Bedrooms: {{$plan->rooms['r_bedrooms']}}</span> <span class="text_paddindLeft">Baths : {{$plan->rooms['r_full_baths']}}</span></p>
                                <p><span class="left_boldTxt"><b>Dimensions</b></span><span class="text_paddindLeft">Width: {{$plan->dimensions['width_ft']}}' {{$plan->dimensions['width_in']}}"</span><span class="text_paddindLeft">Depth : {{$plan->dimensions['depth_ft']}}' {{$plan->dimensions['depth_in']}}"</span></p>
                                <p><span class="left_boldTxt" style="color: transparent;">..</span><span class="text_paddindLeft">Height: {{$plan->dimensions['height_ft']}}' {{$plan->dimensions['height_in']}}"</span></p>
                                <p><span class="left_boldTxt"><b>Garages</b></span><span class="text_paddindLeft">{{$plan->garage['car']}} car; {{$plan->square_ft['garage']}} s.f.</span></p>
                                <p><span class="left_boldTxt"><b>Roof</b></span><span class="text_paddindLeft">{{$plan->construction['roof_frame']}}</span></p>
                                <p><span class="left_boldTxt"><b>Exterior Walls</b></span><span class="text_paddindLeft">{{$plan->construction['ext_walls']}}</span></p>
                            </div>
                            <div class="col-lg-12">
                                <p><span class="left_boldTxt"><b>Foundation</b></span><span class="text_paddindLeft">Standard: Slab</span></p>
                                <p><span class="left_boldTxt" style="color: transparent;">..</span><span class="text_paddindLeft">Optional: Crawlspace, Basement</span></p>	
                                <p><span class="left_boldTxt"><b>Ceiling Height</b></span><span class="text_paddindLeft">1st floor: 10’; 2nd floor: 9’</span></p> 
                                <p class="small_bottomTxt mobile_txt">*Total heated does not include garages, porches/patios or bonus rooms </p>	
            
                            </div>
            
                            <div class="col-lg-12">
                            <h6 class="font-weight-bold">INTERIOR DESIGN FEATURES:</h6>
                            <ul class="spec_items pl-0">
                                @foreach($plan->roomsInterior as $interior)
                                    <li>~ {{$interior->name}}</li>
                                @endforeach
                            </ul> 
                        </div>
                            <div class="col-lg-12">
                                <h6 class="font-weight-bold">BEDROOM FEATURES:</h6>
                                <ul class="spec_items pl-0">
                                    @foreach($plan->beds as $bed)
                                        <li>~ {{$bed->name}}</li>
                                    @endforeach
                               </ul>
                            </div>
                            <div class="col-lg-12">
                                <h6 class="font-weight-bold">KITCHEN FEATURES:</h6>
                                <ul class="spec_items pl-0">
                                    @foreach($plan->kitchens as $kitchen)
                                        <li>~ {{$kitchen->name}}</li>
                                    @endforeach
                               </ul>
                               
                            </div>
                            <div class="col-lg-12">
                                <h6 class="font-weight-bold">ARCHITECTURAL STYLE:</h6>
                                <ul class="spec_items pl-0">
                                    @foreach($plan->styles as $style)
                                        <li>~ {{$style->name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                     </div>       
                </div>
                </div>
                <!--<div class="row">
					<div class="col-md-3 text-xs-center"><button type="button" class="btn btn-primary text-uppercase rounded-0">PURCHASE PLANS</button></div>
                    <div class="col-md-6 text-center">
                        <a download="first-floor-Plan.png" target="_blank" href="/images/floor-plan.jpg" title="ImageName">
                            <h6 class="font-weight-bold mb-0" style="line-height: 40px;color:#000">Download Sample Construction Plans</h6>
                        </a>
                	</div>
                    <div class="col-md-3 text-right text-xs-center custom_reversePlan"><button type="button" class="btn btn-dark rounded-0" id="reverse_plan">Reverse plan</button></div>
                </div>-->
               
               	   
        </div>
        
        <div class="row mobile-off">
                	<div class="col-md-12 flipped-container">
                 
                        @foreach($plan->images_first  as $image)
                 		    <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid mx-auto d-block">
                        @endforeach
                    </div>
                </div>
                <br/><br/>
             </div>
        </div>
        <div class="tab-pane fade mobile-off" id="second" role="tabpanel">
            <div class="row">
                <div class="col-md-12 flipped-container">
                    @foreach($plan->images_second  as $image)
                        <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid mx-auto d-block">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="tab-pane fade mobile-off" id="basement" role="tabpanel">
            <div class="row">
                <div class="col-md-12 flipped-container">
                    @foreach($plan->images_basement  as $image)
                        <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid mx-auto d-block">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="tab-pane fade mobile-off" id="bonus" role="tabpanel">
            <div class="row">
                <div class="col-md-12 flipped-container">
                    @foreach($plan->images_bonus  as $image)
                        <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid mx-auto d-block">
                    @endforeach
                </div>
            </div>
        </div>
      </div>
    </div>
    @if ($agent->isMobile()) 
    <div class="text-center px-5">
                  <p><a href="#" class="btn btn-primary rounded-0 mt-3" data-toggle="collapse" data-target="#ViewallPlans" >View ALL plan details</a></p>
                </div>
    <div class="row only_under_767" >
                	<div class="col-md-12">
                    	<div class="text-center text-uppercase lead font-weight-normal align-middle py-2" style="font-size: 19px;"> <a href="#" class="align-middle text-primary">Live Chat</a> | <a href="#" class="align-middle text-primary">Email</a> | <a href="#" class="align-middle text-secondary">xxx-xxx-xxxx</a> </div>
			   		</div>
               </div>
    <div id="carouselPlan" class="carousel slide" data-ride="carousel" data-interval="false" >
 					 <div class="carousel-inner">
   							 <div class="carousel-item active">
  									<div class="slides row">
                								<div class="col-md-12 flipped-container">
                                                             @foreach($plan->images_first  as $image)
                                                             <div class="floor-plan-like"><i class="fa fa-heart"></i></div>
                                                                <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid mx-auto d-block">
                                                          	 @endforeach
                    </div>
                     				
                                    </div>
                              </div>
                              <div class="carousel-item">
  									<div class="slides row">
                								<div class="col-md-12 flipped-container">
                                                             @foreach($plan->images_second  as $image)
                                                             <div class="floor-plan-like"><i class="fa fa-heart"></i></div>
                        <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid mx-auto d-block">
                    	@endforeach
                    </div>
                     				
                                    </div>
                              </div>
                              <div class="carousel-item"> 
  									<div class="slides row">
                								<div class="col-md-12 flipped-container">
                                                              @foreach($plan->images_basement  as $image)
                                                              <div class="floor-plan-like"><i class="fa fa-heart"></i></div>
                        <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid mx-auto d-block">
                    @endforeach
                    </div>
                     				
                                    </div>
                              </div>
                              <div class="carousel-item">
  									<div class="slides row">
                								<div class="col-md-12 flipped-container">
                                                             @foreach($plan->images_bonus  as $image)
                                                             <div class="floor-plan-like"><i class="fa fa-heart"></i></div>
                        <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid mx-auto d-block">
                    @endforeach
                    </div>
                     				
                                    </div>
                              </div>
                              
                              
                                <a class="carousel-control-prev" href="#carouselPlan" role="button" data-slide="prev" style="left: 0;">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselPlan" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
                      </div>

             </div>
    
    
    <div class="col-lg-2 col-sm-5 padd_top pd-md-0 center plan-information"> <!--d-sm-none-->
          <div class="bg-secondary px-2 py-2 mb-1 ">
            <h5 class="text-primary">Get Your Plans in Minutes</h5>
            <!--<p class="small m-0">The PDF Plan Package offers Immediate delivery of your House Plans!</p>-->
          </div>
          <div class="bg-secondary px-2 py-2 mb-1">
            <h5 class="text-primary">What's Included with Your Plans</h5>
            <!--<p class="small m-0">The PDF Plan Package offers Immediate delivery of your House Plans!</p>-->
          </div>
          <div class="bg-secondary px-2 py-2">
            <h5 class="text-primary">Important Info Before You Buy</h5>
            <!--<p class="small m-0">The PDF Plan Package offers Immediate delivery of your House Plans!</p>-->
          </div>
        </div>
    <div class="col-lg-4 col-md-6 col-sm-7 form-white padd_top mobile-center">
          <h5 class="text-uppercase font-weight-bold">SELECT THE RIGHT PACKAGE</h5>
          <div class="row align-items-center no-gutters mb-1">
            <div class="col-2 text-right font-weight-bold pr-2">1</div>
            <div class="col-9 text-left">
              <div class="form-group mb-0">
                <div class="select-custom-wrap select-custom-wrap-lg">
                  <select name="select-custom-style" class="select-custom white_back" >
                    <option value="hide">Choose Your Plan Package</option>
                      @foreach($plan->packages as $package)
                        <option value="{{$package->id}}" data-cost="{{$package->pivot->price }}">{{$package->name}} ({{$package->pivot->price }}$)</option>
                      @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row align-items-center no-gutters mb-1">
            <div class="col-2 text-right font-weight-bold pr-2">2</div>
            <div class="col-9 text-left">
              <div class="form-group mb-0">
                <div class="select-custom-wrap select-custom-wrap-lg">
                  <select name="select-custom-style" class="select-custom white_back" >
                    <option value="hide">Choose Your Foundation</option>
                      @foreach($plan->foundationOptions as $foundat)
                        <option value="{{$foundat->id}}" data-cost="{{$foundat->pivot->price}}">{{$foundat->name}} ({{$foundat->pivot->price}}$)</option>
                      @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row align-items-center no-gutters mb-1">
            <div class="col-2 text-right font-weight-bold pr-2">3</div>
            <div class="col-9 text-left">
              <div class="form-group mb-0">
                <div class="select-custom-wrap select-custom-wrap-lg">
                  <select name="select-custom-style" class="select-custom white_back" >
                    <option value="hide">Optional Features</option>
                      @foreach($plan->addons as $addon)
                        <option value="{{$addon->id}}" data-cost="{{$addon->pivot->price}}">{{$addon->name}} ({{$addon->pivot->price}}$)</option>
                      @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary text-uppercase rounded-0 mt-1 offset-1">PURCHASE PLANS</button>
        </div>
    @endif
    <div class="row text-center">
      <div class="col-md-6">
        <h5 class="font-weight-bold mt-3">View Similar House Plans</h5>
        <div class="row text-center">
          <div class="col-sm-6">
            <div class="plan-grid"> <a href="#"> <img src="{{asset('images/plan-1.jpg')}}" alt="New House Plans" class="img-fluid" />
              <p class="plan-name px-2">dell’ Azienda Agricola House Plan 4839</p>
              <p class="plan-meta px-2">4,839 s.f. | 4 beds | 3.5 baths</p>
              </a> </div>
          </div>
          <div class="col-sm-6">
            <div class="plan-grid"> <a href="#"> <img src="{{asset('images/plan-1.jpg')}}" alt="New House Plans" class="img-fluid" />
              <p class="plan-name px-2">dell’ Azienda Agricola House Plan 4839</p>
              <p class="plan-meta px-2">4,839 s.f. | 4 beds | 3.5 baths</p>
              </a> </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 xs-hide-portrait">
        <h5 class="font-weight-bold mt-3">Customer Top Picks</h5>
        <div class="row text-center">
          <div class="col-sm-6">
            <div class="plan-grid"> <a href="#"> <img src="{{asset('images/plan-1.jpg')}}" alt="New House Plans" class="img-fluid" />
              <p class="plan-name text-truncate px-2">dell’ Azienda Agricola House Plan 4839</p>
              <p class="plan-meta text-truncate px-2">4,839 s.f. | 4 beds | 3.5 baths</p>
              </a> </div>
          </div>
          <div class="col-sm-6">
            <div class="plan-grid"> <a href="#"> <img src="{{asset('images/plan-1.jpg')}}" alt="New House Plans" class="img-fluid" />
              <p class="plan-name text-truncate px-2">dell’ Azienda Agricola House Plan 4839</p>
              <p class="plan-meta text-truncate px-2">4,839 s.f. | 4 beds | 3.5 baths</p>
              </a> </div>
          </div>
        </div>
      </div>
    </div>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css"/>

@endsection

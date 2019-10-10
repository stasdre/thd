@extends('layouts.index')
@section('title', $plan->meta_title)
@section('description', $plan->meta_description)
@section('content')
<div id="plan_page">
<div class="bg-dark pb-2 position-relative padding-botton_0_xs">
  <div class="row no-gutters">
    <div class="col xs-hide-portrait"></div>
    <div class="col-10 xs_portrait_width_100">
    <div class="plan-list my-1 only_under_767" style="margin-bottom : 0 !important;padding-bottom : 5px;">
  <div class="row no-gutters align-items-center py-2 px-2">
    <div class="col-8">
      <p class="plan-name font-weight-bold mb-0">{{$plan->square_ft['str_total']}} sq ft | <span class="text-white">plan {{$plan->plan_number}}</span></p>
    </div>
    <div class="col-4">
      <ul class="list-inline mb-0 text-right">
        <li class="list-inline-item save_this_plan"><i class="fa fa-heart" style="color:white;font-size : 25px;"></i></li>
      </ul>
    </div>
  </div>
</div>
      <div class="slider">
          @foreach($plan->images as $image)
            <figure class="slider_max_height_500"> <img src="{{ asset('storage/plans/'.$plan->id.'/'.$image->file_name) }}" alt="{{$image->alt_text}}" class="img-fluid img_width_100_percent">
              @if($image->description)
                <figcaption>{{$image->description}}</figcaption>
              @endif
              <div class="media planinfo text-left logo_ontop"> <img class="mr-1 align-self-end" src="{{asset('images/icons/logo-placeholder.png')}}" alt="DWHP">
                <div class="media-body">
                  <h5 class="mb-0 text-white">plan <span class="text-secondary">{{$plan->plan_number}}</span></h5>
                  <h5 class="m-0 text-white">davidwiggins<span class="text-secondary mobile-off">houseplans.com</span></h5>
                </div>
              </div>
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
<div class="px-4 position-relative padding-botton_0_xs mt-4 mb-4 trim-margin-mobile">
  
  <div class="row text-center align-items-center mrgn_btm">
    <div class="col-lg-6 col-sm-12 border-right_3 plan_details">
      <h5 class="text-uppercase font-weight-bold sm-font-1rem mobile-off">HOUSE PLAN DETAILS</h5>
      <div class="py-2 px-5 font-weight-bold">
       <div class="row text-center no-gutters">
  <div class="col py-1 border border-light font-weight-semi-bold">Sq. Ft. <span class="d-block text-secondary">{{$plan->square_ft['str_total']}}</span></div>
  <div class="col py-1 border border-light font-weight-semi-bold bg-secondary">1st Fl <span class="d-block text-white">{{$plan->square_ft['1_floor']}}</span></div>
  <div class="col py-1 border border-light font-weight-semi-bold">2nd Fl <span class="d-block text-secondary">{{$plan->square_ft['2_floor']}}</span></div>
  <div class="col py-1 border border-light font-weight-semi-bold bg-secondary">Garages <span class="d-block text-white">{{$plan->garage['car']}} car</span></div>
</div>
       
<div class="row text-center no-gutters">
  <div class="col py-1 border border-light font-weight-semi-bold bg-secondary">Beds <span class="d-block text-white">{{$plan->rooms['r_bedrooms']}}</span></div>
  <div class="col py-1 border border-light font-weight-semi-bold">Baths <span class="d-block text-secondary">{{$plan->rooms['r_full_baths']}}</span></div>
  <div class="col py-1 border border-light font-weight-semi-bold bg-secondary">Width <span class="d-block text-white">{{$plan->dimensions['width_ft']}}' {{$plan->dimensions['width_in']}}"</span></div>
  <div class="col py-1 border border-light font-weight-semi-bold">Depth <span class="d-block text-secondary">{{$plan->dimensions['depth_ft']}}' {{$plan->dimensions['depth_in']}}"</span></div>
</div>
      </div>
      <a href="#floorPlan" class="btn btn-primary text-uppercase rounded-0 mt-3 mobile-off">View Floor Plans</a> </div>
    
    
    <div class="col-lg-4 col-md-6 col-sm-7 form-white padd_top mobile-off">
  <div class="searchform_outer" id="searchform_outer">
    <h5 class="text-uppercase font-weight-bold sm-font-1rem">SELECT THE RIGHT PACKAGE</h5>
      <p class=" d-sm-none">View ALL Available Options</p>
      <div class="row align-items-center no-gutters mb-1">
        <div class="col-2 text-right font-weight-bold pr-2">1</div>
        <div class="col-9 text-left">
          <div class="form-group mb-0">
           <div class="option-wrapper">
       <div class="btn-group btn-block select-custom white_back" id="plan-">
               <button @click="viewPackages = !viewPackages"  class="btn btn-lg btn-block clearfix dropdown-plans option-button option-button1">
               <span class="selected-plan-set pull-left font-size-ipad font-size-15"><strong>@{{checkedPackage.name ? checkedPackage.name : 'Choose Plan Package'}}</strong></span>
                <span class="pull-right opt_select-styled">
                  <!-- <i class="fas fa-chevron-down"></i> -->
                </span>
              <span class="pull-right option-price"><span class="selected-plan-set-price font-size-ipad">@{{checkedPackage.price ? '$'+checkedPackage.price : ''}}</span></span>
          </button>  
                <ul class="plan2-dropdown-menu" :class="{active: viewPackages}">
                    <li v-for="package in packages" :key="package.id" @click="setActivePackage(package)" :class="{selected: checkedPackage.id === package.id}">
                        <div class="clearfix">
                        <i class="fa fa-check pull-left"></i><span class="pull-left">@{{package.name}}</span> <span class="pull-right">$@{{package.price}}</span>
                          </div>
                          
                          <p class="plan-package-desc">
                              @{{package.desc}}
                          </p>
                    </li>
                  </ul>          
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row align-items-center no-gutters mb-1">
        <div class="col-2 text-right font-weight-bold pr-2">2</div>
        <div class="col-9 text-left">
          <div class="form-group mb-0">
           <div class="option-wrapper">
 <div class="btn-group btn-block select-custom white_back" id="plan-">
  <button @click="viewOptions = !viewOptions" class="btn btn-lg btn-block clearfix dropdown-plans option-button option-button2">
    <span class="selected-foundation selected-value pull-left font-size-ipad font-size-15"><strong>@{{checkedOption.name ? checkedOption.name : 'Choose Foundation'}}</strong></span>
    <span class="pull-right opt_select-styled">
      <!-- <span class="caret caret-reversed"></span>
      <span class="caret"></span> -->
    </span>
    <span class="pull-right option-price"><span class="selected-foundation-price font-size-ipad">@{{checkedOption.price ? '+$'+checkedOption.price : ''}}</span></span>
  </button>
  <ul class="plan2-dropdown-menu" :class="{active: viewOptions}">
    
      <li v-for="option in options" :key="option.id" @click="setActiveOption(option)" :class="{selected: checkedOption.id === option.id}">
          <div class="clearfix">
          <i class="fa fa-check pull-left"></i><span class="pull-left">@{{option.name}}</span> <span class="pull-right">+$@{{option.price}}</span>
            </div>
            
            <p class="plan-package-desc">
                @{{option.desc}}
            </p>
      </li>
        
  </ul>
</div>
</div>
          </div>
        </div>
      </div>
      <div class="row align-items-center no-gutters mb-1">
        <div class="col-2 text-right font-weight-bold pr-2"><span>3</span></div>
        <div class="col-9 text-left">
          <div class="form-group mb-0">
              <button @click="viewAddons = !viewAddons" id="additional-options" class="btn-group btn-block select-custom white_back">
                <span class="pull-left"><strong class="font-size-15 font-size-ipad">Optional Features</strong></span>
                <span class="pull-right opt_select-styled"></span>
              </button>
              
          </div>
        </div>
  <div class="col-2 text-right font-weight-bold pr-2"></div>
  <div class="col-9 text-left">
      <transition name="slide-fade">
        <div id="add-Ons" v-if="viewAddons">
                  <div id="construction-copy-options">
          </div>
              <label v-for="addon in addons" :key="addon.id">
                <input type="checkbox" v-model="checkedAddons" :value="addon.id">
                <span class="text">
                <span class="pull-left">
                    @{{addon.name}}
                </span>
                <span class="pull-right">+$@{{addon.price}}</span>
              </span>
              </label>
          </div><!-- add on -->
        </transition>
  </div> <!-- col -->
      </div>
  <div class="subtotals">
    <div class="row align-items-center no-gutters mb-1">
    <div class="col-1 text-right pr-1"></div>
    <div class="col-9 text-left font-weight-bold margin_left position_unset">SUBTOTALS:<span>  $@{{total}}</span></div>
     </div>
  </div>
      <button @click.prevent="addToCart()" :disabled="toCartButtonDisable" type="submit" class="btn btn-primary text-uppercase rounded-0 mt-1 offset-1 btn_width">ADD TO CART <i v-if="loading" class="fas fa-sync fa-spin"></i></button>
  </div> <!-- Searchform outer -->
    </div>        
    <div class="col-lg-2 col-sm-5 padd_top pd-md-0 mobile-off"> <!--d-sm-none-->
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
    </div>
  </div>
</div>

<div class="tab-content bg-secondary px-5 py-3 desktop-off" id="myTabContent">
<div class="tab-pane fade show active" id="" role="tabpanel">
      <h6 class="font-weight-bold">{{$plan->name}}: House Plan {{$plan->plan_number}}</h6>
      <p class="margin_bt0-xs">{!! substr($plan->description, 0, 355) !!}<span class="mobile-off" id="content-scroll">{!! substr($plan->description, 356) !!}</span></p>
      <div class="desktop-off read_more" id="read_more"><span class="read-more-link-wrapper">Read More </span></div>
<div style="display : none;" id="read_less" class="read_less"><span class="read-less-link-wrapper">Read Less </span></div>
    </div>
    
    
    
    <div class="tab-pane fade" id="costBuild1" role="tabpanel">
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


<div class="">
  <ul class="nav nav-pills plan-nav nav-justified text-uppercase mt-2" id="planDetails" role="tablist">
    <li class="nav-item xs-hide-portrait"> <a class="nav-link rounded-0 active" id="plandescription" data-toggle="tab" href="#planDescription" role="tab">Plan Description</a> </li>
    <li class="nav-item xs-hide-portrait"> <a class="nav-link rounded-0" id="planspecifications" data-toggle="tab" href="#planSpecifications" role="tab">Plan Specifications</a> </li>
    <li class="nav-item xs-hide-portrait"> <a class="nav-link rounded-0" id="planfeatures" data-toggle="tab" href="#planFeatures" role="tab">Plan <span class="d-sm-block d-md-inline">Features</span></a> </li>
    <li class="nav-item border-right-xs"> <a class="nav-link rounded-0" id="modifyplan" target="_blank" href="modify-plan.html" >Modify <span class="xs-hide-portrait"> This Plan</span></a> </li>
   
      <li class="nav-item desktop-off"> <a class="nav-link rounded-0" id="reverse" data-toggle="tab" href="#reverse" role="tab">Reverse</a> </li>
     <li class="nav-item border-left-xs mobile-off"> <a class="nav-link rounded-0" id="costbuild" data-toggle="tab" href="#costBuild" role="tab">Cost to <span class="d-sm-block d-md-inline">Build</span></a> </li>
     <li class="nav-item border-left-xs desktop-off"> <a class="nav-link rounded-0" id="costbuild1" data-toggle="tab" href="#costBuild1" role="tab">Cost to Build</span></a> </li>
    <li class="nav-item xs-hide-portrait"> <a class="nav-link rounded-0" id="customerreviews" data-toggle="tab" href="#Reviews" role="tab">Customer Reviews</a> </li>
  </ul>
  <div class="only_under_767 desktop-off">  <!-- Mobile Content  	-->
  <div class="row collapse in tab-content bg-secondary_new py-3" id="ViewallPlans">
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
                            <p><span><b>Beds/Bath:</b></span><span class="text_paddindLeft"> Bedrooms: {{$plan->rooms['r_bedrooms']}}</span> <span class="text_paddindLeft mNewline">Baths: {{$plan->rooms['r_full_baths']}}</span></p>
                            <p><span class=""><b>Dimensions:</b></span><span class="text_paddindLeft"> Width: {{$plan->dimensions['width_ft']}}' {{$plan->dimensions['width_in']}}"</span><span class="text_paddindLeft mNewline">Depth: {{$plan->dimensions['depth_ft']}}' {{$plan->dimensions['depth_in']}}"</span><span class="text_paddindLeft mNewline"> Height: {{$plan->dimensions['height_ft']}}' {{$plan->dimensions['height_in']}}"</span></p>
                            
                            <p><span class=""><b>Garages:</b></span><span class="text_paddindLeft"> {{$plan->garage['car']}} car; {{$plan->square_ft['garage']}} s.f.</span></p>
                            <p><span class=""><b>Roof:</b></span><span class="text_paddindLeft"> {{$plan->construction['roof_frame']}}</span></p>
                            <p><span class=""><b>Exterior Walls:</b></span><span class="text_paddindLeft"> {{$plan->construction['ext_walls']}}</span></p>
                        </div>
                        <div class="col-lg-12">
                            <p><span class=""><b>Foundation:</b></span><span class="text_paddindLeft"> {{ implode(', ', $plan->construction['found_type'])}}</span><span class="text_paddindLeft"><br></span></p>
                            
                        <p><span class="left_boldTxt"><b>Ceiling Height: </b></span><span class="text_paddindLeft"> {{ $plan->ceiling['celing_1_floor'] ? '1st floor: '.$plan->ceiling['celing_1_floor'].';' : '' }}</span><span class="text_paddindLeft mNewline"> {{ $plan->ceiling['celing_2_floor'] ? '2nd floor: '.$plan->ceiling['celing_2_floor'].';' : '' }}</span> <span class="text_paddindLeft mNewline"> {{ $plan->ceiling['celing_3_floor'] ? '3rd floor: '.$plan->ceiling['celing_3_floor'].';' : '' }}</span> <span class="text_paddindLeft mNewline"> {{ $plan->ceiling['celing_lower_floor'] ? 'Lower level: '.$plan->ceiling['celing_lower_floor'].';' : '' }}</span></p> 
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
              <p class="text-center px-5"><a href="#" class="btn btn-primary rounded-0 mt-3" data-toggle="collapse" data-target="#ViewallPlans">View ALL plan details</a></p>
          
            <div class="row">
              <div class="col-md-12">
                  <div class="text-center text-uppercase lead font-weight-normal align-middle py-2" style="font-size: 19px;"> <a href="#" class="align-middle text-primary">Live Chat</a> | <a href="#" class="align-middle text-primary">Email</a> | <a href="#" class="align-middle text-secondary">xxx-xxx-xxxx</a> </div>
         </div>
                <!--  Floor Plan /images Slider -->
                
                  <div class="col-md-12 FloorPlanSlider">
                <div class="carousel slide" data-ride="carousel" data-interval="false" id="carouselPlan">
                  <div class="carousel-inner">
                  <div class="floor-plan-like"><i class="fa fa-heart"></i></div>
                    @foreach($plan->images_first  as $image)
                  <div class="carousel-item {{ $loop->index === 0 ? 'active' : ''}}"> <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid d-block w-100"> </div>
                    @endforeach
                    @foreach($plan->images_second  as $image)
                      <div class="carousel-item"> <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid d-block w-100"> </div>
                    @endforeach
                    @foreach($plan->images_basement  as $image)
                      <div class="carousel-item"> <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid d-block w-100"> </div>
                    @endforeach
                    @foreach($plan->images_bonus  as $image)
                      <div class="carousel-item"> <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid d-block w-100"> </div>
                    @endforeach
                    @foreach($plan->images_cars  as $image)
                      <div class="carousel-item"> <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid d-block w-100"> </div>
                    @endforeach
                  </div>
                  <a class="carousel-control-prev" href="#carouselPlan" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselPlan" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
                
                </div>
                <div class="col-lg-2 col-sm-5 padd_top pd-md-0"> <!--d-sm-none-->
      <div class="bg-secondary px-2 py-2 mb-1">
        <h5 class="text-primary text-center buy-plan">Get Your Plans in Minutes</h5>
        <!--<p class="small m-0">The PDF Plan Package offers Immediate delivery of your House Plans!</p>-->
      </div>
      <div class="bg-secondary px-2 py-2 mb-1">
        <h5 class="text-primary text-center buy-plan">What's Included with Your Plans</h5>
        <!--<p class="small m-0">The PDF Plan Package offers Immediate delivery of your House Plans!</p>-->
      </div>
      <div class="bg-secondary px-2 py-2">
        <h5 class="text-primary text-center buy-plan">Important Info Before You Buy</h5>
        <!--<p class="small m-0">The PDF Plan Package offers Immediate delivery of your House Plans!</p>-->
      </div>
    </div>
       <div class="col-lg-4 col-md-6 col-sm-7 form-white text-center" style="padding-top : 12px;">
      <div class="searchform_outer mobile_form" id="searchform_outer_mobile">
    <h5 class="text-uppercase font-weight-bold sm-font-1rem">SELECT THE RIGHT PACKAGE</h5>
      <p class=" d-sm-none">View ALL Available Options</p>
      <div class="row align-items-center no-gutters mb-1">
        <div class="col-2 text-right font-weight-bold pr-2">1</div>
        <div class="col-9 text-left">
          <div class="form-group mb-0">
           <div class="option-wrapper">
       <div class="btn-group btn-block select-custom white_back" id="plan-">
               <button @click="viewPackages = !viewPackages" class="btn btn-lg btn-block clearfix dropdown-plans option-button option-button1">
                <span class="selected-plan-set font-size-ipad pull-left"><strong>@{{checkedPackage.name ? checkedPackage.name : 'Choose Plan Package'}}</strong></span>
                <span class="pull-right opt_select-styled">
                  <!-- <i class="fas fa-chevron-down"></i> -->
                </span>
          <span class="pull-right option-price"><span class="selected-plan-set-price font-size-ipad">@{{checkedPackage.price ? '$'+checkedPackage.price : ''}}</span></span>
          </button>  
                <ul class="plan2-dropdown-menu" :class="{active: viewPackages}">    
                    <li v-for="package in packages" :key="package.id" @click="setActivePackage(package)" :class="{selected: checkedPackage.id === package.id}">
                        <div class="clearfix">
                        <i class="fa fa-check pull-left"></i><span class="pull-left">@{{package.name}}</span> <span class="pull-right">$@{{package.price}}</span>
                          </div>
                          
                          <p class="plan-package-desc">
                              @{{package.desc}}
                          </p>
                    </li>
                </ul>          
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row align-items-center no-gutters mb-1">
        <div class="col-2 text-right font-weight-bold pr-2">2</div>
        <div class="col-9 text-left">
          <div class="form-group mb-0">
           <div class="option-wrapper">
 <div class="btn-group btn-block select-custom white_back" id="plan-">
  <button @click="viewOptions = !viewOptions" class="btn btn-lg btn-block clearfix dropdown-plans option-button option-button2">
    <span class="selected-foundation font-size-ipad" class="selected-value pull-left"><strong>@{{checkedOption.name ? checkedOption.name : 'Choose Foundation'}}</strong></span>
    <span class="pull-right opt_select-styled">
      <!-- <span class="caret caret-reversed"></span>
      <span class="caret"></span> -->
    </span>
    <span class="pull-right option-price"><span class="selected-foundation-price font-size-ipad">@{{checkedOption.price ? '+$'+checkedOption.price : ''}}</span></span>
  </button>
  <ul class="plan2-dropdown-menu" :class="{active: viewOptions}">
    
      <li v-for="option in options" :key="option.id" @click="setActiveOption(option)" :class="{selected: checkedOption.id === option.id}">
          <div class="clearfix">
          <i class="fa fa-check pull-left"></i><span class="pull-left">@{{option.name}}</span> <span class="pull-right">+$@{{option.price}}</span>
            </div>
            
            <p class="plan-package-desc">
                @{{option.desc}}
            </p>
      </li>    
  </ul>
</div>
</div>
          </div>
        </div>
      </div>
      <div class="row align-items-center no-gutters mb-1">
        <div class="col-2 text-right font-weight-bold pr-2">3</div>
        <div class="col-9 text-left">
          <div class="form-group mb-0">
              <button @click="viewAddons = !viewAddons" id="additional-options_mob" class="btn-group btn-block select-custom white_back">
                <span class="pull-left"><strong class="font-size-15 font-size-ipad">Optional Features</strong></span>
                <span class="pull-right opt_select-styled"></span>
              </button>
              
          </div>
        </div>
    <div class="col-2 text-right font-weight-bold pr-2"></div>
    <div class="col-9 text-left">
        <transition name="slide-fade">
          <div id="add-Ons_mob"  v-if="viewAddons">
            <div id="construction-copy-options">
    </div>
        <label v-for="addon in addons" :key="addon.id">
            <input type="checkbox" v-model="checkedAddons" :value="addon.id">
          <span class="text">
          <span class="pull-left">
              @{{addon.name}}
          </span>
          <span class="pull-right">+$@{{addon.price}}</span>
        </span>
        </label>
    </div>
  </transition>
  </div> <!-- col -->
      </div>
  <div class="subtotals">
    <div class="row align-items-center no-gutters mb-1">
    <div class="col-1 text-right pr-1"></div>
    <div class="col-9 text-left font-weight-bold margin_left position_unset">SUBTOTALS:<span>  $@{{total}}</span></div>
     </div>
  </div>
      <button type="submit" @click.prevent="addToCart()" class="btn btn-primary text-uppercase rounded-0 mt-1 offset-1 btn_width">ADD TO CART <i v-if="loading" class="fas fa-sync fa-spin"></i></button>
  </div> <!-- Searchform outer -->
    </div>
           </div>
           </div>

  <div class="tab-content px-5 py-3 mt-2 mobile-off" id="myTabContent" style="background-color: #d0d2d4 !important;">
    <div class="tab-pane fade show active" id="planDescription" role="tabpanel">
      <h6 class="font-weight-bold">{{$plan->name}}: House Plan {{$plan->plan_number}}</h6>
      <p class="margin_bt0-xs">{!! $plan->description !!}</p>
    </div>
    <div class="tab-pane fade" id="planSpecifications" role="tabpanel">
      <div class="row">
          <div class="col-sm-6 col-lg-4">
              <p><b>Square Footage Breakdown</b></p>
                <ul class="Planspec_con1 pl-0">
                    <li>Total Heated: <b>{{$plan->square_ft['str_total']}} s.f.</b></li>
                    <li>1st Floor: <b>{{$plan->square_ft['1_floor']}} s.f.</b></li>
                    <li>2nd Floor: <b>{{$plan->square_ft['2_floor']}} s.f.</b></li>
                    <li>Porch: <b>{{$plan->square_ft['porch']}} s.f.</b></li>
            </ul>
            </div>
            <div class="col-sm-6 col-lg-4 p_padd_0">
              <p><span class="left_boldTxt"><b>Beds/Bath</b></span><span class="text_paddindLeft">Bedrooms: {{$plan->rooms['r_bedrooms']}}</span> <span class="text_paddindLeft">Baths: {{$plan->rooms['r_full_baths']}}</span></p>
                <p><span class="left_boldTxt"><b>Dimensions</b></span><span class="text_paddindLeft">Width: {{$plan->dimensions['width_ft']}}' {{$plan->dimensions['width_in']}}"</span><span class="text_paddindLeft">Depth: {{$plan->dimensions['depth_ft']}}' {{$plan->dimensions['depth_in']}}"</span></p>	
                <p><span class="left_boldTxt" style="color: transparent;">..</span><span class="text_paddindLeft">Height: {{$plan->dimensions['height_ft']}}' {{$plan->dimensions['height_in']}}"</span></p>	
                <p><span class="left_boldTxt"><b>Garages</b></span><span class="text_paddindLeft">{{$plan->garage['car']}} car; {{$plan->square_ft['garage']}} s.f.</span></p>
                <p><span class="left_boldTxt"><b>Roof</b></span><span class="text_paddindLeft">{{$plan->construction['roof_frame']}}</span></p>
                <p><span class="left_boldTxt"><b>Exterior Walls</b></span><span class="text_paddindLeft">{{$plan->construction['ext_walls']}}</span></p>
            </div>
            <div class="col-sm-6 col-lg-4">


              <p><span class="left_boldTxt"><b>Foundation</b></span><span class="text_paddindLeft">{{ implode(', ', $plan->construction['found_type'])}}</span></p>
                <p><span class="left_boldTxt" style="color: transparent;">..</span><span class="text_paddindLeft"></span></p>	
                <p><span class="left_boldTxt"><b>Ceiling Height</b></span><span class="text_paddindLeft"> {{ $plan->ceiling['celing_1_floor'] ? '1st floor: '.$plan->ceiling['celing_1_floor'].';' : '' }}</span><span class="text_paddindLeft mNewline"> {{ $plan->ceiling['celing_2_floor'] ? '2nd floor: '.$plan->ceiling['celing_2_floor'].';' : '' }}</span> <span class="text_paddindLeft mNewline"> {{ $plan->ceiling['celing_3_floor'] ? '3rd floor: '.$plan->ceiling['celing_3_floor'].';' : '' }}</span> <span class="text_paddindLeft mNewline"> {{ $plan->ceiling['celing_lower_floor'] ? 'Lower level: '.$plan->ceiling['celing_lower_floor'].';' : '' }}</span></p><br> 
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
    <div class="tab-pane fade" id="Reviews" role="tabpanel">
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
  </div>    
  <ul class="nav nav-pills nav-justified text-uppercase mt-2 xs-hide-portrait" id="floorPlan" role="tablist">
    @if($plan->images_first->count())
      <li class="nav-item"> <a class="nav-link rounded-0 active" id="first-floor" data-toggle="tab" href="#first" role="tab">First Floor Plan</a> </li>
    @endif
    @if($plan->images_second->count())
      <li class="nav-item"> <a class="nav-link rounded-0" id="second-floor" data-toggle="tab" href="#second" role="tab">Second Floor Plan</a> </li>
    @endif
    @if($plan->images_basement->count())
      <li class="nav-item"> <a class="nav-link rounded-0" id="basement-floor" data-toggle="tab" href="#basement" role="tab">Basement Floor Plan</a> </li>
    @endif
    @if($plan->images_bonus->count())
      <li class="nav-item"> <a class="nav-link rounded-0" id="bonus-floor" data-toggle="tab" href="#bonus" role="tab">Bonus Floor Plan</a> </li>
    @endif
    @if($plan->images_cars->count())
      <li class="nav-item"> <a class="nav-link rounded-0" id="car-options" data-toggle="tab" href="#cars" role="tab">3-Car Option</a> </li>
    @endif
  </ul>
<div class="tab-content bg-secondary_new" id="myTabContent1">
    @if($plan->images_first->count())
      <div class="tab-pane fade show active" id="first" role="tabpanel">
        @foreach($plan->images_first  as $image)
          <div class="col-lg-10 m-auto">
              <br/><br/>
              <div class="row show-portrait-xs">
              
              
              </div>
              <div class="row mobile-off">
                <div class="col-md-3 text-xs-center"><a href="#searchform_outer" class="btn btn-primary text-uppercase rounded-0">PURCHASE PLANS</a></div>
                  <div class="col-md-6 text-center">
                    <a download="first-floor-Plan.png" target="_blank" href="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" title="{{ $image->alt_text }}">
                        <h6 class="font-weight-bold mb-0" style="line-height: 40px;color:#000">Download Sample Construction Plans</h6>
                    </a>
                </div>
                <div class="col-md-3 text-right text-xs-center custom_reversePlan"><button type="button" class="btn btn-dark rounded-0 reverse_plan">Reverse plan</button></div>                
              </div>
              <div class="row mobile-off">
                  <div class="col-md-12">
                    <div class="floor-plan-like-desktop"><i class="fa fa-heart"></i></div>
                    <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid mx-auto d-block">
                  </div>
              </div>
              <br/><br/>
            </div>
          @endforeach
      </div>
    @endif
    @if($plan->images_second->count())
      <div class="tab-pane fade" id="second" role="tabpanel">
          @foreach($plan->images_second  as $image)
          <div class="col-lg-10 m-auto">
              <br/><br/>
              <div class="row show-portrait-xs">
              
              
              </div>
              <div class="row mobile-off">
                <div class="col-md-3 text-xs-center"><a href="#searchform_outer" class="btn btn-primary text-uppercase rounded-0">PURCHASE PLANS</a></div>
                  <div class="col-md-6 text-center">
                    <a download="first-floor-Plan.png" target="_blank" href="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" title="{{ $image->alt_text }}">
                        <h6 class="font-weight-bold mb-0" style="line-height: 40px;color:#000">Download Sample Construction Plans</h6>
                    </a>
                </div>
                <div class="col-md-3 text-right text-xs-center custom_reversePlan"><button type="button" class="btn btn-dark rounded-0 reverse_plan">Reverse plan</button></div>                
              </div>
              <div class="row mobile-off">
                  <div class="col-md-12">
                    <div class="floor-plan-like-desktop"><i class="fa fa-heart"></i></div>
                    <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid mx-auto d-block">
                  </div>
              </div>
              <br/><br/>
            </div>
          @endforeach
      </div>
    @endif
    @if($plan->images_basement->count())
      <div class="tab-pane fade" id="basement" role="tabpanel">
          @foreach($plan->images_basement  as $image)
          <div class="col-lg-10 m-auto">
              <br/><br/>
              <div class="row show-portrait-xs">
              
              
              </div>
              <div class="row mobile-off">
                <div class="col-md-3 text-xs-center"><a href="#searchform_outer" class="btn btn-primary text-uppercase rounded-0">PURCHASE PLANS</a></div>
                  <div class="col-md-6 text-center">
                    <a download="first-floor-Plan.png" target="_blank" href="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" title="{{ $image->alt_text }}">
                        <h6 class="font-weight-bold mb-0" style="line-height: 40px;color:#000">Download Sample Construction Plans</h6>
                    </a>
                </div>
                <div class="col-md-3 text-right text-xs-center custom_reversePlan"><button type="button" class="btn btn-dark rounded-0 reverse_plan">Reverse plan</button></div>                
              </div>
              <div class="row mobile-off">
                  <div class="col-md-12">
                    <div class="floor-plan-like-desktop"><i class="fa fa-heart"></i></div>
                    <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid mx-auto d-block">
                  </div>
              </div>
              <br/><br/>
            </div>
          @endforeach
      </div>
    @endif
    @if($plan->images_bonus->count())
      <div class="tab-pane fade" id="bonus" role="tabpanel">
          @foreach($plan->images_bonus  as $image)
          <div class="col-lg-10 m-auto">
              <br/><br/>
              <div class="row show-portrait-xs">
              
              
              </div>
              <div class="row mobile-off">
                <div class="col-md-3 text-xs-center"><a href="#searchform_outer" class="btn btn-primary text-uppercase rounded-0">PURCHASE PLANS</a></div>
                  <div class="col-md-6 text-center">
                    <a download="first-floor-Plan.png" target="_blank" href="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" title="{{ $image->alt_text }}">
                        <h6 class="font-weight-bold mb-0" style="line-height: 40px;color:#000">Download Sample Construction Plans</h6>
                    </a>
                </div>
                <div class="col-md-3 text-right text-xs-center custom_reversePlan"><button type="button" class="btn btn-dark rounded-0 reverse_plan">Reverse plan</button></div>                
              </div>
              <div class="row mobile-off">
                  <div class="col-md-12">
                    <div class="floor-plan-like-desktop"><i class="fa fa-heart"></i></div>
                    <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid mx-auto d-block">
                  </div>
              </div>
              <br/><br/>
            </div>
          @endforeach
      </div>
    @endif
    @if($plan->images_cars->count())
      <div class="tab-pane fade" id="cars" role="tabpanel">
          @foreach($plan->images_cars  as $image)
          <div class="col-lg-10 m-auto">
              <br/><br/>
              <div class="row show-portrait-xs">
              
              
              </div>
              <div class="row mobile-off">
                <div class="col-md-3 text-xs-center"><a href="#searchform_outer" class="btn btn-primary text-uppercase rounded-0">PURCHASE PLANS</a></div>
                  <div class="col-md-6 text-center">
                    <a download="first-floor-Plan.png" target="_blank" href="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" title="{{ $image->alt_text }}">
                        <h6 class="font-weight-bold mb-0" style="line-height: 40px;color:#000">Download Sample Construction Plans</h6>
                    </a>
                </div>
                <div class="col-md-3 text-right text-xs-center custom_reversePlan"><button type="button" class="btn btn-dark rounded-0 reverse_plan">Reverse plan</button></div>                
              </div>
              <div class="row mobile-off">
                  <div class="col-md-12">
                    <div class="floor-plan-like-desktop"><i class="fa fa-heart"></i></div>
                    <img src="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" alt="{{ $image->alt_text }}" class="img-fluid mx-auto d-block">
                  </div>
              </div>
              <br/><br/>
            </div>
          @endforeach
      </div>
    @endif
  </div>

<div class="row text-center">
  <div class="col-md-6">
    <h5 class="font-weight-bold mt-3">View Similar House Plans</h5>
    <div class="row text-center">
      <div class="col-sm-6">
        <div class="plan-grid"> <a href="#"> <img src="/images/plan-1.jpg" alt="New House Plans" class="img-fluid" />
          <p class="plan-name text-truncate px-2">dell’ Azienda Agricola House Plan 4839</p>
          <p class="plan-meta text-truncate px-2">4,839 s.f. | 4 beds | 3.5 baths</p>
          </a> </div>
      </div>
      <div class="col-sm-6">
        <div class="plan-grid"> <a href="#"> <img src="/images/plan-1.jpg" alt="New House Plans" class="img-fluid" />
          <p class="plan-name text-truncate px-2">dell’ Azienda Agricola House Plan 4839</p>
          <p class="plan-meta text-truncate px-2">4,839 s.f. | 4 beds | 3.5 baths</p>
          </a> </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 xs-hide-portrait">
    <h5 class="font-weight-bold mt-3">Customer Top Picks</h5>
    <div class="row text-center">
      <div class="col-sm-6">
        <div class="plan-grid"> <a href="#"> <img src="/images/plan-1.jpg" alt="New House Plans" class="img-fluid" />
          <p class="plan-name text-truncate px-2">dell’ Azienda Agricola House Plan 4839</p>
          <p class="plan-meta text-truncate px-2">4,839 s.f. | 4 beds | 3.5 baths</p>
          </a> </div>
      </div>
      <div class="col-sm-6">
        <div class="plan-grid"> <a href="#"> <img src="/images/plan-1.jpg" alt="New House Plans" class="img-fluid" />
          <p class="plan-name text-truncate px-2">dell’ Azienda Agricola House Plan 4839</p>
          <p class="plan-meta text-truncate px-2">4,839 s.f. | 4 beds | 3.5 baths</p>
          </a> </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

@push('scripts')
@if(App::environment('local'))
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
@else
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.6/dist/vue.js"></script>
@endif

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script>
    var app = new Vue({
      el: '#searchform_outer',
      data: {
        viewOptions: false,
        viewPackages: false,
        viewAddons: false,
        toCartButtonDisable: true,
        loading: false,
        packages: {!!$packages!!},
        checkedPackage: {
          id: null,
          name: '',
          price: 0
        },
        options: {!!$foundations!!},
        checkedOption: {
          id: null,
          name: '',
          price: 0
        },
        addons: {!!$addons!!},
        checkedAddons: []
      },
      computed:{
        activeAddons(){
          return this.addons.filter(addon => {
            if(this.checkedAddons.indexOf(addon.id)>=0)
              return addon;
          });
        },
        totalAddons(){
          let sum = 0;
          for (let i = 0; i < this.activeAddons.length; i++) {
            sum += this.activeAddons[i].price;
          }
          return sum;
        },
        total(){
          return this.checkedPackage.price+this.checkedOption.price+this.totalAddons;
        }
      },
      methods:{
        setActivePackage(package){
          this.checkedPackage = package;
          this.viewPackages = false;
          this.checkActiveButtonCart();
        },
        setActiveOption(option){
          this.checkedOption = option;
          this.viewOptions = false;
          this.checkActiveButtonCart();
        },
        addToCart(){
          this.loading = true;
          axios.post('{{route('purchase')}}',{
            plan_id: {!!$plan->id!!},
            plan_package: this.checkedPackage.id,
            plan_foundation: this.checkedOption.id,
            plan_features: this.checkedAddons.join()
          })
          .then(response => {
              if(response.data.status == 'ok'){
                window.location.href = '{{route('cart')}}';
              }else{
                this.loading = false;
              }
          }, (error) => {
              this.loading = false;
          });          
        },
        checkActiveButtonCart(){
          if(this.checkedPackage.id && this.checkedOption.id){
            this.toCartButtonDisable = false;
          }else{
            this.toCartButtonDisable = true;
          }
        }
      }
    });
    
    
    var appMobile = new Vue({
      el: '#searchform_outer_mobile',
      data: {
        viewOptions: false,
        viewPackages: false,
        viewAddons: false,
        toCartButtonDisable: true,
        loading: false,
        packages: {!!$packages!!},
        checkedPackage: {
          id: null,
          name: '',
          price: 0
        },
        options: {!!$foundations!!},
        checkedOption: {
          id: null,
          name: '',
          price: 0
        },
        addons: {!!$addons!!},
        checkedAddons: []
      },
      computed:{
        activeAddons(){
          return this.addons.filter(addon => {
            if(this.checkedAddons.indexOf(addon.id)>=0)
              return addon;
          });
        },
        totalAddons(){
          let sum = 0;
          for (let i = 0; i < this.activeAddons.length; i++) {
            sum += this.activeAddons[i].price;
          }
          return sum;
        },
        total(){
          return this.checkedPackage.price+this.checkedOption.price+this.totalAddons;
        }
      },
      methods:{
        setActivePackage(package){
          this.checkedPackage = package;
          this.viewPackages = false;
        },
        setActiveOption(option){
          this.checkedOption = option;
          this.viewOptions = false;
        },
        addToCart(){
          console.log('Add');
        } 
      }
    })    
  </script>
@endpush
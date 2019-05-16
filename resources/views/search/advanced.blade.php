@extends('layouts.index')

@section('content')
<div class="plan-full position-relative mb-3 mobile-off">
    <img src="images/new-banner.jpg" alt="" class="img-fluid" />
      <h2 class="font-futura search-title-asp">Advanced House Plans Search</h2>
  </div>
  <div class="plan-full position-relative mb-3 desktop-off">
    <img src="images/house.jpg" alt="" class="img-fluid" />
      <h2 class="font-futura search-title-asp-mobile">Advanced House Plans Search</h2>
  </div>
  <p class="br_none_sm top-content">Finding your perfect house plan has become a whole lot easier since builder-preferred, construction-ready home plans are now available online.  Spending months or even longer working with an architect to fine tune a whole house blueprint is no longer necessary  You can now easily and quickly
  <span class="mobile-off" id="content-scroll"> find house plans designed by best-selling architects by following a few easy search steps.  Before you begin searching house designs, make sure you’re purchasing house plans from a site like ours where the plans meet the strict standards of the IRC (International Residential Code) and guarantee the full architectural detailing your builder needs to construct a safe home.  You’ll also want to check with your local town building department to find out if there are any special engineering or structural details needed for permitting. All of our floor plans can be customized as well as modified to include any possible local engineering details for certain locations like California and Florida. After you’ve done this initial homework, you’ll simply determine the square footage range needed to coordinate with your budget, style of home you want and then your preferences for bedrooms, baths, number of stories and garages. If there are lot restrictions, you can also add width and depth parameters in your home plan search to narrow down your results. To have your questions answered by our team of house plan experts, simply <a href="#">email</a> or <a href="#">live chat</a>  us today!</span>
</p>    
<div class="desktop-off read_more" id="read_more"><span class="read-more-link-wrapper">Read More </span></div>
  <div style="display : none;" id="read_less" class="read_less"><span class="read-less-link-wrapper">Read Less </span></div>
  
  <div class="center mb-3 desktop-off"> <button class="btn btn-primary rounded-0 font-weight-semi-bold grey-button" type="button" style="width : 90%;">Search by plan # <i class="fa fa-search" style="color:white"></i></button> </div>
  
  <div class="row">
  
  <!-- SideBar Left -->
    <div class="sidebar-left col-md-5 col-lg-3">
       <div class="row">
      <div class="col-sm-12 adv-basicSearch"> 
      <div class="plan-cta position-relative mb-2"> 
        <div class="search-grid search-grid1">
              <div class="font-weight-bold sidebar-heading">House Plan Search</div>
          <TABLE class="asp-basicsearch">
<tr>
<TD>Sq. Ft.</TD>
<td> <input type="text" placeholder="min" size=5 class="center" name="min"> to <input type="text" placeholder="max" size=5 class="center" name="max"></td>
</tr>
<tr>
<TD>Beds</TD>
<td> <div><span class="min_icon  beds-remove"> <i class="fa fa-minus"> </i></span> <input type="text" name="" value="1" class="qty"> 
                      <span class="max_icon  beds-add"><i class="fa fa-plus"></i></span></div></td>
</tr>
<tr>
<TD>Baths</TD>
<td> <div><span class="min_icon  baths-remove"> <i class="fa fa-minus"> </i></span> <input type="text" name="" value="1" class="qty"> 
                      <span class="max_icon  baths-add"><i class="fa fa-plus"></i></span></div></td>
</tr>
</tr>
<tr>
<TD>Garages</TD>
<td> <div><span class="min_icon   garage-remove"> <i class="fa fa-minus"> </i></span> <input type="text" name="" value="1" class="qty"> 
                      <span class="max_icon  garage-add"><i class="fa fa-plus"></i></span></div></td>
</tr>
<tr>
<TD>Stories</TD>
<td> <div><span class="min_icon  stories_reduce"> <i class="fa fa-minus"> </i></span> <input type="text" name="" value="1" class="qty"> 
                      <span class="max_icon  stories_add"><i class="fa fa-plus"></i></span></div></td>
</tr>
<tr>
<TD>Width</TD>
<td class="values"> <input type="text" placeholder="min" size=5 class="center"> to <input type="text" placeholder="max" size=5 class="center"><span class="optional">Optional</span></td>

</tr>
<tr>
<TD>Depth</TD>
<td class="values"> <input type="text" placeholder="min" size=5 class="center"> to <input type="text" placeholder="max" size=5 class="center"><span class="optional">Optional</span></td>
</tr>
<tr>
<td colspan="2">
  <div class="search-button">  
                <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold" type="button"> View Search Results</button>
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
                       <div class="font-weight-bold view_plans">Sign Up + Save : <input type="text" placeholder="Enter email address" class="text-center asp-save"></div>
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
                          <li class="listname"><i class="fa fa-chevron-right"></i> Bedroom and Bathroom Features</li>
                          <div id="bed-bath" class="features-list">
                              <ul>
                                    <li><input type="checkbox" name="" value="2 Master Suites">2 Master Suites</li>
                                      <li><input type="checkbox" name="" value="Double Vanity Sink">Double Vanity Sink</li>
                                      <li><input type="checkbox" name="" value="Guest Suite">Guest Suite</li>
                                      <li><input type="checkbox" name="" value="His and Hers Master Closets">His and Hers Master Closets</li>
                                      <li><input type="checkbox" name="" value="Separate Tub and Shower">Separate Tub and Shower</li>
                                      <li><input type="checkbox" name="" value="Master Bedroom Main Floor
">Master Bedroom Main Floor
</li>
                                      <li><input type="checkbox" name="" value="Master Bedroom Upstairs">Master Bedroom Upstairs</li>
                                      <li><input type="checkbox" name="" value="In-Law Apt
">In-Law Apt
</li>
                                      <li><input type="checkbox" name="" value="Split Bedrooms">Split Bedrooms</li>
                                  </ul>
                          </div>
                          <li class="listname"><i class="fa fa-chevron-right"></i> Kitchen Features</li>
                           <div id="bed-bath" class="features-list">
                            <ul>
                                    <li><input type="checkbox" name="" value="Butler's Pantry">Butler's Pantry</li>
                                      <li><input type="checkbox" name="" value="Country Kitchen">Country Kitchen</li>
                                      <li><input type="checkbox" name="" value="Kitchen Island">Kitchen Island</li>
                                      <li><input type="checkbox" name="" value="Nook / Breakfast Area">Nook / Breakfast Area</li>
                                      <li><input type="checkbox" name="" value="Peninsula / Eating Bar">Peninsula / Eating Bar</li>
                                      <li><input type="checkbox" name="" value="Walk-in Pantry">Walk-in Pantry</li>
                                      </ul>
                          </div>
                          <li class="listname"><i class="fa fa-chevron-right"></i> Interior Design Features</li>
                           <div id="bed-bath" class="features-list">
                            <ul>
                                    <li><input type="checkbox" name="" value="2 Story Volume">2 Story Volume</li>
                                      <li><input type="checkbox" name="" value="Bonus Room">Bonus Room</li>
                                      <li><input type="checkbox" name="" value="Dining Room">Dining Room</li>
                                      <li><input type="checkbox" name="" value="Family Room">Family Room</li>
                                      <li><input type="checkbox" name="" value="Fireplace">Fireplace</li>
                                      <li><input type="checkbox" name="" value="Formal LR">Formal LR</li>
                                      <li><input type="checkbox" name="" value="Foyer">Foyer</li>
                                      <li><input type="checkbox" name="" value="Great Room">Great Room</li>
                                      <li><input type="checkbox" name="" value="Home Office">Home Office</li>
                                      <li><input type="checkbox" name="" value="Laundry 1st Fl">Laundry 1st Fl</li>
                                      <li><input type="checkbox" name="" value="Laundry 2nd Fl">Laundry 2nd Fl</li>
                                      <li><input type="checkbox" name="" value="Loft / Balcony">Loft / Balcony</li>
                                      <li><input type="checkbox" name="" value="Mud Room">Mud Room</li>
                                      <li><input type="checkbox" name="" value="Open Floor Plan">Open Floor Plan</li>
                                      <li><input type="checkbox" name="" value="Rec Room">Rec Room</li>
                                      <li><input type="checkbox" name="" value="Storage Space">Storage Space
</li>
                                      <li><input type="checkbox" name="" value="Unfinished Space">Unfinished Space</li>
                                      <li><input type="checkbox" name="" value=" Vaulted Ceilings">Vaulted Ceilings</li>
                                  </ul>
                          </div>
                          <li class="listname"><i class="fa fa-chevron-right"></i> Garage Features</li>
                           <div id="bed-bath" class="features-list">
                            <ul>
                                    <li><input type="checkbox" name="" value="Attached">Attached</li>
                                      <li><input type="checkbox" name="" value="Carport">Carport</li>
                                      <li><input type="checkbox" name="" value="Detached">Detached</li>
                                      <li><input type="checkbox" name="" value="Drive-under">Drive-under</li>
                                      <li><input type="checkbox" name="" value="None">None</li>
                                      <li><input type="checkbox" name="" value="Oversized">Oversized</li>
                                      <li><input type="checkbox" name="" value="Rear-entry
">Rear-entry
</li>
                                      <li><input type="checkbox" name="" value=" Side-entry
">Side-entry
</li>
                                      <li><input type="checkbox" name="" value="Tandem
">Tandem
</li>
                                  </ul>
                          </div>
                          <li class="listname"><i class="fa fa-chevron-right"></i> Exterior Features</li>
                           <div id="bed-bath" class="features-list">
                            <ul>
                                    <li><input type="checkbox" name="" value="Breezeway">Breezeway</li>
                                      <li><input type="checkbox" name="" value="Front Porch">Front Porch</li>
                                      <li><input type="checkbox" name="" value="Courtyard">Courtyard</li>
                                      <li><input type="checkbox" name="" value="Outdoor Kitchen">Outdoor Kitchen</li>
                                      <li><input type="checkbox" name="" value="Covered Front Porch">Covered Front Porch</li>
                                      <li><input type="checkbox" name="" value="Rear Porch">Rear Porch</li>
                                      <li><input type="checkbox" name="" value="Covered Rear Porch">Covered Rear Porch</li>
                                      <li><input type="checkbox" name="" value="Screened Porch/Sunroom">Screened Porch/Sunroom</li>
                                      <li><input type="checkbox" name="" value="Deck">Deck</li>
                                      <li><input type="checkbox" name="" value="Wraparound Porch">Wraparound Porch</li>
                                  </ul>
                          </div>
                          <li class="listname"><i class="fa fa-chevron-right"></i> Architectural Styles</li>
                           <div id="bed-bath" class="features-list">
                              <ul>
                                    <li><input type="checkbox" name="" value=" Cottage Home Design">Cottage Home Designs</li>
                                      <li><input type="checkbox" name="" value="Country Home Plan">Country Home Plan</li>
                                      <li><input type="checkbox" name="" value="Craftsman House Plan">Craftsman House Plan</li>
                                      <li><input type="checkbox" name="" value="European House Plan">European House Plan</li>
                                      <li><input type="checkbox" name="" value="Farmhouse Homes">Farmhouse Homes</li>
                                      <li><input type="checkbox" name="" value=" French Country House Plan"> French Country House Plan</li>
                                      <li><input type="checkbox" name="" value="Modern House Plans">Modern House Plans</li>
                                      <li><input type="checkbox" name="" value="Ranch House Plans">Ranch House Plans</li>
                                  </ul>
                          </div>
                          <li class="listname"><i class="fa fa-chevron-right"></i> Specialty Home Collections</li>
                           <div id="bed-bath" class="features-list">
                            <ul>
                                    <li><input type="checkbox" name="" value="Affordable House Plans
">Affordable House Plans
</li>
                                      <li><input type="checkbox" name="" value="Best-Selling Home Plans">Best-Selling Home Plans</li>
                                      <li><input type="checkbox" name="" value="Builder-Friendly Plans
">Builder-Friendly Plans
</li>
                                      <li><input type="checkbox" name="" value="Duplex House Plans">Duplex House Plans</li>
                                      <li><input type="checkbox" name="" value="Empty Nester House Plans
">Empty Nester House Plans
</li>
                                      <li><input type="checkbox" name="" value="House Plans With Photos">House Plans With Photos</li>
                                      <li><input type="checkbox" name="" value="In-law Suite Plans">In-law Suite Plans</li>
                                      <li><input type="checkbox" name="" value="Luxury House Plans
">Luxury House Plans
</li>
                                      <li><input type="checkbox" name="" value="Narrow Lot House Plans">Narrow Lot House Plans
</li>
                                      <li><input type="checkbox" name="" value="New House Plans
">New House Plans
</li>
                                      <li><input type="checkbox" name="" value="One-Story House Plans">One-Story House Plans</li>
                                      <li><input type="checkbox" name="" value="Open Floor Plans
">Open Floor Plans
</li>
                                      <li><input type="checkbox" name="" value="Outdoor Living House Plans">Outdoor Living House Plans</li>
                                      <li><input type="checkbox" name="" value="Small House Plans
">Small House Plans
</li>
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
                <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding" type="button"> View Search Results</button>
                </div> </div>
          
          </div>
       </div>
       
       <div class="row">
              <div class="col-sm-12">
              <div class="plan-cta position-relative mb-2"> 
            <div class="search-grid search-grid3 text-center">
                      <h4 class="font-weight-bold sidebar-heading">Architectural Styles </h4>
                      <div class="features">
                          <ul class="list-unstyled text-primary">
                               <li><a href="#">Cottage Home Designs</a></li>
                              <li><a href="#">Country Home Plans</a></li>
                              <li><a href="#">Craftsman House Plans</a></li>
                              <li><a href="#">European House Plans</a></li>
                              <li><a href="#">Farmhouse Plans</a></li>
                              <li><a href="#">French Country House Plans</a></li>
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
                               <li><a href="#">Affordable House Plans</a></li>
                               <li><a href="#">Best-Selling Home Plans</a></li>
                               <li><a href="#">Builder-Friendly Plans</a></li>
                               <li><a href="#">Duplex House Plans</a></li>
                               <li><a href="#">Empty Nester House Plans</a></li>
                               <li><a href="#">House Plans With Photos</a></li>
                               <li><a href="#">In-law Suite Plans</a></li>
                               <li><a href="#">Luxury House Plans</a></li>
                               <li><a href="#">Narrow Lot House Plans</a></li>
                               <li><a href="#">New House Plans</a></li>
                               <li><a href="#">One-Story House Plans</a></li>
                               <li><a href="#">Open Floor Plans</a></li>
                               <li><a href="#">Outdoor Living House Plans</a></li>
                               <li><a href="#">Small House Plans</a></li>
                               <li><a href="#">Texas House Plans</a></li>
                               <li><a href="#">Two Story House Plans</a></li>
                               <li><a href="#">Vacation Homes</a></li>
                               <li><a href="#">Walkout Basement Plans</a></li>
                        </ul>
                      </div>
          </div>
         </div>
       </div>
       </div>
    </div>
    <!-- SideBar Left -->
    
    <!-- Content Right -->
    <div class="col-md-7 col-lg-9 mobile-off">
        <div class="row">
          <div class="col-md-12"> 
            <span class="pull-left"><h5 class="font-weight-bold  text-size" style="margin-top : -3px;">View Our Most Popular House Plans</h5></span> <span class="pull-right search_span">Search <input type="text" name="search" placeholder="Plan# or name"></span>
          </div>
        </div> 
        <div class="row">
            <div class="col-md-6">
              <div class="plan-list mt-3">
                <div class="row align-items-center py-2 px-1">
                  <div class="col-8">
                    <p class="plan-name font-weight-bold mb-0">4,839 sq ft | <span class="text-white">plan 2495</span></p>
                  </div>
                  <div class="col-4">
                  <ul class="list-inline mb-0 text-right font-icons">
              <li class="list-inline-item icon-heart-mob"><a href=""><i class="fa fa-heart-o" style="color:white"></i><!--<img src="images/icons/icon-favourite.png" alt="">--></a></li>
              <li class="list-inline-item icon-search-mob"><a href=""  data-toggle="modal" data-target="#quickView"><i class="fa fa-search" style="color:white"></i><!--<img src="images/icons/icon-search-w.png" alt="">--></a></li>
            </ul>
                  </div>  
                </div>
                <div class="position-relative">
                  <div id="plan4839" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                      <div class="carousel-item active"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                    </div>
                    <a class="carousel-control-prev" href="#plan4839" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#plan4839" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
                  <div class="media planinfo text-left position-absolute"> <img class="mr-1 align-self-center" src="images/icons/logo-placeholder.png" alt="Generic placeholder image">
                    <div class="media-body">
                      <h5 class="mb-0 text-white">plan <span class="text-secondary">4839</span></h5>
                      <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
                    </div>
                  </div>
                  <a href="#" class="position-absolute icon-camera"><img src="images/icons/icon-camera.png" alt=""></a> <a href="#" class="position-absolute pinterest"><img src="images/icons/icon-pinterest.png" alt=""></a> </div>
                <div class="row no-gutters plan-info">
                  <div class="col bg-light"> bed<strong class="d-block">4</strong> </div>
                  <div class="col"> bath<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> story<strong class="d-block">4</strong> </div>
                  <div class="col"> gar<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> width<span class="d-block">108’ 11</span> </div>
                  <div class="col"> depth<span class="d-block">90’ 11”</span> </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="plan-list mt-3">
                <div class="row align-items-center py-2 px-1">
                  <div class="col-8">
                    <p class="plan-name font-weight-bold mb-0">4,839 sq ft | <span class="text-white">plan 2495</span></p>
                  </div>
                  <div class="col-4">
                  <ul class="list-inline mb-0 text-right font-icons">
              <li class="list-inline-item icon-heart-mob"><a href=""><i class="fa fa-heart-o" style="color:white"></i><!--<img src="images/icons/icon-favourite.png" alt="">--></a></li>
              <li class="list-inline-item icon-search-mob"><a href=""  data-toggle="modal" data-target="#quickView"><i class="fa fa-search" style="color:white"></i><!--<img src="images/icons/icon-search-w.png" alt="">--></a></li>
            </ul>
                  </div>
                </div>
                <div class="position-relative">
                  <div id="plan4839" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                      <div class="carousel-item active"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                    </div>
                    <a class="carousel-control-prev" href="#plan4839" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#plan4839" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
                  <div class="media planinfo text-left position-absolute"> <img class="mr-1 align-self-center" src="images/icons/logo-placeholder.png" alt="Generic placeholder image">
                    <div class="media-body">
                      <h5 class="mb-0 text-white">plan <span class="text-secondary">4839</span></h5>
                      <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
                    </div>
                  </div>
                  <a href="#" class="position-absolute icon-camera"><img src="images/icons/icon-camera.png" alt=""></a> <a href="#" class="position-absolute pinterest"><img src="images/icons/icon-pinterest.png" alt=""></a> </div>
                <div class="row no-gutters plan-info">
                  <div class="col bg-light"> bed<strong class="d-block">4</strong> </div>
                  <div class="col"> bath<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> story<strong class="d-block">4</strong> </div>
                  <div class="col"> gar<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> width<span class="d-block">108’ 11</span> </div>
                  <div class="col"> depth<span class="d-block">90’ 11”</span> </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
              <div class="plan-list mt-3">
                <div class="row align-items-center py-2 px-1">
                  <div class="col-8">
                    <p class="plan-name font-weight-bold mb-0">4,839 sq ft | <span class="text-white">plan 2495</span></p>
                  </div>
                  <div class="col-4">
                  <ul class="list-inline mb-0 text-right font-icons">
              <li class="list-inline-item icon-heart-mob"><a href=""><i class="fa fa-heart-o" style="color:white"></i><!--<img src="images/icons/icon-favourite.png" alt="">--></a></li>
              <li class="list-inline-item icon-search-mob"><a href=""  data-toggle="modal" data-target="#quickView"><i class="fa fa-search" style="color:white"></i><!--<img src="images/icons/icon-search-w.png" alt="">--></a></li>
            </ul>
                  </div>
                </div>
                <div class="position-relative">
                  <div id="plan4839" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                      <div class="carousel-item active"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                    </div>
                    <a class="carousel-control-prev" href="#plan4839" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#plan4839" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
                  <div class="media planinfo text-left position-absolute"> <img class="mr-1 align-self-center" src="images/icons/logo-placeholder.png" alt="Generic placeholder image">
                    <div class="media-body">
                      <h5 class="mb-0 text-white">plan <span class="text-secondary">4839</span></h5>
                      <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
                    </div>
                  </div>
                  <a href="#" class="position-absolute icon-camera"><img src="images/icons/icon-camera.png" alt=""></a> <a href="#" class="position-absolute pinterest"><img src="images/icons/icon-pinterest.png" alt=""></a> </div>
                <div class="row no-gutters plan-info">
                  <div class="col bg-light"> bed<strong class="d-block">4</strong> </div>
                  <div class="col"> bath<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> story<strong class="d-block">4</strong> </div>
                  <div class="col"> gar<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> width<span class="d-block">108’ 11</span> </div>
                  <div class="col"> depth<span class="d-block">90’ 11”</span> </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 mt-3 black_banner" style="background-image:url('images/black-banner.jpg');">
              <div class="text-center blackBanner">
                <h3 class="font-futura">SIGN UP + SAVE!</h3>
                <span class="font-futura bigFont">10%</span> &nbsp;&nbsp;<span style="font-size: 31px;">off</span>
                  <p>Plus, get exclusive access to new <br> house plans and great product ideas!</p>
                  <input name="email" class="email_class" type="text"  placeholder="Enter your email address" ><br>
                  <button class="coupon_code" >GET MY COUPON</button>
      </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
              <div class="plan-list mt-3">
                <div class="row align-items-center py-2 px-1">
                  <div class="col-8">
                    <p class="plan-name font-weight-bold mb-0">4,839 sq ft | <span class="text-white">plan 2495</span></p>
                  </div>
                  <div class="col-4">
                  <ul class="list-inline mb-0 text-right font-icons">
              <li class="list-inline-item icon-heart-mob"><a href=""><i class="fa fa-heart-o" style="color:white"></i><!--<img src="images/icons/icon-favourite.png" alt="">--></a></li>
              <li class="list-inline-item icon-search-mob"><a href=""  data-toggle="modal" data-target="#quickView"><i class="fa fa-search" style="color:white"></i><!--<img src="images/icons/icon-search-w.png" alt="">--></a></li>
            </ul>
                  </div>
                </div>
                <div class="position-relative">
                  <div id="plan4839" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                      <div class="carousel-item active"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                    </div>
                    <a class="carousel-control-prev" href="#plan4839" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#plan4839" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
                  <div class="media planinfo text-left position-absolute"> <img class="mr-1 align-self-center" src="images/icons/logo-placeholder.png" alt="Generic placeholder image">
                    <div class="media-body">
                      <h5 class="mb-0 text-white">plan <span class="text-secondary">4839</span></h5>
                      <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
                    </div>
                  </div>
                  <a href="#" class="position-absolute icon-camera"><img src="images/icons/icon-camera.png" alt=""></a> <a href="#" class="position-absolute pinterest"><img src="images/icons/icon-pinterest.png" alt=""></a> </div>
                <div class="row no-gutters plan-info">
                  <div class="col bg-light"> bed<strong class="d-block">4</strong> </div>
                  <div class="col"> bath<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> story<strong class="d-block">4</strong> </div>
                  <div class="col"> gar<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> width<span class="d-block">108’ 11</span> </div>
                  <div class="col"> depth<span class="d-block">90’ 11”</span> </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="plan-list mt-3">
                <div class="row align-items-center py-2 px-1">
                  <div class="col-8">
                    <p class="plan-name font-weight-bold mb-0">4,839 sq ft | <span class="text-white">plan 2495</span></p>
                  </div>
                  <div class="col-4">
                  <ul class="list-inline mb-0 text-right font-icons">
              <li class="list-inline-item icon-heart-mob"><a href=""><i class="fa fa-heart-o" style="color:white"></i><!--<img src="images/icons/icon-favourite.png" alt="">--></a></li> 
              <li class="list-inline-item icon-search-mob"><a href=""  data-toggle="modal" data-target="#quickView"><i class="fa fa-search" style="color:white"></i><!--<img src="images/icons/icon-search-w.png" alt="">--></a></li>
            </ul>
                  </div>
                </div>
                <div class="position-relative">
                  <div id="plan4839" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                      <div class="carousel-item active"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                    </div>
                    <a class="carousel-control-prev" href="#plan4839" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#plan4839" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
                  <div class="media planinfo text-left position-absolute"> <img class="mr-1 align-self-center" src="images/icons/logo-placeholder.png" alt="Generic placeholder image">
                    <div class="media-body">
                      <h5 class="mb-0 text-white">plan <span class="text-secondary">4839</span></h5>
                      <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
                    </div>
                  </div>
                  <a href="#" class="position-absolute icon-camera"><img src="images/icons/icon-camera.png" alt=""></a> <a href="#" class="position-absolute pinterest"><img src="images/icons/icon-pinterest.png" alt=""></a> </div>
                <div class="row no-gutters plan-info">
                  <div class="col bg-light"> bed<strong class="d-block">4</strong> </div>
                  <div class="col"> bath<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> story<strong class="d-block">4</strong> </div>
                  <div class="col"> gar<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> width<span class="d-block">108’ 11</span> </div>
                  <div class="col"> depth<span class="d-block">90’ 11”</span> </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
              <div class="plan-list mt-3">
                <div class="row align-items-center py-2 px-1">
                  <div class="col-8">
                    <p class="plan-name font-weight-bold mb-0">4,839 sq ft | <span class="text-white">plan 2495</span></p>
                  </div>
                  <div class="col-4">
                  <ul class="list-inline mb-0 text-right font-icons">
              <li class="list-inline-item icon-heart-mob"><a href=""><i class="fa fa-heart-o" style="color:white"></i><!--<img src="images/icons/icon-favourite.png" alt="">--></a></li>
              <li class="list-inline-item icon-search-mob"><a href=""  data-toggle="modal" data-target="#quickView"><i class="fa fa-search" style="color:white"></i><!--<img src="images/icons/icon-search-w.png" alt="">--></a></li>
            </ul>
                  </div>
                </div>
                <div class="position-relative">
                  <div id="plan4839" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                      <div class="carousel-item active"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                    </div>
                    <a class="carousel-control-prev" href="#plan4839" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#plan4839" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
                  <div class="media planinfo text-left position-absolute"> <img class="mr-1 align-self-center" src="images/icons/logo-placeholder.png" alt="Generic placeholder image">
                    <div class="media-body">
                      <h5 class="mb-0 text-white">plan <span class="text-secondary">4839</span></h5>
                      <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
                    </div>
                  </div>
                  <a href="#" class="position-absolute icon-camera"><img src="images/icons/icon-camera.png" alt=""></a> <a href="#" class="position-absolute pinterest"><img src="images/icons/icon-pinterest.png" alt=""></a> </div>
                <div class="row no-gutters plan-info">
                  <div class="col bg-light"> bed<strong class="d-block">4</strong> </div>
                  <div class="col"> bath<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> story<strong class="d-block">4</strong> </div>
                  <div class="col"> gar<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> width<span class="d-block">108’ 11</span> </div>
                  <div class="col"> depth<span class="d-block">90’ 11”</span> </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="plan-list mt-3">
                <div class="row align-items-center py-2 px-1">
                  <div class="col-8">
                    <p class="plan-name font-weight-bold mb-0">4,839 sq ft | <span class="text-white">plan 2495</span></p>
                  </div>
                  <div class="col-4">
                  <ul class="list-inline mb-0 text-right font-icons">
              <li class="list-inline-item icon-heart-mob"><a href=""><i class="fa fa-heart-o" style="color:white"></i><!--<img src="images/icons/icon-favourite.png" alt="">--></a></li>
              <li class="list-inline-item icon-search-mob"><a href=""  data-toggle="modal" data-target="#quickView"><i class="fa fa-search" style="color:white"></i><!--<img src="images/icons/icon-search-w.png" alt="">--></a></li>
            </ul>
                  </div>
                </div>
                <div class="position-relative">
                  <div id="plan4839" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                      <div class="carousel-item active"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                    </div>
                    <a class="carousel-control-prev" href="#plan4839" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#plan4839" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
                  <div class="media planinfo text-left position-absolute"> <img class="mr-1 align-self-center" src="images/icons/logo-placeholder.png" alt="Generic placeholder image">
                    <div class="media-body">
                      <h5 class="mb-0 text-white">plan <span class="text-secondary">4839</span></h5>
                      <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
                    </div>
                  </div>
                  <a href="#" class="position-absolute icon-camera"><img src="images/icons/icon-camera.png" alt=""></a> <a href="#" class="position-absolute pinterest"><img src="images/icons/icon-pinterest.png" alt=""></a> </div>
                <div class="row no-gutters plan-info">
                  <div class="col bg-light"> bed<strong class="d-block">4</strong> </div>
                  <div class="col"> bath<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> story<strong class="d-block">4</strong> </div>
                  <div class="col"> gar<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> width<span class="d-block">108’ 11</span> </div>
                  <div class="col"> depth<span class="d-block">90’ 11”</span> </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
              <div class="plan-list mt-3">
                <div class="row align-items-center py-2 px-1">
                  <div class="col-8">
                    <p class="plan-name font-weight-bold mb-0">4,839 sq ft | <span class="text-white">plan 2495</span></p>
                  </div>
                  <div class="col-4">
                  <ul class="list-inline mb-0 text-right font-icons">
              <li class="list-inline-item icon-heart-mob"><a href=""><i class="fa fa-heart-o" style="color:white"></i><!--<img src="images/icons/icon-favourite.png" alt="">--></a></li>
              <li class="list-inline-item icon-search-mob"><a href=""  data-toggle="modal" data-target="#quickView"><i class="fa fa-search" style="color:white"></i><!--<img src="images/icons/icon-search-w.png" alt="">--></a></li>
            </ul>
                  </div>
                </div>
                <div class="position-relative">
                  <div id="plan4839" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                      <div class="carousel-item active"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                    </div>
                    <a class="carousel-control-prev" href="#plan4839" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#plan4839" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
                  <div class="media planinfo text-left position-absolute"> <img class="mr-1 align-self-center" src="images/icons/logo-placeholder.png" alt="Generic placeholder image">
                    <div class="media-body">
                      <h5 class="mb-0 text-white">plan <span class="text-secondary">4839</span></h5>
                      <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
                    </div>
                  </div>
                  <a href="#" class="position-absolute icon-camera"><img src="images/icons/icon-camera.png" alt=""></a> <a href="#" class="position-absolute pinterest"><img src="images/icons/icon-pinterest.png" alt=""></a> </div>
                <div class="row no-gutters plan-info">
                  <div class="col bg-light"> bed<strong class="d-block">4</strong> </div>
                  <div class="col"> bath<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> story<strong class="d-block">4</strong> </div>
                  <div class="col"> gar<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> width<span class="d-block">108’ 11</span> </div>
                  <div class="col"> depth<span class="d-block">90’ 11”</span> </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="plan-list mt-3">
                <div class="row align-items-center py-2 px-1">
                  <div class="col-8">
                    <p class="plan-name font-weight-bold mb-0">4,839 sq ft | <span class="text-white">plan 2495</span></p>
                  </div>
                  <div class="col-4">
                  <ul class="list-inline mb-0 text-right font-icons">
              <li class="list-inline-item icon-heart-mob"><a href=""><i class="fa fa-heart-o" style="color:white"></i><!--<img src="images/icons/icon-favourite.png" alt="">--></a></li>
              <li class="list-inline-item icon-search-mob"><a href=""  data-toggle="modal" data-target="#quickView"><i class="fa fa-search" style="color:white"></i><!--<img src="images/icons/icon-search-w.png" alt="">--></a></li>
            </ul>
                  </div>
                </div>
                <div class="position-relative">
                  <div id="plan4839" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                      <div class="carousel-item active"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                      <div class="carousel-item"> <img src="images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
                    </div>
                    <a class="carousel-control-prev" href="#plan4839" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#plan4839" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
                  <div class="media planinfo text-left position-absolute"> <img class="mr-1 align-self-center" src="images/icons/logo-placeholder.png" alt="Generic placeholder image">
                    <div class="media-body">
                      <h5 class="mb-0 text-white">plan <span class="text-secondary">4839</span></h5>
                      <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
                    </div>
                  </div>
                  <a href="#" class="position-absolute icon-camera"><img src="images/icons/icon-camera.png" alt=""></a> <a href="#" class="position-absolute pinterest"><img src="images/icons/icon-pinterest.png" alt=""></a> </div>
                <div class="row no-gutters plan-info">
                  <div class="col bg-light"> bed<strong class="d-block">4</strong> </div>
                  <div class="col"> bath<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> story<strong class="d-block">4</strong> </div>
                  <div class="col"> gar<strong class="d-block">4</strong> </div>
                  <div class="col bg-light"> width<span class="d-block">108’ 11</span> </div>
                  <div class="col"> depth<span class="d-block">90’ 11”</span> </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- Content Right -->
  </div>

@endsection
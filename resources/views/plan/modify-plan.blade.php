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
                    	<p><a href="#" class="text-primary">Helpful tips to know before you submit your modifications </a></p>
                    </div>
                    <form id="modification_form" action="{{ route('modify-plan-submit', $plan->plan_number) }}" method="post">
                    
                    <div class="form-group col-lg-6 pull-left">
                        <label for="FirstName">First Name:</label>
                        <input type="text" name="first_name" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 pull-right">
                        <label for="LastName">Last Name:</label>
                        <input type="text" name="last_name" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 pull-left">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 pull-right">
                        <label for="phone">Phone:</label>
                        <input type="number" name="phone" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 pull-left">
                        <div class="select-custom-wrap select-custom-wrap-lg">
                          <label for="State Building">State you are building in:</label>
                          <select name="select-custom-style" class="select-custom">
                            <option value="hide">Select here</option>
                            <option value="Collection1">Alabama - AL</option>
                            <option value="Collection1">Alaska - AK</option>
                            <option value="Collection1">Arizona - AZ</option>
                            <option value="Collection1">Arkansas - AR</option>
                            <option value="Collection1">California - CA</option>
                            <option value="Collection1">Colorado - CO</option>
                            <option value="Collection1">Connecticut - CT</option>
                            <option value="Collection1">Delaware - DE</option>
                            <option value="Collection1">Florida - FL</option>
                            <option value="Collection1">Georgia - GA</option>
                            <option value="Collection1">Hawaii - HI</option>
                            <option value="Collection1">Idaho - ID</option>
                            <option value="Collection1">Illinois - IL</option>
                            <option value="Collection1">Indiana - IN</option>
                            <option value="Collection1">Iowa - IA</option>
                            <option value="Collection1">Kansas - KS</option>
                            <option value="Collection1">Kentucky - KY</option>
                            <option value="Collection1">Louisiana - LA</option>
                            <option value="Collection1">Maine - ME</option>
                            <option value="Collection1">Maryland - MD</option>
                            <option value="Collection1">Massachusetts - MA</option>
                            <option value="Collection1">Michigan - MI</option>
                            <option value="Collection1">Minnesota - MN</option>
                            <option value="Collection1">Mississippi - MS</option>
                            <option value="Collection1">Missouri - MO</option>
                            <option value="Collection1">Montana - MT</option>
                            <option value="Collection1">Nebraska - NE</option>
                            <option value="Collection1">Nevada - NV</option>
                            <option value="Collection1">New Hampshire - NH</option>
                            <option value="Collection1">New Jersey - NJ</option>
                            <option value="Collection1">New Mexico - NM</option>
                            <option value="Collection1">New York - NY</option>
                            <option value="Collection1">North Carolina - NC</option>
                            <option value="Collection1">North Dakota - ND</option>
                            <option value="Collection1">Ohio - OH</option>
                            <option value="Collection1">Oklahoma - OK</option>
                            <option value="Collection1">Oregon - OR</option>
                            <option value="Collection1">Pennsylvania - PA</option>
                            <option value="Collection1">Rhode Island - RI</option>
                            <option value="Collection1">South Carolina - SC</option>
                            <option value="Collection1">South Dakota - SD</option>
                            <option value="Collection1">Tennessee - TN</option>
                            <option value="Collection1">Texas - TX</option>
                            <option value="Collection1">Utah - UT</option>
                            <option value="Collection1">Vermont - VT</option>
                            <option value="Collection1">Virginia - VA</option>
                            <option value="Collection1">Washington - WA</option>
                            <option value="Collection1">West Virginia - WV</option>
                            <option value="Collection1">Wisconsin - WI</option>
                            <option value="Collection1">Wyoming - WY</option>
                            <option value="Collection1">Canada - CDN</option>
                            <option value="Collection1">International - Int.</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-lg-6 pull-right">
                        <div class="select-custom-wrap select-custom-wrap-lg">
                          <label for="Build planning">When you are planning to build?</label>
                          <select name="select-custom-style" class="select-custom">
                         	<option value="hide">Select here</option>
                            <option value="Collection1">0-3 months</option>
                            <option value="Collection2">3-6 months</option>
                            <option value="Collection3">6-9 months</option>
                            <option value="Collection2">9-12 months</option>
                            <option value="Collection3">12+ months</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-lg-6 pull-left">
                        <div class="select-custom-wrap select-custom-wrap-lg">
                          <label for="Foundation type">If you know, select foundation type</label>
                          <select name="select-custom-style" class="select-custom">
                            <option value="hide">Select here</option>
                            <option value="Collection1">Slab</option>
                            <option value="Collection2">Crawlspace</option>
                            <option value="Collection2">Basement</option>
                            <option value="Collection3">Walkout Basement</option>
                            <option value="Collection2">Daylight Basement</option>
                          </select>
                        </div>
                      </div>
                       <div class="form-group col-lg-6 pull-right">
                        <div class="select-custom-wrap select-custom-wrap-lg">
                          <label for="have builder">Do you have a builder</label>
                          <select name="select-custom-style" class="select-custom">
                            <option value="hide">Select here</option>
                            <option value="Collection1">Yes</option>
                            <option value="Collection2">No</option>
                            <option value="Collection3">I'm a builder</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-lg-6 pull-left">
                        <div class="select-custom-wrap select-custom-wrap-lg">
                          <label for="have land">Do you have land?</label>
                          <select name="select-custom-style" class="select-custom">
                            <option value="hide">Select here</option>
                            <option value="Collection1">Yes</option>
                            <option value="Collection2">No</option>
                            <option value="Collection1">In process of purchasing</option>
                            <option value="Collection2">Have multiple lots</option>
                          </select>
                        </div>
                      </div>
                       <div class="form-group col-lg-6 pull-right">
                        <div class="select-custom-wrap select-custom-wrap-lg">
                          <label for="Framing Preference">Framing Preference</label>
                          <select name="select-custom-style" class="select-custom">
                            <option value="hide">Select here</option>
                            <option value="Collection1">2 x 4</option>
                            <option value="Collection2">2 X 8</option>
                            <option value="Collection3">8" block</option>
                          </select>
                        </div>
                      </div>
                  
                  <div class="col-lg-12 pull-left py-0">
                     <h5 class="font-weight-bold">If you know the information below, include it with your request to receive your FREE modification estimate with 2 business days</h5>
                     <ul class="list-style-none pl-0">
                        <li>~ Specific dimensions for enlarging and reducing rooms</li>
                        <li>~ If changing roof pitch, provide new pitch (10:12, 8:12: 4:12 etc)</li>
                        <li>~ If raising or lower ceilings, give specific heights</li>
                        <li>~ For basement changes indicate as many details as possible like  walkout, daylight or partial.</li>
                     </ul>
                     <div class="form-group">
                         <textarea class="form-control z-depth-1" id="modify_plan_changes" rows="3" placeholder="Type your plan modification changes here.."></textarea>
                 	</div>
                 	<h6 class="font-weight-bold">Download plan by clicking floor plan image on right to send sketch of changes, if needed:</h6>
                   <div class="custom-file col-sm-8">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Upload files here </label>
                    </div>
                    <br/><p></p>
                    <div class="form-group">
                         <input type="submit" name="submit_request" value="Submit your request" class="btn btn-danger"/>
                 	</div>
                 </div>
                 
                 </form>
                </div>
     			<div class="col-lg-4 col-sm-12">
           <h5 class="font-weight-bold mt-3">{{$plan->name}} | plan {{$plan->plan_number}}</h5>
                    <div class="plan-list mt-0">
                      <div class="row align-items-center py-2 px-1">
                        <div class="col-8">
                          <p class="plan-name font-weight-bold mb-0">{{$plan->square_ft['str_total']}} sq ft | <span class="text-white">plan {{$plan->plan_number}}</span></p>
                        </div>
                        <div class="col-4">
                          <ul class="list-inline mb-0 text-right">
                            <li class="list-inline-item"><a href=""><img src="/images/icons/icon-favourite.png" alt=""></a></li>
                            <li class="list-inline-item">
                              <button type="button" class="btn btn-link p-0" data-toggle="modal" data-target="#quickView"><img src="/images/icons/icon-search-w.png" alt=""></button>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="position-relative">
                        <div id="plan{{$plan->plan_number}}" class="carousel slide" data-ride="carousel" data-interval="5000">
                          <div class="carousel-inner">
                              @foreach ($plan->images as $img)                          
                          <div class="carousel-item @if($loop->iteration == 1) active @endif"> <img src="/storage/plans/{{$plan->id}}/thumb/{{$img->file_name}}" alt="{{$plan->name}}" class="img-fluid d-block w-100"> </div>
                              @endforeach          
                          </div>
                          <a class="carousel-control-prev" href="#plan{{$plan->plan_number}}" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#plan{{$plan->plan_number}}" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
                        <div class="media planinfo text-left position-absolute"> <img class="mr-1 align-self-center" src="/images/icons/logo-placeholder.png" alt="Generic placeholder image">
                          <div class="media-body">
                            <h5 class="mb-0 text-white">plan <span class="text-secondary">{{$plan->plan_number}}</span></h5>
                            <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
                          </div>
                        </div>
                        <a href="#" class="position-absolute icon-camera"><img src="/images/icons/icon-camera.png" alt=""></a> <a href="#" class="position-absolute pinterest"><img src="/images/icons/icon-pinterest.png" alt=""></a> </div>
                      <div class="row no-gutters plan-info">
                        <div class="col bg-light"> bed<strong class="d-block">{{$plan->rooms['r_bedrooms']}}</strong> </div>
                        <div class="col"> bath<strong class="d-block">{{$plan->rooms['r_full_baths']}}</strong> </div>
                        <div class="col bg-light"> story<strong class="d-block">{{$plan->dimensions['stories']}}</strong> </div>
                        <div class="col"> gar<strong class="d-block">{{$plan->garage['car']}}</strong> </div>
                        <div class="col bg-light"> width<span class="d-block">{{$plan->dimensions['width_ft']}}' {{$plan->dimensions['width_in']}}"</span> </div>
                        <div class="col"> depth<span class="d-block">{{$plan->dimensions['depth_ft']}}' {{$plan->dimensions['depth_in']}}"</span> </div>
                      </div>
                    </div>
                    <p></p><p></p>
                    @foreach($plan->images_first  as $image)
                      <img src="{{asset('storage/plans/'.$plan->id.'/thumb/'.$image->file_name)}}" class="img-fluid d-block w-100" alt="First Floor Plan">
                      <p class="plan_download_link"><a download="first-floor-Plan.png" href="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" title="{{$image->file_name}}">
                          Click to enlarge and download
                      </a></p>
                    @endforeach  
                    <p></p><p></p>
                    @foreach($plan->images_second  as $image)
                      <img src="{{asset('storage/plans/'.$plan->id.'/thumb/'.$image->file_name)}}" class="img-fluid d-block w-100" alt="Second Floor Plan">
                      <p class="plan_download_link"><a download="first-floor-Plan.png" href="{{asset('storage/plans/'.$plan->id.'/'.$image->file_name)}}" title="{{$image->file_name}}">
                          Click to enlarge and download
                      </a></p>
                    @endforeach  
                    <p></p><p></p><p></p>
                  </div>
      		</div>
      	</div>
    </div>

@endsection

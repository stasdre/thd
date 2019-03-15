
@extends('layouts.index')

@section('carousel')
    <div id="banner" class="carousel slide" data-ride="carousel" >
    @if ($agent->isDesktop()  || $agent->isTablet())
<div class="home-page-search mobile-off"> 
  <h4 class="blue-text"> Search House Plans </h4>
                  <TABLE class="home-search-new">
<tr>
<Th>Sq. Ft.</Th>
<td> <input type="text" placeholder="min" size=5 class="center" name="min"> to <input type="text" placeholder="max" size=5 class="center" name="max"></td>
</tr>
<tr>
<Th>Beds</Th>
<td> <div><span class="min_icon  beds-remove"> <i class="fa fa-minus"> </i></span> <input type="text" name="" value="1" class="qty"> 
                        <span class="max_icon  beds-add"><i class="fa fa-plus"></i></span></div></td>
</tr>
<tr>
<Th>Baths</Th>
<td> <div><span class="min_icon  baths-remove"> <i class="fa fa-minus"> </i></span> <input type="text" name="" value="1" class="qty"> 
                        <span class="max_icon  baths-add"><i class="fa fa-plus"></i></span></div></td>
</tr>
<tr>
<Th>Garages</Th>
<td> <div><span class="min_icon garage-remove"> <i class="fa fa-minus"> </i></span> <input type="text" name="" value="1" class="qty"> 
                        <span class="max_icon garage-add"><i class="fa fa-plus"></i></span></div></td>
</tr>	
<tr>
<Th>Stories</Th>
<td> <div><span class="min_icon  stories_reduce"> <i class="fa fa-minus"> </i></span> <input type="text" name="" value="1" class="qty"> 
                        <span class="max_icon  stories_add"><i class="fa fa-plus"></i></span></div></td>
</tr>

<tr>
	<td colspan="2">
    <div class="">  
                	<button class="btn btn-primary rounded-0 text-white font-weight-semi-bold" type="button" style="width :100%;"> SEARCH</button>
                  </div>
                  <div class="text-center advanced_search_text mt-2" ><a href="" class="red-links" style="font-size:14px;"> ADVANCED SEARCH</a></div>
    </td>
</tr>

</TABLE>
   </div>
   @endif
        <ol class="carousel-indicators">
			@foreach($gallery as $img)
	            <li data-target="#banner" data-slide-to="{{$loop->index}}" @if($loop->index == 0)class="active"@endif></li>
			@endforeach
        </ol>
        <div class="carousel-inner"> 
			@foreach($gallery as $img)
				<div class="carousel-item @if($loop->index == 0) active @endif"> <img class="d-block w-100" src="{{asset('/storage/gallery/'.$img->file)}}" alt="{{$img->name}}">
					<div class="caption-quote-wrap">
						<div class="caption-quote @if(!$img->quote) custom_capt @endif">{{$img->description}}</div>
						<p class="@if($img->quote==1) caption-quote-author @else caption-quote-small @endif">{{$img->caption}}</p>
					</div>
					<div class="media planinfo text-left"> <img class="mr-1 align-self-end" src="{{asset('/images/icons/logo-placeholder.png')}}" alt="Generic placeholder image">
						<div class="media-body">
							<h5 class="mb-0 text-white">plan <span class="text-secondary">{{$img->plan}}</span></h5>
							<h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
						</div>
					</div>
				</div>
			@endforeach
        </div>
        <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#banner" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
    </div>
@endsection
@if ($agent->isDesktop() || $agent->isTablet())
	@section('content')
		
		<div class="row align-items-center py-2 pd_bottom_0">
			<div class="col-sm-3">
				<h4 class="m-0 font-weight-bold"><a href="#" class="text-primary">FAQs</a></h4>
				<p class="m-0 font-weight-light">Frequently Asked Questions</p>
			</div>
			<div class="col-sm-6">
           		<p></p>
				<h1 class="text-center font-futura p-0 m-0">{{$descDesctop->title}}</h1>
			</div>
			<div class="col-sm-3 text-sm-right newsletter">
				<p class="mb-1 font-weight-semi-bold"><span>SIGN UP FOR </span> E-PUBS + DISCOUNTS</p>
				<div class="input-group input-group-sm">
					<input type="text" class="form-control rounded-0 border-secondary font-weight-bold" placeholder="Email Address">
					<div class="input-group-append">
						<button class="btn btn-secondary rounded-0 text-uppercase text-dark font-weight-bold" type="button">Sign Up</button>
					</div>
				</div>
			</div>
		</div>
        <p></p>
		<div class="text-center pt-0 br_none_sm home-main-text" style="margin-left:18px;margin-right :18px; word-spacing: 2px;">{!! $descDesctop->description !!}</div>
		@if($deckBest->main_file)
			<div class="plan-full position-relative mb-3"> <img src="{{asset('/storage/home-page/'.$deckBest->main_file)}}" alt="" class="img-fluid" />
				<div class="plan-caption position-absolute mw-315">
					<h3 class="font-weight-bold">{{$deckBest->main_title}}</h3>
					<p>{{$deckBest->main_desc}}</p>
					<a href="{{$deckBest->main_link}}" class="btn btn-dark rounded-0">Click Here</a> </div>
				<div class="plan-name position-absolute">{{$deckBest->main_plan}}</div>
			</div>
		@endif
		<div class="row">
			@if($deckBest->first_file)
			<div class="col-sm-4">
				<div class="plan-cta @if($deckBest->first_type == 'light') white @endif position-relative mb-2"> <img src="{{asset('/storage/home-page/'.$deckBest->first_file)}}" alt="" class="img-fluid" />
					<div class="plan-caption position-absolute">
						<h3>{{ $deckBest->first_title }}</h3>
						<p>{{ $deckBest->first_desc }}</p>
						<a href="{{ $deckBest->first_link }}" class="btn btn-dark rounded-0">Click Here</a> </div>
					<div class="plan-name position-absolute">{{ $deckBest->first_plan }}</div>
				</div>
			</div>
			@endif
			@if($deckBest->second_file)
				<div class="col-sm-4">
					<div class="plan-cta @if($deckBest->second_type == 'light') white @endif position-relative mb-2"> <img src="{{asset('/storage/home-page/'.$deckBest->second_file)}}" alt="" class="img-fluid" />
						<div class="plan-caption position-absolute">
							<h3>{{ $deckBest->second_title }}</h3>
							<p>{{ $deckBest->second_desc }}</p>
							<a href="{{ $deckBest->second_link }}" class="btn btn-dark rounded-0">Click Here</a> </div>
						<div class="plan-name position-absolute">{{ $deckBest->second_plan }}</div>
					</div>
				</div>
			@endif
			@if($deckBest->third_file)
				<div class="col-sm-4">
					<div class="plan-cta @if($deckBest->third_type == 'light') white @endif position-relative mb-2"> <img src="{{asset('/storage/home-page/'.$deckBest->third_file)}}" alt="" class="img-fluid" />
						<div class="plan-caption position-absolute">
							<h3>{{ $deckBest->third_title }}</h3>
							<p>{{ $deckBest->third_desc }}</p>
							<a href="{{ $deckBest->third_link }}" class="btn btn-dark rounded-0">Click Here</a> </div>
						<div class="plan-name position-absolute">{{ $deckBest->third_plan }}</div>
					</div>
				</div>
			@endif
		</div>
		<h1 class="text-center font-futura mb-2">AMERICA’S FAVORITE HOUSE PLANS!</h1>
		<div class="row text-center">
			@if($deskFavor->first_file)
			<div class="col-sm-3">
				<div class="plan-grid"> <a href="{{$deskFavor->first_link}}"> <img src="{{asset('/storage/home-page/'.$deskFavor->first_file)}}" alt="{{$deskFavor->first_title}}" class="img-fluid" />
						<p class="plan-name text-truncate"><strong>{{$deskFavor->first_title}}</strong></p>
						<p class="plan-meta text-truncate">{{$deskFavor->first_desc}}</p>
						<p class="shop-link home">{{$deskFavor->first_link_text}}</p>
					</a> </div>
			</div>
			@endif
			@if($deskFavor->second_file)
				<div class="col-sm-3">
					<div class="plan-grid"> <a href="{{$deskFavor->second_link}}"> <img src="{{asset('/storage/home-page/'.$deskFavor->second_file)}}" alt="{{$deskFavor->second_title}}" class="img-fluid" />
							<p class="plan-name text-truncate"><strong>{{$deskFavor->second_title}}</strong></p>
							<p class="plan-meta text-truncate">{{$deskFavor->second_desc}}</p>
							<p class="shop-link home">{{$deskFavor->second_link_text}}</p>
						</a> </div>
				</div>
			@endif
			@if($deskFavor->third_file)
				<div class="col-sm-3">
					<div class="plan-grid"> <a href="{{$deskFavor->third_link}}"> <img src="{{asset('/storage/home-page/'.$deskFavor->third_file)}}" alt="{{$deskFavor->third_title}}" class="img-fluid" />
							<p class="plan-name text-truncate"><strong>{{$deskFavor->third_title}}</strong></p>
							<p class="plan-meta text-truncate">{{$deskFavor->third_desc}}</p>
							<p class="shop-link home">{{$deskFavor->third_link_text}}</p>
						</a> </div>
				</div>
			@endif
			@if($deskFavor->fourth_file)
				<div class="col-sm-3">
					<div class="plan-grid"> <a href="{{$deskFavor->fourth_link}}"> <img src="{{asset('/storage/home-page/'.$deskFavor->fourth_file)}}" alt="{{$deskFavor->fourth_title}}" class="img-fluid" />
							<p class="plan-name text-truncate"><strong>{{$deskFavor->fourth_title}}</strong></p>
							<p class="plan-meta text-truncate">{{$deskFavor->fourth_desc}}</p>
							<p class="shop-link home">{{$deskFavor->fourth_link_text}}</p>
						</a> </div>
				</div>
			@endif
		</div>
		<div class="bg-secondary py-3 px-5 text-center home-about">
			<div class="row align-items-center">
				<div class="col-sm-6"> <img src="{{ asset('/storage/about/'.$aboutData['photo']) }}" alt="David" class="img-fluid" /> </div>
				<div class="col-sm-6"> 
					<h4 class="font-weight-bold mb-3">{{ $aboutData['title'] }}</h4>
					{!! $aboutData['description'] !!}
					 <p class="text-center"><a data-fancybox="" href="{{ $aboutData['url'] }}" class=""><button class="btn btn-primary rounded-0 text-uppercase text-dark font-weight-semi-bold" type="button" style="color: white !important;padding: 9px 17px;font-size : 20px;">Watch the Video</button></a></p>
                
                    
                    
				</div>
			</div>
		</div>
		<div class="py-3">
			<div class="row">
				<div class="col-md-6">
					<h4 class="text-primary text-center font-weight-bold">Browse by Architectural Style</h4>
					<div class="row">
						<div class="col-md-6">
							<ul class="list-unstyled text-primary text-center">
								@foreach ($styles as $style)
									<li><a href="{{ route('style.slug', $style->slug) }}">{{ $style->short_name }}</a></li>
									@if( ($loop->iteration % round(($loop->count/2)) == 0) && (!$loop->last) )
							</ul>
						</div>
						<div class="col-md-6">
							<ul class="list-unstyled text-primary text-center">
								@endif
								@endforeach
							</ul>
						</div>
					</div>
					<p class="text-right mb-0"><center><a href="{{ route('styles') }}" class="text-primary font-weight-bold text-center">View ALL Architectural Styles &gt;</a></center></p>
				</div>
				<div class="col-md-6">
					<h4 class="text-primary text-center font-weight-bold"> Browse by Specialty Collection</h4>
					<div class="row">
						<div class="col-md-6">
							<ul class="list-unstyled text-primary text-center">
								@foreach ($collections as $collection)
									<li><a href="{{ route('collection.slug', $collection->slug) }}">{{ $collection->short_name }}</a></li>
									@if( ($loop->iteration % round(($loop->count/2)) == 0) && (!$loop->last) )
							</ul>
						</div>
						<div class="col-md-6">
							<ul class="list-unstyled text-primary text-center">
								@endif
								@endforeach
							</ul>
						</div>
					</div>
					<p class="text-right mb-0"><center><a href="{{ route('collections') }}" class="text-primary font-weight-bold text-center">View ALL Specialty Collections &gt;</a></center></p>
				</div>
			</div>
		</div>
		<div class="">
			<div class="row">
				<div class="col-md-6">
					<div class="bg-dark py-3 px-4 mh-1">
						<h4 class="font-weight-bold text-white text-uppercase text-center">Why Buy From Us?</h4>
						<p class="text-center text-white font-weight-semi-bold mb-4">Complete Architectural Details | Free Product Ideas Best Price Guarantee</p>
						<div class="text-white">
							{!! $aboutData->why_text !!}
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mh-1">
						<div class="bg-secondary py-3 mb-2" style="background:#77787b !important">
							<h4 class="font-weight-bold text-white text-uppercase text-center">Best Price Guarantee</h4>
							<div class="px-3">
								<div class="text-white mb-0">
									{!! $aboutData->best_text !!}
								</div>
							</div>
						</div>
						<div class="bg-secondary py-3" style="background:#c6c8ca !important">
							<h4 class="font-weight-bold text-dark text-uppercase text-center">FREE Modification/Change Estimates</h4>
							<div class="px-3">
								<div class="text-dark">
									{!! $aboutData->free_text !!}
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	@endsection
@endif
@if ($agent->isMobile())
	@section('content')
		<h1 class="text-center font-futura">AMERICA’S FAVORITE HOUSE PLANS</h1>
		<div class="plan-list my-1">
			<div class="position-relative">
				<div id="favorite_plans" class="carousel slide" data-ride="carousel" data-interval="6000">
					     <ol class="carousel-indicators">
			@foreach($gallery as $img)
	            <li data-target="#favorite_plans" data-slide-to="{{$loop->index}}" @if($loop->index == 0)class="active"@endif></li>
			@endforeach
        </ol>
        <div class="carousel-inner">
			@foreach($gallery as $img)
				<div class="carousel-item @if($loop->index == 0) active @endif"> <img class="d-block w-100" src="{{asset('/storage/gallery/'.$img->file)}}" alt="{{$img->name}}" style="min-height : 210px !important;">
					<div class="caption-quote-wrap">
						<div class="caption-quote @if(!$img->quote) custom_capt @endif">{{$img->description}}</div>
						<p class="@if($img->quote==1) caption-quote-author @else caption-quote-small @endif">{{$img->caption}}</p>
					</div>
					<div class="media planinfo text-left top position-absolute mobile-planinfo" style="background: rgba(0, 0, 0, 0.3) !important;"> <img class="mr-1 align-self-end" src="{{asset('/images/icons/logo-placeholder.png')}}" alt="Generic placeholder image">
						<div class="media-body">
							<h5 class="mb-0 text-white">plan <span class="text-secondary">{{$img->plan}}</span></h5>
							<h5 class="m-0 text-white">davidwiggins</h5>
						</div>
					</div>
				</div>
			@endforeach
        </div>
        <a class="carousel-control-prev" href="#favorite_plans" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#favorite_plans" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
					  </div>
				   
			</div>
		</div>
	<div class="text-center page-name mt-1 grey-border" style="padding-top : 20px !important">
      <div class="mobile-home-search"> 
            <div class="row" style="border-bottom: 2px solid #696969;margin-left: 4px;margin-right: 5px;">
          		<div class="col-2 search_by_name text-left" style="padding-bottom : 25px;padding-left : 0px;font-weight : normal;text-align: right !important;
    padding-right: 9px;">Sq. ft. </div>
                <div class="col-4" style="padding-left : 0;"><input type="number" placeholder="min" size=5 class="center" style="margin-left : -15px;"><span class="small-font"> to </span><input type="number" placeholder="max" size=5 class="center"></div> 
                <div class="col-2 Sborder-left search_by_name" style="padding-left :10px;font-weight : normal;border-left: 2px solid #696969;">Stories </div>
                <div class="col-4" style="padding-left : 6px;"><span class="min_icon stories_reduce-mobile"> <i class="fa fa-minus"> </i></span> <input type="text" name="" value="1" class="qty"> 
                        <span class="max_icon stories-add-mobile"><i class="fa fa-plus"></i></span></div>
             </div>
             <div class="row" style="margin-top : 0;">
          		<div class="col-2 pt-3 search_by_name" style="font-weight : normal;text-align: right;padding-right: 6px;">Beds</div>
                <div class="col-4 pt-3 text-left" style="padding-left : 0;"> <span class="min_icon beds-remove-mobile" style="margin-left : 4px !important;"> <i class="fa fa-minus"> </i></span> <input type="text" name="" value="1" class="qty"> 
                        <span class="max_icon beds-add-mobile"><i class="fa fa-plus"></i></span></div>
                <div class="col-2 Sborder-left pt-3 search_by_name" style="padding-left : 19px;font-weight : normal;border-left: 2px solid #696969;">Baths</div>
                 <div class="col-4 pt-3" style="padding-left : 6px;"><span class="min_icon baths-remove-mobile"> <i class="fa fa-minus"> </i></span> <input type="text" name="" value="1" class="qty">  
                        <span class="max_icon baths-add-mobile"><i class="fa fa-plus"></i></span></div>
             </div>
             <div style="margin-top : 25px;"><button class="btn btn-primary rounded-0 text-white font-weight-semi-bold search-button1" type="button"> SEARCH</button></div>
             <div class="mt-3"><button class="btn btn-primary rounded-0 text-white font-weight-semi-bold grey-button" type="button" style="width :100%;padding : 6px 0;"> Advanced Search</button></div>
             <div class="mt-3" style="margin-top : 30px !important;"><button class="btn btn-primary rounded-0 text-white font-weight-semi-bold grey-button" type="button" style="width :100%;padding : 6px 0;"> Search by Plan #<i class="fa fa-search" aria-hidden="true"></i></button></div>
          </div>
       </div>  
       <div style="clear : both;"></div>
		<div class="text-center text-uppercase lead font-weight-normal align-middle py-2 only_under_767 contact-method mf18"> <a href="#" class="align-middle text-primary">Live Chat</a> | <a href="#" class="align-middle text-primary">Email</a> | <a href="#" class="align-middle text-secondary">xxx-xxx-xxxx</a> </div>
		
		<div class="plan-list my-1">
			<div class="position-relative">
				<div id="new_plans" class="carousel slide" data-ride="carousel" data-interval="false">
					<div class="carousel-inner">
						@foreach($newMob as $img)
							<div class="carousel-item @if($loop->index == 0) active @endif"> <img src="{{asset('/storage/gallery/'.$img->file)}}" alt="{{$img->name}}" class="img-fluid d-block w-100"> </div>
						@endforeach
					</div>
					<a class="carousel-control-prev" href="#new_plans" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#new_plans" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
				<div class="media planinfo text-left top position-absolute mobile-planinfo"> <img class="mr-1 align-self-center logo-on-mobile" src="{{asset('/images/icons/logo-placeholder.png')}}" alt="Generic placeholder image">
					<div class="media-body">
						<h5 class="mb-0 text-white">plan <span class="text-secondary">4839</span></h5>
						<h5 class="m-0 text-white">davidwiggins</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<h4 class="font-weight-bold text-center mb-0 bigFont-xs">NEW HOUSE PLANS</h4>
			<p class="lead text-center font-weight-semi-bold mb-2 mt-1">by America’s Leading Architect </p>
			<div class="bg-secondary w-75 mx-auto mb-3 pb-1"></div>
			<div class="home-about">
				<div style="margin-bottom: 10px;">
					{!! $deskMob->description !!}
				</div>
			</div>
			<div class="sign_save"> 
          		<input type="text" class="form-control rounded-0" placeholder="SIGN UP AND SAVE">
          		<div class="input-group-append" style="display : inline-block;">
           			 <button class="btn btn-primary rounded-0  font-weight-semi-bold" type="button"><i class="fa fa-chevron-right"></i></button>
          		</div>
        	</div>
            
            <div class="position-relative"> 
             
			<img src="{{asset('/storage/home-page/'.$bestMob->file)}}" alt="{{$bestMob->name}}" class="img-fluid w-100 my-2">
           <div class="media planinfo text-left top position-absolute mobile-planinfo" style="padding-top : 20px !important;font-family:FuturaPT;"> <img class="mr-1 align-self-center logo-on-mobile" src="{{asset('/images/icons/logo-placeholder.png')}}" alt="Generic placeholder image">
					<div class="media-body">
						<h5 class="mb-0 text-white" style="font-size: 15px !important;">plan <span class="text-secondary">4839</span></h5>
						<h5 class="m-0 text-white" style="font-size: 15px !important;">davidwiggins</h5>
					</div>
				</div>
            </div>
			<h4 class="font-weight-bold text-center mb-0 mf18">BEST-SELLING HOUSE PLANS</h4>
			<p class="text-center font-weight-semi-bold mt-1">America’s Most Popular Designs</p>
            
            <div class="bg-secondary home-mobile py-3 px-5 text-center home-about">
				<div class="row align-items-center">
					<div class="col-sm-6"> <img src="{{ asset('/storage/about/'.$aboutData['photo']) }}" alt="David" class="img-fluid" /> </div>
					<div class="col-sm-6  no-padding">
						<h4 class="font-weight-bold mb-3">{{ $aboutData['title'] }}</h4>
						<div class="text-left">{!! $aboutData['description'] !!}</div>
						 <p class="text-center"><a data-fancybox="" href="{{ $aboutData['url'] }}" class=""><button class="btn btn-primary rounded-0 text-uppercase text-dark font-weight-semi-bold" type="button" style="color: white !important;padding: 9px 17px;font-size : 20px;">Watch the Video</button></a></p>
					</div>
				</div>
			</div>
            
			<h4 class="font-weight-bold text-center text-primary">Browse Our Architectural Styles</h4>
			<div class="row">
				<div class="col-12 col-md-6">
					<ul class="list-unstyled text-primary text-center">
						@foreach ($styles as $style)
							<li><a href="{{ route('style.slug', $style->slug) }}">{{ $style->short_name }}</a></li>
						@endforeach
					</ul>
				</div>
 			</div>
			<p class="text-right mb-0 xs-text-center grey-text-mobile font-weight-bold"><a href="{{ route('styles') }}" class="d-block text-primary">View ALL Architectural Styles &gt;</a></p>
                      <h4 class="font-weight-bold text-center text-primary"> Browse by Specialty Collection</h4>
					<div class="row">
						<div class="col-12 col-md-6">
					<ul class="list-unstyled text-primary text-center">
						@foreach ($collections as $collection)
							<li><a href="{{ route('collection.slug', $collection->slug) }}">{{ $collection->short_name }}</a></li>
						@endforeach
					</ul>
				</div>
                        </div>
            </div>
           <p class="text-right mb-0 xs-text-center grey-text-mobile font-weight-bold"> <a href="{{ route('collections') }}" class="d-block text-primary mt-1">View ALL Specialty Collections &gt;</a></p>
			<div class="home-about col-12">
           <div class="bg-dark py-3 px-4 mh-1 px-xs-0 bg-grey hp_sec-margin">
				<h4 class="text-center font-weight-bold mb-3">Why Buy From Us?</h4>
				
				<div>
					{!! $aboutData->why_text !!}
				</div>
                </div>
                  <div class="bg-dark py-3 px-4 mh-1 px-xs-0 bg-grey hp_sec-margin">
				<h4 class="text-center font-weight-bold mb-3">Best Price Guarantee</h4>
				<div>
					{!! $aboutData->best_text !!}
				</div>
                </div>
                  <div class="bg-dark py-3 px-4 mh-1 px-xs-0 bg-grey hp_sec-margin">
				<h4 class="text-center font-weight-bold mb-3">FREE Modification Estimates</h4>
				<div>
					{!! $aboutData->free_text !!}
				</div>
                </div>
			</div>
		</div>
	@endsection
@endif
</div>

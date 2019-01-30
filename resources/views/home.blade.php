@extends('layouts.index')

@section('carousel')
    <div id="banner" class="carousel slide" data-ride="carousel">
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
		<div class="search-wrap py-2 px-5 text-center">
			<form class="form-main-search text-center">
				<div class="row no-gutters">
					<div class="col-md-2 col-sm-3 common_width padd_bottom_10">
						<div class="form-group">
							<div class="select-custom-wrap select-custom-wrap-lg">
								<select name="select-custom-style" class="select-custom" >
									<option value="hide">Styles \ Collections</option>
									<option value="Collection1">Collection1</option>
									<option value="Collection2">Collection2</option>
									<option value="Collection3">Collection3</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-1 col-sm-3 common_width padd_bottom_10">
						<div class="form-group">
							<div class="select-custom-wrap select-custom-wrap-sm">
								<select name="select-custom-beds" class="select-custom">
									<option value="hide">Beds</option>
									<option value="Bed1">1</option>
									<option value="Bed2">2</option>
									<option value="Bed3">3</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-1 col-sm-3 common_width padd_bottom_10">
						<div class="form-group">
							<div class="select-custom-wrap select-custom-wrap-sm">
								<select name="select-custom-baths" class="select-custom"  >
									<option value="hide">Baths</option>
									<option value="Bath1">1</option>
									<option value="Bath2">2</option>
									<option value="Bath3">3</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-1 col-sm-3 common_width padd_bottom_10">
						<div class="form-group">
							<div class="select-custom-wrap select-custom-wrap-sm">
								<select name="select-custom-stories" class="select-custom" >
									<option value="hide">Stories</option>
									<option value="Story1">Story1</option>
									<option value="Story2">Story2</option>
									<option value="Story3">Story3</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-sm-3 common_width padd_bottom_10 max-width">
						<div class="form-group">
							<div class="select-custom-wrap select-custom-wrap-md">
								<select name="select-custom-garages" class="select-custom " >
									<option value="hide">Garages</option>
									<option value="Garage1">Garage1</option>
									<option value="Garage2">Garage2</option>
									<option value="Garage3">Garage3</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-1 col-sm-3 common_width">
						<div class="form-group">
							<input type="text" placeholder="Min sq. ft." >
						</div>
					</div>
					<div class="col-md-1 col-sm-3 common_width">
						<div class="form-group">
							<input type="text" placeholder="Max sq. ft." >
						</div>
					</div>
					<div class="col-md-1 col-sm-3 common_width">
						<div class="form-group">
							<button type="submit" class="btn btn-block btn-primary rounded-0" >Search</button>
						</div>
					</div>
					<div class="col-md-2 col-sm-3 common_width comm_xs_btn">
						<div class="form-group"> <a href="{{route('search')}}" class="btn btn-link text-uppercase text-white advan_opts">Advanced Options</a> </div>
					</div>
				</div>
			</form>
		</div>
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
		<div class="text-center pt-0 br_none_sm">{!! $descDesctop->description !!}</div>
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
					<p><a data-fancybox="" href="{{ $aboutData['url'] }}" class="btn btn-outline-dark rounded-0 px-5 font-weight-semi-bold">Watch the Video</a></p>
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
					<p class="text-right mb-0"><a href="{{ route('styles') }}" class="text-primary font-weight-bold">View ALL Architectural Styles &gt;</a></p>
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
					<p class="text-right mb-0"><a href="{{ route('collections') }}" class="text-primary font-weight-bold">View ALL Specialty Collections &gt;</a></p>
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
		<h1 class="text-center font-futura">AMERICA’S FAVORITE HOUSE PLANS!</h1>
		<div class="plan-list my-1">
			<div class="position-relative">
				<div id="modalplan48" class="carousel slide" data-ride="carousel" data-interval="1800">
					<div class="carousel-inner">
						<div class="carousel-item active"> <img src="/images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
						<div class="carousel-item"> <img src="/images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
						<div class="carousel-item"> <img src="/images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
					</div>
					<a class="carousel-control-prev" href="#modalplan48" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#modalplan48" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
				<div class="media planinfo text-left top position-absolute"> <img class="mr-1 align-self-center" src="/images/icons/logo-placeholder.png" alt="Generic placeholder image">
					<div class="media-body">
						<h5 class="mb-0 text-white">plan <span class="text-secondary">4839</span></h5>
						<h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
					</div>
				</div>
			</div>
		</div>
		<div class="search-wrap p-2 text-center bg-white">
			<form class="form-main-search text-center">
				<div class="row no-gutters">
					<div class="col-6">
						<div class="form-group">
							<input type="text" placeholder="Plan Name or #" >
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<input type="text" placeholder="Min sq. ft." >
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<input type="text" placeholder="Max sq. ft." >
						</div>
					</div>
				</div>
				<div class="row no-gutters">
					<div class="col-6">
						<div class="form-group">
							<div class="select-custom-wrap select-custom-wrap-lg">
								<select name="select-custom-style" class="select-custom" >
									<option value="hide">Styles \ Collections</option>
									<option value="Collection1">Collection1</option>
									<option value="Collection2">Collection2</option>
									<option value="Collection3">Collection3</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<div class="select-custom-wrap select-custom-wrap-sm">
								<select name="select-custom-beds" class="select-custom">
									<option value="hide">Beds</option>
									<option value="Bed1">1</option>
									<option value="Bed2">2</option>
									<option value="Bed3">3</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<div class="select-custom-wrap select-custom-wrap-sm">
								<select name="select-custom-baths" class="select-custom"  >
									<option value="hide">Baths</option>
									<option value="Bath1">1</option>
									<option value="Bath2">2</option>
									<option value="Bath3">3</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row no-gutters">
					<div class="col-sm">
						<div class="form-group px-5">
							<button type="submit" class="btn btn-block btn-primary rounded-0 text-uppercase" >Search House Plans</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="text-center text-uppercase lead font-weight-normal align-middle py-2"> <a href="#" class="align-middle text-primary">Live Chat</a> | <a href="#" class="align-middle text-primary">Email</a> | <a href="#" class="align-middle text-secondary">xxx-xxx-xxxx</a> </div>
		<div class="col-sm">
			<div class="form-group px-5">
				<a href="{{ route('search') }}" class="btn btn-block btn-primary rounded-0 text-uppercase advanced-search" >Advanced Plan Search</a>
			</div>
		</div>
		<div class="plan-list my-1">
			<div class="position-relative">
				<div id="modalplan" class="carousel slide" data-ride="carousel" data-interval="1800">
					<div class="carousel-inner">
						<div class="carousel-item active"> <img src="/images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
						<div class="carousel-item"> <img src="/images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
						<div class="carousel-item"> <img src="/images/plan-1.jpg" alt="" class="img-fluid d-block w-100"> </div>
					</div>
					<a class="carousel-control-prev" href="#modalplan48" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#modalplan48" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
				<div class="media planinfo text-left top position-absolute"> <img class="mr-1 align-self-center" src="/images/icons/logo-placeholder.png" alt="Generic placeholder image">
					<div class="media-body">
						<h5 class="mb-0 text-white">plan <span class="text-secondary">4839</span></h5>
						<h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<h4 class="font-weight-bold text-center mb-0 bigFont-xs">NEW HOUSE PLANS</h4>
			<p class="lead text-center font-weight-semi-bold mb-2 mt-1">by America’s leading architect </p>
			<div class="bg-secondary w-75 mx-auto mb-3 pb-1"></div>
			<div class="home-about">
				<p style="margin-bottom: 10px;">Buying house plans on David Wiggins House Plans means you’re buying direct from America’s favorite residential architect, David E. Wiggins!  When purchasing online house plans from our site, be confident in knowing that our home plans have been built in every state in the U.S. and many countries around the globe.  David’s home designs are also guaranteed to include full architectural detailing that builders need to build safe and efficient houses  From craftsman home plans to small house plans to modern floor plans, you’ll find easy to build and easy to customize house plans in a wide variety of styles and sizes. </p>
			</div>
			<h4 class="font-weight-bold text-center mb-2">SIGN UP AND SAVE</h4>
			<div class="input-group input-group-sm mb-2 mx-auto w-75">
				<input type="text" class="form-control rounded-0 border-secondary" placeholder="ENTER YOUR EMAIL ADDRESS">
				<div class="input-group-append">
					<button class="btn btn-primary rounded-0 text-uppercase text-white font-weight-semi-bold px-3 enter_email" type="button">&gt;</button>
				</div>
			</div>
			<img src="/images/plan-4.jpg" alt="New House Plans" class="img-fluid w-100 my-2">
			<h4 class="font-weight-bold text-center mb-0 bigFont-xs">BEST-SELLING HOUSE PLANS</h4>
			<p class="lead text-center font-weight-semi-bold mt-1">America’s most popular designs</p>
			<h5 class="font-weight-bold text-center text-primary">Browse Our Architectural Styles</h5>
			<div class="row">
				<div class="col">
					<ul class="list-unstyled text-primary">
						@foreach ($styles as $style)
							<li><a href="{{ route('style.slug', $style->slug) }}">{{ $style->short_name }}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="col">
					<ul class="list-unstyled text-primary">
						@foreach ($collections as $collection)
							<li><a href="{{ route('collection.slug', $collection->slug) }}">{{ $collection->short_name }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
			<p class="text-center font-weight-bold"><a href="{{ route('styles') }}" class="d-block text-primary">View ALL Architectural Styles &gt;</a><a href="{{ route('collections') }}" class="d-block text-primary mt-1">View ALL Specialty Collections &gt;</a></p>

			<div class="bg-secondary home-mobile py-3 px-5 text-center home-about">
				<div class="row align-items-center">
					<div class="col-sm-6"> <img src="{{ asset('/storage/about/'.$aboutData['photo']) }}" alt="David" class="img-fluid" /> </div>
					<div class="col-sm-6">
						<h4 class="font-weight-bold mb-3">{{ $aboutData['title'] }}</h4>
						{!! $aboutData['description'] !!}
						<p><a data-fancybox="" href="{{ $aboutData['url'] }}" class="btn btn-outline-dark rounded-0 px-5 font-weight-semi-bold">Watch the Video</a></p>
					</div>
				</div>
			</div>

			<div class="home-about">
				<h4 class="text-center font-weight-bold mb-3">Why Buy From Us?</h4>
				<p class="text-center">Complete Architectural Details | Free Product Ideas </br> Best Price Guarantee</p>
				<p>DavidWigginsHousePlans.com offers high quality, ready-to-build house plans designed by the country’s favorite residential architect, David E. Wiggins, and leading architects and designers around the country.  Find home plans in every architectural size and style that come with free modification estimates, free product recommendations and free shipping!
					Be confident when purchasing online house plans from our site as our house plans meet the strict standards of the IRC (International Residential Code) and have the full architectural detailing builders prefer.</p>
				<p>Many of our home plans have photos from customers that show how the same design was built by different clients customized to fit individual needs, budgets, and building lots.  David’s plans also come with a 100% satisfaction exchange policy.</p>
				<p>As you take your first step in building your new home by finding your perfect house plan, know that we’re here to assist you and answer all of your questions along the way. Feel free to contact us by live chat, email or phone at (XXX) XXX-XXXX.  We’d be happy to help in any way that we can!</p>
				<h4 class="text-center font-weight-bold mb-3">Best Price Guarantee</h4>
				<p>David Wiggins House Plans guarantees the lowest prices available online. If you happen to find a better price and you meet the qualifications below, we’ll give you the difference plus an additional 5% discount. This price guarantee also includes pricing for modification estimates.</p>
				<p>To receive the best price guarantee offer: 1) The lower price must be for the exact same house plan purchased; 2) The plan package must be the exact same plan package and options found elsewhere on the web; 3) A link showing the lower price must be sent; 4) Price applies to total price of purchase excluding shipping, taxes, and other charges that may apply; 5) Claims must be made within 4 days from purchase date.</p>
				<h4 class="text-center font-weight-bold mb-3">FREE Modification Estimates</h4>
				<p>Did you find a great home plan, but there’s a few changes you’d like to make? David Wiggins House Plans offers modification services to design the perfect house plan for you and your family.</p>
				<p>Modifications can include just about anything you want including adding or removing windows, making rooms bigger or smaller, expanding porches and decks and raising and lowering ceiling heights. Just click on “Customize this Home Plan” on any plan page to get your free modification estimate!</p>
			</div>
		</div>
	@endsection
@endif
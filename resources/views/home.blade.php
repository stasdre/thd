@extends('layouts.app')

@section('slider')
    <div id="banner" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($gallery as $img)
                @if($loop->index==1)
                    <li data-target="#banner" data-slide-to="{{$loop->index}}" class="active"></li>
                @else
                    <li data-target="#banner" data-slide-to="{{$loop->index}}"></li>
                @endif
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($gallery as $img)
                @if($loop->index==1)
                    <div class="carousel-item active">
                @else
                    <div class="carousel-item">
                @endif
            <img class="d-block w-100" src="{{url( asset('/storage/gallery/'.$img->file))}}" alt="{{ $img->name }}">
                <div class="caption-quote-wrap">
                    <div class="caption-quote"> {!! $img->description !!} </div>
                    <p class="caption-quote-author">DAVID E. WIGGINS</p>
                </div>
                <div class="media planinfo text-left"> <img class="mr-1 align-self-end" src="{{ asset('images/icons/logo-placeholder.png') }}" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-3 mb-0 text-white">plan <span class="text-secondary">4839</span></h5>
                        <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#banner" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>

@endsection

@section('content')
    <div class="search-wrap py-2 px-5 text-center">
        <form class="form-main-search text-center">
            <div class="row no-gutters">
                <div class="col-sm">
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
                <div class="col-3 col-sm">
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
                <div class="col-3 col-sm">
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
                <div class="col-sm d-none d-sm-block">
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
                <div class="col-sm d-none d-sm-block">
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
                <div class="col-3 col-sm">
                    <div class="form-group">
                        <input type="text" placeholder="Min sq. ft." >
                    </div>
                </div>
                <div class="col-3 col-sm">
                    <div class="form-group">
                        <input type="text" placeholder="Max sq. ft." >
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary rounded-0" >Search</button>
                    </div>
                </div>
                <div class="col-sm d-none d-sm-block">
                    <div class="form-group"> <a href="#" class="btn btn-link text-uppercase text-white">Advanced Options</a> </div>
                </div>
            </div>
        </form>
    </div>

    <div class="row align-items-center py-2">
        <div class="col-sm-3">
            <h4 class="m-0 font-weight-bold"><a href="#" class="text-primary">FAQs</a></h4>
            <p class="m-0 font-weight-light">Frequently Asked Questions</p>
        </div>
        <div class="col-sm-6">
            <h1 class="text-center font-futura p-0 m-0">FIND YOUR DREAM HOME!</h1>
        </div>
        <div class="col-sm-3 text-sm-right newsletter">
            <p class="mb-1 font-weight-semi-bold"><span>DW HOUSEPLANS</span> NEWSLETTER</p>
            <div class="input-group input-group-sm">
                <input type="text" class="form-control rounded-0 border-secondary" placeholder="Email Address">
                <div class="input-group-append">
                    <button class="btn btn-secondary rounded-0 text-uppercase text-dark font-weight-semi-bold" type="button">SignUp</button>
                </div>
            </div>
        </div>
    </div>
    <p class="text-center pt-2">Buying house plans on DavidWigginsHousePlans.com means you’re buying direct from America’s favorite residential architect, David E. Wiggins!<br>When purchasing online house plans from our site, be confident in knowing that our home plans have been built in every state in the U.S. and many countries around the globe.  David’s home designs are also guaranteed to include full architectural detailing that builders need to build safe and efficient houses  From craftsman home plans to small house plans to modern floor plans, you’ll find easy to build and easy to customize house plans in a wide variety of styles and sizes.</p>
    <div class="plan-full position-relative mb-3"> <img src="{{ asset('images/plan-full.jpg') }}" alt="" class="img-fluid" />
        <div class="plan-caption position-absolute mw-315">
            <h3 class="font-weight-bold">America’s Favorite Homes</h3>
            <p>View America’s favorite house plans from leading architect David E. Wiggins</p>
            <a href="#" class="btn btn-dark rounded-0">Click Here</a> </div>
        <div class="plan-name position-absolute"><span>CHERRY CREEK /</span> HOUSE PLAN 2495</div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="plan-cta position-relative mb-2"> <img src="{{ asset('images/plan-cta-1.jpg') }}" alt="" class="img-fluid" />
                <div class="plan-caption position-absolute">
                    <h3>Recent Blogs</h3>
                    <p>Stay up-to-date with the latest home design trends</p>
                    <a href="#" class="btn btn-dark rounded-0">Click Here</a> </div>
                <div class="plan-name position-absolute"><span>CHERRY CREEK /</span> HOUSE PLAN 2495</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="plan-cta white position-relative mb-2"> <img src="{{ asset('images/plan-cta-2.jpg') }}" alt="" class="img-fluid" />
                <div class="plan-caption position-absolute">
                    <h3>Customers Reviews</h3>
                    <p>Read reviews by our builders and customers</p>
                    <a href="#" class="btn btn-dark rounded-0">Click Here</a> </div>
                <div class="plan-name position-absolute"><span>CHERRY CREEK /</span> HOUSE PLAN 2495</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="plan-cta position-relative mb-2"> <img src="{{ asset('images/plan-cta-3.jpg') }}" alt="" class="img-fluid" />
                <div class="plan-caption position-absolute">
                    <h3>Recent Home Builds</h3>
                    <p>View products our customers love!</p>
                    <a href="#" class="btn btn-dark rounded-0">Click Here</a> </div>
                <div class="plan-name position-absolute"><span>CHERRY CREEK /</span> HOUSE PLAN 2495</div>
            </div>
        </div>
    </div>
    <h1 class="text-center font-futura">AMERICA’S FAVORITE HOUSE PLANS!</h1>
    <div class="row text-center">
        <div class="col-sm-3">
            <div class="plan-grid"> <a href="#"> <img src="{{ asset('images/plan-1.jpg') }}" alt="New House Plans" class="img-fluid" />
                    <p class="plan-name text-truncate"><strong>New House Plans</strong></p>
                    <p class="plan-meta text-truncate">dell’ Azienda Agricola House Plan 4839</p>
                    <p class="shop-link home">Shop New House Plans</p>
                </a> </div>
        </div>
        <div class="col-sm-3">
            <div class="plan-grid"> <a href="#"> <img src="{{asset('images/plan-2.jpg')}}" alt="New House Plans" class="img-fluid" />
                    <p class="plan-name text-truncate"><strong>Craftsman House Plans</strong></p>
                    <p class="plan-meta text-truncate">L’attesa di Vita House Plan 2091</p>
                    <p class="shop-link home">Shop Craftsman House Plans</p>
                </a> </div>
        </div>
        <div class="col-sm-3">
            <div class="plan-grid"> <a href="#"> <img src="{{ asset('images/plan-3.jpg') }}" alt="New House Plans" class="img-fluid" />
                    <p class="plan-name text-truncate"><strong>Farmhouses with Modern Amenities</strong></p>
                    <p class="plan-meta text-truncate">Wyndsong Farm House Plan 2575</p>
                    <p class="shop-link home">Shop Farmhouse Floor Plans</p>
                </a> </div>
        </div>
        <div class="col-sm-3">
            <div class="plan-grid"> <a href="#"> <img src="{{ asset('images/plan-4.jpg') }}" alt="New House Plans" class="img-fluid" />
                    <p class="plan-name text-truncate"><strong>Homes with Outdoor Living Spaces</strong></p>
                    <p class="plan-meta text-truncate">Pleasant Forest House Plan 3230</p>
                    <p class="shop-link home">Shop Outdoor Living Spaces</p>
                </a> </div>
        </div>
    </div>
    <div class="bg-secondary py-3 px-5 text-center home-about">
        <div class="row align-items-center">
            <div class="col-sm-6">
                @if($aboutData->photo)
                    <img src="{{asset('/storage/about/' . $aboutData->photo)}}" alt="David E. Wiggins, Architect" class="img-fluid">
                @endif
            </div>
            <div class="col-sm-6">
                <h4 class="font-weight-bold mb-3">{{ $aboutData->title }}</h4>
                {!! $aboutData->description !!}
                @if($aboutData->url)
                    <p><a href="#" class="btn btn-outline-dark rounded-0 px-5 font-weight-semi-bold">Watch the Video</a></p>
                @endif
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
                            <li>Cottage House Plans</li>
                            <li>Country Home Plans</li>
                            <li>Craftsman House Plans</li>
                            <li>European House Plans</li>
                            <li>Farmhouse Plans</li>
                            <li>French Country House Plans</li>
                            <li>Mediterranean  House Plans</li>
                            <li>Modern House Plans</li>
                            <li>Ranch House Plans</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled text-primary text-center">
                            <li>Cottage House Plans</li>
                            <li>Country Home Plans</li>
                            <li>Craftsman House Plans</li>
                            <li>European House Plans</li>
                            <li>Farmhouse Plans</li>
                            <li>French Country House Plans</li>
                            <li>Mediterranean  House Plans</li>
                            <li>Modern House Plans</li>
                            <li>Ranch House Plans</li>
                        </ul>
                    </div>
                </div>
                <p class="text-right mb-0"><a href="#" class="text-primary font-weight-bold">View ALL Architectural Styles &gt;</a></p>
            </div>
            <div class="col-md-6">
                <h4 class="text-primary text-center font-weight-bold"> Browse by Specialty Collection</h4>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled text-primary text-center">
                            <li>Cottage House Plans</li>
                            <li>Country Home Plans</li>
                            <li>Craftsman House Plans</li>
                            <li>European House Plans</li>
                            <li>Farmhouse Plans</li>
                            <li>French Country House Plans</li>
                            <li>Mediterranean  House Plans</li>
                            <li>Modern House Plans</li>
                            <li>Ranch House Plans</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled text-primary text-center">
                            <li>Cottage House Plans</li>
                            <li>Country Home Plans</li>
                            <li>Craftsman House Plans</li>
                            <li>European House Plans</li>
                            <li>Farmhouse Plans</li>
                            <li>French Country House Plans</li>
                            <li>Mediterranean  House Plans</li>
                            <li>Modern House Plans</li>
                            <li>Ranch House Plans</li>
                        </ul>
                    </div>
                </div>
                <p class="text-right mb-0"><a href="#" class="text-primary font-weight-bold">View ALL Specialty Collections &gt;</a></p>
            </div>
        </div>
    </div>

    <div class="">
        <div class="row">
            <div class="col-md-6">
                <div class="bg-dark py-3 px-4 mh-1">
                    <h4 class="font-weight-bold text-white text-uppercase text-center">Why Buy From Us?</h4>
                    <p class="text-center text-white font-weight-semi-bold mb-4">Complete Architectural Details | Free Product Ideas Best Price Guarantee</p>
                    <p class="text-white">DavidWigginsHousePlans.com offers high quality, ready-to-build house plans designed by the country’s favorite residential architect, David E. Wiggins, and leading architects and designers around the country.  Find home plans in every architectural size and style that come with free modification estimates, free product recommendations and free shipping!</p>
                    <p class="text-white">Be confident when purchasing online house plans from our site as our house plans meet the strict standards of the IRC (International Residential Code) and have the full architectural detailing builders prefer.</p>
                    <p class="text-white">Many of our home plans have photos from customers that show how the same design was built by different clients customized to fit individual needs, budgets, and building lots.  David’s plans also come with a 100% satisfaction exchange policy.</p>
                    <p class="text-white">As you take your first step in building your new home by finding your perfect house plan, know that we’re here to assist you and answer all of your questions along the way. Feel free to contact us by live chat, email or phone at (XXX) XXX-XXXX.  We’d be happy to help in any way that we can!</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mh-1">
                    <div class="bg-secondary py-3 mb-2" style="background:#77787b !important">
                        <h4 class="font-weight-bold text-white text-uppercase text-center">Best Price Guarantee</h4>
                        <div class="px-3">
                            <p class="text-white">David Wiggins House Plans guarantees the lowest prices available online. If you happen to find a better price and you meet the qualifications below, we’ll give you the difference plus an additional 5% discount. This price guarantee also includes pricing for modification estimates.</p>
                            <p class="text-white mb-0">To receive the best price guarantee offer: 1) The lower price must be for the exact same house plan purchased; 2) The plan package must be the exact same plan package and options found elsewhere on the web; 3) A link showing the lower price must be sent; 4) Price applies to total price of purchase excluding shipping, taxes, and other charges that may apply; 5) Claims must be made within 4 days from purchase date.</p>
                        </div>
                    </div>
                    <div class="bg-secondary py-3" style="background:#c6c8ca !important">
                        <h4 class="font-weight-bold text-dark text-uppercase text-center">FREE Modification/Change Estimates</h4>
                        <div class="px-3">
                            <p class="text-dark">Did you find a great home plan, but there’s a few changes you’d like to make? David Wiggins House Plans offers modification services to design the perfect house plan for you and your family.</p>
                            <p class="text-dark mb-0">Modifications can include just about anything you want including adding or removing windows, making rooms bigger or smaller, expanding porches and decks and raising and lowering ceiling heights. Just click on “Customize this Home Plan” on any plan page to get your free modification estimate!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('favorite-mobile')
    <h1 class="text-center font-futura">AMERICA’S FAVORITE HOUSE PLANS!</h1>
    <div class="plan-list my-1">
        <div class="position-relative">
            <div id="modalplan48" class="carousel slide" data-ride="carousel" data-interval="1800">
                <div class="carousel-inner">
                    <div class="carousel-item active"> <img src="{{ asset('images/plan-1.jpg') }}" alt="" class="img-fluid d-block w-100"> </div>
                    <div class="carousel-item"> <img src="{{ asset('images/plan-1.jpg') }}" alt="" class="img-fluid d-block w-100"> </div>
                    <div class="carousel-item"> <img src="{{ asset('images/plan-1.jpg') }}" alt="" class="img-fluid d-block w-100"> </div>
                </div>
                <a class="carousel-control-prev" href="#modalplan48" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#modalplan48" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
            <div class="media planinfo text-left top position-absolute"> <img class="mr-1 align-self-center" src="{{ asset('images/icons/logo-placeholder.png') }}" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-3 mb-0 text-white">plan <span class="text-secondary">4839</span></h5>
                    <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('search-mobile')
            <div class="search-wrap p-2 text-center bg-white">
                <form class="form-main-search text-center">
                    <div class="row no-gutters">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" placeholder="Plan Number" >
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
@endsection

@section('home-mobile-content')
    <div class="plan-list my-1">
        <div class="position-relative">
            <div id="modalplan" class="carousel slide" data-ride="carousel" data-interval="1800">
                <div class="carousel-inner">
                    <div class="carousel-item active"> <img src="{{ asset('images/plan-1.jpg') }}" alt="" class="img-fluid d-block w-100"> </div>
                    <div class="carousel-item"> <img src="{{ asset('images/plan-1.jpg') }}" alt="" class="img-fluid d-block w-100"> </div>
                    <div class="carousel-item"> <img src="{{ asset('images/plan-1.jpg') }}" alt="" class="img-fluid d-block w-100"> </div>
                </div>
                <a class="carousel-control-prev" href="#modalplan48" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#modalplan48" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
            <div class="media planinfo text-left top position-absolute"> <img class="mr-1 align-self-center" src="{{ asset('images/icons/logo-placeholder.png') }}" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-3 mb-0 text-white">plan <span class="text-secondary">4839</span></h5>
                    <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h4 class="font-weight-bold text-center mb-0">NEW HOUSE PLANS</h4>
        <p class="lead text-center font-weight-semi-bold mb-2">by America’s leading architect </p>
        <div class="bg-secondary w-75 mx-auto mb-3 pb-1"></div>
        <div class="home-about">
            <p>Buying house plans on DavidWigginsHousePlans.com means you’re buying direct from America’s favorite residential architect, David E. Wiggins!  When purchasing online house plans from our site, be confident in knowing that our home plans have been built in every state in the U.S. and many countries around the globe.  David’s home designs are also guaranteed to include full architectural detailing that builders need to build safe and efficient houses  From craftsman home plans to small house plans to modern floor plans, you’ll find easy to build and easy to customize house plans in a wide variety of styles and sizes. </p>
        </div>
        <h4 class="font-weight-bold text-center mb-2">SIGN UP AND SAVE</h4>
        <div class="input-group input-group-sm mb-2 mx-auto w-75">
            <input type="text" class="form-control rounded-0 border-secondary" placeholder="ENTER YOUR EMAIL ADDRESS">
            <div class="input-group-append">
                <button class="btn btn-primary rounded-0 text-uppercase text-white font-weight-semi-bold px-3" type="button">&gt;</button>
            </div>
        </div>
        <img src="{{ asset('images/plan-4.jpg') }}" alt="New House Plans" class="img-fluid w-100 my-2">
        <h4 class="font-weight-bold text-center mb-0">BEST-SELLING HOUSE PLANS</h4>
        <p class="lead text-center font-weight-semi-bold">America’s most popular designs</p>
        <h5 class="font-weight-bold text-center text-primary">Browse Our Architectural Styles</h5>
        <div class="row">
            <div class="col">
                <ul class="list-unstyled text-primary">
                    <li>Cottage House Plans</li>
                    <li>Country Home Plans</li>
                    <li>Craftsman House Plans</li>
                    <li>European House Plans</li>
                    <li>Farmhouse House Plans</li>
                </ul>
            </div>
            <div class="col">
                <ul class="list-unstyled text-primary">
                    <li>French Country Homes </li>
                    <li>Mediterranean Homes</li>
                    <li>Modern House Plans</li>
                    <li>Ranch House Plans</li>
                    <li>Small House Plans</li>
                </ul>
            </div>
        </div>
        <p class="text-center font-weight-bold"><a href="#" class="d-block text-primary">View ALL Architectural Styles &gt;</a><a href="#" class="d-block text-primary">View ALL Specialty Collections &gt;</a></p>
        <div class="home-about">
            <h4 class="text-center font-weight-bold mb-3">Why Buy From Us?</h4>
            <p class="text-center">Complete Architectural Details | Free Product Ideas Best Price Guarantee</p>
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
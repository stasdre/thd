@extends('layouts.app')

@section('content')
    <section class="section-hero">
        <div class="container-fluid">
            <div class="row">
                <div class="slider-hero">
                    @foreach($gallery as $img)
                        <div class="slide-item">
                        <div class="hero-card" style="background-image: url({{ asset('/storage/gallery/'.$img->file) }})" >
                            <ul class="hero-label house-label house-label-lg">
                                <li>{{ $img->name }}</li>
                            </ul>

                            <div class="hero-quote-wrap">
                                <div class="hero-quote">
                                    {!! $img->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="main-search">
        <div class="container-fluid">
            <div class="row">
                <div class="main-search-inner col-sm-12">
                    <div class="main-search-content">
                        <form class="form-main-search form-inline">
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
                            <div class="form-group">
                                <input type="number" placeholder="Min sq. ft." >
                            </div>
                            <div class="form-group">
                                <input type="number" placeholder="Max sq. ft." >
                            </div>
                            <button type="submit" class="btn btn-primary" >Search</button>
                        </form>
                    </div>
                    <div class="main-search-aside">
                        <a class="advanced-options-link" href="#link">ADVANCED OPTIONS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-best">
        <div class="container-fluid">
            <div class="row">
                <div class="section-header section-header-columns col-sm-12">
                    <div class="section-header-left">
                        <div class="faq-box">
                            <h3 class="faq-title">FAQs</h3>
                            <p class="faq-description">Frequently Asked Questions</p>
                        </div>
                    </div>
                    <div class="section-header-center">
                        <h2 class="section-title">FIND YOUR DREAM HOME! </h2>
                    </div>
                    <div class="section-header-right">
                        <div class="newsletter-box">
                            <h6 class="newsletter-title">DW HOUSEPLANS <span>NEWSLETTER</span></h6>
                            <form class="form-newsletter">
                                <input type="email" placeholder="Email Address" required >
                                <button type="submit" >SIGN UP</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="best-item col-xs-12">
                    <div class="best-card best-card-hero" style="background-image: url({{asset('img/page-home/best/best-item-1-lg.png')}})" >
                        <ul class="best-label house-label house-label-lg">
                            <li>CHERRY CREEK</li>
                            <li class="active" >HOUSE PLAN 2495</li>
                        </ul>
                        <div class="best-inner">
                            <h2 class="best-title">America’s Favorite Homes</h2>
                            <p class="best-description">View America’s favorite house plans from leading architect David E. Wiggins</p>
                            <a href="#link" class="best-action btn btn-sm">Click Here</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="best-grid">
                    <div class="best-item col-xs-12 col-sm-4">
                        <div class="best-card" style="background-image: url({{asset('img/page-home/best/best-item-2.png')}})" >
                            <ul class="best-label house-label">
                                <li>HOUSE PLAN 2495</li>
                            </ul>
                            <div class="best-inner">
                                <h5 class="best-title">Recent Blogs</h5>
                                <p class="best-description">Stay up-to-date with the latest home design trends</p>
                                <a href="#link" class="best-action btn btn-sm">Click Here</a>
                            </div>
                        </div>
                    </div>

                    <div class="best-item col-xs-12 col-sm-4">
                        <div class="best-card" style="background-image: url({{asset('img/page-home/best/best-item-3.png')}})" >
                            <ul class="best-label house-label">
                                <li>HOUSE PLAN 1698</li>
                            </ul>
                            <div class="best-inner">
                                <h5 class="best-title">Customers Reviews</h5>
                                <p class="best-description">Read reviews by our builders and customers</p>
                                <a href="#link" class="best-action btn btn-sm">Click Here</a>
                            </div>
                        </div>
                    </div>

                    <div class="best-item col-xs-12 col-sm-4">
                        <div class="best-card" style="background-image: url({{asset('img/page-home/best/best-item-4.png')}})" >
                            <ul class="best-label house-label">
                                <li>HOUSE PLAN 2466</li>
                            </ul>
                            <div class="best-inner">
                                <h5 class="best-title">Recent Home Builds</h5>
                                <p class="best-description">View products our customers love!</p>
                                <a href="#link" class="best-action btn btn-sm">Click Here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-favorite">
        <div class="container-fluid">
            <div class="row">
                <div class="section-header col-sm-12">
                    <h2 class="section-title">AMERICA’S FAVORITE HOUSE PLANS!</h2>
                </div>
            </div>
            <div class="row">
                <div class="favorite-grid">
                    <div class="favorite-item col-xs-12 col-sm-4 col-md-3">
                        <div class="favorite-card">
                            <a href="#link" class="favorite-link"></a>
                            <div class="favorite-thumb" style="background-image: url({{asset('img/page-home/favorite/favorite-item-1.png')}})" ></div>
                            <div class="favorite-inner">
                                <h6 class="favorite-title">New House Plans</h6>
                                <p class="favorite-description">dell’ Azienda Agricola House Plan 4839</p>
                                <p class="favorite-action">Shop New House Plans</p>
                            </div>
                        </div>
                    </div>
                    <div class="favorite-item col-xs-12 col-sm-4 col-md-3">
                        <div class="favorite-card">
                            <a href="#link" class="favorite-link"></a>
                            <div class="favorite-thumb" style="background-image: url({{asset('img/page-home/favorite/favorite-item-2.png')}})" >
                            </div>
                            <div class="favorite-inner">
                                <h6 class="favorite-title">Craftsman House Plans</h6>
                                <p class="favorite-description">L’attesa di Vita House Plan 2091</p>
                                <p class="favorite-action">Shop Craftsman Home Plans</p>
                            </div>
                        </div>
                    </div>
                    <div class="favorite-item col-xs-12 col-sm-4 col-md-3">
                        <div class="favorite-card">
                            <a href="#link" class="favorite-link"></a>
                            <div class="favorite-thumb" style="background-image: url({{asset('img/page-home/favorite/favorite-item-3.png')}})" ></div>
                            <div class="favorite-inner">
                                <h6 class="favorite-title">Farmhouses with Modern Amenities</h6>
                                <p class="favorite-description">Wyndsong Farm House Plan 2575</p>
                                <p class="favorite-action">Shop Farmhouse Floor Plans</p>
                            </div>
                        </div>
                    </div>
                    <div class="favorite-item col-xs-12 col-sm-4 col-md-3">
                        <div class="favorite-card">
                            <a href="#link" class="favorite-link"></a>
                            <div class="favorite-thumb" style="background-image: url({{asset('img/page-home/favorite/favorite-item-4.png')}})" ></div>
                            <div class="favorite-inner">
                                <h6 class="favorite-title">Homes with Outdoor Living Spaces</h6>
                                <p class="favorite-description">Pleasant Forest House Plan 3230</p>
                                <p class="favorite-action">Shop Outdoor Living Spaces</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-about">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="author-aside">
                        <img src="{{asset('img/page-home/about/about-author.png')}}" alt="David E. Wiggins, Architect" class="img-author">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="author-inner">
                        <h4 class="author-title">About David E. Wiggins, Architect</h4>
                        <div class="author-description">
                            <p>David E Wiggins, Architect is one of the nation’s leading home designers and providers of stock house plans. His interest in stock house plans rose out of a perceived need to provide affordable, high quality home designs to the masses. This venue also presents a freedom to be creative in a way that custom designs for specific clients or builders cannot.</p>
                            <p>Our designs begin with pure function and grow into something interesting and unique, every design is pushed beyond 100%. We do not recreate the same design over and over with slight tweaks or throw mud against the wall to see what sticks. We want every design to stand on its own as a unique work of art.</p>
                        </div>
                        <a href="#link" class="author-btn btn btn-lg btn-outline">Watch the Video</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
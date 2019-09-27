@extends('layouts.inspiration')
@section('content')
<div class="center mid-heading py-3">
    <h2 class="blue-text mid-main-title">Design Inspiration</h2>
    <h4 class="mid-heading-black mobile-off">Product ideas for beautiful and innovative living spaces</h4>
    <h4 class="mid-heading-black desktop-off">Product ideas for beautiful living spaces</h4>
</div>

<div id="carouselmain" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
    @foreach ($sliders as $slider)        
        <div class="carousel-item @if($loop->iteration === 1) active @endif">
            <div class="slides row center david-home">
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column justify-content-between align-items-center blue-bg">
                    @if ($slider->title)                
                        <h1 class="HI-davidhomeheading">{{$slider->title}}</h1>
                    @endif
                    <div class="HI-davidhome text-center">
                        {!!$slider->desc!!}
                    </div>
                    <div>
                        @if ($slider->logo_img)                    
                            <img class="img-fluid" src="{{asset('storage/inspiration-slider/'.$slider->logo_img)}}">
                        @endif
                    </div>
                    <div>
                        @if ($slider->brochure_link || $slider->locator_link)                            
                            <div class="bottom-text"> 
                                @if ($slider->brochure_link)                                    
                                    <a href="{{$slider->brochure_link}}"><span style="color:#fff;" class="bottom-text-left">View brochure</span></a> | 
                                @endif
                                @if ($slider->locator_link)                                
                                    <a href="{{$slider->locator_link}}"><span style="color:#fff;" class="bottom-text-right">Product locator</span></a>
                                @endif
                            </div>
                        @endif
                    </div>            
                </div>
            </div>
            <div class="col-12 col-md-6">
                @if ($slider->slider_img)    
                <div class="inspiration-slider embed-responsive embed-responsive-4by3"> 
                    <img class="embed-responsive-item" src="{{asset('storage/inspiration-slider/'.$slider->slider_img)}}">
                </div>
                @endif
            </div>
            </div>
        </div>
    @endforeach

    <a class="carousel-control-prev" href="#carouselmain" role="button" data-slide="prev"
        style="left: 510px;">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselmain" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
</div>

<div class="row py-3">
    <div class="col-6 center mobile-off">
    <p class="signups-heading ">SIGN UP FOR OUR WEEKLY E-PUBS</p>
    <input type="text" name="" placeholder="Enter your email address" class="page-inspiration-input">
    <button class="btn btn-primary rounded-0 inspiration-signup-btn font-weight-semi-bold" type="button">Sign
        Up</button>
    </div>
    <div class="col-12 col-md-6 center">
    <p class="signups-heading">SEARCH ALL ARTICLES</p>
    <input type="text" name="" placeholder="Enter topic" class="page-inspiration-input">
    <button class="btn btn-primary rounded-0 inspiration-signup-btn font-weight-semi-bold"
        type="button">Go</button>
    </div>
</div>
<div class="row HI-secC py-2 mobile-off">
    <div class="col-12 col-md-6 center">
    <img src="/images/HP-imageA.jpg" class="full-image">
    <div class="py-2">
        <h5 style="margin-bottom :0;" class="f14 mobile-off info-title"> HOW THE WIGGINS CREATED THEIR DREAM
        HOME</h5>
        <h5 style="margin-bottom :0;" class="desktop-off title info-title"> THE WIGGINS CREATE THEIR DREAM HOME
        </h5>
        <div class="author_title">DAVID & LIZ</div>
        <div class="author_info">Best-Selling Architect David Wiggins and his wife open up about
        the joy and challenges of building a new home.
        </div>
        <div><a href="" class="HP_links">WATCH VIDEO <i class="fa fa-chevron-right"></i></a></div>
    </div>

    </div>
    <div class="col-12 col-md-6 center">
    <img src="/images/HP-imageB.jpg" class="full-image">
    <div class="py-2">
        <h5 style="margin-bottom :0;" class="f14 info-title">BEHIND THE DESIGN</h5>
        <div class="author_title">A HOME BLOG JOURNAL</div>
        <div class="author_info">Find out where David’s inspiration comes from, see our <br>latest house plans
        and great product ideas.</div>
        <div><a href="" class="HP_links">READ NOW <i class="fa fa-chevron-right"></i></a></div>
    </div>

    </div>

</div>



<div class="row HI-secC py-2 desktop-off">
    <div class="col-12 col-md-6 center">
    <img src="/images/HP-imageA.jpg" class="full-image">
    <div class="py-2">
        <h5 style="margin-bottom :0;" class="f14 mobile-off info-title"> HOW THE WIGGINS CREATED THEIR DREAM
        HOME</h5>
        <h5 style="margin-bottom :0;" class="desktop-off title info-title"> THE WIGGINS CREATE THEIR DREAM HOME
        </h5>
        <div class="author_title">DAVID & LIZ</div>
        <div class="author_info">Best-Selling Architect David Wiggins and his wife open up about
        the joy and challenges of building a new home.
        </div>
        <div><a href="" class="HP_links">WATCH VIDEO <i class="fa fa-chevron-right"></i></a></div>
    </div>

    </div>
    <div class="col-12 col-md-6 center">
    <img src="/images/HP-imageB.jpg" class="full-image">
    <div class="py-2">
        <h5 style="margin-bottom :0;" class="f14 info-title">BEHIND THE DESIGN</h5>
        <div class="author_title">A HOME BLOG JOURNAL</div>
        <div class="author_info">Find out where David’s inspiration comes from, see our latest house plans and
        great product ideas.</div>
        <div><a href="" class="HP_links">READ NOW <i class="fa fa-chevron-right"></i></a></div>
    </div>

    </div>

</div>





<hr>
<div class="desktop-off center HI-slider-text">
    <h5>INNOVATIVE PRODUCTS TO<br> DESIGN FUNCTIONAL AND<br> BEAUTIFUL LIVING SPACES</h5>
    <p> <span class="styled_text">Home Inspiration</span> is a comprehensive resource center where consumers and
    builders can learn about new and innovative interior and exterior home building products.  This is the
    place to find great home design ideas and building tips to build a beautiful home on time and on budget.
    View <a href="">photographs of recent homes</a> featuring <a href="">David Wiggins House Plans</a>, read
    the <a href="">latest design and product reviews</a>, hear about our <a href="">customer’s success
        stories</a>, <a href="">find a builder</a> and <a href="">get social </a>with consumers like yourself to
    discuss your home building joys and challenges.</p>
    <div id="carousel2" class="carousel slide" data-ride="carousel" data-interval="false">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <div class="slides row center">
            <div class="col-12">
            <div style=""><img src="/images/jeld-wen.jpg"></div>
            <div class="p_title center">Jeld-Wen Windows </div>
            <div><a href="" class="HP_links">View All Products <i class="fas fa fa-chevron-right"></i></a>
            </div>
            </div>
        </div>
        </div>
        <div class="carousel-item">
        <div class="slides row center">
            <div class="col-12">
            <div style=""><img src="/images/gaf-roofing.png"></div>
            <div class="p_title center">GAF Roofing </div>
            <div><a href="" class="HP_links">View All Products <i class="fa fa-chevron-right"></i></a></div>
            </div>
        </div>
        </div>

        <div class="carousel-item">
        <div class="slides row center">
            <div class="col-12">
            <div style="" class=""><img src="/images/clopay.png"></div>
            <div class="p_title center">Clopay Garage Doors
            </div>
            <div><a href="" class="HP_links">View All Products <i class="fa fa-chevron-right"></i></a></div>

            </div>
        </div>
        </div>
        <div class="carousel-item">
        <div class="slides row center">
            <div class="col-12">
            <div style=""><img src="/images/kraft-maid.jpg"></div>
            <div class="p_title center">KraftMaid Cabinetry </div>
            <div><a href="" class="HP_links">View All Products <i class="fas fa fa-chevron-right"></i>
                </a></div>
            </div>
        </div>
        </div>
        <div class="carousel-item">
        <div class="slides row center">
            <div class="col-12">
            <div style=""><img src="/images/royal-building.png"></div>
            <div class="p_title center">Royal Building Products</div>
            <div><a href="" class="HP_links">View All Products <i class="fa fa-chevron-right"></i></a></div>

            </div>
        </div>
        </div>
        <div class="carousel-item">
        <div class="slides row center">
            <div class="col-12">
            <div style=""><img src="/images/royal-building.png"></div>
            <div class="p_title center">Royal Building Products</div>
            <div><a href="" class="HP_links">View All Products <i class="fa fa-chevron-right"></i></a></div>

            </div>
        </div>
        </div>
        <div class="carousel-item">
        <div class="slides row center">
            <div class="col-12">
            <div style="" class=""><img src="/images/meon.png"></div>
            <div class="p_title center">Moen Faucets</div>
            <div><a href="" class="HP_links">View All Products <i class="fa fa-chevron-right"></i></a></div>

            </div>
        </div>
        </div>
        <div class="carousel-item">
        <div class="slides row center">
            <div class="col-12">
            <div style=""><img src="/images/amercan.png"></div>


            <div class="p_title center">Amercan Standard</div>
            <div><a href="" class="HP_links">View All Products <i class="fa fa-chevron-right"></i></a></div>
            </div>

        </div>
        </div>

        <a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
    </div>
</div>
<div class="center mobile-off">
    <h3 class="blue-text" style="font-size : 24px;"> INNOVATIVE PRODUCTS TO DESIGN FUNCTIONAL AND BEAUTIFUL
    LIVING SPACES </h3>
    <div class="row py-3 HI-slidearea">
    <div class="col-6 col-lg-3">
        <div style=""><img src="/images/jeld-wen.jpg"></div>
        <div class="p_title center">Jeld-Wen Windows </div>
        <div><a href="" class="HP_links">View All Products <i class="fas fa fa-chevron-right newfa"></i></a>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div style=""><img src="/images/gaf-roofing.png"></div>
        <div class="p_title center">GAF Roofing
        </div>
        <div><a href="" class="HP_links">View All Products <i class="fa fa-chevron-right"></i></a></div>

    </div>
    <div class="col-6 col-lg-3">
        <div style="" class=""><img src="/images/clopay.png"></div>
        <div class="p_title center">Clopay Garage Doors
        </div>
        <div><a href="" class="HP_links">View All Products <i class="fa fa-chevron-right"></i></a></div>

    </div>
    <div class="col-6 col-lg-3">
        <div style=""><img src="/images/coronado.png"></div>


        <div class="p_title center">Coronado Stone
        </div>
        <div><a href="" class="HP_links">View All Products <i class="fa fa-chevron-right"></i></a></div>
    </div>

    </div>

    <div class="row py-3 HI-slidearea">
    <div class="col-6 col-lg-3">
        <div style=""><img src="/images/kraft-maid.jpg"></div>
        <div class="p_title center">KraftMaid Cabinetry

        </div>
        <div><a href="" class="HP_links">View All Products <i class="fas fa fa-chevron-right"></i>
        </a></div>
    </div>
    <div class="col-6 col-lg-3">
        <div style=""><img src="/images/royal-building.png"></div>
        <div class="p_title center">Royal Building Products</div>
        <div><a href="" class="HP_links">View All Products <i class="fa fa-chevron-right"></i></a></div>

    </div>
    <div class="col-6 col-lg-3">
        <div style="" class=""><img src="/images/meon.png"></div>
        <div class="p_title center">Moen Faucets</div>
        <div><a href="" class="HP_links">View All Products <i class="fa fa-chevron-right"></i></a></div>

    </div>
    <div class="col-6 col-lg-3">
        <div style=""><img src="/images/amercan.png"></div>


        <div class="p_title center">Amercan Standard</div>
        <div><a href="" class="HP_links">View All Products <i class="fa fa-chevron-right"></i></a></div>
    </div>

    </div>

</div>
<div class="row py-3 HI-secE mobile-off">
    <div class="col-12 col-md-6 center">
    <img src="/images/home10.png" class="full-image">
    <div class="py-2">
        <h5 class="author_title" style="margin-bottom : 0;"> DAVID’S WEEKLY E-PUB</h5>
        <div class="author_info">New plans, promotions and great home product recommendations</div>
        <div><a href="" class="HP_links">SIGN UP NOW <i class="fa fa-chevron-right"></i></a></div>
    </div>
    </div>
    <div class="col-12 col-md-6 center">
    <img src="/images/home11.png" class="full-image">
    <div class="py-2">
        <h5 class="author_title" style="margin-bottom : 0;"> HOUZZ </h5>
        <div class="author_info">See photographs of our customer’s favorite house plans</div>
        <div><a href="" class="HP_links">VIEW NOW <i class="fa fa-chevron-right"></i></a></div>
    </div>
    </div>
</div>
<div class="row py-3 HI-secE desktop-off">
    <div class="col-12 col-md-6 center">
    <img src="/images/home11.png" class="full-image">
    <div class="py-2">
        <h5 class="author_title" style="margin-bottom : 0;"> DAVID’S WEEKLY E-PUB</h5>
        <div class="author_info">New Plans, promotions and great home product recommendations</div>
        <div><a href="" class="HP_links">SIGN UP NOW<i class="fa fa-chevron-right"></i></a></div>
    </div>
    </div>
    <div class="col-12 col-md-6 center">
    <img src="/images/home10.png" class="full-image">
    <div class="py-2">
        <h5 class="author_title" style="margin-bottom : 0;"> HOUZZ </h5>
        <div class="author_info">Recent home builds of our customers favorite homes </div>
        <div><a href="" class="HP_links">VIEW NOW <i class="fa fa-chevron-right"></i></a></div>
    </div>
    </div>
</div>

@endsection
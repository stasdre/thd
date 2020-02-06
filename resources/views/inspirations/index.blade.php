@extends('layouts.inspiration')

@section('title', $blocks->meta_title)
@section('description', $blocks->meta_desc)
@section('keywords', $blocks->meta_keywords)

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
                <a href="{{$slider->brochure_link}}"><span style="color:#fff;" class="bottom-text-left">View
                    brochure</span></a> |
                @endif
                @if ($slider->locator_link)
                <a href="{{$slider->locator_link}}"><span style="color:#fff;" class="bottom-text-right">Product
                    locator</span></a>
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

    <a class="carousel-control-prev" href="#carouselmain" role="button" data-slide="prev" style="left: 510px;">
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
    <button class="btn btn-primary rounded-0 inspiration-signup-btn font-weight-semi-bold" type="button">Go</button>
  </div>
</div>
<div class="row HI-secC py-2">
  <div class="col-12 col-md-6 center">
    <div class="inspiration-slider embed-responsive embed-responsive-4by3">
      <img src="{{asset('storage/inspiration-blocks/'.$blocks->img_l_t)}}" class="embed-responsive-item">
    </div>
    <div class="py-2">
      @if ($blocks->first_title_l_t)
      <h5 style="margin-bottom :0;" class="f14 info-title">{{$blocks->first_title_l_t}}</h5>
      @endif
      @if ($blocks->title_l_t)
      <div class="author_title">{{$blocks->title_l_t}}</div>
      @endif
      @if ($blocks->desc_l_t)
      <div class="author_info">
        {!!$blocks->desc_l_t!!}
      </div>
      @endif
      @if ($blocks->link_l_t && $blocks->link_name_l_t)
      <div><a href="{{$blocks->link_l_t}}" class="HP_links">{{$blocks->link_name_l_t}}<i
            class="fa fa-chevron-right"></i></a></div>
      @endif
    </div>

  </div>
  <div class="col-12 col-md-6 center">
    <div class="inspiration-slider embed-responsive embed-responsive-4by3">
      <img src="{{asset('storage/inspiration-blocks/'.$blocks->img_r_t)}}" class="embed-responsive-item">
    </div>
    <div class="py-2">
      @if ($blocks->first_title_r_t)
      <h5 style="margin-bottom :0;" class="f14 info-title">{{$blocks->first_title_r_t}}</h5>
      @endif
      @if ($blocks->title_r_t)
      <div class="author_title">{{$blocks->title_r_t}}</div>
      @endif
      @if ($blocks->desc_r_t)
      <div class="author_info">
        {!!$blocks->desc_r_t!!}
      </div>
      @endif
      @if ($blocks->link_name_r_t && $blocks->link_r_t)
      <div><a href="{{$blocks->link_r_t}}" class="HP_links">{{$blocks->link_name_r_t}}<i
            class="fa fa-chevron-right"></i></a></div>
      @endif
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
      @foreach ($products as $product)
      <div class="carousel-item @if($loop->iteration === 1) active @endif">
        <div class="slides row center">
          <div class="col-12">
            <div class="embed-responsive embed-responsive-1by1">
              <img class="embed-responsive-item" src="{{asset('storage/inspiration-products/'.$product->img)}}">
            </div>
            <div class="p_title center">{{$product->name}}</div>
            <div>
              @if ($product->link_name && $product->link)
              <a href="{{$product->link}}" class="HP_links">{{$product->link_name}} <i
                  class="fas fa fa-chevron-right newfa"></i></a>
              @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach

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
    @foreach ($products as $product)
    @if ($loop->iteration % 5 === 0)
  </div>
  <div class="row py-3 HI-slidearea">
    @endif

    <div class="col-6 col-lg-3">
      <div class="embed-responsive embed-responsive-1by1">
        <img class="embed-responsive-item" src="{{asset('storage/inspiration-products/'.$product->img)}}">
      </div>
      <div class="p_title center">{{$product->name}}</div>
      <div>
        @if ($product->link_name && $product->link)
        <a href="{{$product->link}}" class="HP_links">{{$product->link_name}} <i
            class="fas fa fa-chevron-right newfa"></i></a>
        @endif
      </div>
    </div>
    @endforeach
  </div>
</div>
<div class="row py-3 HI-secE">
  <div class="col-12 col-md-6 center">
    <div class="inspiration-slider embed-responsive embed-responsive-4by3">
      <img src="{{asset('storage/inspiration-blocks/'.$blocks->img_b_l)}}" class="embed-responsive-item">
    </div>
    <div class="py-2">
      @if ($blocks->first_title_b_l)
      <h5 style="margin-bottom :0;" class="f14 info-title">{{$blocks->first_title_b_l}}</h5>
      @endif
      @if ($blocks->title_b_l)
      <div class="author_title">{{$blocks->title_b_l}}</div>
      @endif
      @if ($blocks->desc_b_l)
      <div class="author_info">
        {!!$blocks->desc_b_l!!}
      </div>
      @endif
      @if ($blocks->link_b_l && $blocks->link_name_b_l)
      <div><a href="{{$blocks->link_b_l}}" class="HP_links">{{$blocks->link_name_b_l}}<i
            class="fa fa-chevron-right"></i></a></div>
      @endif
    </div>
  </div>
  <div class="col-12 col-md-6 center">
    <div class="inspiration-slider embed-responsive embed-responsive-4by3">
      <img src="{{asset('storage/inspiration-blocks/'.$blocks->img_b_r)}}" class="embed-responsive-item">
    </div>
    <div class="py-2">
      @if ($blocks->first_title_b_r)
      <h5 style="margin-bottom :0;" class="f14 info-title">{{$blocks->first_title_b_r}}</h5>
      @endif
      @if ($blocks->title_b_r)
      <div class="author_title">{{$blocks->title_b_r}}</div>
      @endif
      @if ($blocks->desc_b_r)
      <div class="author_info">
        {!!$blocks->desc_b_r!!}
      </div>
      @endif
      @if ($blocks->link_name_b_r && $blocks->link_b_r)
      <div><a href="{{$blocks->link_b_r}}" class="HP_links">{{$blocks->link_name_b_r}}<i
            class="fa fa-chevron-right"></i></a></div>
      @endif
    </div>
  </div>
</div>
@endsection
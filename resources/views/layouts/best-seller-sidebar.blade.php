<div class="col-12 col-md-4 contact-us-right-sidebar mobile-off">
  @foreach ($plans as $plan)
  @if ($loop->iteration === 2)
  <div class="row">
    <div class="col-md-12 mt-3 black_banner" style="background-image:url('images/black-banner.jpg');">
      <div class="text-center blackBanner">
        <h3 class="font-futura">SIGN UP + SAVE!</h3>
        <span class="font-futura bigFont">10%</span> &nbsp;&nbsp;<span style="font-size: 31px;">off</span>
        <p>Plus, get exclusive access to new <br> house plans and great product ideas!</p>
        <input name="email" class="email_class text-center" type="text" placeholder="Enter your email address"
          style="width : 75%;"><br>
        <button class="coupon_code">GET MY COUPON</button>
      </div>
    </div>
  </div>
  @endif
  <div class="row">
    <div class="col-sm-12">
      @if ($loop->iteration === 1)
      <h5 style="font-weight: bold;font-size: 18px;" class="contact-right-sidebar-heading">View Our Best-Selling House
        Plans</h5>
      @endif
      <div class="plan-list mt-3">
        <div class="row align-items-center py-2 px-1">
          <div class="col-8">
            <p class="plan-name font-weight-bold mb-0">{{$plan->square_ft['str_total']}} sq ft | <span
                class="text-white">plan
                {{$plan->plan_number}}</span>
            </p>
          </div>
          <div class="col-4">
            <ul class="list-inline mb-0 text-right font-icons">
              <li class="list-inline-item icon-heart-mob"><a href=""><i class="far fa-heart" style="color:white"></i>
                  <!--<img src="images/icons/icon-favourite.png" alt="">--></a></li>
              <li class="list-inline-item icon-search-mob"><a href=""><i class="fa fa-search" style="color:white"></i>
                  <!--<img src="images/icons/icon-search-w.png" alt="">--></a></li>
            </ul>
          </div>
        </div>
        <div class="position-relative">
          <div id="{{$plan->plan_number}}" class="carousel slide" data-ride="carousel" data-interval="false">
            <a href="/plan/{{$plan->plan_number}}" class="carousel-inner">
              @foreach ($plan->images as $img)
              <div class="carousel-item @if($loop->iteration == 1) active @endif">
                <div class="embed-responsive embed-responsive-4by3 percent-69">
                  <img src="/storage/plans/{{$plan->id}}/thumb/{{$img->file_name}}" alt=""
                    class="embed-responsive-item">
                </div>
                @if ($img->camera_icon)
                <a href="#" class="position-absolute icon-camera"><img src="{{asset('images/icons/icon-camera.png')}}"
                    alt=""></a>
                @endif
              </div>
              @endforeach
            </a>
            <a class="carousel-control-prev" href="#{{$plan->plan_number}}" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="false"></span> <span class="sr-only">Previous</span>
            </a> <a class="carousel-control-next" href="#{{$plan->plan_number}}" role="button" data-slide="next"> <span
                class="carousel-control-next-icon" aria-hidden="false"></span> <span class="sr-only">Next</span> </a>
          </div>
          <div class="media planinfo text-left position-absolute placeholder-black"> <img class="mr-1 align-self-center"
              src="images/icons/logo-placeholder.png" alt="Generic placeholder image">
            <div class="media-body">
              <h5 class="mb-0 text-white">plan <span class="text-secondary">{{$plan->plan_number}}</span></h5>
              <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
            </div>
          </div>
          <a href="#" class="position-absolute pinterest"><img src="/images/icons/icon-pinterest.png" alt=""></a>
        </div>
        <div class="row no-gutters plan-info">
          <div class="col bg-light"> bed<strong class="d-block">{{$plan->rooms['r_bedrooms']}}</strong>
          </div>
          <div class="col"> bath<strong class="d-block">{{$plan->rooms['r_full_baths']}}</strong> </div>
          <div class="col bg-light"> story<strong class="d-block">{{$plan->dimensions['stories']}}</strong> </div>
          <div class="col"> gar<strong class="d-block">{{$plan->garage['car']}}</strong> </div>
          <div class="col bg-light"> width<span class="d-block">{{$plan->dimensions['width_ft']}}’
              {{$plan->dimensions['width_in']}}"</span> </div>
          <div class="col"> depth<span class="d-block">{{$plan->dimensions['depth_ft']}}’
              {{$plan->dimensions['depth_in']}}”</span> </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
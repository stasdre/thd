@extends('layouts.builders')

@section('title', "Builders")

@section('content')
<div class="row HI-secC preff_first_sec">
  <div class="col-12 col-md-6 center prefimg_mobmargin prefmob_padding">
    <img src="{{asset('/storage/builders/'.$blocks->img_l)}}" class="full-image">
    <div class="img_footer_text">
      <p>{{$blocks->img_title_l}}</p>
    </div>
    <div class="lattesa_text">
      <h5 style="margin-bottom :0;" class="f14 info-title">{{$blocks->first_title_l}}</h5>
      <div class="wason_home_build">{{$blocks->title_l}}</div>
      <div class="author_info">{!!$blocks->desc_l!!}</div>
      <div class="orange_btn"><a href="{{$blocks->link_l}}">{{$blocks->link_name_l}}</a></div>
    </div>
  </div>
  <div class="col-12 col-md-6 center prefmob_padding">
    <img src="{{asset('/storage/builders/'.$blocks->img_r)}}" class="full-image">
    <div class="img_footer_text">
      <p>{{$blocks->img_title_r}}</p>
    </div>
    <div class="lattesa_text">
      <h5 style="margin-bottom :0;" class="f14 info-title">{{$blocks->first_title_r}}</h5>
      <div class="wason_home_build">{{$blocks->title_r}}</div>
      <div class="author_info">{!!$blocks->desc_r!!}</div>
      <div class="orange_btn"><a href="{{$blocks->link_r}}">{{$blocks->link_name_r}}</a></div>
    </div>
  </div>
</div>
<hr class="pref_border">
<div class="center blue-text mobile-off recently_build">
  <h4>Recently Built Homes by Our Preferred Builders</h4>
</div>
<div class="center blue-text desktop-off recent_homes">
  <h6>Recent Homes by Our Preferred Builders</h6>
</div>
<div class="row HI-secC py-2">
  @foreach ($recently as $item)
  <div class="col-12 col-md-6 center prefimg_mobmargin prefmob_padding">
    <img src="{{asset('/storage/builders/'.$item->recently_img)}}" class="full-image">
    {{-- <div class="img_footer_text">
      <p>Featured Builder - Wasson Home Builders, CO</p>
    </div> --}}
    <div class="lattesa_text">
      <p style="margin-bottom :0;" class="info-title">{{$item->title}}</p>
      <div class="wason_home_build">{{$item->recently_title}}</div>
      <div class="denver_colrado">{{$item->recently_city}}, {{$item->recently_state}}</div>
      @if ($item->phtoto_link)
      <div class="view_all_photo"><a target="_blank" href="{{$item->phtoto_link}}" class="blue-text">View All Photos <i
            class="fas fa fa-chevron-right"></i></a></div>
      @endif
      @if ($item->recently_contact_link)
      <div class="orange_btn"><a target="_blank" href="{{$item->recently_contact_link}}">Contact</a></div>
      @endif
    </div>
  </div>
  @endforeach

</div>


<div class="center mobile-off insipiration_below_slider_outer">
  <div class="row py-3 insipiration_below_slider_outer">
    @foreach ($builders as $item)
    <div class="col-3">
      <div class="embed-responsive embed-responsive-4by3 percent-82">
        @if ($item->view_photo_link)
        <a href="{{$item->view_photo_link}}"><img class="embed-responsive-item"
            src="{{asset('/storage/builders/thumb/'.$item->img)}}"></a>
        @else
        <img class="embed-responsive-item" src="{{asset('/storage/builders/thumb/'.$item->img)}}">
        @endif
      </div>
      <div class="wason_home">{{$item->name}}</div>
      <div class="denver_colardo">{{$item->city}}, {{$item->state}}</div>
      @if ($item->link)
      <div><a href="{{$item->link}}" class="contact_link">CONTACT</a></div>
      @endif
    </div>
    @endforeach
  </div>
  <hr class="pref_border">

  <div class="mobile-off center builder_pref">
    <h4>Builder Preferred House Plans</h4>
  </div>
  <div class="row py-3 insipiration_below_slider_outer">
    @foreach ($preferred as $item)
    <div class="col-3">
      <div class="embed-responsive embed-responsive-4by3 percent-82">
        <img class="embed-responsive-item" src="{{asset('/storage/builders/'.$item->img)}}">
      </div>
      <div class="lattesa"><a href="{{$item->link}}">{{$item->name}}</a></div>
      <div class="center house_plan_text">{{$item->plan}}</div>
    </div>
    @endforeach
  </div>
</div>
<div id="carousel3" class="carousel slide desktop-off" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    @foreach ($builders as $item)
    <div class="carousel-item @if($loop->iteration === 1) active @endif">
      <div class="slides row center">
        <div class="col-12">
          <div class="d-flex justify-content-center align-items-center">
            <div style="width:233px; height:191px">
              <div class="embed-responsive embed-responsive-4by3 percent-82">
                <img class="embed-responsive-item" src="{{asset('/storage/builders/'.$item->img)}}">
              </div>
            </div>
          </div>
          <div class="p_title center font_16">{{$item->name}}</div>
          <div class="p_title center font_16">{{$item->city}}, {{$item->state}}</div>
          <div><a href="{{$item->link}}" class="links font_16">CONTACT</a></div>
        </div>
      </div>
    </div>
    @endforeach

    <a class="carousel-control-prev" href="#carousel3" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel3" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div> <!-- crousel -->
<!-- Crousel -->
<div class="desktop-off">
  <hr class="pref_border">
</div>

<div class="desktop-off center blue-text">
  <h5>Preferred Builders House Plans</h5>
</div>

<div id="carousel4" class="carousel slide font_16 desktop-off" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    @foreach ($preferred as $item)
    <div class="carousel-item @if($loop->iteration === 1) active @endif">
      <div class="slides row center">
        <div class="col-12">
          <div class="d-flex justify-content-center align-items-center">
            <div style="width:233px; height:191px">
              <div class="embed-responsive embed-responsive-4by3 percent-82">
                <img class="embed-responsive-item" src="{{asset('/storage/builders/'.$item->img)}}">
              </div>
            </div>
          </div>
          <div class="p_title center font_16">
            <u><a href="{{$item->link}}">{{$item->name}}</a></u>
          </div>
          <div class="p_title center font_16 house_plan_text">
            <p>{{$item->plan}}</p>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    <a class="carousel-control-prev" href="#carousel4" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel4" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div> <!-- crousel -->
@endsection
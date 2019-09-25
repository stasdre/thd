@extends('layouts.inspiration')

@section('content')
<div class="center mid-heading stone-heading py-3">
<h1 class="blue-text font_23">{{$data->title}}</h1>
</div>

<div class="">
    <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-4 col-xs-12 background_kitchen_maid top-row">
            <div class="row align-items-sm-center">
                <div class="col-lg-12 col-md-4 col-sm-12">
                    <div class="kitchen_maid_side ipad-off">
                        @if($data->img_above_logo)
                            @if($data->img_above_logo_link)
                                <a target="_blank" href="{{$data->img_above_logo_link}}" target="_blank">
                                    <img class="img-fluid" src="{{asset('storage/inspiration/'.$data->img_above_logo)}}">
                                </a>
                            @else
                                <img class="img-fluid" src="{{asset('storage/inspiration/'.$data->img_above_logo)}}">
                            @endif
                        @endif
                    </div>
                    <div class="center top35">
                        @if($data->logo_img)
                    <img class="img-fluid" src="{{asset('storage/inspiration/'.$data->logo_img)}}">
                        @endif
                    </div>
                </div>
                <div class="col-lg-12 col-md-8 col-sm-12">
                    <div class="center sidebar_text exterior_sidebar_text">
                        {!!$data->short_desc!!}
                        <div class="row">
                            <div class="blue-text side_link col-sm-6 col-lg-12"><b>
                                @if ($data->brochure_link)                                    
                                    <a target="_blank" href="{{$data->brochure_link}}" class="font_mob">View
                                            Brochure <span>></span></a>
                                @endif
                                    </b></div>
                            <div class="blue-text side_link col-sm-6 col-lg-12"><b>
                                @if ($data->locator_link)                                    
                                    <a target="_blank" href="{{$data->locator_link}}" class="font_mob">Dealer
                                            locator <span>></span></a>
                                @endif
                                    </b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="center view_product desktop-off grey-text font_mob mob_fullwidth">Click any
            image to view product</div>

        <div class="col-lg-9 col-md-12 col-sm-8 col-xs-12 padding_0">

            <div class="fullcls kitchen_maid_img1">
                @if ($data->main_img)
                    @if ($data->main_img_link)                        
                        <a target="_blank" href="{{$data->main_img_link}}" target="_blank"><img class="img-fluid"
                            src="{{asset('storage/inspiration/'.$data->main_img)}}" /></a>
                    @else
                        <img class="img-fluid" src="{{asset('storage/inspiration/'.$data->main_img)}}" />
                    @endif                    
                @endif
            </div>
            <div class="center view_product mobile-off grey-text">Click any image to view product
            </div>
            <div class="row">
                @if(!$data->third_img)
                    <div class="col-6">
                        @if ($data->first_img)
                            @if ($data->first_img_link)                        
                                <a target="_blank" href="{{$data->first_img_link}}" target="_blank">
                                    <div class="embed-responsive embed-responsive-4by3"><img class="embed-responsive-item" src="{{asset('storage/inspiration/'.$data->first_img)}}" /></div>
                                </a>
                            @else
                                <div class="embed-responsive embed-responsive-4by3"><img class="embed-responsive-item" src="{{asset('storage/inspiration/'.$data->first_img)}}" /></div>
                            @endif                    
                        @endif        
                    </div>
                    <div class="col-6">
                        @if ($data->second_img)
                            @if ($data->second_img_link)                        
                                <a target="_blank" href="{{$data->second_img_link}}" target="_blank">
                                    <div class="embed-responsive embed-responsive-4by3"><img class="embed-responsive-item" src="{{asset('storage/inspiration/'.$data->second_img)}}" /></div>
                                </a>
                            @else
                                <div class="embed-responsive embed-responsive-4by3"><img class="embed-responsive-item" src="{{asset('storage/inspiration/'.$data->second_img)}}" /></div>
                            @endif                    
                        @endif        
                    </div>

                @else
                    <div class="col-4">
                        @if ($data->first_img)
                            @if ($data->first_img_link)                        
                                <a target="_blank" href="{{$data->first_img_link}}" target="_blank">
                                    <div class="embed-responsive embed-responsive-1by1"><img class="embed-responsive-item" src="{{asset('storage/inspiration/'.$data->first_img)}}" /></div>
                                </a>
                            @else
                                <div class="embed-responsive embed-responsive-1by1"><img class="embed-responsive-item" src="{{asset('storage/inspiration/'.$data->first_img)}}" /></div>
                            @endif                    
                        @endif        
                    </div>
                    <div class="col-4">
                        @if ($data->second_img)
                            @if ($data->second_img_link)                        
                                <a target="_blank" href="{{$data->second_img_link}}" target="_blank">
                                    <div class="embed-responsive embed-responsive-1by1"><img class="embed-responsive-item" src="{{asset('storage/inspiration/'.$data->second_img)}}" /></div>
                                </a>
                            @else
                                <div class="embed-responsive embed-responsive-1by1"><img class="embed-responsive-item" src="{{asset('storage/inspiration/'.$data->second_img)}}" /></div>
                            @endif                    
                        @endif        
                    </div>
                @endif
                @if($data->third_img)
                    <div class="col-4">
                        @if ($data->third_img)
                            @if ($data->third_img_link)                        
                                <a target="_blank" href="{{$data->third_img_link}}" target="_blank">
                                    <div class="embed-responsive embed-responsive-1by1"><img class="embed-responsive-item" src="{{asset('storage/inspiration/'.$data->third_img)}}" /></div>
                                </a>
                            @else
                                <div class="embed-responsive embed-responsive-1by1"><img class="embed-responsive-item" src="{{asset('storage/inspiration/'.$data->third_img)}}" /></div>
                            @endif                    
                        @endif        
                    </div>
                @endif
            </div>
        </div>


    </div>
    <hr class="black_border">
    <div class="pro_dsc">
        {!!$data->desc!!}
    </div>

    <div class="row py-3 center mobile-off insipiration_below_slider_outer">
        @isset ($data->products)            
            @foreach ($data->products as $product)
                <div class="col-6 col-lg-3">
                <div class="embed-responsive embed-responsive-1by1"><img class="embed-responsive-item" src="{{asset('storage/inspiration/'.$product->product_img)}}"></div>
                <div class="p_title center">{{$product->title}}</div>
                <div><a href="{{$product->link}}" class="HP_links">View All Products <i
                                class="fas fa fa-chevron-right"></i></a></div>
                </div>
        
                @break($loop->iteration === 4)
            @endforeach
        @endisset
    </div>

    <!-- Crousel -->
    <div id="carousel2" class="carousel slide font_16 desktop-off" data-ride="carousel"
        data-interval="false">
        <div class="carousel-inner">
            @isset ($data->products)            
                @foreach ($data->products as $product)            
                    <div class="carousel-item @if($loop->iteration === 1) active @endif">
                        <div class="slides row center">
                            <div class="col-12">
                                <div class="embed-responsive embed-responsive-1by1"><img class="embed-responsive-item" src="{{asset('storage/inspiration/'.$product->product_img)}}"></div>
                                <div class="p_title center font_16">{{$product->title}} </div>
                                <div><a href="{{$product->link}}" class="HP_links font_16">View All Products <i
                                            class="fas fa fa-chevron-right"></i></a></div>
                            </div>
                        </div>
                    </div>            
                    @break($loop->iteration === 4)
                @endforeach
                <a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            @endisset
        </div>
    </div> <!-- crousel -->

    <div class="row py-3 center mobile-off insipiration_below_slider_outer">
            @isset ($data->products)            
            @foreach ($data->products as $product)
                @continue($loop->iteration < 5)

                <div class="col-6 col-lg-3">
                <div class="embed-responsive embed-responsive-1by1"><img class="embed-responsive-item" src="{{asset('storage/inspiration/'.$product->product_img)}}"></div>
                <div class="p_title center">{{$product->title}}</div>
                <div><a href="{{$product->link}}" class="HP_links">View All Products <i
                                class="fas fa fa-chevron-right"></i></a></div>
                </div>
        
            @endforeach
        @endisset
    </div>

    <!-- Crousel -->
    <div id="carousel3" class="carousel slide desktop-off" data-ride="carousel"
        data-interval="false">
        <div class="carousel-inner">
            @isset ($data->products)            
                @foreach ($data->products as $product)            
                    @continue($loop->iteration < 5)
                    <div class="carousel-item @if($loop->iteration === 5) active @endif">
                        <div class="slides row center">
                            <div class="col-12">
                                <div class="embed-responsive embed-responsive-1by1"><img class="embed-responsive-item" src="{{asset('storage/inspiration/'.$product->product_img)}}"></div>
                                <div class="p_title center font_16">{{$product->title}} </div>
                                <div><a href="{{$product->link}}" class="HP_links font_16">View All Products <i
                                            class="fas fa fa-chevron-right"></i></a></div>
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
            @endisset
        </div>
    </div> <!-- crousel -->

</div>
@endsection
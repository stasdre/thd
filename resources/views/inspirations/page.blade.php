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
                            <img src="{{asset('storage/inspiration/'.$data->img_above_logo)}}">
                        @endif
                    </div>
                    <div class="center top35">
                        @if($data->logo_img)
                    <img src="{{asset('storage/inspiration/'.$data->logo_img)}}">
                        @endif
                    </div>
                </div>
                <div class="col-lg-12 col-md-8 col-sm-12">
                    <div class="center sidebar_text exterior_sidebar_text">
                        {!!$data->short_desc!!}
                        <div class="sidebar_link row">
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
                        <a target="_blank" href="{{$data->main_img_link}}" target="_blank"><img
                            src="{{asset('storage/inspiration/'.$data->main_img)}}" /></a>
                    @else
                        <img src="{{asset('storage/inspiration/'.$data->main_img)}}" />
                    @endif                    
                @endif
            </div>
            <div class="center view_product mobile-off grey-text">Click any image to view product
            </div>
            <div class="row">
                <div class="col-4 images_width slider_img_padding pedding-right7">
                    <div class="kitchen_maid_img2">
                        @if ($data->first_img)
                            @if ($data->first_img_link)                        
                                <a target="_blank" href="{{$data->first_img_link}}" target="_blank"><img
                                    src="{{asset('storage/inspiration/'.$data->first_img)}}" /></a>
                            @else
                                <img src="{{asset('storage/inspiration/'.$data->first_img)}}" />
                            @endif                    
                        @endif        
                    </div>
                </div>
                <div class="col-4 images_width slider_img_padding pedding-left12">
                    <div class="kitchen_maid_img3">
                        @if ($data->second_img)
                            @if ($data->second_img_link)                        
                                <a target="_blank" href="{{$data->second_img_link}}" target="_blank"><img
                                    src="{{asset('storage/inspiration/'.$data->second_img)}}" /></a>
                            @else
                                <img src="{{asset('storage/inspiration/'.$data->second_img)}}" />
                            @endif                    
                        @endif        
                    </div>
                </div>
                <div class="col-4 images_width slider_img_padding peddingcustomize pedding-left7">
                    <div class="kitchen_maid_img4">
                        @if ($data->third_img)
                            @if ($data->third_img_link)                        
                                <a target="_blank" href="{{$data->third_img_link}}" target="_blank"><img
                                    src="{{asset('storage/inspiration/'.$data->third_img)}}" /></a>
                            @else
                                <img src="{{asset('storage/inspiration/'.$data->third_img)}}" />
                            @endif                    
                        @endif        
                    </div>
                </div>
            </div>
        </div>


    </div>
    <hr class="black_border">
    <div class="pro_dsc">
        {!!$data->desc!!}
    </div>
    <div class="row py-3 center mobile-off insipiration_below_slider_outer">
        <div class="col-6 col-lg-3">
            <div style=""><img src="/images/kitchen-project-1.png"></div>
            <div class="p_title center">Jeld-Wen Windows</div>
            <div><a href="" class="HP_links">View All Products <i
                        class="fas fa fa-chevron-right"></i></a></div>
        </div>
        <div class="col-6 col-lg-3">
            <div style=""><img src="/images/kitchen-project-2.png"></div>
            <div class="p_title center">GAF Roofing </div>
            <div><a href="" class="HP_links">View All Products <i
                        class="fa fa-chevron-right"></i></a></div>

        </div>
        <div class="col-6 col-lg-3">
            <div style="" class=""><img src="/images/kitchen-project-3.png"></div>
            <div class="p_title center">Clopay Garage Doors</div>
            <div><a href="" class="HP_links">View All Products <i
                        class="fa fa-chevron-right"></i></a></div>

        </div>
        <div class="col-6 col-lg-3">
            <div style=""><img src="/images/kitchen-project-4.png"></div>
            <div class="p_title center">Coronado Stone</div>
            <div><a href="" class="HP_links">View All Products <i
                        class="fa fa-chevron-right"></i></a></div>
        </div>

    </div>

    <!-- Crousel -->
    <div id="carousel2" class="carousel slide font_16 desktop-off" data-ride="carousel"
        data-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="slides row center">
                    <div class="col-12">
                        <div style=""><img src="/images/kitchen-project-1.png"></div>
                        <div class="p_title center font_16">Jeld-Wen Windows </div>
                        <div><a href="" class="HP_links font_16">View All Products <i
                                    class="fas fa fa-chevron-right"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="slides row center">
                    <div class="col-12">
                        <div style=""><img src="/images/windows-project-2.png"></div>
                        <div class="p_title center font_16">KraftMaid Cabinetry </div>
                        <div><a href="" class="HP_links font_16">View All Products <i
                                    class="fa fa-chevron-right"></i></a></div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="slides row center">
                    <div class="col-12">
                        <div style="" class=""><img src="/images/windows-project-3.png"></div>
                        <div class="p_title center font_16">Clopay Garage Doors
                        </div>
                        <div><a href="" class="HP_links font_16">View All Products <i
                                    class="fa fa-chevron-right"></i></a></div>

                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="slides row center">
                    <div class="col-12">
                        <div style=""><img src="/images/windows-project-4.png"></div>
                        <div class="p_title center font_16">Coronado Stone </div>
                        <div><a href="" class="HP_links font_16">View All Products <i
                                    class="fas fa fa-chevron-right"></i>
                            </a></div>
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
    </div> <!-- crousel -->

    <div class="row py-3 center mobile-off insipiration_below_slider_outer">
        <div class="col-6 col-lg-3">
            <div style=""><img src="/images/kitchen-project-5.png"></div>
            <div class="p_title center">KitchenAid</div>
            <div><a href="" class="HP_links">View All Products <i
                        class="fas fa fa-chevron-right"></i></a></div>
        </div>
        <div class="col-6 col-lg-3">
            <div style=""><img src="/images/kitchen-project-6.png"></div>
            <div class="p_title center">Royal Building Products</div>
            <div><a href="" class="HP_links">View All Products <i
                        class="fa fa-chevron-right"></i></a></div>

        </div>
        <div class="col-6 col-lg-3">
            <div style="" class=""><img src="/images/kitchen-project-7.png"></div>
            <div class="p_title center">Moen Faucets</div>
            <div><a href="" class="HP_links">View All Products <i
                        class="fa fa-chevron-right"></i></a></div>

        </div>
        <div class="col-6 col-lg-3">
            <div style=""><img src="/images/kitchen-project-8.png"></div>


            <div class="p_title center">Amercan Standard</div>
            <div><a href="" class="HP_links">View All Products <i
                        class="fa fa-chevron-right"></i></a></div>
        </div>

    </div>

    <!-- Crousel -->
    <div id="carousel3" class="carousel slide desktop-off" data-ride="carousel"
        data-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="slides row center">
                    <div class="col-12">
                        <div style=""><img src="/images/windows-project-5.png"></div>
                        <div class="p_title center font_16">KitchenAid </div>
                        <div><a href="" class="HP_links font_16">View All Products <i
                                    class="fas fa fa-chevron-right"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="slides row center">
                    <div class="col-12">
                        <div style=""><img src="/images/windows-project-6.png"></div>
                        <div class="p_title center font_16">Royal Building Products </div>
                        <div><a href="" class="HP_links font_16">View All Products <i
                                    class="fa fa-chevron-right"></i></a></div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="slides row center">
                    <div class="col-12">
                        <div style="" class=""><img src="/images/windows-project-7.png"></div>
                        <div class="p_title center font_16">Moen Faucets
                        </div>
                        <div><a href="" class="HP_links font_16">View All Products <i
                                    class="fa fa-chevron-right"></i></a></div>

                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="slides row center">
                    <div class="col-12">
                        <div style=""><img src="/images/windows-project-8.png"></div>
                        <div class="p_title center font_16">Amercan Standard </div>
                        <div><a href="" class="HP_links font_16">View All Products <i
                                    class="fas fa fa-chevron-right"></i>
                            </a></div>
                    </div>
                </div>
            </div>


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

</div>
@endsection
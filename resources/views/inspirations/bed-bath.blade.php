@extends('layouts.inspiration')
@section('content')
<div class="center mid-heading2 py-3">
    <h1 class="blue-text font_20 letter_space_mobile">INNOVATIVE FAUCETS + FIXTURES FOR YOUR BATH</h1>
</div>

<div class="">
    <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-4 col-xs-12 sidebar_background_exterior top-row">
            <div class="row align-items-sm-center">
                <div class="col-lg-12 col-md-4 col-sm-12">
                    <div class="exterior_side-img ipad-off"><img src="/images/bath_sidebar01.png">
                    </div>
                    <div class="exterior_side_logo center top35"><img src="/images/bath_logo.png">
                    </div>
                </div>
                <div class="col-lg-12 col-md-8 col-sm-12">
                    <div class="center sidebar_text exterior_sidebar_text">
                        <p class="font_mob">For over 140 years, American Standard has led the way in
                            developing innovative bathroom products including high performance
                            toilets, faucets, bathtubs and showers to complete your bathroom design.
                        </p>
                        <div class="sidebar_link row">
                            <div class="blue-text side_link col-sm-6 col-lg-12"><b><a href="#" class="font_mob">View
                                        all products <span>></span></a></b></div>
                            <div class="blue-text side_link col-sm-6 col-lg-12"><b><a href="#" class="font_mob">Dealer
                                        locator <span>></span></a></b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="center view_product desktop-off grey-text font_mob mob_fullwidth">Click any
            image to view product</div>

        <div class="col-lg-9 col-md-12 col-sm-8 col-xs-12 padding_0">

            <div class="fullcls"><a href="/bath_head_01" target="_blank"><img
                        src="/images/bath_head_01.png"></a></div>
            <div class="center view_product mobile-off grey-text">Click any image to view product
            </div>
            <div class="row">
                <div class="col-4 images_width slider_img_padding">
                    <div style=""><a href="/bath_head_02" target="_blank"><img
                                src="/images/bath_head_02.png"></a></div>
                </div>
                <div class="col-4 images_width slider_img_padding">
                    <div style=""><a href="/bath_head_03" target="_blank"><img
                                src="/images/bath_head_03.png"></a></div>
                </div>
                <div class="col-4 images_width slider_img_padding">
                    <div style="" class=""><a href="/bath_head_04" target="_blank"><img
                                src="/images/bath_head_04.png"></a></div>
                </div>
            </div>
        </div>
    </div>

    <hr class="black_border">

    <h3 class="center text-bold pro_dsc text_uppercase" style="font-size: 22px;">Innovative Products
        to Design Functional and Beautiful Living Spaces</h3>
    <div class="text_home_insp font_18 text_center">
        <p><b><i>Home Inspiration</i></b> is a comprehensive resource center where consumers and
            builders
            can learn about new and innovative interior and exterior home building products.
              This is the place to find great home design ideas and building tips to build a
            beautiful home on time and on budget. View <a class="blue-text text-bold"
                href="#">photographs of recent homes</a> featuring
            <a class="blue-text text-bold" href="#">David Wiggins House Plans</a>, read the <a
                class="blue-text text-bold" href="#">latest design and product reviews</a>, hear
            about
            our <a class="blue-text text-bold" href="#">customer’s success stories, find a
                builder</a> and <a class="blue-text text-bold" href="#">get social</a> with
            consumers like
            yourself to discuss your home building joys and challenges.</p>
    </div>
    <div class="row py-3 center mobile-off insipiration_below_slider_outer">
        <div class="col-6 col-lg-3">
            <div style=""><img src="/images/roofing-product-1.png"></div>
            <div class="p_title center">Jeld-Wen Windows</div>
            <div><a href="" class="HP_links">View All Products <i
                        class="fas fa fa-chevron-right"></i></a></div>
        </div>
        <div class="col-6 col-lg-3">
            <div style=""><img src="/images/KraftMaid-Cabinetry.png"></div>
            <div class="p_title center">KraftMaid Cabinetry </div>
            <div><a href="" class="HP_links">View All Products <i
                        class="fa fa-chevron-right"></i></a></div>

        </div>
        <div class="col-6 col-lg-3">
            <div style="" class=""><img src="/images/Clopay-Garage-Doors.png"></div>
            <div class="p_title center">Clopay Garage Doors</div>
            <div><a href="" class="HP_links">View All Products <i
                        class="fa fa-chevron-right"></i></a></div>

        </div>
        <div class="col-6 col-lg-3">
            <div style=""><img src="/images/stone-product-4.png"></div>
            <div class="p_title center">GAF Roofing</div>
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
                        <div style=""><img src="/images/roofing-product-1.png"></div>
                        <div class="p_title center font_16">Jeld-Wen Windows </div>
                        <div><a href="" class="HP_links font_16">View All Products <i
                                    class="fas fa fa-chevron-right"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="slides row center">
                    <div class="col-12">
                        <div style=""><img src="/images/roofing-product-2.png"></div>
                        <div class="p_title center font_16">KraftMaid Cabinetry </div>
                        <div><a href="" class="HP_links font_16">View All Products <i
                                    class="fa fa-chevron-right"></i></a></div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="slides row center">
                    <div class="col-12">
                        <div style="" class=""><img src="/images/roofing-product-3.png"></div>
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
                        <div style=""><img src="/images/roofing-product-4.png"></div>
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
            <div style=""><img src="/images/Kitchen-Aid.png"></div>
            <div class="p_title center">KitchenAid</div>
            <div><a href="" class="HP_links">View All Products <i
                        class="fas fa fa-chevron-right"></i></a></div>
        </div>
        <div class="col-6 col-lg-3">
            <div style=""><img src="/images/stone-product-6.png"></div>
            <div class="p_title center">Royal Building Products</div>
            <div><a href="" class="HP_links">View All Products <i
                        class="fa fa-chevron-right"></i></a></div>

        </div>
        <div class="col-6 col-lg-3">
            <div style="" class=""><img src="/images/Moen-Faucets.png"></div>
            <div class="p_title center">Moen Faucets</div>
            <div><a href="" class="HP_links">View All Products <i
                        class="fa fa-chevron-right"></i></a></div>

        </div>
        <div class="col-6 col-lg-3">
            <div style=""><img src="/images/Coronado-Stone.png"></div>
            <div class="p_title center">Coronado Stone </div>
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
                        <div style=""><img src="/images/roofing-product-5.png"></div>
                        <div class="p_title center font_16">KitchenAid </div>
                        <div><a href="" class="HP_links font_16">View All Products <i
                                    class="fas fa fa-chevron-right"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="slides row center">
                    <div class="col-12">
                        <div style=""><img src="/images/roofing-product-6.png"></div>
                        <div class="p_title center font_16">Royal Building Products </div>
                        <div><a href="" class="HP_links font_16">View All Products <i
                                    class="fa fa-chevron-right"></i></a></div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="slides row center">
                    <div class="col-12">
                        <div style="" class=""><img src="/images/roofing-product-7.png"></div>
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
                        <div style=""><img src="/images/roofing-product-8.png"></div>
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
@extends('layouts.index')

@section('content')
<div class="plan-full position-relative mobile-off"> <img src="{{ '/storage/collections/'.$collection->image }}" alt="{{$collection->name}}" class="img-fluid" />
<div class="single-plan-title position-absolute single-plan-title-edit">{{ $collection->name }}</div>
    <div class="plan-name position-absolute"><span>{{ $collection->short_name }} /</span> HOUSE PLAN {{ $collection->plan }}</div>
  </div>
  <div class="search-wrap light py-2 text-center px-5 mobile-off">
    <form class="form-main-search text-center space_left">
              <div class="row no-gutters">
                  <div class="col-md-2 col-sm-3 common_width padd_bottom_10">
                      <div class="form-group">
                          <div class="select-custom-wrap select-custom-wrap-lg">
                              <div class="select"><select name="select-custom-style" class="select-custom select-hidden">
                                  <option value="hide">Styles \ Collections</option>
                                  <option value="Collection1">Collection1</option>
                                  <option value="Collection2">Collection2</option>
                                  <option value="Collection3">Collection3</option>
                              </select><div class="select-styled">Styles \ Collections</div><ul class="select-options"><li rel="hide">Styles \ Collections</li><li rel="Collection1">Collection1</li><li rel="Collection2">Collection2</li><li rel="Collection3">Collection3</li></ul></div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-1 col-sm-3 common_width padd_bottom_10">
                      <div class="form-group">
                          <div class="select-custom-wrap select-custom-wrap-sm">
                              <div class="select"><select name="select-custom-beds" class="select-custom select-hidden">
                                  <option value="hide">Beds</option>
                                  <option value="Bed1">1</option>
                                  <option value="Bed2">2</option>
                                  <option value="Bed3">3</option>
                              </select><div class="select-styled">Beds</div><ul class="select-options"><li rel="hide">Beds</li><li rel="Bed1">1</li><li rel="Bed2">2</li><li rel="Bed3">3</li></ul></div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-1 col-sm-3 common_width padd_bottom_10">
                      <div class="form-group">
                          <div class="select-custom-wrap select-custom-wrap-sm">
                              <div class="select"><select name="select-custom-baths" class="select-custom select-hidden">
                                  <option value="hide">Baths</option>
                                  <option value="Bath1">1</option>
                                  <option value="Bath2">2</option>
                                  <option value="Bath3">3</option>
                              </select><div class="select-styled">Baths</div><ul class="select-options"><li rel="hide">Baths</li><li rel="Bath1">1</li><li rel="Bath2">2</li><li rel="Bath3">3</li></ul></div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-1 col-sm-3 common_width padd_bottom_10">
                      <div class="form-group">
                          <div class="select-custom-wrap select-custom-wrap-sm">
                              <div class="select"><select name="select-custom-stories" class="select-custom select-hidden">
                                  <option value="hide">Stories</option>
                                  <option value="Story1">Story1</option>
                                  <option value="Story2">Story2</option>
                                  <option value="Story3">Story3</option>
                              </select><div class="select-styled">Stories</div><ul class="select-options"><li rel="hide">Stories</li><li rel="Story1">Story1</li><li rel="Story2">Story2</li><li rel="Story3">Story3</li></ul></div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-2 col-sm-3 common_width padd_bottom_10 max-width">
                      <div class="form-group">
                          <div class="select-custom-wrap select-custom-wrap-md">
                              <div class="select"><select name="select-custom-garages" class="select-custom select-hidden">
                                  <option value="hide">Garages</option>
                                  <option value="Garage1">Garage1</option>
                                  <option value="Garage2">Garage2</option>
                                  <option value="Garage3">Garage3</option>
                              </select><div class="select-styled">Garages</div><ul class="select-options"><li rel="hide">Garages</li><li rel="Garage1">Garage1</li><li rel="Garage2">Garage2</li><li rel="Garage3">Garage3</li></ul></div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-1 col-sm-3 common_width">
                      <div class="form-group">
                          <input type="text" placeholder="Min Sq Ft" class="center" style="font-size : 12px;padding :0;">
                      </div>
                  </div>
                  <div class="col-md-1 col-sm-3 common_width">
                      <div class="form-group">
                          <input type="text" placeholder="Max Sq Ft" class="center" style="font-size : 12px;padding :0;">
                      </div>
                  </div>
                  <div class="col-md-1 col-sm-3 common_width">
                      <div class="form-group">
                          <button type="submit" class="btn btn-block btn-primary rounded-0">Search</button>
                      </div>
                  </div>
                  <div class="col-md-2 col-sm-3 common_width comm_xs_btn text-right">
                      <div class="form-group"> <a href="http://104.236.20.15:8080/search" class="btn btn-link text-uppercase text-white advan_opts">Advanced Options</a> </div>
                  </div>
              </div>
          </form>
  </div>
  
  <div  style="color : #212529;" class="info_text py-2 px-sm-5 mx-sm-3">
    {!! substr($collection->description, 0, 310) !!}
  <span class="mobile-off" id="content-scroll">{!! substr($collection->description, 311) !!}</span>
  </div>
  <div class="desktop-off read_more" id="read_more"><span class="read-more-link-wrapper">Read More </span></div>
  <div style="display : none;" id="read_less" class="read_less"><span class="read-less-link-wrapper">Read Less </span></div>
   <div class="row mobile-off">
       <div class="col-sm-12 center">
          <div><button class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding" type="button" > Quick Plan Search</button>
              <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding" type="button" style="padding : 10px 34px;"> Advanced Plan Search</button>
          </div>
      </div>
   </div>
   
     <div class="row desktop-off">
       <div class="col-6 col-sm-6 set-left center">
          <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding" type="button"> Quick <br>Plan Search</button>
      </div>
      <div class="col-6 col-sm-6 set-left center">
              <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding" type="button"> Advanced <br>Plan Search</button>
          </div>
      <br>
   </div>
   <div style="clear : both;"></div>
   <div id="plans_search">
        <div class="page-name mt-3 py-2 px-2 mobile-off">
            <div class="row align-items-center">
            <div class="col-sm-3 col-md-5 col-lg-4">
                <form action="" class="form-inline">
                <div class="form-group">
                    <label for="">Sort:</label>
                    <select name="" id="" class="form-control form-control-sm rounded-0">
                    <option value="">Most Popular</option>
                    <option value="">Most Recent</option>
                    </select>
                </div>
                <div class="form-group ml-2">
                    <label for="">Views:</label>
                    <select v-model="views" class="form-control form-control-sm rounded-0">
                        <option value="24">24</option>
                        <option value="50">50</option>
                    </select>
                </div>
                </form>
            </div>
            <br>
            <div class="col-sm-4 col-md-6 col-lg-3 text-center">
                <div class="row align-items-center no-gutters">
                <div class="col-6 save-search">
                    <h6 class="font-futura m-0 ls-1 text-right pr-2">SAVE SEARCH</h6>
                </div>
                <div class="col-6">
                    <div class="form-group text-left m-0">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control rounded-0 border-secondary" placeholder="Nickname">
                        <div class="input-group-append">
                        <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold" type="button">Save</button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-5 col-md-12 col-lg-5 ">
                <div class="text-center text-sm-right search_pagination">
                <ul class="list-inline m-0 paging">
                    <li class="list-inline-item">
                    <button class="btn btn-sm btn-secondary rounded-0" :disabled="current_page === 1" @click.prevent="prev">&lt; Prev</button>
                    </li>
                    <li class="list-inline-item text-secondary">Page</li>
                    <li class="list-inline-item">
                    <input type="text" class="form-control rounded-0" @keyup.enter="goToPage" v-model="current_page">
                    </li>
                <li class="list-inline-item"><span class="text-secondary">of</span> @{{last_page}}</li>
                    <li class="list-inline-item">
                    <button class="btn btn-sm btn-secondary rounded-0" :disabled="current_page === last_page" @click.prevent="next">&gt; Next</button>
                    </li>
                <li class="list-inline-item ml-2"><strong><span class="text-primary">PLANS:</span> @{{total}}</strong></li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        
        
        <!-- Sorting on mobile -->
            <div class="desktop-off">
            <br>
                    <div class="row page-name sort-by-sec">
                        <div class="col-6">
                            <span>SORT BY <button style="font-size:12px;padding : 0;" ><i class="fa fa-caret-down"></i></button></span>
                        </div>
                        <div class="col-6 navbar-light" style="text-align: right;padding-right: 0;">	
                        <span>Filter</span><span class="navbar-toggler-icon" style="height : 24px;"></span>
                        &nbsp;
                            <span class="blue-text" style="font-size : 12px;">PLANS : </span><span>2495</span>
                        </div>
                        
                </div>
                
                <div class="row ind_search_div">
                <br>
                    <div class="col-6 save-search"> <span> SAVE YOUR SEARCH</span></div>
                    <div class="col-6"> <input type="text" placeholder="Nickname" style="width : 75%" class="save_search_box"><button class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding save_search_button" type="button"> Save</button></div>
                </div>
            </div>
        <!-- Sorting on mobile -->

        <div class="row">
            <div class="col-sm-4" v-for="plan in plans" :key="plan.id">
                <div class="plan-list mt-3">
                    <div class="row align-items-center py-2 px-1">
                    <div class="col-8">
                    <p class="plan-name font-weight-bold mb-0">@{{plan.square_ft.str_total}} sq ft | <span class="text-white">plan @{{plan.plan_number}}</span></p>
                    </div>
                    <div class="col-4">
                        <ul class="list-inline mb-0 text-right font-icons">
                        <li class="list-inline-item icon-heart-mob"><a href="#"><i class="far fa-heart" style="color:white"></i></a></li>
                        <li class="list-inline-item icon-search-mob"><a href="#"><i class="fas fa-search" style="color:white"></i></a></li>
                        </ul>
                    </div>
                    </div>
                    <div class="position-relative">
                    <div :id="'plan'+plan.id" class="carousel slide" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner">
                            <div class="carousel-item" :class="{ active: index === 0 }" v-for="(image, index) in plan.images" :key="image.id"> <img :src="'/storage/plans/'+plan.id+'/thumb/'+image.file_name" alt="" class="img-fluid d-block w-100"> </div>
                        </div>
                        <a class="carousel-control-prev" @click.prevent="" :href="'#plan'+plan.id" role="button" data-slide="prev"> 
                        <span class="carousel-control-prev-icon" aria-hidden="false"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" @click.prevent="" :href="'#plan'+plan.id" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="false"></span> <span class="sr-only">Next</span> </a> </div>
                    <div class="media planinfo text-left position-absolute"> <img class="mr-1 align-self-center" src="{{asset('images/icons/logo-placeholder.png')}}" alt="Generic placeholder image">
                        <div class="media-body">
                        <h5 class="mb-0 text-white">plan <span class="text-secondary">@{{plan.plan_number}}</span></h5>
                        <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span></h5>
                        </div>
                    </div>
                <a href="#" class="position-absolute icon-camera"><img src="{{asset('images/icons/icon-camera.png')}}" alt=""></a> <a href="#" class="position-absolute pinterest"><img src="{{asset('images/icons/icon-pinterest.png')}}" alt=""></a> </div>
                    <div class="row no-gutters plan-info">
                    <div class="col bg-light"> bed<strong class="d-block">@{{plan.rooms.r_bedrooms}}</strong> </div>
                    <div class="col"> bath<strong class="d-block">@{{plan.rooms.r_full_baths}}</strong> </div>
                    <div class="col bg-light"> story<strong class="d-block">@{{plan.dimensions.stories}}</strong> </div>
                    <div class="col"> gar<strong class="d-block">@{{plan.garage.car}}</strong> </div>
                    <div class="col bg-light"> width<span class="d-block">@{{plan.dimensions.width_ft}}’ @{{plan.dimensions.width_in}}"</span> </div>
                    <div class="col"> depth<span class="d-block">@{{plan.dimensions.depth_ft}}’ @{{plan.dimensions.depth_in}}”</span> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <br>
  <!-- Sidebar content only for mobile -->
       <div class="row desktop-off">
              <div class="col-sm-12">
              <div class="plan-cta position-relative mb-2"> 
                  <div class="search-grid search-grid3 text-center">
                      <h4 class="font-weight-bold">Architectural Styles </h4>
                      <div class="features">
                          <ul class="list-unstyled text-primary">
                               <li><a href="#">Cottage Home Designs</a></li>
                              <li><a href="#">Country Home Plans</a></li>
                              <li><a href="#">Craftsman House Plans</a></li>
                              <li><a href="#">European House Plans</a></li>
                              <li><a href="#">Farmhouse Plans</a></li>
                              <li><a href="#">French Country House Plans</a></li>
                        </ul>
                      </div>
          </div>
         </div>
       </div>
       </div>
       <div class="row desktop-off">
              <div class="col-sm-12">
              <div class="plan-cta position-relative mb-2"> 
                  <div class="search-grid search-grid4 text-center">
                      <h4 class="font-weight-bold">Specialty Collections </h4>
                      <div class="features">
                          <ul class="list-unstyled text-primary">
                               <li><a href="#">Affordable House Plans</a></li>
                               <li><a href="#">Best-Selling Home Plans</a></li>
                               <li><a href="#">Builder-Friendly Plans</a></li>
                               <li><a href="#">Duplex House Plans</a></li>
                               <li><a href="#">Empty Nester House Plans</a></li>
                               <li><a href="#">House Plans With Photos</a></li>
                               <li><a href="#">In-law Suite Plans</a></li>
                               <li><a href="#">Luxury House Plans</a></li>
                               <li><a href="#">Narrow Lot House Plans</a></li>
                               <li><a href="#">New House Plans</a></li>
                               <li><a href="#">One-Story House Plans</a></li>
                               <li><a href="#">Open Floor Plans</a></li>
                               <li><a href="#">Outdoor Living House Plans</a></li>
                               <li><a href="#">Small House Plans</a></li>
                               <li><a href="#">Texas House Plans</a></li>
                               <li><a href="#">Two Story House Plans</a></li>
                               <li><a href="#">Vacation Homes</a></li>
                               <li><a href="#">Walkout Basement Plans</a></li>
                        </ul>
                      </div>
          </div>
         </div>
       </div>
       </div>
       
        <!-- Sidebar content only for mobile -->  
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
const routes = [
    { path: '/search/:id/:test' },
];
const router = new VueRouter({
    mode: 'history',
    routes
})
var app = new Vue({
    router,
    data: {
        plans: [],
        last_page: 1,
        total: 0,
        current_page: 1,
        views: 24
    },
    methods: {
        next(){
            if(this.current_page < this.last_page){
                this.current_page++;
                this.search();
            }
        },
        prev(){
            if(this.current_page > 1){
                this.current_page--;
                this.search();
            }
        },
        goToPage(){
            if(this.current_page <= this.last_page && this.current_page >= 1){
                this.search();
            }
        },
        search(){
            axios.get('/search/result?page='+this.current_page+'&views='+this.views)
            .then(response=> {
                this.plans = response.data.data;
                this.last_page = response.data.last_page;
                this.total = response.data.total;
                this.current_page = response.data.current_page;
            });  
        }
    },
    watch: {
        views: function(){
            this.search();
        }
    },
    created: function(){
        this.search();
    }
}).$mount('#plans_search');
</script>
@endpush
@extends('layouts.index')

@section('content')
<div style="color : #212529;" class="info_text py-2 px-sm-5 mx-sm-3">
  Finding your perfect house plan has become a whole lot easier since builder-preferred, construction-ready home plans
  are now available online. Spending months or even longer working with an architect to fine tune a whole house
  blueprint is no longer necessary You can now easily and quickly
  <span class="mobile-off" id="content-scroll">find house plans designed by best-selling architects by following a few
    easy search steps. Before you begin searching house designs, make sure you’re purchasing house plans from a site
    like ours where the plans meet the strict standards of the IRC (International Residential Code) and guarantee
    the full architectural detailing your builder needs to construct a safe home. You’ll also want to check with
    your local town building department to find out if there are any special engineering or structural details
    needed for permitting. All of our floor plans can be customized as well as modified to include any possible
    local engineering details for certain locations like California and Florida. After you’ve done this initial
    homework, you’ll simply determine the square footage range needed to coordinate with your budget, style of home
    you want and then your preferences for bedrooms, baths, number of stories and garages. If there are lot
    restrictions, you can also add width and depth parameters in your home plan search to narrow down your results.
    To have your questions answered by our team of house plan experts, simply <a
      href="{{ route('contact-us') }}">email</a> or <a href="{{ route('contact-us') }}">live chat</a> us today!</span>
</div>
<div class="desktop-off read_more" id="read_more"><span class="read-more-link-wrapper">Read More </span></div>
<div style="display : none;" id="read_less" class="read_less"><span class="read-less-link-wrapper">Read Less </span>
</div>
<div class="row mobile-off">
  <div class="col-sm-12 center">
    <div><button class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding" type="button">
        Quick Plan Search</button>
      <a href="{{ route('advanced-search') }}"
        class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding" style="padding : 10px 34px;">
        Advanced Plan Search</a>
    </div>
  </div>
</div>

<div class="row desktop-off">
  <div class="col-6 col-sm-6 set-left center">
    <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding" type="button"> Quick
      <br>Plan Search</button>
  </div>
  <div class="col-6 col-sm-6 set-left center">
    <a href="{{ route('advanced-search') }}"
      class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding"> Advanced <br>Plan
      Search</a>
  </div>
  <br>
</div>
<div style="clear : both;"></div>
<div id="plans_search" class="search-results" v-cloak :class="{loading: isLoading}">
  <i class="loading-icon fas fa-sync-alt fa-6x fa-spin"></i>
  <div class="page-name mt-3 py-2 px-2 mobile-off">
    <div class="row align-items-center">
      <div class="col-sm-3 col-md-5 col-lg-4">
        <form action="" class="form-inline">
          <div class="form-group">
            <label for="">Sort:</label>
            <select v-model="order" class="form-control form-control-sm rounded-0">
              <option value="popular">Most Popular</option>
              <option value="recent">Newest</option>
              <option value="s_l">Small to Large</option>
              <option value="l_s">Large to Small</option>
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
              <button class="btn btn-sm btn-secondary rounded-0" :disabled="current_page === 1"
                @click.prevent="prev">&lt; Prev</button>
            </li>
            <li class="list-inline-item text-secondary">Page</li>
            <li class="list-inline-item">
              <input type="text" class="form-control rounded-0" @keyup.enter="goToPage" v-model="current_page">
            </li>
            <li class="list-inline-item"><span class="text-secondary">of</span> @{{last_page}}</li>
            <li class="list-inline-item">
              <button class="btn btn-sm btn-secondary rounded-0" :disabled="current_page === last_page"
                @click.prevent="next">&gt; Next</button>
            </li>
            <li class="list-inline-item ml-2"><strong><span class="text-primary">PLANS:</span>
                @{{total}}</strong></li>
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
        <span>SORT BY <button style="font-size:12px;padding : 0;"><i class="fa fa-caret-down"></i></button></span>
      </div>
      <div class="col-6 navbar-light" style="text-align: right;padding-right: 0;">
        <span>Filter</span><span class="navbar-toggler-icon" style="height : 24px;"></span>
        &nbsp;
        <span class="blue-text" style="font-size : 12px;">PLANS : </span><span>@{{total}}</span>
      </div>

    </div>

    <div class="row ind_search_div">
      <br>
      <div class="col-6 save-search"> <span> SAVE YOUR SEARCH</span></div>
      <div class="col-6"> <input type="text" placeholder="Nickname" style="width : 75%" class="save_search_box"><button
          class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding save_search_button"
          type="button"> Save</button></div>
    </div>
  </div>
  <!-- Sorting on mobile -->

  <div class="row">
    <div class="col-sm-4" v-for="plan in plans" :key="plan.id">
      <div class="plan-list mt-3">
        <div class="row align-items-center py-2 px-1">
          <div class="col-8">
            <p class="plan-name font-weight-bold mb-0">@{{plan.square_ft.str_total}} sq ft | <span
                class="text-white">plan @{{plan.plan_number}}</span></p>
          </div>
          <div class="col-4">
            <ul class="list-inline mb-0 text-right font-icons">
              <li class="list-inline-item icon-heart-mob"><a href="#"><i class="far fa-heart"
                    style="color:white"></i></a></li>
              <li class="list-inline-item icon-search-mob"><a href="#"><i class="fas fa-search"
                    style="color:white"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="position-relative">
          <div :id="'plan'+plan.id" class="carousel slide" data-ride="carousel" data-interval="false">
            <a :href="'/plan/' + plan.plan_number" class="carousel-inner">
              <div class="carousel-item" :class="{ active: index === 0 }" v-for="(image, index) in plan.images"
                :key="image.id">
                <img :src="'/storage/plans/'+plan.id+'/thumb/'+image.file_name" alt="" class="img-fluid d-block w-100">
                <a v-if="image.camera_icon" href="#" class="position-absolute icon-camera"><img
                    src="{{asset('images/icons/icon-camera.png')}}" alt=""></a>
              </div>
            </a>
            <a class="carousel-control-prev" @click.prevent="" :href="'#plan'+plan.id" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="false"></span> <span class="sr-only">Previous</span>
            </a> <a class="carousel-control-next" @click.prevent="" :href="'#plan'+plan.id" role="button"
              data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="false"></span> <span
                class="sr-only">Next</span> </a> </div>
          <div class="media planinfo text-left position-absolute placeholder-black"> <img class="mr-1 align-self-center"
              src="{{asset('images/icons/logo-placeholder.png')}}" alt="Generic placeholder image">
            <div class="media-body">
              <h5 class="mb-0 text-white">plan <span class="text-secondary">@{{plan.plan_number}}</span>
              </h5>
              <h5 class="m-0 text-white">davidwiggins<span class="text-secondary">houseplans.com</span>
              </h5>
            </div>
          </div>
          <a href="#" class="position-absolute pinterest"><img src="{{asset('images/icons/icon-pinterest.png')}}"
              alt=""></a>
        </div>
        <div class="row no-gutters plan-info">
          <div class="col bg-light"> bed<strong class="d-block">@{{plan.rooms.r_bedrooms}}</strong> </div>
          <div class="col"> bath<strong class="d-block">@{{plan.rooms.r_full_baths}}</strong> </div>
          <div class="col bg-light"> story<strong class="d-block">@{{plan.dimensions.stories}}</strong> </div>
          <div class="col"> gar<strong class="d-block">@{{plan.garage.car}}</strong> </div>
          <div class="col bg-light"> width<span class="d-block">@{{plan.dimensions.width_ft}}’
              @{{plan.dimensions.width_in}}"</span> </div>
          <div class="col"> depth<span class="d-block">@{{plan.dimensions.depth_ft}}’
              @{{plan.dimensions.depth_in}}”</span> </div>
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
            @foreach($allStyles as $item)
            <li><a href="{{route('style.slug', $item->slug)}}">{{$item->name}}</a></li>
            @endforeach
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
            @foreach($allCollections as $item)
            <li><a href="{{route('collection.slug', $item->slug)}}">{{$item->name}}</a></li>
            @endforeach
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
        isLoading: false,
        plans: [],
        last_page: 1,
        total: 0,
        current_page: 1,
        views: 24,
        order: 'popular'
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
            this.isLoading = true;
            axios.get('/search/result?page='+this.current_page+'&views='+this.views+'&order='+this.order)
            .then(response=> {
                this.plans = response.data.data;
                this.last_page = response.data.last_page;
                this.total = response.data.total;
                this.current_page = response.data.current_page;
            })
            .then(()=>{
                this.isLoading = false;
            });  
        }
    },
    watch: {
        views: function(){
            this.search();
        },
        order: function(){
            this.search();
        }
    },
    created: function(){
        this.search();
    }
}).$mount('#plans_search');
</script>
@endpush
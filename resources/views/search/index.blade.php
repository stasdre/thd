@extends('layouts.index')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0 bg-white px-0">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('plan.all') }}">Plan Search</a></li>
      <li class="breadcrumb-item active" aria-current="page">Search Results — Filtered on: 
        @if(request()->get('txt')) {{request()->get('txt')}}@endif
        @if(request()->get('stories')) {{request()->get('stories')}} stories, @endif
        @if(request()->get('beds')) {{request()->get('beds')}} bedrooms, @endif
        @if(request()->get('baths')) {{request()->get('baths')}} baths, @endif
        @if(request()->get('garages')) {{request()->get('garages')}} garages, @endif
        @if(request()->get('sq_min')) from {{request()->get('sq_min')}}' sq. ft., @endif
        @if(request()->get('sq_max')) to {{request()->get('sq_max')}}' sq. ft., @endif
        </li>
    </ol>
  </nav>
  <h3 class="font-weight-bold">House Plans Search Results</h3>
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
                <option value="recent">Most Recent</option>
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
                        <span class="blue-text" style="font-size : 12px;">PLANS : </span><span>@{{total}}</span>
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
                    <a :href="'/plan/' + plan.plan_number" class="carousel-inner">
                        <div class="carousel-item" :class="{ active: index === 0 }" v-for="(image, index) in plan.images" :key="image.id"> 
                            {{-- <div class="embed-responsive embed-responsive-4by3"> --}}
                                <img :src="'/storage/plans/'+plan.id+'/thumb/'+image.file_name" alt="" class="img-fluid d-block w-100"> 
                            {{-- </div> --}}
                        </div>
                    </a>
                    <a class="carousel-control-prev" @click.prevent="" :href="'#plan'+plan.id" role="button" data-slide="prev"> 
                    <span class="carousel-control-prev-icon" aria-hidden="false"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" @click.prevent="" :href="'#plan'+plan.id" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="false"></span> <span class="sr-only">Next</span> </a> </div>
                <div class="media planinfo text-left position-absolute placeholder-black"> <img class="mr-1 align-self-center" src="{{asset('images/icons/logo-placeholder.png')}}" alt="Generic placeholder image">
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
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    var app = new Vue({
        data: {
            isLoading: false,
            plans: [],
            last_page: 1,
            total: 0,
            current_page: 1,
            views: 24,
            order: 'popular',
            txt: '{{request()->get('txt')}}',
            sq_min: '{{request()->get('sq_min')}}',
            sq_max: '{{request()->get('sq_max')}}',
            beds: '{{request()->get('beds')}}',
            baths: '{{request()->get('baths')}}',
            garages: '{{request()->get('garages')}}',
            stories: '{{request()->get('stories')}}',
            width_min: '{{request()->get('width_min')}}',
            width_max: '{{request()->get('width_max')}}',
            depth_min: '{{request()->get('depth_min')}}',
            depth_max: '{{request()->get('depth_max')}}',
            bf: '{{request()->get('bf') ? implode(",", request()->get('bf')): ''}}',
            kf: '{{request()->get('kf') ? implode(",", request()->get('kf')): ''}}',
            rf: '{{request()->get('rf') ? implode(",", request()->get('rf')): ''}}',
            gf: '{{request()->get('gf') ? implode(",", request()->get('gf')): ''}}',
            ef: '{{request()->get('ef') ? implode(",", request()->get('ef')): ''}}',
            styles: '{{request()->get('styles') ? implode(",", request()->get('styles')): ''}}',
            collections: '{{request()->get('collections') ? implode(",", request()->get('collections')): ''}}'
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
                axios.get('/search/result',{
                    params: {
                        page: this.current_page,
                        views: this.views,
                        order: this.order,
                        txt: this.txt,
                        sq_min: this.sq_min,
                        sq_max: this.sq_max,
                        beds: this.beds,
                        baths: this.baths,
                        garages: this.garages,
                        stories: this.stories,
                        width_min: this.width_min,
                        width_max: this.width_max,
                        depth_min: this.depth_min,
                        depth_max: this.depth_max,
                        bf: this.bf,
                        kf: this.kf,
                        rf: this.rf,
                        gf: this.gf,
                        ef: this.ef,
                        styles: this.styles,
                        collections: this.collections,
                    }
                })
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
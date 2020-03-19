@include('partials.plans-list-filter')
<!-- Sorting on mobile -->
<div class="desktop-off">
    <br />
    <div class="row page-name sort-by-sec d-flex justify-content-between align-items-center">
        <div class="col-5" style="padding: 0 5px 0 0;">
            <div class>
                <select name="order" class="form-control form-control-sm rounded-0">
                    <option value="popular">Most Popular</option>
                    <option value="recent">Newest</option>
                    <option value="s_l">Small to Large</option>
                    <option value="l_s">Large to Small</option>
                </select>
            </div>
        </div>
        <div class="col-5" style="padding: 0 5px 0 0;">
            <div class="text-center text-sm-right">
                <ul class="list-inline m-0 paging">
                    <li class="list-inline-item">
                        <button class="btn btn-sm btn-secondary rounded-0">&lt; Prev</button>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn btn-sm btn-secondary rounded-0">&gt; Next</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-2 navbar-light" style="padding: 0;">
            <!-- <span>Filter</span>
            <span class="navbar-toggler-icon" style="height : 24px;"></span>-->
            <div class="d-flex justify-content-between align-items-center">
                <span class="blue-text" style="font-size : 12px; padding-right: 5px;">PLANS:</span>
                <span>{{$plans->total()}}</span>
            </div>
        </div>
    </div>

    <div class="row ind_search_div">
        <br />
        <!-- <div class="col-6 save-search">
            <span>SAVE YOUR SEARCH</span>
          </div>
          <div class="col-6">
            <input type="text" placeholder="Nickname" style="width : 75%" class="save_search_box" />
            <button
              class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding save_search_button"
              type="button"
            >Save</button>
          </div>-->
    </div>
</div>
<!-- Sorting on mobile -->

<div class="row">
    @foreach ($plans as $plan)
    <div class="col-sm-4">
        <div class="plan-list mt-3">
            <div class="row align-items-center py-2 px-1">
                <div class="col-8">
                    <p class="plan-name font-weight-bold mb-0">
                        {{ number_format($plan->square_ft['str_total']) }} sq ft |
                        <span class="text-white">plan {{ $plan->plan_number }}</span>
                    </p>
                </div>
                <div class="col-4">
                    <ul class="list-inline mb-0 text-right font-icons">
                        <li class="list-inline-item icon-heart-mob">
                            <a href="#">
                                <i class="far fa-heart plan-heart"></i>
                            </a>
                        </li>
                        <li class="list-inline-item icon-search-mob">
                            <a href="#">
                                <i class="fas fa-search" style="color:white"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="position-relative">
                <div id="plan{{$plan->id}}" class="carousel slide" data-ride="carousel" data-interval="false">
                    <a href="{{route('plan.view', $plan->plan_number)}}" class="carousel-inner">
                        @foreach ($plan->images as $img)
                        <div class="carousel-item @if($loop->index === 0) active @endif">
                            <div class="embed-responsive embed-responsive-4by3 plans-list-search">
                                <img src="/storage/plans/{{$plan->id}}/thumb/{{$img->file_name}}" alt
                                    class="embed-responsive-item" />
                                @if($img->camera_icon)
                                <a href="#" class="position-absolute icon-camera">
                                    <img src="/images/icons/icon-camera.png" alt />
                                </a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </a>
                    <a class="carousel-control-prev" href="#plan{{$plan->id}}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#plan{{$plan->id}}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="false"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="media planinfo text-left position-absolute placeholder-black">
                    <img class="mr-1 align-self-center" src="/images/icons/logo-placeholder.png"
                        alt="Generic placeholder image" />
                    <div class="media-body">
                        <h5 class="mb-0 text-white">
                            plan
                            <span class="text-secondary">{{ $plan->plan_number }}</span>
                        </h5>
                        <h5 class="m-0 text-white">
                            houseplans
                            <span class="text-secondary">bydavidwiggins.com</span>
                        </h5>
                    </div>
                </div>
                <!-- <a href="#" class="position-absolute pinterest">
                <img src="/images/icons/icon-pinterest.png" alt />
              </a>-->
            </div>
            <div class="row no-gutters plan-info">
                <div class="col bg-light">
                    bed
                    <strong class="d-block">
                        {{ $plan->rooms['r_bedrooms'] }}
                    </strong>
                </div>
                <div class="col">
                    bath
                    <strong class="d-block">
                        {{$plan->rooms['r_full_baths']}}
                    </strong>
                </div>
                <div class="col bg-light">
                    story
                    <strong class="d-block">
                        {{ $plan->dimensions['stories'] }}
                    </strong>
                </div>
                <div class="col">
                    gar
                    <strong class="d-block">
                        {{ $plan->garage['car'] }}
                    </strong>
                </div>
                <div class="col bg-light">
                    width
                    <span class="d-block">
                        {{ $plan->dimensions['width_ft'] }}’
                        {{ $plan->dimensions['width_in'] }}"
                    </span>
                </div>
                <div class="col">
                    depth
                    <span class="d-block">
                        {{ $plan->dimensions['depth_ft'] }}’
                        {{ $plan->dimensions['depth_in'] }}”
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@include('partials.plans-list-filter')
<!-- Sorting on mobile -->
<div class="desktop-off">
    <br />
    <div class="row page-name sort-by-sec d-flex justify-content-between align-items-center">
        <div class="col-5" style="padding: 0 5px 0 0;">
            <div class>
                <select name="order" class="form-control form-control-sm rounded-0">
                    <option value="popular">Most Popular</option>
                    <option value="recent">Newest</option>
                    <option value="s_l">Small to Large</option>
                    <option value="l_s">Large to Small</option>
                </select>
            </div>
        </div>
        <div class="col-5" style="padding: 0 5px 0 0;">
            <div class="text-center text-sm-right">
                <ul class="list-inline m-0 paging">
                    <li class="list-inline-item">
                        <button class="btn btn-sm btn-secondary rounded-0">&lt; Prev</button>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn btn-sm btn-secondary rounded-0">&gt; Next</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-2 navbar-light" style="padding: 0;">
            <!-- <span>Filter</span>
            <span class="navbar-toggler-icon" style="height : 24px;"></span>-->
            <div class="d-flex justify-content-between align-items-center">
                <span class="blue-text" style="font-size : 12px; padding-right: 5px;">PLANS:</span>
                <span>{{$plans->total()}}</span>
            </div>
        </div>
    </div>

    <div class="row ind_search_div">
        <br />
        <!-- <div class="col-6 save-search">
            <span>SAVE YOUR SEARCH</span>
          </div>
          <div class="col-6">
            <input type="text" placeholder="Nickname" style="width : 75%" class="save_search_box" />
            <button
              class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding save_search_button"
              type="button"
            >Save</button>
          </div>-->
    </div>
</div>

<!-- QuickView Modal -->
{{-- <div class="modal fade" id="quickView" tabindex="-1" role="dialog" aria-labelledby="QuickView" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{selectedPlan.name}}: House Plan {{selectedPlan.plan_number}}</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-7">
            <ul class="nav mt-2" id="floorPlan" role="tablist">
                <li class="nav-item">
                    <a class="nav-link rounded-0 active" id="first-floor" data-toggle="tab" href="#first"
                        role="tab">First Floor Plan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-0" id="second-floor" data-toggle="tab" href="#second" role="tab">Second
                        Floor Plan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-0" id="basement-floor" data-toggle="tab" href="#basement"
                        role="tab">Basement Floor Plan</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent1">
                <div class="tab-pane fade show active" id="first" role="tabpanel">
                    <img v-for="img in selectedPlan.images_first" :key="img.id"
                        :src="`/storage/plans/${selectedPlan.id}/${img.file_name}`" alt
                        class="img-fluid mx-auto d-block" />
                </div>
                <div class="tab-pane fade" id="second" role="tabpanel">
                    <img v-for="img in selectedPlan.images_second" :key="img.id"
                        :src="`/storage/plans/${selectedPlan.id}/${img.file_name}`" alt
                        class="img-fluid mx-auto d-block" />
                </div>
                <div class="tab-pane fade" id="basement" role="tabpanel">
                    <img v-for="img in selectedPlan.images_basement" :key="img.id"
                        :src="`/storage/plans/${selectedPlan.id}/${img.file_name}`" alt
                        class="img-fluid mx-auto d-block" />
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="plan-list">
                <div class="row align-items-center py-2 px-1">
                    <div class="col-8">
                        <p class="plan-name font-weight-bold mb-0">
                            {{ selectedPlan.square_ft ? numberFormat(selectedPlan.square_ft.str_total) : "" }}
                            sq ft |
                            <span class="text-white">plan {{selectedPlan.plan_number}}</span>
                        </p>
                    </div>
                    <div class="col-4">
                        <ul class="list-inline mb-0 text-right">
                            <li class="list-inline-item">
                                <a href="#" @click.prevent="savePlan(selectedPlan, selectedPlan.index)">
                                    <i
                                        :class="[selectedPlan.saved_plans && selectedPlan.saved_plans.length ? 'fas' : 'far', 'fa-heart', 'plan-heart']"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="position-relative">
                    <div :id="'plan-view' + selectedPlan.id" class="carousel slide" data-ride="carousel"
                        data-interval="1800">
                        <a :href="'/plan/' + selectedPlan.plan_number" class="carousel-inner">
                            <div class="carousel-item" :class="{ active: index === 0 }"
                                v-for="(image, index) in selectedPlan.images" :key="image.id">
                                <img :src="
                        '/storage/plans/' + selectedPlan.id + '/thumb/' + image.file_name
                      " alt class="img-fluid d-block w-100" />
                                <a v-if="image.camera_icon" href="#" class="position-absolute icon-camera">
                                    <img src="/images/icons/icon-camera.png" alt />
                                </a>
                            </div>
                        </a>
                        <a class="carousel-control-prev" @click.prevent :href="'#plan-view' + selectedPlan.id"
                            role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" @click.prevent :href="'#plan-view' + selectedPlan.id"
                            role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="false"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="media planinfo text-left position-absolute placeholder-black">
                        <img class="mr-1 align-self-center" src="/images/icons/logo-placeholder.png"
                            alt="Generic placeholder image" />
                        <div class="media-body">
                            <h5 class="mb-0 text-white">
                                plan
                                <span class="text-secondary">{{ selectedPlan.plan_number }}</span>
                            </h5>
                            <h5 class="m-0 text-white">
                                houseplans
                                <span class="text-secondary">bydavidwiggins.com</span>
                            </h5>
                        </div>
                    </div>
                    <!-- <a href="#" class="position-absolute pinterest">
                        <img src="images/icons/icon-pinterest.png" alt />
                      </a>-->
                </div>
            </div>
            <div class="row text-center no-gutters">
                <div class="col py-1 border border-light font-weight-semi-bold">
                    Sq. Ft.
                    <span
                        class="d-block text-secondary">{{ selectedPlan.square_ft ? selectedPlan.square_ft.str_total : "" }}</span>
                </div>
                <div class="col py-1 border border-light font-weight-semi-bold bg-secondary">
                    1st Fl
                    <span
                        class="d-block text-white">{{ selectedPlan.square_ft ? selectedPlan.square_ft['1_floor'] : "" }}</span>
                </div>
                <div class="col py-1 border border-light font-weight-semi-bold">
                    2nd Fl
                    <span
                        class="d-block text-secondary">{{ selectedPlan.square_ft ? selectedPlan.square_ft['2_floor'] : "" }}</span>
                </div>
                <div class="col py-1 border border-light font-weight-semi-bold bg-secondary">
                    Garages
                    <span class="d-block text-white">{{ selectedPlan.garage ? selectedPlan.garage.car : "" }}
                        car</span>
                </div>
            </div>
            <div class="row text-center no-gutters">
                <div class="col py-1 border border-light font-weight-semi-bold bg-secondary">
                    Beds
                    <span
                        class="d-block text-white">{{ selectedPlan.rooms ? selectedPlan.rooms.r_bedrooms : "" }}</span>
                </div>
                <div class="col py-1 border border-light font-weight-semi-bold">
                    Baths
                    <span
                        class="d-block text-secondary">{{ selectedPlan.rooms ? selectedPlan.rooms.r_full_baths : "" }}</span>
                </div>
                <div class="col py-1 border border-light font-weight-semi-bold bg-secondary">
                    Width
                    <span
                        class="d-block text-white">{{ selectedPlan.dimensions ? `${selectedPlan.dimensions.width_ft}' ${selectedPlan.dimensions.width_in}"` : "" }}</span>
                </div>
                <div class="col py-1 border border-light font-weight-semi-bold">
                    Depth
                    <span
                        class="d-block text-secondary">{{ selectedPlan.dimensions ? `${selectedPlan.dimensions.depth_ft}' ${selectedPlan.dimensions.depth_in}"` : "" }}</span>
                </div>
            </div>
            <div class="text-center px-5">
                <p>
                    <a :href="`/plan/${selectedPlan.plan_number}`"
                        class="btn btn-primary btn-block text-uppercase rounded-0 mt-3">Purchase
                        Plans</a>
                </p>
                <p>
                    <a :href="`/plan/${selectedPlan.plan_number}`" class="btn btn-primary btn-block rounded-0 mt-3">View
                        ALL plan details</a>
                </p>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div> --}}
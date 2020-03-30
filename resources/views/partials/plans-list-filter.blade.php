<div class="page-name mt-3 py-2 px-2 mobile-off">
    <form action="{{route('change-filter-url')}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" value="{{Route::currentRouteName()}}" name="action_name">
        <input type="hidden" value="{{$plans->currentPage()}}" name="old_page">
        <input type="hidden" value="{{json_encode(request()->route()->parameters())}}" name="action_params">
        <div class="row align-items-center">
            <div class="col-sm-3 col-md-5 col-lg-4">
                <div class="form-inline">
                    <div class="form-group">
                        <label for>Sort:</label>
                        <select onchange="this.form.submit()" name="order"
                            class="form-control form-control-sm rounded-0">
                            <option value="popular">Most Popular</option>
                            <option @if(request()->route()->parameter('order')=='recent') selected @endif
                                value="recent">Newest</option>
                            <option @if(request()->route()->parameter('order')=='s_l') selected @endif value="s_l">Small
                                to Large</option>
                            <option @if(request()->route()->parameter('order')=='l_s') selected @endif value="l_s">Large
                                to Small</option>
                        </select>
                    </div>
                    <div class="form-group ml-2">
                        <label for>Views:</label>
                        <select onchange="this.form.submit()" name="views"
                            class="form-control form-control-sm rounded-0">
                            <option value="24">24</option>
                            <option @if(request()->route()->parameter('views')=='50') selected @endif value="50">50
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <br />
            <div class="col-sm-4 col-md-6 col-lg-3 text-center">
                <!-- <div class="row align-items-center no-gutters">
                  <div class="col-6 save-search">
                    <h6 class="font-futura m-0 ls-1 text-right pr-2">SAVE SEARCH</h6>
                  </div>
                  <div class="col-6">
                    <div class="form-group text-left m-0">
                      <div class="input-group input-group-sm">
                        <input
                          type="text"
                          class="form-control rounded-0 border-secondary"
                          placeholder="Nickname"
                        />
                        <div class="input-group-append">
                          <button
                            class="btn btn-primary rounded-0 text-white font-weight-semi-bold"
                            type="button"
                          >
                            Save
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>-->
            </div>
            <div class="col-sm-5 col-md-12 col-lg-5">
                <div class="text-center text-sm-right search_pagination">
                    <ul class="list-inline m-0 paging">
                        <li class="list-inline-item">
                            <a href="{{$plans->previousPageUrl()}}"
                                class="btn btn-sm btn-secondary rounded-0 @if($plans->currentPage() === 1) disabled @endif">&lt;
                                Prev</a>
                        </li>
                        <li class="list-inline-item text-secondary">Page</li>
                        <li class="list-inline-item">
                            <input value="{{$plans->currentPage()}}" type="text" name="page"
                                class="form-control rounded-0" />
                        </li>
                        <li class="list-inline-item">
                            <span class="text-secondary">of</span>
                            {{$plans->lastPage()}}
                        </li>
                        <li class="list-inline-item">
                            <a href="{{$plans->nextPageUrl()}}"
                                class="btn btn-sm btn-secondary rounded-0 @if($plans->currentPage() === $plans->lastPage()) disabled @endif">Next
                                &gt;</a>
                        </li>
                        <li class="list-inline-item ml-2">
                            <strong>
                                <span class="text-primary">PLANS:</span>
                                {{$plans->total()}}
                            </strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Sorting on mobile -->
<div class="desktop-off">
    <br />
    <form action="{{route('change-filter-url')}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" value="{{Route::currentRouteName()}}" name="action_name">
        <input type="hidden" value="{{$plans->currentPage()}}" name="old_page">
        <input type="hidden" value="{{json_encode(request()->route()->parameters())}}" name="action_params">
        <input type="hidden" value="24" name="views">
        <div class="row page-name sort-by-sec d-flex justify-content-between align-items-center">
            <div class="col-5" style="padding: 0 5px 0 0;">
                <div class>
                    <select onchange="this.form.submit()" name="order" class="form-control form-control-sm rounded-0">
                        <option value="popular">Most Popular</option>
                        <option @if(request()->route()->parameter('order')=='recent') selected @endif
                            value="recent">Newest</option>
                        <option @if(request()->route()->parameter('order')=='s_l') selected @endif value="s_l">Small
                            to Large</option>
                        <option @if(request()->route()->parameter('order')=='l_s') selected @endif value="l_s">Large
                            to Small</option>
                    </select>
                </div>
            </div>
            <div class="col-5" style="padding: 0 5px 0 0;">
                <div class="text-center text-sm-right">
                    <ul class="list-inline m-0 paging">
                        <li class="list-inline-item">
                            <a href="{{$plans->previousPageUrl()}}"
                                class="btn btn-sm btn-secondary rounded-0 @if($plans->currentPage() === 1) disabled @endif">&lt;
                                Prev</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{$plans->nextPageUrl()}}"
                                class="btn btn-sm btn-secondary rounded-0 @if($plans->currentPage() === $plans->lastPage()) disabled @endif">Next
                                &gt;</a>
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
    </form>
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
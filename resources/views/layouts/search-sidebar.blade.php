<div class="sidebar-left col-md-5 col-lg-3 order-md-1 order-2">
    <div class="row mobile-off">
        <div class="col-sm-12">
            <div class="plan-cta position-relative mb-2">

                <div class="search-grid search-grid1">
                    <div class="font-weight-bold sidebar-heading">House Plan Search</div>
                    <TABLE>
                        <tr>
                            <TD>Sq. Ft.</TD>
                            <td> <input type="text" placeholder="min" size=5 class="center" name="min"> to <input type="text" placeholder="max" size=5 class="center" name="max"></td>
                        </tr>
                        <tr>
                            <TD>Beds</TD>
                            <td> <div><span class="min_icon beds-remove"> <i class="fa fa-minus"> </i></span> <input type="text" name="" value="1" class="qty"> 
                        <span class="max_icon beds-add"><i class="fa fa-plus"></i></span></div></td>
                        </tr>
                        <tr>
                            <TD>Baths</TD>
                          <td> <div><span class="min_icon  baths-remove"> <i class="fa fa-minus"> </i></span> <input type="text" name="" value="1" class="qty"> 
                        <span class="max_icon  baths-add"><i class="fa fa-plus"></i></span></div></td>
                        </tr>
                        <tr>
                            <TD>Garages</TD>
                           <td> <div><span class="min_icon   garage-remove"> <i class="fa fa-minus"> </i></span> <input type="text" name="" value="1" class="qty"> 
                        <span class="max_icon  garage-add"><i class="fa fa-plus"></i></span></div></td>
                        </tr>
                        <tr>
                            <TD>Stories</TD>
                          <td> <div><span class="min_icon  stories_reduce"> <i class="fa fa-minus"> </i></span> <input type="text" name="" value="1" class="qty"> 
                        <span class="max_icon  stories_add"><i class="fa fa-plus"></i></span></div></td>
                        </tr>
                        <tr>
                            <TD>Width</TD>
                            <td> <input type="text" placeholder="min" size=5 class="center"> to <input type="text" placeholder="max" size=5 class="center"><span class="optional">Optional</span></td>

                        </tr>
                        <tr>
                            <TD>Depth</TD>
                            <td> <input type="text" placeholder="min" size=5 class="center"> to <input type="text" placeholder="max" size=5 class="center"><span class="optional">Optional</span></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="search-button">
                                    <button class="btn btn-primary rounded-0 text-white font-weight-semi-bold" type="button"> View Search Results</button>
                                </div>
                            </td>
                        </tr>
                    </TABLE>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-sm-12">
            <div class="plan-cta position-relative mb-2">
                <div class="search-grid search-grid3 text-center">
                    <div class="font-weight-bold sidebar-heading">Architectural Styles </div>
                    <div class="features">
                        <ul class="list-unstyled text-primary">
                            @foreach(\Thd\Style::orderBy('name', 'ASC')->where('is_active', 1)->get() as $style)
                            <li><b><a href="{{ route('style.slug', $style->slug)}}">{{$style->name}}</a></b></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="plan-cta position-relative mb-2">
                <div class="search-grid search-grid4 text-center">
                    <div class="font-weight-bold sidebar-heading">Specialty Collections </div>
                    <div class="features">
                        <ul class="list-unstyled text-primary">
                            @foreach(\Thd\Collection::orderBy('name', 'ASC')->where('is_active', 1)->get() as $collection)
                                <li><b><a href="{{route('collection.slug', $collection->slug)}}">{{$collection->name}}</a></b></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
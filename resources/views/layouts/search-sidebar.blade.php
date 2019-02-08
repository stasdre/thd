<div class="sidebar-left col-md-5 col-lg-3 order-md-1 order-2">
    <div class="row mobile-off">
        <div class="col-sm-12">
            <div class="plan-cta position-relative mb-2">

                <div class="search-grid search-grid1">
                    <div class="font-weight-bold sidebar-heading">Basic House Plan Search</div>
                    <TABLE>
                        <tr>
                            <TD>Sq. Ft.</TD>
                            <td> <input type="text" placeholder="min" size=5 class="center"> to <input type="text" placeholder="max" size=5 class="center"></td>
                        </tr>
                        <tr>
                            <TD>Beds</TD>
                            <td> <span class="min_icon"> <i class="fa fa-minus"> </i></span> 1
                                <span class="max_icon"><i class="fa fa-plus"></i></span></td>
                        </tr>
                        <tr>
                            <TD>Baths</TD>
                            <td> <span class="min_icon"> <i class="fa fa-minus"> </i></span> 1
                                <span class="max_icon"><i class="fa fa-plus"></i></span></td>
                        </tr>
                        <tr>
                            <TD>Garages</TD>
                            <td> <span class="min_icon"> <i class="fa fa-minus"> </i></span> 1
                                <span class="max_icon"><i class="fa fa-plus"></i></span></td>
                        </tr>
                        <tr>
                            <TD>Stories</TD>
                            <td> <span class="min_icon"> <i class="fa fa-minus"> </i></span> 1
                                <span class="max_icon"><i class="fa fa-plus"></i></span></td>
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
                            @foreach(\Thd\Style::orderBy('name', 'ASC')->get() as $style)
                            <li><a href="{{$style->slug}}">{{$style->name}}</a></li>
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
                            @foreach(\Thd\Collection::orderBy('name', 'ASC')->get() as $collection)
                                <li><a href="{{$collection->slug}}">{{$collection->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
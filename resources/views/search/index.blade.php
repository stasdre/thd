@extends('layouts.index')

@section('content')
<div class="row" style="margin-top: 50px;">
    <div class="col-sm-4">
        <form action="{{ route('search') }}" method="get">
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label">Sq. Ft.</label>
                    <div class="col-sm-3">
                        <input class="form-control" placeholder="min" name="ft_min" value="{{request('ft_min')}}" type="text">
                    </div>
                    <div class="col-sm-3">
                        <input class="form-control" placeholder="max" name="ft_max" value="{{request('ft_max')}}" type="text">
                    </div>
                </div>
            </div>
            <div class="form-group">
                Beds:<br>
                <input id="ex13" type="text" name="beds" data-slider-ticks="[1, 2, 3, 4]" data-slider-step="1" data-slider-min="1" data-slider-max="4" data-slider-value="{{request('beds', 1)}}" data-slider-ticks-labels='["1+", "2+", "3+", "4+"]'/>
            </div>
            <div class="form-group">
                Baths:<br>
                <input id="ex14" type="text" name="baths" data-slider-ticks="[1, 2, 3, 4]" data-slider-step="1" data-slider-min="1" data-slider-max="4" data-slider-value="{{request('baths', 1)}}" data-slider-ticks-labels='["1+", "2+", "3+", "4+"]'/>
            </div>
            <div class="form-group">
                1/2 Baths:<br>
                <input id="ex15" type="text" name="half_baths" data-slider-ticks="[0, 1, 2, 3, 4]" data-slider-step="1" data-slider-min="0" data-slider-max="4" data-slider-value="{{request('half_baths', 0)}}" data-slider-ticks-labels='["0", "1+", "2+", "3+", "4+"]'/>
            </div>
            <div class="form-group">
                Garages:<br>
                <input id="ex16" type="text" name="garages" data-slider-ticks="[1, 2, 3, 4]" data-slider-step="1" data-slider-min="1" data-slider-max="4" data-slider-value="{{request('garages', 1)}}" data-slider-ticks-labels='["1+", "2+", "3+", "4+"]'/>
            </div>
            <div class="form-group">
                Stories:<br>
                <input id="ex17" type="text" name="stories" data-slider-ticks="[0, 1, 2, 3, 4]" data-slider-step="1" data-slider-min="0" data-slider-max="4" data-slider-value="{{request('stories', 0)}}" data-slider-ticks-labels='["0", "1+", "2+", "3+", "4+"]'/>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label">Width</label>
                    <div class="col-sm-3">
                        <input class="form-control" placeholder="min" name="w_min" value="{{request('w_min')}}" type="text">
                    </div>
                    <div class="col-sm-3">
                        <input class="form-control" placeholder="max" name="w_max" value="{{request('w_max')}}" type="text">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label">Depth</label>
                    <div class="col-sm-3">
                        <input class="form-control" placeholder="min" name="d_min" value="{{request('d_min')}}" type="text">
                    </div>
                    <div class="col-sm-3">
                        <input class="form-control" placeholder="max" name="d_max" value="{{request('d_max')}}" type="text">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <div class="col-sm-8">
        <div class="row" style="padding-bottom: 20px">
        @forelse ($plans as $plan)
                    <div class="col-sm-6">
                        <div class="card" style="width: 18rem;">
                            @isset($plan->images[0]->file_name)
                                <img class="card-img-top" src="{{ '/storage/plans/'.$plan->id.'/thumb/'.$plan->images[0]->file_name }}" alt="Card image cap">
                            @endisset
                            <div class="card-body">
                                <h5 class="card-title">Plan {{$plan->plan_number}}</h5>
                                <a href="{{ route('plan.view', $plan->id) }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>

            @if( ($loop->iteration % 2) == 0)
            </div>
            <div class="row" style="padding-bottom: 20px">
            @endif
        @empty
            <p>No result</p>
        @endforelse
        </div>

        {{ $plans->appends(request()->input())->links('partials.paginate') }}
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/bootstrap-slider.min.js') }}"></script>
<script>
    $("#ex13, #ex14, #ex16, #ex17").slider({
        ticks: [1, 2, 3, 4],
        ticks_labels: ['1+', '2+', '3+', '4+'],
    });
    $("#ex15").slider({
        ticks: [0, 1, 2, 3, 4],
        ticks_labels: ['0', '1+', '2+', '3+', '4+'],
    });
</script>
@endpush
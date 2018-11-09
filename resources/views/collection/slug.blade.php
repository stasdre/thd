@extends('layouts.index')

@section('content')
    {!! $collection->description !!}
    <hr>
    <div class="row" style="padding-bottom: 20px">
        @forelse ($plans as $plan)
            <div class="col-sm-4">
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

            @if( ($loop->iteration % 3) == 0)
                </div>
                <div class="row" style="padding-bottom: 20px">
            @endif
        @empty
            <p>No result</p>
        @endforelse
    </div>

    {{ $plans->appends(request()->input())->links('partials.paginate') }}
@endsection
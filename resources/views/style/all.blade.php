@extends('layouts.index')

@section('content')
    <div class="row" style="padding-bottom: 20px">
        @forelse ($styles as $style)
            <div class="col-sm-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $style->name }}</h5>
                        <a href="{{ route('style.slug', $style->slug) }}" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>

            @if( ($loop->iteration % 4) == 0)
    </div>
    <div class="row" style="padding-bottom: 20px">
        @endif
        @empty
            <p>No result</p>
        @endforelse
    </div>
@endsection
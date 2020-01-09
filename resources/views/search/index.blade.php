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
<div class="search-results" id="plans-search" v-cloak>
  <plans-list></plans-list>
</div>
@endsection

@push('scripts')
<script src="/js/plans-search.js"></script>
@endpush
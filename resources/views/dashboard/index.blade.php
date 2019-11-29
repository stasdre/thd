@extends('layouts.index')

@section('content')
<h3 class="font-weight-bold">Saved House Plans</h3>
<div class="search-results" id="plans-search" v-cloak>
  <plans-list saved-user="{{Auth::id()}}"></plans-list>
</div>
@endsection

@push('scripts')
<script src="/js/plans-search.js"></script>
@endpush
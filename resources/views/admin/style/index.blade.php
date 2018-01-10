@extends('admin.layouts.master')

@section('title', 'House Plans styles')

@section('breadcrumbs', Breadcrumbs::render('style'))

@section('content')
    <div class="box box-default">
        <div class="box-tools pull-left">
            <a class="btn btn-primary" href="{{ route('styles.create') }}" role="button">Create new Style</a>
        </div>
    </div>
@endsection

@push('datatables')
<script src="{{ asset('js/admin/datatables.js') }}"></script>
@endpush

@extends('admin.layouts.master')

@section('title', 'Create new Collection')

@section('breadcrumbs', Breadcrumbs::render('collection-create'))

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
        </div>
        @include('admin.collection._form')
    </div>
@endsection

@push('tinymce')
    <script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

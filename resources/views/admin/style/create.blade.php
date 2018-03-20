@extends('admin.layouts.master')

@section('title', 'Create new House Plan style')

@section('breadcrumbs', Breadcrumbs::render('style-create'))

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
        </div>
        @include('admin.style._form')
    </div>
@endsection

@push('tinymce')
    <script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

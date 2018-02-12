@extends('admin.layouts.master')

@section('title', 'Edit slide '.$gallery->name)

@section('breadcrumbs', Breadcrumbs::render('gallery-edit', $gallery))

@section('content')
    <div class="box box-default">
        @include('admin.gallery._form')
    </div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

@extends('admin.layouts.master')

@section('title', 'Edit '.$addon->name)

@section('breadcrumbs', Breadcrumbs::render('addons-edit', $addon))

@section('content')
    <div class="box box-default">
        @include('admin.addon._form')
    </div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

@extends('admin.layouts.master')

@section('title', 'Create new Add-On')

@section('breadcrumbs', Breadcrumbs::render('addons-create'))

@section('content')
<div class="box box-default">
    @include('admin.addon._form')
</div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

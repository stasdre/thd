@extends('admin.layouts.master')

@section('title', 'Create new Package')

@section('breadcrumbs', Breadcrumbs::render('package-create'))

@section('content')
<div class="box box-default">
    @include('admin.package._form')
</div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

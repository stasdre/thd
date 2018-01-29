@extends('admin.layouts.master')

@section('title', 'Edit '.$package->name)

@section('breadcrumbs', Breadcrumbs::render('package-edit', $package))

@section('content')
    <div class="box box-default">
        @include('admin.package._form')
    </div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

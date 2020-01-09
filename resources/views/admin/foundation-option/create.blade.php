@extends('admin.layouts.master')

@section('title', 'Create new Foundation options')

@section('breadcrumbs', Breadcrumbs::render('foundation-options-create'))

@section('content')
<div class="box box-default">
    @include('admin.foundation-option._form')
</div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

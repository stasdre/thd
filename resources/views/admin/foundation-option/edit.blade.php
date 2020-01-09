@extends('admin.layouts.master')

@section('title', 'Edit '.$foundation_option->name)

@section('breadcrumbs', Breadcrumbs::render('foundation-options-edit', $foundation_option))

@section('content')
    <div class="box box-default">
        @include('admin.foundation-option._form')
    </div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

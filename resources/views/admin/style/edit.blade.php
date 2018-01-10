@extends('admin.layouts.master')

@section('title', 'Edit '.$style->name)

@section('breadcrumbs', Breadcrumbs::render('style-edit', $style))

@section('content')
    <div class="box box-default">
        @include('admin.style._form')
    </div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

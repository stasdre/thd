@extends('admin.layouts.master')

@section('title', 'Edit slide '.$gallery->name)

@section('content')
    <div class="box box-default">
        @include('admin.mobile-new._form')
    </div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

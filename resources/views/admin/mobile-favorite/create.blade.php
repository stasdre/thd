@extends('admin.layouts.master')

@section('title', 'Create new Slide')

@section('content')
    <div class="box box-default">
        @include('admin.mobile-favorite._form')
    </div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

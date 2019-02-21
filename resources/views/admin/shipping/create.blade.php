@extends('admin.layouts.master')

@section('title', 'Create new Shipping')

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
        </div>
        @include('admin.shipping._form')
    </div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

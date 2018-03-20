@extends('admin.layouts.master')

@section('title', 'Edit '.$collection->name)

@section('breadcrumbs', Breadcrumbs::render('collection-edit', $collection))

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
        </div>
        @include('admin.collection._form')
    </div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

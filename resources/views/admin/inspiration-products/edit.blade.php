@extends('admin.layouts.master')

@section('title', 'Edit '.$inspirationProduct->name.' product')

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
        </div>
        @include('admin.inspiration-products._form')
    </div>
@endsection
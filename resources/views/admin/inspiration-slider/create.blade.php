@extends('admin.layouts.master')

@section('title', 'Create new slider')

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
        </div>
        @include('admin.inspiration-slider._form')
    </div>
@endsection
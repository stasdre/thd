@extends('admin.layouts.master')

@section('title', 'Edit '.$inspirationSlider->name.' slider')

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
        </div>
        @include('admin.inspiration-slider._form')
    </div>
@endsection
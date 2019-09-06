@extends('admin.layouts.master')

@section('title', 'Create new page')

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
        </div>
        @include('admin.inspiration._form')
    </div>
@endsection
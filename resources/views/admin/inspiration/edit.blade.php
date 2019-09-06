@extends('admin.layouts.master')

@section('title', 'Edit '.$inspiration->name.' page')

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
        </div>
        @include('admin.inspiration._form')
    </div>
@endsection
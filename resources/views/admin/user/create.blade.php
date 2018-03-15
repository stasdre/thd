@extends('admin.layouts.master')

@section('title', 'Create new User')

@section('content')
    <div class="box box-default">
        @include('admin.user._form')
    </div>
@endsection
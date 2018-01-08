@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('breadcrumbs', Breadcrumbs::render('dashboard'))

@section('content')
    <div class="box box-default">
        <div class="box-body">
            Content dashboard
        </div>
    </div>
@endsection
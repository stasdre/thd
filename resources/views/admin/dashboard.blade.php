@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('breadcrumbs', Breadcrumbs::render('dashboard'))

@section('content')
    <!-- alerts example
    @component('partials.alert', ['type'=>'success', 'autoHide'=>1])
        @slot('title')
            Forbidden
        @endslot
        Error
    @endcomponent
    -->
    <div class="box box-default">
        <div class="box-body">
            Content dashboard
        </div>
    </div>
@endsection
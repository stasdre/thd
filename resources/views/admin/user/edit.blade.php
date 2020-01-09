@extends('admin.layouts.master')

@section('title', 'Edit '.$user->name)

@section('breadcrumbs', Breadcrumbs::render('user-edit', $user))

@section('content')
    <div class="box box-default">
        @include('admin.user._form')
    </div>
@endsection
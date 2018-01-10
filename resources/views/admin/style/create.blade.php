@extends('admin.layouts.master')

@section('title', 'Create new House Plan style')

@section('breadcrumbs', Breadcrumbs::render('style-create'))

@section('content')
    @if ($errors->any())
        @component('partials.alert', ['type'=>'danger'])
            @slot('title')
                Error
            @endslot
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endcomponent
    @endif

    <div class="box box-default">
        @include('admin.style._form')
    </div>
@endsection
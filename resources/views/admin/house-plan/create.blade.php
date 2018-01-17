@extends('admin.layouts.master')

@section('title', 'Create new House Plan')

@section('breadcrumbs', Breadcrumbs::render('plans-create'))

@section('content')
    <div class="box box-default">
        @if(Route::currentRouteName() == 'house-plan.edit')
            {{ Form::model($plan, ['route' => ['house-plan.update', $plan->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) }}
        @else
            {!! Form::open(['route' => 'house-plan.store', 'class' => 'form-horizontal', 'method' => 'post']) !!}
        @endif
        <div class="box-header with-border">
            <div class="row">
                <div class="col-sm-6">
                    <h3 style="margin-top: 0px;">General Information</h3>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success pull-right">Save & Next step</button>
                </div>
            </div>
        </div>
        <div class="box-body">
            @include('admin.house-plan._form-general')
        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="{{ route('house-plan.index') }}" role="button">Cancel</a>
            <button type="submit" class="btn btn-success pull-right">Save & Next step</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush
@extends('admin.layouts.master')

@section('title', 'Create new House Plan')

@section('breadcrumbs', Breadcrumbs::render('plans-create'))

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <div class="col-sm-8">
                @include('admin._plans_menu')
            </div>
            <div class="col-sm-4" style="padding-top: 5px;">
                <a class="btn btn-default" href="{{ route('house-plan.index') }}" role="button">Cancel</a>
                <a role="button" id="plans-submit-close" href="#" class="btn btn-warning">Save & Close</a>
                <a role="button" id="plans-submit-next" href="#" class="btn btn-success">Save & Next step</a>
            </div>
        </div>
        <div class="box-body">
            {!! Form::open(['route' => 'house-plan.store', 'class' => 'form-horizontal', 'id'=>'plans-form', 'method' => 'post']) !!}
                @include('admin.house-plan._form-general')
            {!! Form::close() !!}
        </div>
        <div class="box-footer">
        </div>
    </div>
@endsection
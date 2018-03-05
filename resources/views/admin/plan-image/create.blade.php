@extends('admin.layouts.master')

@section('title', 'Create new House Plan')

@section('breadcrumbs', Breadcrumbs::render('plans-create'))

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <div class="col-sm-8">
                @include('admin._plans_menu', ['active'=>'graphics', 'plan'=>$plan->id])
            </div>
            <div class="col-sm-4" style="padding-top: 5px;">
                <a class="btn btn-default" href="{{ route('house-plan.index') }}" role="button">Cancel</a>
                <a role="button" href="{{ route('house-plan.index') }}" class="btn btn-warning">Save & Close</a>
                <a role="button" href="#" class="btn btn-success">Save & Next step</a>
            </div>
        </div>
        <div class="box-body">
            @include('admin.plan-image._form-images')
        </div>
        <div class="box-footer">
        </div>
    </div>
@endsection
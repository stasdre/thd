@extends('admin.layouts.master')

@section('title', 'Create new House Plan')

@section('breadcrumbs', Breadcrumbs::render('plans-create'))

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            @include('admin._plans_menu', ['active'=>'features', 'plan'=>$plan->id])
        </div>
        <div class="box-body">
            {!! Form::open(['route' => ['plan-features.update', $plan->id], 'class' => 'form-horizontal', 'id'=>'plans-feature', 'method' => 'post']) !!}
                @include('admin.plan-feature._form-features')
            {!! Form::close() !!}
        </div>
        <div class="box-footer">
            <div class="col-sm-9">
                <a class="btn btn-default" href="{{ route('house-plan.index') }}" role="button">Cancel</a>
            </div>
            <div class="col-sm-3" style="padding-top: 5px;">
                <a role="button" id="feature-submit-close" href="#" class="btn btn-warning">Save & Close</a>
                <a role="button" id="feature-submit-next" href="#" class="btn btn-success">Save & Next step</a>
            </div>
        </div>
    </div>
@endsection
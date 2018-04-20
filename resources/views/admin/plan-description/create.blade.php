@extends('admin.layouts.master')

@section('title', 'Create new House Plan')

@section('breadcrumbs', Breadcrumbs::render('plans-create'))

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            @include('admin._plans_menu', ['active'=>'desc', 'plan'=>$plan])
        </div>
        <div class="box-body">
            {!! Form::model($plan, ['route' => ['plan-desc.update', $plan->id], 'class' => 'form-horizontal', 'id'=>'plan-desc', 'method' => 'post']) !!}
                @include('admin.plan-description._form-description')
            {!! Form::close() !!}
        </div>
        <div class="box-footer">
            <div class="col-sm-9">
                <a class="btn btn-default" href="{{ route('house-plan.index') }}" role="button">Cancel</a>
            </div>
            <div class="col-sm-3">
                <a role="button" id="desc-submit-close" href="#" class="btn btn-warning">Save & Close</a>
                <a role="button" id="desc-submit-next" href="#" class="btn btn-success">Save & Next step</a>
            </div>
        </div>
    </div>
@endsection
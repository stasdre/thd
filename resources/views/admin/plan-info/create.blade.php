@extends('admin.layouts.master')

@section('title', 'Create new House Plan')

@section('breadcrumbs', Breadcrumbs::render('plans-info-create', $plan))

@section('content')
    <div class="box box-default">
        {!! Form::open(['route' => ['plan-info.store', $plan->id], 'class' => 'form-horizontal', 'method' => 'post']) !!}
        <div class="box-header with-border">
            <div class="row">
                <div class="col-sm-6">
                    <h3 style="margin-top: 0px;">Plan Information</h3>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success pull-right">Save & Next step</button>
                    <a class="btn btn-link pull-right" href="{{ route('house-plan.edit', ['house_plan'=>$plan->id]) }}" role="button">Previous</a>
                </div>
            </div>
        </div>
        <div class="box-body">
            @include('admin.plan-info._form-info')
        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="{{ route('house-plan.index') }}" role="button">Cancel</a>

            <button type="submit" class="btn btn-success pull-right">Save & Next step</button>
            <a class="btn btn-link pull-right" href="{{ route('house-plan.edit', ['house_plan'=>$plan->id]) }}" role="button">Previous</a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
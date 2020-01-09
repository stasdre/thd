@extends('admin.layouts.master')

@section('title', 'Update '.$plan->name)

@section('breadcrumbs', Breadcrumbs::render('plans-edit', $plan))

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            @include('admin._plans_menu', ['active'=>'details', 'plan'=>$plan])
        </div>
        <div class="box-body">
            {{ Form::model($plan, ['route' => ['house-plan.update', $plan->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'id'=>'plans-form', 'files' => true]) }}
                @include('admin.house-plan._form-general')
            {!! Form::close() !!}
        </div>
        <div class="box-footer">
            <div class="col-sm-9">
                <a class="btn btn-default" href="{{ route('house-plan.index') }}" role="button">Cancel</a>
            </div>
            <div class="col-sm-3" style="padding-top: 5px;">
                <a role="button" id="plans-submit-close" href="#" class="btn btn-warning">Save & Close</a>
                <a role="button" id="plans-submit-next" href="#" class="btn btn-success">Save & Next step</a>
            </div>
        </div>
    </div>
@endsection
@extends('admin.layouts.master')

@section('title', 'Create new House Plan')

@section('breadcrumbs', Breadcrumbs::render('plans-create'))

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <div class="col-sm-8">
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="#">Plan Detail</a></li>
                    <li role="presentation" class="disabled"><a href="#">Graphics</a></li>
                    <li role="presentation" class="disabled"><a href="#">Key Features</a></li>
                    <li role="presentation" class="disabled"><a href="#">Plan Description</a></li>
                    <li role="presentation" class="disabled"><a href="#">Pricing Options</a></li>
                    <li role="presentation" class="disabled"><a href="#">Preview Plan Page</a></li>
                </ul>
            </div>
            <div class="col-sm-4" style="padding-top: 5px;">
                <a class="btn btn-default" href="{{ route('house-plan.index') }}" role="button">Cancel</a>
                <a role="button" id="plans-submit-close" href="#" class="btn btn-warning">Save & Close</a>
                <a role="button" id="plans-submit-next" href="#" class="btn btn-success">Save & Next step</a>
            </div>
        </div>
        @if(Route::currentRouteName() == 'house-plan.edit')
            {{ Form::model($plan, ['route' => ['house-plan.update', $plan->id], 'id'=>'plans-form', 'class' => 'form-horizontal', 'method' => 'PATCH']) }}
        @else
            {!! Form::open(['route' => 'house-plan.store', 'class' => 'form-horizontal', 'id'=>'plans-form', 'method' => 'post']) !!}
        @endif
        <div class="box-body">
            @include('admin.house-plan._form-general')
        </div>
        <div class="box-footer">
        </div>

        {!! Form::close() !!}
    </div>
@endsection
@extends('admin.layouts.master')

@section('title', 'Create new House Plan')

@section('breadcrumbs', Breadcrumbs::render('plans-create'))

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-sm-6">
                    <h3 style="margin-top: 0px;">Plan Images</h3>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success pull-right">Next step</button>
                </div>
            </div>
        </div>
        <div class="box-body">
            @include('admin.plan-image._form-images')
        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="{{ route('house-plan.index') }}" role="button">Cancel</a>
            <button type="submit" class="btn btn-success pull-right">Next step</button>
        </div>
    </div>
@endsection
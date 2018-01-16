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
        <div class="box-body">
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">General</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Images</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Packages</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    @include('admin.house-plan._form-general')
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    @include('admin.house-plan._form-images')
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                    like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="{{ route('house-plan.index') }}" role="button">Cancel</a>
            <button type="submit" class="btn btn-success pull-right">Save</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush
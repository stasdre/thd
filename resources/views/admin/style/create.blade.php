@extends('admin.layouts.master')

@section('title', 'Create new House Plan style')

@section('breadcrumbs', Breadcrumbs::render('style-create'))

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
        </div>

        <div class="box-body">
            {!! Form::open(['route' => 'styles.store', 'class' => 'form-horizontal', 'id' => 'styles-form', 'method' => 'post', 'files' => true]) !!}
            @include('admin.style._form')
            {!! Form::close() !!}
        </div>
        <div class="box-footer">
            <div class="col-sm-9">
                <a class="btn btn-default" href="{{ route('styles.index') }}" role="button">Cancel</a>
            </div>
            <div class="col-sm-3">
                <a role="button" id="styles-submit-close" href="#" class="btn btn-warning">Save & Close</a>
                <a role="button" id="styles-submit-next" href="#" class="btn btn-success">Save</a>
            </div>
        </div>

    </div>
@endsection

@push('tinymce')
    <script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

@extends('admin.layouts.master')

@section('title', 'Home Page Desktop')

@section('content')
    <div class="box box-default">
        {!! Form::model($data, ['route' => 'home-page.desktop-dream.post', 'class' => 'form-horizontal', 'method' => 'post']) !!}
        <div class="box-body">
            <div class="form-group">
                {{ Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-10">
                    {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-10">
                    {{ Form::textarea('description', null, ['class'=>'form-control tinymce-editor']) }}
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}
    </div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

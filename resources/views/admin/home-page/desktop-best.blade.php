@extends('admin.layouts.master')

@section('title', 'Home Page Desktop')

@section('content')
<div class="box box-default">
    {{ Form::model($data, ['route' => 'home-page.desktop-best.post', 'class' => 'form-horizontal', 'method' => 'post', 'files' => true]) }}
    <div class="box-header with-border">
    </div>
    <div class="box-body">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#main" aria-controls="general" role="tab"
                    data-toggle="tab">Main</a></li>
            <li role="presentation"><a href="#first" aria-controls="details" role="tab" data-toggle="tab">First</a></li>
            <li role="presentation"><a href="#second" aria-controls="details" role="tab" data-toggle="tab">Second</a>
            </li>
            <li role="presentation"><a href="#third" aria-controls="details" role="tab" data-toggle="tab">Third</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="main">
                <div class="form-group {{ $errors->has('main_title') ? 'has-error' : '' }}">
                    {{ Form::label('main_title', 'Title', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('main_title', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('main_desc') ? 'has-error' : '' }}">
                    {{ Form::label('main_desc', 'Description', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::textarea('main_desc', null, ['class'=>'form-control', 'placeholder'=>'Description']) }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('main_plan') ? 'has-error' : '' }}">
                    {{ Form::label('main_plan', 'Plan', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('main_plan', null, ['class'=>'form-control', 'placeholder'=>'Plan']) }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('main_link') ? 'has-error' : '' }}">
                    {{ Form::label('main_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('main_link', null, ['class'=>'form-control', 'placeholder'=>'Link']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('main_file', 'Image', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-5">
                        <div class="input-group input-group-sm">
                            @if(isset($data->main_file))
                            <input class="form-control file-input hidden" type="file" name="main_file">
                            <span class="input-group-addon file-input hidden"> <i class="fa fa-file"
                                    aria-hidden="true"></i></span>
                            <p class="file-name">/home-page/{{ $data->main_file }} <a href="#" class="delete-file"
                                    style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                            @else
                            <input class="form-control" type="file" name="main_file">
                            <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('main_plan_link') ? 'has-error' : '' }}">
                    {{ Form::label('main_plan_link', 'Plan link', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('main_plan_link', null, ['class'=>'form-control', 'placeholder'=>'Plan link']) }}
                    </div>
                </div>

            </div>
            <div role="tabpanel" class="tab-pane fade in" id="first">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                        <label class="radio-inline">
                            {!! Form::radio('first_type', 'light', true) !!} Light
                        </label>
                        <label class="radio-inline">
                            {!! Form::radio('first_type', 'dark') !!} Dark
                        </label>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('first_title') ? 'has-error' : '' }}">
                    {{ Form::label('first_title', 'Title', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('first_title', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('first_desc') ? 'has-error' : '' }}">
                    {{ Form::label('first_desc', 'Description', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::textarea('first_desc', null, ['class'=>'form-control', 'placeholder'=>'Description']) }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('first_plan') ? 'has-error' : '' }}">
                    {{ Form::label('first_plan', 'Plan', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('first_plan', null, ['class'=>'form-control', 'placeholder'=>'Plan']) }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('first_link') ? 'has-error' : '' }}">
                    {{ Form::label('first_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('first_link', null, ['class'=>'form-control', 'placeholder'=>'Link']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('first_file', 'Image', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-5">
                        <div class="input-group input-group-sm">
                            @if(isset($data->first_file))
                            <input class="form-control file-input hidden" type="file" name="first_file">
                            <span class="input-group-addon file-input hidden"> <i class="fa fa-file"
                                    aria-hidden="true"></i></span>
                            <p class="file-name">/home-page/{{ $data->first_file }} <a href="#" class="delete-file"
                                    style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                            @else
                            <input class="form-control" type="file" name="first_file">
                            <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('first_plan_link') ? 'has-error' : '' }}">
                    {{ Form::label('first_plan_link', 'Plan link', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('first_plan_link', null, ['class'=>'form-control', 'placeholder'=>'Plan link']) }}
                    </div>
                </div>

            </div>
            <div role="tabpanel" class="tab-pane fade in" id="second">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                        <label class="radio-inline">
                            {!! Form::radio('second_type', 'light', true) !!} Light
                        </label>
                        <label class="radio-inline">
                            {!! Form::radio('second_type', 'dark') !!} Dark
                        </label>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('second_title') ? 'has-error' : '' }}">
                    {{ Form::label('second_title', 'Title', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('second_title', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('second_desc') ? 'has-error' : '' }}">
                    {{ Form::label('second_desc', 'Description', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::textarea('second_desc', null, ['class'=>'form-control', 'placeholder'=>'Description']) }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('second_plan') ? 'has-error' : '' }}">
                    {{ Form::label('second_plan', 'Plan', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('second_plan', null, ['class'=>'form-control', 'placeholder'=>'Plan']) }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('second_link') ? 'has-error' : '' }}">
                    {{ Form::label('second_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('second_link', null, ['class'=>'form-control', 'placeholder'=>'Link']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('second_file', 'Image', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-5">
                        <div class="input-group input-group-sm">
                            @if(isset($data->second_file))
                            <input class="form-control file-input hidden" type="file" name="second_file">
                            <span class="input-group-addon file-input hidden"> <i class="fa fa-file"
                                    aria-hidden="true"></i></span>
                            <p class="file-name">/home-page/{{ $data->second_file }} <a href="#" class="delete-file"
                                    style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                            @else
                            <input class="form-control" type="file" name="second_file">
                            <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('second_plan_link') ? 'has-error' : '' }}">
                    {{ Form::label('second_plan_link', 'Plan link', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('second_plan_link', null, ['class'=>'form-control', 'placeholder'=>'Plan link']) }}
                    </div>
                </div>

            </div>
            <div role="tabpanel" class="tab-pane fade in" id="third">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                        <label class="radio-inline">
                            {!! Form::radio('third_type', 'light', true) !!} Light
                        </label>
                        <label class="radio-inline">
                            {!! Form::radio('third_type', 'dark') !!} Dark
                        </label>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('third_title') ? 'has-error' : '' }}">
                    {{ Form::label('third_title', 'Title', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('third_title', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('third_desc') ? 'has-error' : '' }}">
                    {{ Form::label('third_desc', 'Description', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::textarea('third_desc', null, ['class'=>'form-control', 'placeholder'=>'Description']) }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('third_plan') ? 'has-error' : '' }}">
                    {{ Form::label('third_plan', 'Plan', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('third_plan', null, ['class'=>'form-control', 'placeholder'=>'Plan']) }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('third_link') ? 'has-error' : '' }}">
                    {{ Form::label('third_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('third_link', null, ['class'=>'form-control', 'placeholder'=>'Link']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('third_file', 'Image', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-5">
                        <div class="input-group input-group-sm">
                            @if(isset($data->third_file))
                            <input class="form-control file-input hidden" type="file" name="third_file">
                            <span class="input-group-addon file-input hidden"> <i class="fa fa-file"
                                    aria-hidden="true"></i></span>
                            <p class="file-name">/home-page/{{ $data->third_file }} <a href="#" class="delete-file"
                                    style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                            @else
                            <input class="form-control" type="file" name="third_file">
                            <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('third_plan_link') ? 'has-error' : '' }}">
                    {{ Form::label('third_plan_link', 'Plan link', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-8">
                        {{ Form::text('third_plan_link', null, ['class'=>'form-control', 'placeholder'=>'Plan link']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}
    </div>
    {!! Form::close() !!}
</div>
@endsection
@push('scripts')
<script>
    $(function(){
        $(".delete-file").on('click', function(e){
            e.preventDefault();
            $(this).parent('.file-name').hide();
            $(this).parent('.file-name').parent('.input-group').find(".file-input").removeClass('hidden');
        });
    });
</script>
@endpush
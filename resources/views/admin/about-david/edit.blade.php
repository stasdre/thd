@extends('admin.layouts.master')

@section('title', 'Home Page')

@section('breadcrumbs', Breadcrumbs::render('about-david'))

@section('content')
    <div class="box box-default">
        {!! Form::model($data, ['route' => 'about-david.update', 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data']) !!}
        <div class="box-body">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#about" aria-controls="general" role="tab" data-toggle="tab">About David</a></li>
                <li role="presentation"><a href="#why" aria-controls="details" role="tab" data-toggle="tab">Why</a></li>
                <li role="presentation"><a href="#best" aria-controls="details" role="tab" data-toggle="tab">Best price</a></li>
                <li role="presentation"><a href="#free" aria-controls="details" role="tab" data-toggle="tab">Free modification</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="about">
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
                    <div class="form-group">
                        {{ Form::label('photo', 'Photo', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-5">
                            <div class="input-group input-group-sm">
                                @if($data->photo)
                                    <input class="form-control file-input hidden" type="file" name="photo">
                                    <span class="input-group-addon file-input hidden"> <i class="fa fa-file" aria-hidden="true"></i></span>
                                    <p id="file-name">/about/{{ $data->photo }} <a href="#" id="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                                @else
                                    <input class="form-control" type="file" name="photo">
                                    <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('url', 'Video URL', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('url', null, ['class'=>'form-control', 'placeholder'=>'']) }}
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="why">
                    <div class="form-group">
                        {{ Form::label('why_text', 'Text', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::textarea('why_text', null, ['class'=>'form-control tinymce-editor']) }}
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="best">
                    <div class="form-group">
                        {{ Form::label('best_text', 'Text', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::textarea('best_text', null, ['class'=>'form-control tinymce-editor']) }}
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="free">
                    <div class="form-group">
                        {{ Form::label('free_text', 'Text', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::textarea('free_text', null, ['class'=>'form-control tinymce-editor']) }}
                        </div>
                    </div>
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
@push('scripts')
<script>
    $(function(){
        $("#delete-file").on('click', function(e){
            e.preventDefault();
            $("#file-name").hide();
            $(".file-input").removeClass('hidden');
        });
    });
</script>
@endpush
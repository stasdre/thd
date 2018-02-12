@extends('admin.layouts.master')

@section('title', 'About David E. Wiggins')

@section('breadcrumbs', Breadcrumbs::render('about-david'))

@section('content')
    <div class="box box-default">
        {!! Form::model($data, ['route' => 'about-david.update', 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data']) !!}
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
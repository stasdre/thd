@extends('admin.layouts.master')

@section('title', 'Home Page Mobile Best Plan')

@section('content')
    <div class="box box-default">
        {!! Form::model($data, ['route' => 'home-page.mobile-best.post', 'class' => 'form-horizontal', 'method' => 'post', 'files' => true]) !!}
        <div class="box-header with-border">
        </div>
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {{ Form::label('name', 'Title', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-8">
                {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
            {{ Form::label('url', 'URL', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-8">
                {{ Form::text('url', null, ['class'=>'form-control', 'placeholder'=>'URL']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('file', 'Image', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-5">
                <div class="input-group input-group-sm">
                    @if(isset($data->file))
                        <input class="form-control file-input hidden" type="file" name="file">
                        <span class="input-group-addon file-input hidden"> <i class="fa fa-file" aria-hidden="true"></i></span>
                        <p class="file-name">/home-page/{{ $data->file }} <a href="#" class="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                    @else
                        <input class="form-control" type="file" name="file">
                        <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
                    @endif
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
        $(".delete-file").on('click', function(e){
            e.preventDefault();
            $(this).parent('.file-name').hide();
            $(this).parent('.file-name').parent('.input-group').find(".file-input").removeClass('hidden');
        });
    });
</script>
@endpush
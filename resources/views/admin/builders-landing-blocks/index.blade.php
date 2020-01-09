@extends('admin.layouts.master')

@section('title', 'Builders Landing blocks')

@section('content')
<div class="box box-default">
  {!! Form::model($data, ['route' => 'builder-landing-blocks.update', 'class' => 'form-horizontal', 'method' => 'post',
  'enctype'=>'multipart/form-data']) !!}
  <div class="box-body">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#tl" aria-controls="general" role="tab" data-toggle="tab">Left</a>
      </li>
      <li role="presentation"><a href="#tr" aria-controls="details" role="tab" data-toggle="tab">Right</a></li>
    </ul>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="tl">
        <div class="form-group">
          {{ Form::label('first_title_l', 'First title', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-4">
            {{ Form::text('first_title_l', null, ['class'=>'form-control', 'placeholder'=>'Title', 'id'=>'first_title_l']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('title_l', 'Title', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-4">
            {{ Form::text('title_l', null, ['class'=>'form-control', 'placeholder'=>'Title', 'id'=>'title_l']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('desc_l', 'Descripton', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-10">
            {{ Form::textarea('desc_l', null, ['class'=>'form-control tinymce-editor']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('link_name_l', 'Link title', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-4">
            {{ Form::text('link_name_l', null, ['class'=>'form-control', 'placeholder'=>'Link title']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('link_l', 'Link', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-4">
            {{ Form::text('link_l', null, ['class'=>'form-control', 'placeholder'=>'Link']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('img_title_l', 'Image title', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-4">
            {{ Form::text('img_title_l', null, ['class'=>'form-control', 'placeholder'=>'Image title']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('img_l', 'Image', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-4 input-file">
            @if(isset($data->img_l))
            {{ Form::file('img_l', ['class'=>'form-control hidden']) }}
            <p class="file-name">/builders/{{ $data->img_l }} <a href="#" class="delete-file"
                style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
            <div class="edit-img"><a href="{{asset('/storage/builders/'.$data->img_l)}}" target="_blank"><img
                  src="{{asset('/storage/builders/'.$data->img_l)}}"
                  data-origin="/storage/builders/original/{{$data->img_l}}" class="img-responsive" alt=""></a>
            </div>
            @else
            {{ Form::file('img_l', ['class'=>'form-control']) }}
            @endif
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane fade in" id="tr">
        <div class="form-group">
          {{ Form::label('first_title_r', 'First title', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-4">
            {{ Form::text('first_title_r', null, ['class'=>'form-control', 'placeholder'=>'Title', 'id'=>'first_title_r']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('title_r', 'Title', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-4">
            {{ Form::text('title_r', null, ['class'=>'form-control', 'placeholder'=>'Title', 'id'=>'title_r']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('desc_r', 'Descripton', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-10">
            {{ Form::textarea('desc_r', null, ['class'=>'form-control tinymce-editor']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('link_name_r', 'Link title', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-4">
            {{ Form::text('link_name_r', null, ['class'=>'form-control', 'placeholder'=>'Link title']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('link_r', 'Link', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-4">
            {{ Form::text('link_r', null, ['class'=>'form-control', 'placeholder'=>'Link']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('img_title_r', 'Image title', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-4">
            {{ Form::text('img_title_r', null, ['class'=>'form-control', 'placeholder'=>'Image title']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('img_r', 'Image', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-4 input-file">
            @if(isset($data->img_r))
            {{ Form::file('img_r', ['class'=>'form-control hidden']) }}
            <p class="file-name">/builders/{{ $data->img_r }} <a href="#" class="delete-file"
                style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
            <div class="edit-img"><a href="{{asset('/storage/builders/'.$data->img_r)}}" target="_blank"><img
                  src="{{asset('/storage/builders/'.$data->img_r)}}"
                  data-origin="/storage/builders/original/{{$data->img_r}}" class="img-responsive" alt=""></a>
            </div>
            @else
            {{ Form::file('img_r', ['class'=>'form-control']) }}
            @endif
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
  $(".delete-file").on('click', function(e){
    e.preventDefault();
    $(this).parent('.file-name').hide();
    $(this).parent('.file-name').parent('.input-file').find(".file-input").removeClass('hidden');
    $(this).parent('.file-name').parent('.input-file').find(".edit-img").addClass('hidden');
});
</script>
@endpush
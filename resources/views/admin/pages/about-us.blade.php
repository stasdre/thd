@extends('admin.layouts.master')

@section('title', 'AboutUs Page')

@section('content')
<div class="box box-default">
  <div class="box-header">
    <a class="btn btn-primary" href="{{ route('styles.create') }}" role="button">Create new Article</a>
  </div>
  <div class="box-body">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#desc" aria-controls="general" role="tab"
          data-toggle="tab">Description</a></li>
      <li role="presentation"><a href="#articles" aria-controls="details" role="tab" data-toggle="tab">Articles</a>
      </li>
    </ul>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="desc">
        {!! Form::model($data, ['route' => 'pages.about-store', 'class' => 'form-horizontal', 'id'=>'plans-form',
        'method' => 'post', 'files' => true]) !!}
        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
          {{ Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-8">
            {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
          </div>
        </div>
        <div class="form-group {{ $errors->has('desc') ? 'has-error' : '' }}">
          {{ Form::label('desc', 'Description', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-8">
            {{ Form::textarea('desc', null, ['class'=>'form-control tinymce-editor', 'placeholder'=>'Description']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('image', 'Image', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-5">
            <div class="input-group input-group-sm">
              @if(isset($data->image))
              <input class="form-control file-input hidden" type="file" name="image">
              <span class="input-group-addon file-input hidden"> <i class="fa fa-file" aria-hidden="true"></i></span>
              <p class="file-name">/styles/{{ $data->image }} <a href="#" class="delete-file"
                  style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
              @else
              <input class="form-control" type="file" name="image">
              <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
              @endif
            </div>
          </div>
        </div>
        <div class="form-group {{ $errors->has('image_title') ? 'has-error' : '' }}">
          {{ Form::label('image_title', 'Image title', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-8">
            {{ Form::text('image_title', null, ['class'=>'form-control', 'placeholder'=>'Image title']) }}
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}
          </div>
        </div>
        {!! Form::close() !!}
      </div>
      <div role="tabpanel" class="tab-pane fade in" id="articles"></div>
    </div>
  </div>
</div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush
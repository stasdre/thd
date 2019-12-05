<div class="form-group">
  {{ Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) }}
  <div class="col-sm-7">
    {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Article Name']) }}
  </div>
</div>
<div class="form-group">
  {{ Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) }}
  <div class="col-sm-7">
    {{ Form::textarea('description', null, ['class'=>'form-control tinymce-editor']) }}
  </div>
</div>
<div class="form-group">
  {{ Form::label('image', 'Image', ['class' => 'col-sm-2 control-label']) }}
  <div class="col-sm-7">
    <div class="input-group input-group-sm">
      @if(isset($data->image))
      <input class="form-control file-input hidden" type="file" name="image">
      <span class="input-group-addon file-input hidden"> <i class="fa fa-file" aria-hidden="true"></i></span>
      <div class="edit-img"><a href="{{asset('/storage/about/'.$data->image)}}" target="_blank"><img
            src="{{asset('/storage/about/'.$data->image)}}" data-origin="/storage/about/original/{{$data->image}}"
            class="img-responsive" alt=""></a></div>
      <p class="file-name">/about/{{ $data->image }} <a href="#" class="delete-file"
          style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
      @else
      <input class="form-control" type="file" name="image">
      <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
      @endif
    </div>
  </div>
</div>
@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush
@if(Route::currentRouteName() == 'builders.edit')
{{ Form::model($builder, ['route' => ['builders.update', $builder->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files' => true]) }}
@else
{!! Form::open(['route' => 'builders.store', 'class' => 'form-horizontal', 'method' => 'post', 'files' =>
true]) !!}
@endif

<div class="box-body">
  <div class="form-group">
    {{ Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-4">
      {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name', 'id'=>'name']) }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('city', 'City', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-4">
      {{ Form::text('city', null, ['class'=>'form-control', 'placeholder'=>'City', 'id'=>'city']) }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('state', 'State', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-4">
      {{ Form::select('state', $states, null, ['class'=>'form-control', 'placeholder'=>'Select state...', 'id'=>'state']) }}

    </div>
  </div>
  <div class="form-group">
    {{ Form::label('zip', 'Zip code', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-4">
      {{ Form::text('zip', null, ['class'=>'form-control', 'placeholder'=>'Zip code', 'id'=>'zip']) }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('link', 'Link', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-4">
      {{ Form::text('link', null, ['class'=>'form-control', 'placeholder'=>'Link']) }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
      {{ Form::textarea('description', null, ['class'=>'form-control tinymce-editor']) }}
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          {{ Form::checkbox('show_landing', 1) }} Show on landing page
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('img', 'Image', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-4 input-file">
      @if(isset($builder->img))
      {{ Form::file('img', ['class'=>'form-control hidden']) }}
      <p class="file-name">/builders/{{ $builder->img }} <a href="#" class="delete-file"
          style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
      <div class="edit-img"><a href="{{asset('/storage/builders/'.$builder->img)}}" target="_blank"><img
            src="{{asset('/storage/builders/'.$builder->img)}}"
            data-origin="/storage/builders/original/{{$builder->img}}" class="img-responsive" alt=""></a>
      </div>
      @else
      {{ Form::file('img', ['class'=>'form-control']) }}
      @endif
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          {{ Form::checkbox('recently_built', 1, null, ['id'=>'recently-check']) }} Recently Built Homes
        </label>
      </div>
    </div>
  </div>
  <div id="recently-container"
    class="@if(!isset($builder->recently_built) || $builder->recently_built != 1) hide @endif">
    <div class="form-group">
      {{ Form::label('recently_title', 'Recently title', ['class' => 'col-sm-2 control-label']) }}
      <div class="col-sm-4">
        {{ Form::text('recently_title', null, ['class'=>'form-control', 'placeholder'=>'Recently title', 'id'=>'recently_title']) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('phtoto_link', 'Photos link', ['class' => 'col-sm-2 control-label']) }}
      <div class="col-sm-4">
        {{ Form::text('phtoto_link', null, ['class'=>'form-control', 'placeholder'=>'Photos link', 'id'=>'phtoto_link']) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('recently_img', 'Recently Image', ['class' => 'col-sm-2 control-label']) }}
      <div class="col-sm-4 input-file">
        @if(isset($builder->recently_img))
        {{ Form::file('recently_img', ['class'=>'form-control hidden']) }}
        <p class="file-name">/builders/{{ $builder->recently_img }} <a href="#" class="delete-file"
            style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
        <div class="edit-img"><a href="{{asset('/storage/builders/'.$builder->recently_img)}}" target="_blank"><img
              src="{{asset('/storage/builders/'.$builder->recently_img)}}"
              data-origin="/storage/builders/original/{{$builder->recently_img}}" class="img-responsive" alt=""></a>
        </div>
        @else
        {{ Form::file('recently_img', ['class'=>'form-control']) }}
        @endif
      </div>
    </div>

  </div>
</div>

<div class="box-footer">
  {{ link_to_route('builders.index', 'Cancel', [], ['class'=>'btn btn-default', 'role'=>'button']) }}
  {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}
</div>

{!! Form::close() !!}

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
$("#recently-check").on('change', function(){
  if(this.checked){
    $("#recently-container").removeClass("hide");
  }else{
    $("#recently-container").addClass("hide");
  }
})
</script>
@endpush
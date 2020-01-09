@if(Route::currentRouteName() == 'builders-preferred.edit')
{{ Form::model($builderPreferred, ['route' => ['builders-preferred.update', $builderPreferred->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files' => true]) }}
@else
{!! Form::open(['route' => 'builders-preferred.store', 'class' => 'form-horizontal', 'method' => 'post', 'files' =>
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
    {{ Form::label('link', 'Link', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-4">
      {{ Form::text('link', null, ['class'=>'form-control', 'placeholder'=>'Link']) }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('plan', 'Plan', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-4">
      {{ Form::text('plan', null, ['class'=>'form-control', 'placeholder'=>'Plan', 'id'=>'plan']) }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('img', 'Image', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-4 input-file">
      @if(isset($builderPreferred->img))
      {{ Form::file('img', ['class'=>'form-control hidden']) }}
      <p class="file-name">/builders/{{ $builderPreferred->img }} <a href="#" class="delete-file"
          style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
      <div class="edit-img"><a href="{{asset('/storage/builders/'.$builderPreferred->img)}}" target="_blank"><img
            src="{{asset('/storage/builders/'.$builderPreferred->img)}}"
            data-origin="/storage/builders/original/{{$builderPreferred->img}}" class="img-responsive" alt=""></a>
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
          {{ Form::checkbox('show_landing', 1) }} Show on landing page
        </label>
      </div>
    </div>
  </div>
</div>

<div class="box-footer">
  {{ link_to_route('builders-preferred.index', 'Cancel', [], ['class'=>'btn btn-default', 'role'=>'button']) }}
  {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}
</div>

{!! Form::close() !!}

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
@if(Route::currentRouteName() == 'pages.edit')
{{ Form::model($page, ['route' => ['pages.update', $page->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) }}
@else
{!! Form::open(['route' => 'pages.store', 'class' => 'form-horizontal', 'method' => 'post']) !!}
@endif
<div class="box-body">
  <div class="form-group">
    {{ Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-4">
      {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('link', 'Link', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-4">
      @if(Route::currentRouteName() == 'pages.edit')
      {{ Form::text('link', null, ['class'=>'form-control', 'placeholder'=>'Link', 'readonly']) }}
      @else
      {{ Form::text('link', null, ['class'=>'form-control', 'placeholder'=>'Link']) }}
      @endif
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('text', 'Text', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
      {{ Form::textarea('text', null, ['class'=>'form-control tinymce-editor']) }}
    </div>
  </div>

</div>
<!-- /.box-body -->
<div class="box-footer">
  <div class="col-sm-2 text-right">
    {{ link_to_route('pages.index', 'Cancel', [], ['class'=>'btn btn-default', 'role'=>'button']) }}</div>
  <div class="col-sm-3">
    {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}
  </div>
</div>
<!-- /.box-footer -->
{!! Form::close() !!}

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

@push('scripts')
<script>
  $(document).on('focus', '#link', function(){
      var str = $('#title').val().trim().replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
      $(this).val(str.toLowerCase());
  });
</script>
@endpush
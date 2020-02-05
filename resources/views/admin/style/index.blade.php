@extends('admin.layouts.master')

@section('title', 'House Plans styles')

@section('breadcrumbs', Breadcrumbs::render('style'))

@section('content')
<div class="box box-default">
  <div class="box-header">
    <a class="btn btn-primary" href="{{ route('styles.create') }}" role="button">Create new Style</a>
  </div>
  <div class="box-body">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#styles" aria-controls="general" role="tab"
          data-toggle="tab">Styles</a></li>
      <li role="presentation"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Styles Details</a>
      </li>
    </ul>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="styles">
        <table class="table table-bordered table-striped" id="styles-table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Short name</th>
              <th>In search</th>
              <th>Published</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Actions</th>
            </tr>
          </thead>
        </table>
      </div>
      <div role="tabpanel" class="tab-pane fade in" id="details">
        {!! Form::model($data, ['route' => 'styles.storeData', 'class' => 'form-horizontal', 'id'=>'plans-form',
        'method' => 'post', 'files' => true]) !!}
        <div class="form-group">
          {{ Form::label('meta[title]', 'Mete title', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-10">
            {{ Form::text('meta[title]', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('meta[description]', 'Meta description', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-10">
            {{ Form::textarea('meta[description]', null, ['class'=>'form-control']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('meta[keywords]', 'Meta keywords', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-10">
            {{ Form::textarea('meta[keywords]', null, ['class'=>'form-control']) }}
          </div>
        </div>

        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
          {{ Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-8">
            {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
          </div>
        </div>

        <div class="form-group {{ $errors->has('subtitle') ? 'has-error' : '' }}">
          {{ Form::label('subtitle', 'Subtitle', ['class' => 'col-sm-2 control-label']) }}
          <div class="col-sm-8">
            {{ Form::text('subtitle', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
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
        @if(isset($data->image))
        <div class="form-group">
          <div class="col-sm-2"></div>
          <div class="col-sm-5">
            <div class="edit-img"><a href="{{asset('/storage/styles/'.$data->image)}}" target="_blank"><img
                  src="{{asset('/storage/styles/'.$data->image)}}"
                  data-origin="/storage/styles/original/{{$data->image}}" class="img-responsive" alt=""></a></div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2"></div>
          <div class="col-sm-5">
            <div class="edit-img"><a href="{{asset('/storage/styles/thumb/'.$data->image)}}" target="_blank"><img
                  src="{{asset('/storage/styles/thumb/'.$data->image)}}"
                  data-origin="/storage/styles/original/{{$data->image}}" class="img-responsive" alt=""></a></div>
          </div>
        </div>
        @endif

        <div class="form-group">
          <div class="col-sm-10">
            {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}
          </div>
        </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush
@push('datatables')
<script src="{{ asset('js/admin/datatables.js') }}"></script>
@endpush

@push('scripts')
<script>
  $(function() {
        $('#styles-table').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: '{!! route('styles.data') !!}',
            columns: [
                { data: 'id', name: 'id', className: "dt-center" },
                { data: 'name', name: 'name' },
                { data: 'short_name', name: 'short_name' },
                { data: 'in_filter', name: 'in_filter', orderable: false, searchable: false, className: "dt-center" },
                { data: 'is_active', name: 'is_active', orderable: false, searchable: false, className: "dt-center" },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false, className: "dt-center" }
            ]
        });
        $(".delete-file").on('click', function(e){
            e.preventDefault();
            $(this).parent('.file-name').hide();
            $(this).parent('.file-name').parent('.input-group').find(".file-input").removeClass('hidden');
        });
    });
</script>
@endpush
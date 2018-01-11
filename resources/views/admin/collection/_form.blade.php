@if(Route::currentRouteName() == 'collections.edit')
    {{ Form::model($collection, ['route' => ['collections.update', $collection->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) }}
@else
    {!! Form::open(['route' => 'collections.store', 'class' => 'form-horizontal', 'method' => 'post']) !!}
@endif
<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Collection Name']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('short_name', 'Short Name', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('short_name', null, ['class'=>'form-control', 'placeholder'=>'Collection Short Name']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::textarea('description', null, ['class'=>'form-control tinymce-editor']) }}
        </div>
    </div>
    <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
            <label>
                {{ Form::checkbox('in_filter', 1) }} Show in filter for search
            </label>
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    {{ link_to_route('collections.index', 'Cancel', [], ['class'=>'btn btn-default', 'role'=>'button']) }}
    {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}
</div>
<!-- /.box-footer -->
{!! Form::close() !!}
@if(Route::currentRouteName() == 'foundation-options.edit')
    {{ Form::model($foundation_option, ['route' => ['foundation-options.update', $foundation_option->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) }}
@else
    {!! Form::open(['route' => 'foundation-options.store', 'class' => 'form-horizontal', 'method' => 'post']) !!}
@endif
<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Option Name']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('short_desc', 'Short Description', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::textarea('short_desc', null, ['class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::textarea('description', null, ['class'=>'form-control tinymce-editor']) }}
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    {{ link_to_route('foundation-options.index', 'Cancel', [], ['class'=>'btn btn-default', 'role'=>'button']) }}
    {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}
</div>
<!-- /.box-footer -->
{!! Form::close() !!}
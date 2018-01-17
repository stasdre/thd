<div class="form-group">
    {{ Form::label('name', 'Plan Name', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Plan Name']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('plan_number', 'Plan Number', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-2">
        {{ Form::text('plan_number', null, ['class'=>'form-control', 'placeholder'=>'Plan Number']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('short_description', 'Short Description', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::textarea('short_description', null, ['class'=>'form-control tinymce-editor']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::textarea('description', null, ['class'=>'form-control tinymce-editor']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('meta_title', 'Meta Title', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('meta_title', null, ['class'=>'form-control', 'placeholder'=>'Meta Title']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('meta_description', 'Meta Description', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-6">
        {{ Form::textarea('meta_description', null, ['class'=>'form-control']) }}
    </div>
</div>
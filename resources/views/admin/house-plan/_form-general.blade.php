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
    {{ Form::label('style_id', 'Design Styles', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {!! Form::select('style_id[]', $styles, isset($plan) ? $plan->styles->pluck('id')->all() : null, ['id' => 'style_id', 'class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Select Styles']) !!}
    </div>
</div>
<div class="form-group">
    {{ Form::label('collection_id', 'Design Collections', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {!! Form::select('collection_id[]', $collections, isset($plan) ? $plan->collections->pluck('id')->all() : null, ['id' => 'collection_id', 'class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Select Collections']) !!}
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
@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush
@push('scripts')
<script>
    $(function() {
        $('#style_id, #collection_id').select2();
    });
</script>
@endpush
<input type="hidden" name="redirect" id="redirect" value="next">

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

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

@push('scripts')
<script>
    $("#desc-submit-close, #desc-submit-next").on('click', function(e){
        e.preventDefault();
        if( $(this).prop('id') == 'desc-submit-close' )
            $('#redirect').val('close');
        else
            $('#redirect').val('next');

        $('#plan-desc').submit();
    })
</script>
@endpush
<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name</label>

    <div class="col-sm-10">
        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
    </div>
</div>
<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>

    <div class="col-sm-10">
        <textarea id="description" class="form-control tinymce-editor" placeholder="Description ..."></textarea>
    </div>
</div>
<div class="form-group">
    {{ Form::label('square_first', 'Square 1st Floor', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-2">
        <div class="input-group">
            {{ Form::number('square_first', null, ['class'=>'form-control', 'placeholder'=>'0.000']) }}
            <span class="input-group-addon">Ft.</span>
        </div>
    </div>
</div>
<div class="form-group">
    {{ Form::label('square_two', 'Square 2nd Floor', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-2">
        <div class="input-group">
            {{ Form::number('square_two', null, ['class'=>'form-control', 'placeholder'=>'0.000']) }}
            <span class="input-group-addon">Ft.</span>
        </div>
    </div>
</div>
<div class="form-group">
    {{ Form::label('square', 'Square', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-2">
        <div class="input-group">
            {{ Form::number('square', null, ['class'=>'form-control', 'placeholder'=>'0.000', 'disabled']) }}
            <span class="input-group-addon">Ft.</span>
        </div>
    </div>
</div>
<div class="form-group">
    {{ Form::label('width', 'Width', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-2">
        {{ Form::text('width', null, ['class'=>'form-control', 'placeholder'=>'00\' 0"']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('depth', 'Depth', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-2">
        {{ Form::text('depth', null, ['class'=>'form-control', 'placeholder'=>'00\' 0"']) }}
    </div>
</div>

@push('scripts')
<script>
    $(function() {
        $("#square_first, #square_two").on('keyup', function(){
            var first = +$("#square_first").val();
            var two = +$("#square_two").val();
           $("#square").val((first+two).toFixed(3));
        });
    });
</script>
@endpush

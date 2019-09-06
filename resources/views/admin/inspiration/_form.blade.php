@if(Route::currentRouteName() == 'inspiration.edit')
    {{ Form::model($inspiration, ['route' => ['inspiration.update', $inspiration->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files' => true]) }}
@else
    {!! Form::open(['route' => 'inspiration.store', 'class' => 'form-horizontal', 'method' => 'post', 'files' => true]) !!}
@endif

<div class="box-body">
    <fieldset>
    <legend>General:</legend>
        <div class="form-group">
            {{ Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name', 'id'=>'name']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('in_menu', 'Show in inspiration menu', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>{{ Form::checkbox('in_menu', 1, false) }}</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('link', 'Link', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('link', null, ['class'=>'form-control', 'placeholder'=>'Link', 'id'=>'slug']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('desc', 'Descripton', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {{ Form::textarea('desc', null, ['class'=>'form-control tinymce-editor']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('order', 'Order', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('order', old('order') ? old('order') : $order, ['class'=>'form-control', 'placeholder'=>'Order']) }}
            </div>
        </div>        
    </fieldset>
    <fieldset>
    <legend>Company:</legend>        
        <div class="form-group">
            {{ Form::label('img_above_logo', 'Image above logo', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::file('img_above_logo', ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('logo_img', 'Logo image', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::file('logo_img', ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('short_desc', 'Short descripton', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {{ Form::textarea('short_desc', null, ['class'=>'form-control tinymce-editor']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('brochure_link', 'Brochure link', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('brochure_link', null, ['class'=>'form-control', 'placeholder'=>'Brochure link']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('locator_link', 'Locator link', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('locator_link', null, ['class'=>'form-control', 'placeholder'=>'Locator link']) }}
            </div>
        </div>
    </fieldset>        
    <fieldset>
        <legend>Images:</legend>    
        <div class="form-group">
            {{ Form::label('main_img', 'Main image', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::file('main_img', ['class'=>'form-control']) }}
            </div>
        </div>        
        <div class="form-group">
            {{ Form::label('main_img_link', 'Main image link', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('main_img_link', null, ['class'=>'form-control', 'placeholder'=>'Main image link']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('first_img', 'First image', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::file('first_img', ['class'=>'form-control']) }}
            </div>
        </div>        
        <div class="form-group">
            {{ Form::label('first_img_link', 'First image link', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('first_img_link', null, ['class'=>'form-control', 'placeholder'=>'First image link']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('second_img', 'Second image', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::file('second_img', ['class'=>'form-control']) }}
            </div>
        </div>        
        <div class="form-group">
            {{ Form::label('second_img_link', 'Second image link', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('second_img_link', null, ['class'=>'form-control', 'placeholder'=>'Second image link']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('third_img', 'Third image', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::file('third_img', ['class'=>'form-control']) }}
            </div>
        </div>        
        <div class="form-group">
            {{ Form::label('third_img_link', 'Third image link', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('third_img_link', null, ['class'=>'form-control', 'placeholder'=>'Third image link']) }}
            </div>
        </div>                        
    </fieldset>       
    <fieldset>
        <legend>Products</legend>
    </fieldset>              
</div>

<div class="box-footer">
    {{ link_to_route('inspiration.index', 'Cancel', [], ['class'=>'btn btn-default', 'role'=>'button']) }}
    {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}    
</div>
    
{!! Form::close() !!}

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

@push('scripts')
<script>
        $(document).on('focus', '#slug', function(){
        var str = $('#name').val().trim().replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');

       $(this).val(str.toLowerCase());
    });
</script>
@endpush

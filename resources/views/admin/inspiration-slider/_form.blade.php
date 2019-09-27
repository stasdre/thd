@if(Route::currentRouteName() == 'inspiration-slider.edit')
    {{ Form::model($inspirationSlider, ['route' => ['inspiration-slider.update', $inspirationSlider->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files' => true]) }}
@else
    {!! Form::open(['route' => 'inspiration-slider.store', 'class' => 'form-horizontal', 'method' => 'post', 'files' => true]) !!}
@endif

<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name', 'id'=>'name']) }}
        </div>
    </div>    
    <div class="form-group">
        {{ Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title', 'id'=>'title']) }}
        </div>
    </div>    
    <div class="form-group">
        {{ Form::label('desc', 'Descripton', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::textarea('desc', null, ['class'=>'form-control tinymce-editor']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('logo_img', 'Logo image', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4 input-file">
            @if(isset($inspirationSlider->logo_img))
                {{ Form::file('logo_img', ['class'=>'form-control hidden']) }}
                <p class="file-name">/inspiration-slider/{{ $inspirationSlider->logo_img }} <a href="#" class="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                <div class="edit-img"><a href="{{asset('/storage/inspiration-slider/'.$inspirationSlider->logo_img)}}" target="_blank"><img src="{{asset('/storage/inspiration-slider/'.$inspirationSlider->logo_img)}}" data-origin="/storage/inspiration-slider/original/{{$inspirationSlider->logo_img}}" class="img-responsive" alt=""></a></div>                    
            @else
                {{ Form::file('logo_img', ['class'=>'form-control']) }}
            @endif
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
    <div class="form-group">
        {{ Form::label('slider_img', 'Slider image', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4 input-file">
            @if(isset($inspirationSlider->slider_img))
                {{ Form::file('slider_img', ['class'=>'form-control hidden']) }}
                <p class="file-name">/inspiration-slider/{{ $inspirationSlider->slider_img }} <a href="#" class="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                <div class="edit-img"><a href="{{asset('/storage/inspiration-slider/'.$inspirationSlider->slider_img)}}" target="_blank"><img src="{{asset('/storage/inspiration-slider/'.$inspirationSlider->slider_img)}}" data-origin="/storage/inspiration-slider/original/{{$inspirationSlider->slider_img}}" class="img-responsive" alt=""></a></div>                    
            @else
                {{ Form::file('slider_img', ['class'=>'form-control']) }}
            @endif
        </div>
    </div>   
    <div class="form-group">
        {{ Form::label('order', 'Order', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('order', old('order') ? old('order') : isset($order) ? $order : null, ['class'=>'form-control', 'placeholder'=>'Order']) }}
        </div>
    </div>        
</div>

<div class="box-footer">
    {{ link_to_route('inspiration-slider.index', 'Cancel', [], ['class'=>'btn btn-default', 'role'=>'button']) }}
    {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}    
</div>
    
{!! Form::close() !!}

@push('tinymce')
<script src="{{ asset('js/admin/tinymce.js') }}"></script>
@endpush

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
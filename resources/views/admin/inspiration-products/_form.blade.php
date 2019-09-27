@if(Route::currentRouteName() == 'inspiration-products.edit')
    {{ Form::model($inspirationProduct, ['route' => ['inspiration-products.update', $inspirationProduct->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files' => true]) }}
@else
    {!! Form::open(['route' => 'inspiration-products.store', 'class' => 'form-horizontal', 'method' => 'post', 'files' => true]) !!}
@endif

<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name', 'id'=>'name']) }}
        </div>
    </div>    
    <div class="form-group">
        {{ Form::label('link_name', 'Lunk title', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('link_name', null, ['class'=>'form-control', 'placeholder'=>'Lunk title']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('link', null, ['class'=>'form-control', 'placeholder'=>'Link']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('img', 'Slider image', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4 input-file">
            @if(isset($inspirationProduct->img))
                {{ Form::file('img', ['class'=>'form-control hidden']) }}
                <p class="file-name">/inspiration-products/{{ $inspirationProduct->img }} <a href="#" class="delete-file" style="margin-left: 15px; color: red;"><i class="fa fa-ban"></i></a></p>
                <div class="edit-img"><a href="{{asset('/storage/inspiration-products/'.$inspirationProduct->img)}}" target="_blank"><img src="{{asset('/storage/inspiration-products/'.$inspirationProduct->img)}}" data-origin="/storage/inspiration-products/original/{{$inspirationProduct->img}}" class="img-responsive" alt=""></a></div>                    
            @else
                {{ Form::file('img', ['class'=>'form-control']) }}
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
    {{ link_to_route('inspiration-products.index', 'Cancel', [], ['class'=>'btn btn-default', 'role'=>'button']) }}
    {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}    
</div>
    
{!! Form::close() !!}

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
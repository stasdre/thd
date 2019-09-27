@if(Route::currentRouteName() == 'inspiration-slider.edit')
    {{ Form::model($inspirationSlider, ['route' => ['inspiration-slider.update', $inspirationSlider->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files' => true]) }}
@else
    {!! Form::open(['route' => 'inspiration-slider.store', 'class' => 'form-horizontal', 'method' => 'post', 'files' => true]) !!}
@endif

<div class="box-body">

</div>

<div class="box-footer">
    {{ link_to_route('inspiration-slider.index', 'Cancel', [], ['class'=>'btn btn-default', 'role'=>'button']) }}
    {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}    
</div>
    
{!! Form::close() !!}

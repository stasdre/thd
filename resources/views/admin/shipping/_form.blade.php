@if(Route::currentRouteName() == 'shipping.edit')
    {{ Form::model($shipping, ['route' => ['shipping.update', $shipping->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) }}
@else
    {!! Form::open(['route' => 'shipping.store', 'class' => 'form-horizontal', 'method' => 'post']) !!}
@endif
<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-3">
            {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('cost', 'Cost', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-3">
            {{ Form::text('cost', null, ['class'=>'form-control', 'placeholder'=>'0.00']) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 text-right">{{ link_to_route('shipping.index', 'Cancel', [], ['class'=>'btn btn-default', 'role'=>'button']) }}</div>
        <div class="col-sm-3">
            {{ Form::button('Save', ['class'=>'btn btn-success pull-right', 'type'=>'submit']) }}
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">


</div>
<!-- /.box-footer -->
{!! Form::close() !!}
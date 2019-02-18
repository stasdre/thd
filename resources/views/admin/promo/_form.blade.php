@if(Route::currentRouteName() == 'promo.edit')
    {{ Form::model($promo, ['route' => ['promo.update', $promo->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) }}
@else
    {!! Form::open(['route' => 'promo.store', 'class' => 'form-horizontal', 'method' => 'post']) !!}
@endif
<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('value', 'Value', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-1">
            {{ Form::text('value', null, ['class'=>'form-control', 'placeholder'=>'0.00']) }}
        </div>
        <div class="col-sm-1">
            {{ Form::select('level', ['cost' => '$', 'percent' => '%'], 'cost', ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 text-right">{{ link_to_route('promo.index', 'Cancel', [], ['class'=>'btn btn-default', 'role'=>'button']) }}</div>
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
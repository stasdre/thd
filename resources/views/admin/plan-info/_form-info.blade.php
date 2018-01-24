<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General</a></li>
    <li role="presentation"><a href="#key_features" aria-controls="key_features" role="tab" data-toggle="tab">Key Features</a></li>
    <li role="presentation"><a href="#others" aria-controls="others" role="tab" data-toggle="tab">Others</a></li>
</ul>

<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" style="margin-top: 20px;" id="general">
        <div class="row">
            <div class="col-sm-push-1  col-sm-5 col-md-4">
                <div class="form-group">
                    {{ Form::label('width', 'Width', ['class' => 'col-sm-4 control-label']) }}
                    <div class="col-sm-4 col-md-6">
                        {{ Form::text('width', null, ['class'=>'form-control', 'placeholder'=>'Width']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('depth', 'Depth', ['class' => 'col-sm-4 control-label']) }}
                    <div class="col-sm-4 col-md-6">
                        {{ Form::text('depth', null, ['class'=>'form-control', 'placeholder'=>'Depth']) }}
                    </div>
                </div>
            </div>
            <div class="col-sm-7 col-md-8 col-sm-pull-1 col-md-pull-0">
                <div class="form-group">
                    {{ Form::label('height', 'Height', ['class' => 'col-sm-3 col-md-4 control-label']) }}
                    <div class="col-sm-3">
                        {{ Form::text('height', null, ['class'=>'form-control', 'placeholder'=>'Height']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('heated_living_space', 'Heated Living Space', ['class' => 'col-sm-3 col-md-4 control-label']) }}
                    <div class="col-sm-3">
                        {{ Form::text('heated_living_space', null, ['class'=>'form-control', 'placeholder'=>'Heated Living Space']) }}
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-push-1  col-sm-5 col-md-4">
                <div class="form-group">
                    {{ Form::label('floor_1', '1st floor', ['class' => 'col-sm-4 control-label']) }}
                    <div class="col-sm-4 col-md-6">
                        <div class="input-group">
                            {{ Form::text('floor_1', null, ['class'=>'form-control', 'placeholder'=>'0.00']) }}
                            <div class="input-group-addon">s.f</div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('floor_2', '2nd floor', ['class' => 'col-sm-4 control-label']) }}
                    <div class="col-sm-4 col-md-6">
                        <div class="input-group">
                            {{ Form::text('floor_2', null, ['class'=>'form-control', 'placeholder'=>'0.00']) }}
                            <div class="input-group-addon">s.f</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 col-md-8 col-sm-pull-1 col-md-pull-0">
                <div class="form-group">
                    {{ Form::label('floor_3', '3rd floor', ['class' => 'col-sm-3 col-md-4 control-label']) }}
                    <div class="col-sm-3">
                        <div class="input-group">
                            {{ Form::text('floor_3', null, ['class'=>'form-control', 'placeholder'=>'0.00']) }}
                            <div class="input-group-addon">s.f</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-push-1  col-sm-5 col-md-4">
                <div class="form-group">
                    {{ Form::label('basement', 'Basement', ['class' => 'col-sm-4 control-label']) }}
                    <div class="col-sm-4 col-md-6">
                        <div class="input-group">
                            {{ Form::text('basement', null, ['class'=>'form-control', 'placeholder'=>'0.00']) }}
                            <div class="input-group-addon">s.f</div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('bonus_space', 'Bonus space', ['class' => 'col-sm-4 control-label']) }}
                    <div class="col-sm-4 col-md-6">
                        <div class="input-group">
                            {{ Form::text('bonus_space', null, ['class'=>'form-control', 'placeholder'=>'0.00']) }}
                            <div class="input-group-addon">s.f</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 col-md-8 col-sm-pull-1 col-md-pull-0">
                <div class="form-group">
                    {{ Form::label('garage', 'Garage', ['class' => 'col-sm-3 col-md-4 control-label']) }}
                    <div class="col-sm-3">
                        <div class="input-group">
                            {{ Form::text('garage', null, ['class'=>'form-control', 'placeholder'=>'0.00']) }}
                            <div class="input-group-addon">s.f</div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('porches_patio', 'Porches/patio', ['class' => 'col-sm-3 col-md-4 control-label']) }}
                    <div class="col-sm-3">
                        <div class="input-group">
                            {{ Form::text('porches_patio', null, ['class'=>'form-control', 'placeholder'=>'0.00']) }}
                            <div class="input-group-addon">s.f</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" style="margin-top: 20px;" id="key_features">
        <div class="form-group">
            {{ Form::label('kitchen', 'Kitchen', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {!! Form::select('kitchen[]', $kitchens, null, ['id' => 'kitchen', 'class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Select Kitchen']) !!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('bed', 'Bed & Bath Options', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {!! Form::select('bed[]', $beds, null, ['id' => 'bed', 'class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Select Bed & Bath Option']) !!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('room_interior', 'Rooms & Interior', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {!! Form::select('room_interior[]', $roomsInteriors, null, ['id' => 'room_interior', 'class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Select Rooms & Interior']) !!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('porch_exteriror', 'Porches & Exterior', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {!! Form::select('porch_exteriror[]', $porchExterirors, null, ['id' => 'porch_exteriror', 'class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Select Porches & Exterior']) !!}
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="others">...</div>

</div>

@push('scripts')
<script>
    $.fn.select2.defaults.set("width", '100%');
    $(function() {
        $('.select2').select2();
    });
</script>
@endpush
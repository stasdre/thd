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
        <div class="form-group">
            {{ Form::label('garages', 'Garage', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {!! Form::select('garages[]', $garages, null, ['id' => 'garages', 'class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Select Garages']) !!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('outdoors', 'Outdoor Spaces', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {!! Form::select('outdoors[]', $outdoors, null, ['id' => 'outdoors', 'class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Select Outdoor Spaces']) !!}
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" style="margin-top: 20px;" id="others">
        <div class="form-group">
            {{ Form::label('', 'Type of Structure', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                <label class="checkbox-inline">
                    {{ Form::checkbox('type_structure[]', 'single') }} Single
                </label>
                <label class="checkbox-inline">
                    {{ Form::checkbox('type_structure[]', 'duplex') }} Duplex
                </label>
                <label class="checkbox-inline">
                    {{ Form::checkbox('type_structure[]', 'multifamily') }} Multifamily
                </label>
                <label class="checkbox-inline">
                    {{ Form::checkbox('type_structure[]', 'garage') }} Garage
                </label>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('stories', 'Stories', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                <label class="checkbox-inline">
                    {{ Form::checkbox('stories[]', '1') }} 1
                </label>
                <label class="checkbox-inline">
                    {{ Form::checkbox('stories[]', '1.5') }} 1.5
                </label>
                <label class="checkbox-inline">
                    {{ Form::checkbox('stories[]', '2') }} 2
                </label>
                <label class="checkbox-inline">
                    {{ Form::checkbox('stories[]', '3') }} 3
                </label>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('location_master', 'Location of master', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                <label class="checkbox-inline">
                    {{ Form::checkbox('location_master[]', '1st') }} 1st
                </label>
                <label class="checkbox-inline">
                    {{ Form::checkbox('location_master[]', '2nd') }} 2nd
                </label>
                <label class="checkbox-inline">
                    {{ Form::checkbox('location_master[]', 'floor') }} floor
                </label>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('foundation_type', 'Foundation Type', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                <label class="checkbox-inline">
                    {{ Form::checkbox('foundation_type[]', 'basement') }} Basement
                </label>
                <label class="checkbox-inline">
                    {{ Form::checkbox('foundation_type[]', 'crawlspace') }} Crawlspace
                </label>
                <label class="checkbox-inline">
                    {{ Form::checkbox('foundation_type[]', 'daylight_basement') }} Daylight Basement
                </label>
                <label class="checkbox-inline">
                    {{ Form::checkbox('foundation_type[]', 'walkout_basement') }} Walkout basement
                </label>
                <label class="checkbox-inline">
                    {{ Form::checkbox('foundation_type[]', 'slab') }} Slab
                </label>

            </div>
        </div>

        <div class="form-group">
            {{ Form::label('roof_frame', 'Roof frame', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                <label class="radio-inline">
                    {{ Form::radio('roof_frame', 'stick') }} Stick
                </label>
                <label class="radio-inline">
                    {{ Form::radio('roof_frame', 'truss') }} Truss
                </label>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('ext_walls', 'Ext walls', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                <label class="checkbox-inline">
                    {{ Form::checkbox('ext_walls[]', 'block') }} Block
                </label>
                <label class="checkbox-inline">
                    {{ Form::checkbox('ext_walls[]', '2x4') }} 2x4
                </label>
                <label class="checkbox-inline">
                    {{ Form::checkbox('ext_walls[]', '2x6') }} 2x6
                </label>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('roof_pitch', 'Roof pitch', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {{ Form::text('roof_pitch', null, ['class'=>'form-control', 'placeholder'=>'Roof pitch']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('ceiling_height_1', 'Ceiling height 1st', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {{ Form::text('ceiling_height_1', null, ['class'=>'form-control', 'placeholder'=>'0.00']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('ceiling_height_2', 'Ceiling height 2nd', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {{ Form::text('ceiling_height_2', null, ['class'=>'form-control', 'placeholder'=>'0.00']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('ceiling_height_b', 'Ceiling height basement', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {{ Form::text('ceiling_height_b', null, ['class'=>'form-control', 'placeholder'=>'0.00']) }}
            </div>
        </div>

    </div>

</div>

@push('scripts')
<script>
    $.fn.select2.defaults.set("width", '100%');
    $(function() {
        $('.select2').select2();
    });
</script>
@endpush
<input type="hidden" name="redirect" id="redirect" value="next">

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General</a></li>
    <li role="presentation"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Details</a></li>
    <li role="presentation"><a href="#rooms" aria-controls="rooms" role="tab" data-toggle="tab">Rooms</a></li>
    <li role="presentation"><a href="#similar" aria-controls="similar" role="tab" data-toggle="tab">Similar Plans</a></li>
    <li role="presentation"><a href="#dimensions" aria-controls="dimensions" role="tab" data-toggle="tab">Dimensions</a></li>
    <li role="presentation"><a href="#feet" aria-controls="feet" role="tab" data-toggle="tab">Square feet</a></li>
    <li role="presentation"><a href="#construction" aria-controls="construction" role="tab" data-toggle="tab">Construction</a></li>
    <li role="presentation"><a href="#ceiling" aria-controls="ceiling" role="tab" data-toggle="tab">Ceiling</a></li>
    <li role="presentation"><a href="#roof" aria-controls="roof" role="tab" data-toggle="tab">Roof</a></li>
    <li role="presentation"><a href="#garage-tab" aria-controls="garage-tab" role="tab" data-toggle="tab">Garage</a></li>
    <li role="presentation"><a href="#arch" aria-controls="arch" role="tab" data-toggle="tab">Styles/Collections</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="general">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-6">
                <label class="radio-inline">
                    {!! Form::radio('designer', 'designer', true) !!} Designers Administration
                </label>
                <label class="radio-inline">
                    {!! Form::radio('designer', 'designer_partner') !!} Design Partner Administration
                </label>
            </div>
        </div>
        @if( old('designer') )
            <div id="designer-select" {!! (old('designer') == 'designer_partner') ? 'style="display: none;"' : '' !!}>
                <div class="form-group {{ $errors->has('designer_admin') ? 'has-error' : '' }}">
                    {{ Form::label('designer_admin', 'Designer', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-6">
                        {!! Form::select('designer_admin', $designAdmin, null, ['class' => 'form-control', 'placeholder' => 'Select designer...']) !!}
                    </div>
                </div>
            </div>

            <div id="designer-partner-select" {!! (old('designer') == 'designer') ? 'style="display: none;"' : '' !!}>
                <div class="form-group {{ $errors->has('designer_partner') ? 'has-error' : '' }}">
                    {{ Form::label('designer_partner', 'Designer Partner', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-6">
                        {!! Form::select('designer_partner', $designPartner, null, ['class' => 'form-control', 'placeholder' => 'Select designer...']) !!}
                    </div>
                </div>
            </div>
        @else
            <div id="designer-select">
                <div class="form-group">
                    {{ Form::label('designer_admin', 'Designer', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-6">
                        {!! Form::select('designer_admin', $designAdmin, null, ['class' => 'form-control', 'placeholder' => 'Select designer...']) !!}
                    </div>
                </div>
            </div>

            <div id="designer-partner-select" style="display: none;">
                <div class="form-group">
                    {{ Form::label('designer_partner', 'Designer Partner', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-6">
                        {!! Form::select('designer_partner', $designPartner, null, ['class' => 'form-control', 'placeholder' => 'Select designer...']) !!}
                    </div>
                </div>
            </div>
        @endif

        <div class="form-group {{ $errors->has('plan_number') ? 'has-error' : '' }}">
            {{ Form::label('plan_number', 'Plan Number', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {{ Form::text('plan_number', null, ['class'=>'form-control', 'placeholder'=>'Plan Number']) }}
            </div>
        </div>

        <div class="form-group {{ $errors->has('plan_number') ? 'has-error' : '' }}">
            {{ Form::label('name', 'Plan Name', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Plan Name']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('youtube_url', 'YouTube URL', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('youtube_url', null, ['class'=>'form-control', 'placeholder'=>'Plan Name']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('admin_note', 'Admin note', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                {{ Form::textarea('admin_note', null, ['class'=>'form-control']) }}
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="details">
        <div class="form-group {{ $errors->has('type_structure') ? 'has-error' : '' }}">
            {{ Form::label('type_structure', 'Type of Structure', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                {!! Form::select('type_structure', ['single'=>'Single', 'duplex'=>'Duplex', 'multifamily'=>'Multifamily', 'garage'=>'Garage'], null, ['class' => 'form-control', 'placeholder' => 'Select a Structure...']) !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('copyright') ? 'has-error' : '' }}">
            {{ Form::label('copyright', 'Copyright date', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group">
                    {{ Form::text('copyright', null, ['class'=>'form-control datepicker', 'placeholder'=>'Copyright date']) }}
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('bonus_access') ? 'has-error' : '' }}">
            {{ Form::label('bonus_access', 'Bonus Access', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                {!! Form::select('bonus_access', ['Option 1', 'Option 2'], null, ['class' => 'form-control', 'placeholder' => 'Select a Bonus Access...']) !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('lot_char') ? 'has-error' : '' }}">
            {{ Form::label('', 'Lot Characteristics', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('lot_char[]', 'corner') }} Sulted for corner lot
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('lot_char[]', 'narrow') }} Sulted for narrow lot
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('lot_char[]', 'sloping') }} Sulted for sloping lot
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('lot_char[]', 'view') }} Sulted for view lot
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('lot_siope') ? 'has-error' : '' }}">
            {{ Form::label('lot_siope', 'Lot Siope', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                {!! Form::select('lot_siope', ['1'=>'1', '2'=>'2', '3'=>'3'], null, ['class' => 'form-control', 'placeholder' => 'Select a Lot Siope...']) !!}
            </div>
        </div>

    </div>
    <div role="tabpanel" class="tab-pane fade" id="rooms">
        <div class="form-group {{ $errors->has('r_master') ? 'has-error' : '' }}">
            {{ Form::label('r_master', 'Master', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group">
                    {!! Form::select('r_master', ['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4'], null, ['class' => 'form-control', 'placeholder' => 'Select a Master...']) !!}
                    <span class="input-group-addon"> Floor</span>
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('r_bedrooms') ? 'has-error' : '' }}">
            {{ Form::label('r_bedrooms', 'Bedrooms', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {!! Form::select('r_bedrooms', ['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4'], null, ['class' => 'form-control', 'placeholder' => 'Select a Bedrooms...']) !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('r_full_baths') ? 'has-error' : '' }}">
            {{ Form::label('r_full_baths', 'Full Baths', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {!! Form::select('r_full_baths', ['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4'], null, ['class' => 'form-control', 'placeholder' => 'Select a Full Baths...']) !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('r_half_baths') ? 'has-error' : '' }}">
            {{ Form::label('r_half_baths', 'Half Baths', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {!! Form::select('r_half_baths', ['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4'], null, ['class' => 'form-control', 'placeholder' => 'Select a Half Baths...']) !!}
            </div>
        </div>

    </div>
    <div role="tabpanel" class="tab-pane fade" id="similar">
        @if( old('similar') )
            @foreach( old('similar') as $n => $similar)
                <div class="form-group {{ $errors->has('similar.'.$n) ? 'has-error' : '' }}">
                    <div class="col-sm-offset-1 col-sm-2">
                        <div class="input-group">
                            <span class="input-group-addon">#{{ $loop->iteration }}</span>
                            <div class="ui-widget">
                                {{ Form::text('similar['.$n.']', null, ['class'=>'form-control ui-autocomplete-input', 'autocomplete'=>'off']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        @if($n == 0)
                            <i id="similar-add-icon" class="fa fa-plus-circle fa-lg click-icon green-icon"></i>
                        @else
                            <i class="fa fa-minus-circle fa-lg similar-rem-icon click-icon red-icon"></i>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="form-group {{ $errors->has('similar') ? 'has-error' : '' }}">
                <div class="col-sm-offset-1 col-sm-2">
                    <div class="input-group">
                        <span class="input-group-addon">#1</span>
                        <div class="ui-widget">
                            {{ Form::text('similar[]', null, ['class'=>'form-control ui-autocomplete-input', 'autocomplete'=>'off']) }}
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <i id="similar-add-icon" class="fa fa-plus-circle fa-lg click-icon green-icon"></i>
                </div>
            </div>
        @endif
    </div>
    <div role="tabpanel" class="tab-pane fade" id="dimensions">
        <div class="form-group {{ $errors->has('stories') ? 'has-error' : '' }}">
            {{ Form::label('stories', 'Stories', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {!! Form::select('stories', ['1'=>'1', '1.5'=>'1.5', '2'=>'2', '3'=>'3', '4'=>'4'], null, ['class' => 'form-control', 'placeholder' => 'Select a Stories...']) !!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('width_ft', 'Width', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group {{ $errors->has('width_ft') ? 'has-error' : '' }}">
                    {{ Form::text('width_ft', null, ['class'=>'form-control', 'placeholder'=>'0']) }}
                    <span class="input-group-addon">ft.</span>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group {{ $errors->has('width_in') ? 'has-error' : '' }}">
                    {{ Form::text('width_in', null, ['class'=>'form-control', 'placeholder'=>'0']) }}
                    <span class="input-group-addon">in.</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('depth_ft', 'Depth', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group {{ $errors->has('depth_ft') ? 'has-error' : '' }}">
                    {{ Form::text('depth_ft', null, ['class'=>'form-control', 'placeholder'=>'0']) }}
                    <span class="input-group-addon">ft.</span>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group {{ $errors->has('depth_in') ? 'has-error' : '' }}">
                    {{ Form::text('depth_in', null, ['class'=>'form-control', 'placeholder'=>'0']) }}
                    <span class="input-group-addon">in.</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('height_ft', 'Height', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group {{ $errors->has('height_ft') ? 'has-error' : '' }}">
                    {{ Form::text('height_ft', null, ['class'=>'form-control', 'placeholder'=>'0']) }}
                    <span class="input-group-addon">ft.</span>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group {{ $errors->has('height_in') ? 'has-error' : '' }}">
                    {{ Form::text('height_in', null, ['class'=>'form-control', 'placeholder'=>'0']) }}
                    <span class="input-group-addon">in.</span>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="feet">
        <div class="col-sm-push-1  col-sm-5 col-md-4">
            <div class="form-group {{ $errors->has('str_total') ? 'has-error' : '' }}">
                {{ Form::label('str_total', 'Structure Total', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('str_total', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('unit_total') ? 'has-error' : '' }}">
                {{ Form::label('unit_total', 'Unit Total', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('unit_total', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('1_floor') ? 'has-error' : '' }}">
                {{ Form::label('1_floor', '1st Floor', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('1_floor', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('2_floor') ? 'has-error' : '' }}">
                {{ Form::label('2_floor', '2nd Floor', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('2_floor', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('3_floor') ? 'has-error' : '' }}">
                {{ Form::label('3_floor', '3nd Floor', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('3_floor', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('lower_floor') ? 'has-error' : '' }}">
                {{ Form::label('lower_floor', 'Lower Floor', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('lower_floor', null, ['class'=>'form-control']) }}
                </div>
            </div>
        </div>
        <div class="col-sm-7 col-md-8 col-sm-pull-1 col-md-pull-0">
            <div class="form-group {{ $errors->has('bonus') ? 'has-error' : '' }}">
                {{ Form::label('bonus', 'Bonus', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('bonus', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('garage') ? 'has-error' : '' }}">
                {{ Form::label('garage', 'Garage', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('garage', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('storage') ? 'has-error' : '' }}">
                {{ Form::label('storage', 'Storage', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('storage', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('porch') ? 'has-error' : '' }}">
                {{ Form::label('porch', 'Porch', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('porch', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('deck') ? 'has-error' : '' }}">
                {{ Form::label('deck', 'Deck', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('deck', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('patio') ? 'has-error' : '' }}">
                {{ Form::label('patio', 'Patio', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('patio', null, ['class'=>'form-control']) }}
                </div>
            </div>
        </div>

        <p><b>Custom Sq Ft</b></p>
        <div id="custom-sq">
            @if( old('custom_desc_sq') )
                @foreach( old('custom_desc_sq') as $n => $custom )
                    <div class="form-group">
                        <input type="hidden" name="custom_desc_sq[{{$n}}]" value="1">
                        <div class="col-sm-offset-1 col-sm-2 {{ $errors->has('custom_desc.'.$n) ? 'has-error' : '' }}">
                            <div class="input-group">
                                <span class="input-group-addon">#{{$loop->iteration}}</span>
                                {{ Form::text('custom_desc['.$n.']', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="col-sm-2 {{ $errors->has('custom_sq.'.$n) ? 'has-error' : '' }}">
                            {{ Form::text('custom_sq['.$n.']', null, ['class'=>'form-control']) }}
                        </div>
                        <div class="col-sm-2">
                            @if( $n == 0 )
                                <i id="custom-add-icon" class="fa fa-plus-circle fa-lg click-icon green-icon"></i>
                            @else
                                <i class="fa fa-minus-circle fa-lg custom-rem-icon click-icon red-icon"></i>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="form-group">
                    <input type="hidden" name="custom_desc_sq[]" value="1">
                    <div class="col-sm-offset-1 col-sm-2">
                        <div class="input-group">
                            <span class="input-group-addon">#1</span>
                            {{ Form::text('custom_desc[]', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        {{ Form::text('custom_sq[]', null, ['class'=>'form-control']) }}
                    </div>
                    <div class="col-sm-2">
                        <i id="custom-add-icon" class="fa fa-plus-circle fa-lg click-icon green-icon"></i>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="construction">
        <div class="form-group {{ $errors->has('roof_frame') ? 'has-error' : '' }}">
            {{ Form::label('roof_frame', 'Roof Frame', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {!! Form::select('roof_frame', ['stick'=>'Stick', 'truss'=>'Truss'], null, ['class' => 'form-control', 'placeholder' => 'Select a Roof Frame...']) !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('ext_walls') ? 'has-error' : '' }}">
            {{ Form::label('ext_walls', 'Ext. Walls', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {!! Form::select('ext_walls', ['block'=>'Block', '2x4'=>'2x4', '2x6'=>'2x6'], null, ['class' => 'form-control', 'placeholder' => 'Select a Roof Frame...']) !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('found_type') ? 'has-error' : '' }}">
            {{ Form::label('', 'Foundation Type', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('found_type[]', 'basement') }} Basement
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('found_type[]', 'crawlspace') }} Crawlspace
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('found_type[]', 'daylight') }} Daylight basement
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('found_type[]', 'pier') }} Pier
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('found_type[]', 'slab') }} Slab
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('found_type[]', 'walkout') }} Walkout basement
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="ceiling">
        <div class="form-group {{ $errors->has('celing_1_floor') ? 'has-error' : '' }}">
            {{ Form::label('celing_1_floor', '1st Floor', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group">
                    {{ Form::text('celing_1_floor', null, ['class'=>'form-control']) }}
                    <span class="input-group-addon">ft.</span>
                </div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('celing_2_floor') ? 'has-error' : '' }}">
            {{ Form::label('celing_2_floor', '2nd Floor', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group">
                    {{ Form::text('celing_2_floor', null, ['class'=>'form-control']) }}
                    <span class="input-group-addon">ft.</span>
                </div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('celing_3_floor') ? 'has-error' : '' }}">
            {{ Form::label('celing_3_floor', '3rd Floor', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group">
                    {{ Form::text('celing_3_floor', null, ['class'=>'form-control']) }}
                    <span class="input-group-addon">ft.</span>
                </div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('celing_lower_floor') ? 'has-error' : '' }}">
            {{ Form::label('celing_lower_floor', 'Lower Level', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group">
                    {{ Form::text('celing_lower_floor', null, ['class'=>'form-control']) }}
                    <span class="input-group-addon">ft.</span>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="roof">
        <h3 class="text-center">Roof Pitch</h3>
        <div class="form-group {{ $errors->has('primary') ? 'has-error' : '' }}">
            {{ Form::label('primary', 'Primary', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('primary', null, ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('secondary') ? 'has-error' : '' }}">
            {{ Form::label('secondary', 'Secondary', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('secondary', null, ['class'=>'form-control']) }}
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="garage-tab">
        <div class="form-group {{ $errors->has('car') ? 'has-error' : '' }}">
            {{ Form::label('car', 'Car', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {{ Form::text('car', null, ['class'=>'form-control', 'placeholder'=>'0']) }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('car_location') ? 'has-error' : '' }}">
            {{ Form::label('car_location', 'Location', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {!! Form::select('car_location', ['front'=>'front entry', 'rear'=>'rear entry', 'side'=>'side entry'], null, ['class' => 'form-control', 'placeholder' => 'Select Location...']) !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('car_options') ? 'has-error' : '' }}">
            {{ Form::label('', 'Options', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('car_options[]', 'attached') }} Attached
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('car_options[]', 'carport') }} Carport
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('car_options[]', 'detached') }} Detached
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('car_options[]', 'drive-under') }} Drive-under
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('car_options[]', 'none') }} None
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('car_options[]', 'tandem') }} Tandem
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('car_options[]', 'living_space') }} Width Living Space
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="arch">
        <h3 class="text-center">Architectural Styles</h3>
        <div class="row">
        @php
            $stylesBreack = ceil(count($styles)/3);
        @endphp
        @foreach($styles as $style)
            @if ($loop->first)
                <div class="col-sm-offset-2 col-sm-3">
            @endif

            <div class="form-group {{ $errors->has('style_id.'.$style->id) ? 'has-error' : '' }}">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('style_id['.$style->id.']', $style->id) }} {{ $style->short_name }}
                    </label>
                </div>
            </div>

            @if( ($loop->iteration % $stylesBreack) == 0  && !$loop->last)
                </div>
                <div class="col-sm-3">
            @endif

            @if ($loop->last)
                </div>
            @endif
        @endforeach
        </div>
        <h3 class="text-center">Plan Collections</h3>
        <div class="row">
            @php
                $collectionBreack = ceil(count($collections)/3);
            @endphp
            @foreach($collections as $collection)
                @if ($loop->first)
                    <div class="col-sm-offset-2 col-sm-3">
                @endif

                <div class="form-group {{ $errors->has('collection_id.'.$style->id) ? 'has-error' : '' }}">
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('collection_id['.$collection->id.']', $collection->id) }} {{ $collection->short_name }}
                        </label>
                    </div>
                </div>

                @if( ($loop->iteration % $collectionBreack) == 0  && !$loop->last)
                    </div>
                    <div class="col-sm-3">
                @endif

                @if ($loop->last)
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function() {
        $('input:radio[name="designer"]').on('click', function(){
           if( $(this).prop('checked') == true && $(this).val() == 'designer' ){
               $("#designer-partner-select").hide();
               $("#designer-select").show();
           }else{
               $("#designer-select").hide();
               $("#designer-partner-select").show();
           }
        });

        $( ".datepicker" ).datepicker({
            dateFormat: "yy-mm-dd"
        });

        $("#custom-add-icon").on('click', function(){
            var elementsCount = +$('#custom-sq .form-group').length + 1;
            var html = '<div class="form-group"><input type="hidden" name="custom_desc_sq[]" value="1">' +
                '<div class="col-sm-offset-1 col-sm-2"><div class="input-group"><span class="input-group-addon">#' +elementsCount+ '</span><input class="form-control" name="custom_desc[]" type="text"></div></div>' +
                '<div class="col-sm-2"><input class="form-control" name="custom_sq[]" type="text"></div>' +
                '<div class="col-sm-2"><i class="fa fa-minus-circle fa-lg custom-rem-icon click-icon red-icon"></i></div>' +
                '</div>';
           $("#custom-sq").append(html);
        });

        $(document).on('click', '.custom-rem-icon', function(){
            $(this).parent('.col-sm-2').parent('.form-group').remove();
            var elements = $('#custom-sq .form-group');
            //var elementsCount = +elements.length + 1;

            elements.each(function(index){
               $(this).find('.input-group-addon').html('#' + (+index + 1));
            });
        });

        $("#similar-add-icon").on('click', function(){
            var elementsCount = +$('#similar .form-group').length + 1;
            var html = '<div class="form-group">' +
                '<div class="col-sm-offset-1 col-sm-2"><div class="input-group"><span class="input-group-addon">#' +elementsCount+ '</span><div class="ui-widget"><input class="form-control ui-autocomplete-input" name="similar[]" autocomplete="off" type="text"></div></div></div>' +
                '<div class="col-sm-2"><i class="fa fa-minus-circle fa-lg similar-rem-icon click-icon red-icon"></i></div>' +
                '</div>';
            $("#similar").append(html);
        });

        $(document).on('click', '.similar-rem-icon', function(){
            $(this).parent('.col-sm-2').parent('.form-group').remove();
            var elements = $('#similar .form-group');

            elements.each(function(index){
                $(this).find('.input-group-addon').html('#' + (+index + 1));
            });
        });

        $(document).on('focus', 'input:text[name="similar[]"]', function(){
            $(this).autocomplete({
                source: function( request, response ) {
                    var url = '{{ route('getPlanID', ['str'=>'replace_str']) }}';
                    var str = request.term;
                    $.ajax( {
                        url: url.replace('replace_str', str),
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function( data ) {
                            response( data );
                        }
                    } );
                },
                minLength: 2,
                select: function( event, ui ) {
                    console.log( "Selected: " + ui.item.value + " aka " + ui.item.id );
                }
            });
        });

        $("#plans-submit-close, #plans-submit-next").on('click', function(e){
            e.preventDefault();
            if( $(this).prop('id') == 'plans-submit-close' )
                $('#redirect').val('close');
            else
                $('#redirect').val('next');

            $('#plans-form').submit();
        })
    });
</script>
@endpush
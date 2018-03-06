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
    <li role="presentation"><a href="#insulation" aria-controls="insulation" role="tab" data-toggle="tab">Insulation</a></li>
    <li role="presentation"><a href="#garage-tab" aria-controls="garage-tab" role="tab" data-toggle="tab">Garage</a></li>
    <li role="presentation"><a href="#arch" aria-controls="arch" role="tab" data-toggle="tab">Styles/Collections</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="general">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-6">
                <label class="radio-inline">
                    <input type="radio" name="designer" value="designer" checked> Designers Administration
                </label>
                <label class="radio-inline">
                    <input type="radio" name="designer" value="designer_partner"> Design Partner Administration
                </label>
            </div>
        </div>
        <div id="designer-select">
            <div class="form-group">
                {{ Form::label('designer_admin', 'Designer', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-6">
                    {!! Form::select('designer_admin', ['Designer 1', 'Designer 2', 'Designer 3'], null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div id="designer-partner-select" style="display: none;">
            <div class="form-group">
                {{ Form::label('designer_admin', 'Designer Partner', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-6">
                    {!! Form::select('designer_admin', ['Designer Partner 1', 'Designer Partner 2', 'Designer Partner 3'], null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('plan_number', 'Plan Number', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {{ Form::text('plan_number', null, ['class'=>'form-control', 'placeholder'=>'Plan Number']) }}
            </div>
        </div>

        <div class="form-group">
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
        <div class="form-group">
            {{ Form::label('type_structure', 'Type of Structure', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                {!! Form::select('type_structure', ['Single', 'Duplex', 'Multifamily', 'Garage'], null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('copyright', 'Copyright date', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group">
                    {{ Form::text('copyright', null, ['class'=>'form-control datepicker', 'placeholder'=>'Copyright date']) }}
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('bonus_access', 'Bonus Access', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                {!! Form::select('bonus_access', ['Option 1', 'Option 2'], null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
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

        <div class="form-group">
            {{ Form::label('lot_siope', 'Lot Siope', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                {!! Form::select('lot_siope', ['1', '2', '3'], null, ['class' => 'form-control']) !!}
            </div>
        </div>

    </div>
    <div role="tabpanel" class="tab-pane fade" id="rooms">
        <div class="form-group">
            {{ Form::label('r_master', 'Master', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group">
                    {!! Form::select('r_master', ['1', '2', '3', '4'], null, ['class' => 'form-control']) !!}
                    <span class="input-group-addon"> Floor</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('r_bedrooms', 'Bedrooms', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {!! Form::select('r_bedrooms', ['1', '2', '3', '4'], null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('r_full_baths', 'Full Baths', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {!! Form::select('r_full_baths', ['1', '2', '3', '4'], null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('r_half_baths', 'Half Baths', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {!! Form::select('r_half_baths', ['1', '2', '3', '4'], null, ['class' => 'form-control']) !!}
            </div>
        </div>

    </div>
    <div role="tabpanel" class="tab-pane fade" id="similar">
        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-2">
                <div class="input-group">
                    <span class="input-group-addon">#1</span>
                    {{ Form::text('similar[]', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="col-sm-2">
                <i id="similar-add-icon" class="fa fa-plus-circle fa-lg click-icon green-icon"></i>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="dimensions">
        <div class="form-group">
            {{ Form::label('stories', 'Stories', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {!! Form::select('stories', ['1', '2', '3', '4'], null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('width', 'Width', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('width', null, ['class'=>'form-control', 'placeholder'=>'Width']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('depth', 'Depth', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('depth', null, ['class'=>'form-control', 'placeholder'=>'Depth']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('height', 'Height', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('height', null, ['class'=>'form-control', 'placeholder'=>'Height']) }}
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="feet">
        <div class="col-sm-push-1  col-sm-5 col-md-4">
            <div class="form-group">
                {{ Form::label('str_total', 'Structure Total', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('str_total', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('unit_total', 'Unit Total', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('unit_total', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('1_floor', '1st Floor', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('1_floor', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('2_floor', '2nd Floor', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('2_floor', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('3_floor', '3nd Floor', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('3_floor', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('lower_floor', 'Lower Floor', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('lower_floor', null, ['class'=>'form-control']) }}
                </div>
            </div>
        </div>
        <div class="col-sm-7 col-md-8 col-sm-pull-1 col-md-pull-0">
            <div class="form-group">
                {{ Form::label('bonus', 'Bonus', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('bonus', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('garage', 'Garage', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('garage', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('storage', 'Storage', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('storage', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('porch', 'Porch', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('porch', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('deck', 'Deck', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('deck', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('patio', 'Patio', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('patio', null, ['class'=>'form-control']) }}
                </div>
            </div>
        </div>

        <p><b>Custom Sq Ft</b></p>
        <div id="custom-sq">
            <div class="form-group">
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
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="construction">
        <div class="form-group">
            {{ Form::label('roof_frame', 'Roof Frame', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {!! Form::select('roof_frame', ['stick'=>'Stick', 'truss'=>'Truss'], null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('ext_walls', 'Ext. Walls', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {!! Form::select('ext_walls', ['block'=>'Block', '2x4'=>'2x4', '2x6'=>'2x6'], null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
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
        <div class="form-group">
            {{ Form::label('celing_1_floor', '1st Floor', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group">
                    {{ Form::text('celing_1_floor', null, ['class'=>'form-control']) }}
                    <span class="input-group-addon">ft.</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('celing_2_floor', '2nd Floor', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group">
                    {{ Form::text('celing_2_floor', null, ['class'=>'form-control']) }}
                    <span class="input-group-addon">ft.</span>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="roof">
        <h3 class="text-center">Roof Load</h3>
        <div class="form-group">
            {{ Form::label('live', 'Live', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('live', null, ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('dead', 'Dead', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('dead', null, ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('max_wind', 'Max Wind', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('max_wind', null, ['class'=>'form-control']) }}
            </div>
        </div>
        <h3 class="text-center">Roof Pitch</h3>
        <div class="form-group">
            {{ Form::label('primary', 'Primary', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('primary', null, ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('secondary', 'Secondary', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('secondary', null, ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('ternary', 'Ternary', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('ternary', null, ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('gable', 'Gable', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('gable', null, ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('dormer', 'Dormer', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('dormer', null, ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('porch', 'Porch', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('porch', null, ['class'=>'form-control']) }}
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="insulation">
        <div class="form-group">
            {{ Form::label('ext_wall', 'Exterior Wall', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('ext_wall', null, ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('int_wall', 'Interior Wall', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('int_wall', null, ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('insul_ceiling', 'Ceiling', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('insul_ceiling', null, ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('insul_floor', 'Floor', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('insul_floor', null, ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-6">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('irc_climate', 'view') }} Per IRC Climate Zones
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="garage-tab">
        <div class="form-group">
            {{ Form::label('car', 'Car', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {!! Form::select('car', ['1', '2', '3'], null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('car_location', 'Location', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {!! Form::select('car_location', ['1', '2', '3'], null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
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
                        {{ Form::checkbox('car_options[]', 'oversized') }} Oversized
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('car_options[]', 'rear') }} Rear-entry
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('car_options[]', 'side') }} Side-entry
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

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="style_id[]" value="{{ $style->id }}"> {{ $style->short_name }}
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

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="collection_id[]" value="{{ $collection->id }}"> {{ $collection->short_name }}
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
        $('#style_id, #collection_id').select2();

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
            var html = '<div class="form-group">' +
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
                '<div class="col-sm-offset-1 col-sm-2"><div class="input-group"><span class="input-group-addon">#' +elementsCount+ '</span><input class="form-control" name="similar[]" type="text"></div></div>' +
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
                    $.ajax( {
                        url: "search.php",
                        dataType: "jsonp",
                        data: {
                            term: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    } );
                },
                minLength: 2,
                select: function( event, ui ) {
                    log( "Selected: " + ui.item.value + " aka " + ui.item.id );
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
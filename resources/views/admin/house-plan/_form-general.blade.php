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
                    {!! Form::radio('designer', 'designer', true) !!} David Wiggins Admin
                </label>
                <label class="radio-inline">
                    {!! Form::radio('designer', 'designer_partner') !!} Design Partner Admin
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
        @elseif( isset($plan->designer) )
            <div id="designer-select" {!! ($plan->designer == 'designer_partner') ? 'style="display: none;"' : '' !!}>
                <div class="form-group {{ $errors->has('designer_admin') ? 'has-error' : '' }}">
                    {{ Form::label('designer_admin', 'Designer', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-6">
                        {!! Form::select('designer_admin', $designAdmin, null, ['class' => 'form-control', 'placeholder' => 'Select designer...']) !!}
                    </div>
                </div>
            </div>

            <div id="designer-partner-select" {!! ($plan->designer == 'designer') ? 'style="display: none;"' : '' !!}>
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

        <div class="form-group {{ $errors->has('youtube') ? 'has-error' : '' }}">
            <div class="col-sm-offset-2 col-sm-6">
                <label class="radio-inline">
                    {!! Form::radio('youtube', 'link', true) !!} YouTube URL
                </label>
                <label class="radio-inline">
                    {!! Form::radio('youtube', 'file') !!} Video File
                </label>
            </div>
        </div>
        @if( old('designer') )
            <div class="form-group {{ $errors->has('youtube_url') ? 'has-error' : '' }}" id="youtube-link" {!! old('youtube') == 'file' ? 'style="display: none;"' : '' !!}>
                {{ Form::label('youtube_url', 'YouTube URL', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-6">
                    {{ Form::text('youtube_url', null, ['class'=>'form-control', 'placeholder'=>'Plan Name']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('video_file') ? 'has-error' : '' }}" id="video-file" {!! old('youtube') == 'link' ? 'style="display: none;"' : '' !!}>
                {{ Form::label('video_file', 'Video File', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-6">
                    <div class="input-group">
                        <input class="form-control" name="video_file" type="file">
                        <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        @elseif( isset($plan->youtube) )
            <div class="form-group {{ $errors->has('youtube_url') ? 'has-error' : '' }}" id="youtube-link" {!! $plan->youtube == 'file' ? 'style="display: none;"' : '' !!}>
                {{ Form::label('youtube_url', 'YouTube URL', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-6">
                    {{ Form::text('youtube_url', null, ['class'=>'form-control', 'placeholder'=>'Plan Name']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('video_file') ? 'has-error' : '' }}" id="video-file" {!! $plan->youtube == 'link' ? 'style="display: none;"' : '' !!}>
                {{ Form::label('video_file', 'Video File', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-6">
                    <div id="current_video_file" {!! !$plan->video_file ? 'style="display: none;"' : '' !!}>
                        <input type="hidden" name="video_file_old" value="{{ $plan->video_file }}">
                        <a href="{{ '/storage/plans/'.$plan->id.'/'.$plan->video_file }}">{{ $plan->video_file }}</a> <span><i id="video_file_change" class="fa fa-minus-circle fa-lg click-icon red-icon"></i></span>
                    </div>
                    <div id="new_video_file" class="input-group" {!! $plan->video_file ? 'style="display: none;"' : '' !!}>
                        <input class="form-control" name="video_file" type="file">
                        <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        @else
            <div class="form-group" id="youtube-link">
                {{ Form::label('youtube_url', 'YouTube URL', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-6">
                    {{ Form::text('youtube_url', null, ['class'=>'form-control', 'placeholder'=>'Plan Name']) }}
                </div>
            </div>
            <div class="form-group" id="video-file" style="display: none;">
                {{ Form::label('video_file', 'Video File', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-6">
                    <div class="input-group">
                        <input class="form-control" name="video_file" type="file">
                        <span class="input-group-addon"><i class="fa fa-file" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        @endif

        <div class="form-group">
            {{ Form::label('admin_note', 'Admin note', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                {{ Form::textarea('admin_note', null, ['class'=>'form-control']) }}
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="details">
        <div class="form-group {{ $errors->has('details.type_structure') ? 'has-error' : '' }}">
            {{ Form::label('details[type_structure]', 'Type of Structure', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                {!! Form::select('details[type_structure]', ['single'=>'Single', 'duplex'=>'Duplex', 'multifamily'=>'Multifamily', 'garage'=>'Garage'], null, ['class' => 'form-control', 'placeholder' => 'Select a Structure...']) !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('details.copyright') ? 'has-error' : '' }}">
            {{ Form::label("details[copyright]", 'Copyright date', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group">
                    {{ Form::text("details[copyright]", null, ['class'=>'form-control datepicker', 'placeholder'=>'Copyright date']) }}
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('details.bonus_access') ? 'has-error' : '' }}">
            {{ Form::label('details[bonus_access]', 'Bonus Access', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                {!! Form::select('details[bonus_access]', ['Option 1', 'Option 2'], null, ['class' => 'form-control', 'placeholder' => 'Select a Bonus Access...']) !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('details.lot_char') ? 'has-error' : '' }}">
            {{ Form::label('', 'Lot Characteristics', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('details[lot_char][]', 'corner') }} Suited for corner lot
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('details[lot_char][]', 'narrow') }} Suited for narrow lot
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('details[lot_char][]', 'sloping') }} Suited for sloping lot
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('details[lot_char][]', 'view') }} Suited for view lot
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('details.lot_siope') ? 'has-error' : '' }}">
            {{ Form::label('details[lot_siope]', 'Lot Slope', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                {!! Form::select('details[lot_siope]', ['1'=>'1', '2'=>'2', '3'=>'3'], null, ['class' => 'form-control', 'placeholder' => 'Select a Lot Siope...']) !!}
            </div>
        </div>

    </div>
    <div role="tabpanel" class="tab-pane fade" id="rooms">
        <div class="form-group {{ $errors->has('rooms.r_master') ? 'has-error' : '' }}">
            {{ Form::label('rooms[r_master]', 'Master', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group">
                    {!! Form::select('rooms[r_master]', ['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4'], null, ['class' => 'form-control', 'placeholder' => 'Select a Master...']) !!}
                    <span class="input-group-addon"> Floor</span>
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('rooms.r_bedrooms') ? 'has-error' : '' }}">
            {{ Form::label('rooms[r_bedrooms]', 'Bedrooms', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {!! Form::select('rooms[r_bedrooms]', ['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4'], null, ['class' => 'form-control', 'placeholder' => 'Select a Bedrooms...']) !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('rooms.r_full_baths') ? 'has-error' : '' }}">
            {{ Form::label('rooms[r_full_baths]', 'Full Baths', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {!! Form::select('rooms[r_full_baths]', ['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4'], null, ['class' => 'form-control', 'placeholder' => 'Select a Full Baths...']) !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('rooms.r_half_baths') ? 'has-error' : '' }}">
            {{ Form::label('rooms[r_half_baths]', 'Half Baths', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {!! Form::select('rooms[r_half_baths]', ['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4'], null, ['class' => 'form-control', 'placeholder' => 'Select a Half Baths...']) !!}
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
        @elseif( isset($plan->similar) )
            @foreach( $plan->similar as $n => $similar)
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
        <div class="form-group {{ $errors->has('dimensions.stories') ? 'has-error' : '' }}">
            {{ Form::label('dimensions[stories]', 'Stories', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {!! Form::select('dimensions[stories]', ['1'=>'1', '1.5'=>'1.5', '2'=>'2', '3'=>'3', '4'=>'4'], null, ['class' => 'form-control', 'placeholder' => 'Select a Stories...']) !!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('dimensions[width_ft]', 'Width', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group {{ $errors->has('dimensions.width_ft') ? 'has-error' : '' }}">
                    {{ Form::text('dimensions[width_ft]', null, ['class'=>'form-control', 'placeholder'=>'0']) }}
                    <span class="input-group-addon">ft.</span>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group {{ $errors->has('dimensions.width_in') ? 'has-error' : '' }}">
                    {{ Form::text('dimensions[width_in]', null, ['class'=>'form-control', 'placeholder'=>'0']) }}
                    <span class="input-group-addon">in.</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('dimensions[depth_ft]', 'Depth', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group {{ $errors->has('dimensions.depth_ft') ? 'has-error' : '' }}">
                    {{ Form::text('dimensions[depth_ft]', null, ['class'=>'form-control', 'placeholder'=>'0']) }}
                    <span class="input-group-addon">ft.</span>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group {{ $errors->has('dimensions.depth_in') ? 'has-error' : '' }}">
                    {{ Form::text('dimensions[depth_in]', null, ['class'=>'form-control', 'placeholder'=>'0']) }}
                    <span class="input-group-addon">in.</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('dimensions[height_ft]', 'Height', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group {{ $errors->has('dimensions.height_ft') ? 'has-error' : '' }}">
                    {{ Form::text('dimensions[height_ft]', null, ['class'=>'form-control', 'placeholder'=>'0']) }}
                    <span class="input-group-addon">ft.</span>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group {{ $errors->has('dimensions.height_in') ? 'has-error' : '' }}">
                    {{ Form::text('dimensions[height_in]', null, ['class'=>'form-control', 'placeholder'=>'0']) }}
                    <span class="input-group-addon">in.</span>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="feet">
        <div class="col-sm-push-1  col-sm-5 col-md-4">
            <div class="form-group {{ $errors->has('square_ft.str_total') ? 'has-error' : '' }}">
                {{ Form::label('square_ft[str_total]', 'Structure Total', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('square_ft[str_total]', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('square_ft.unit_total') ? 'has-error' : '' }}">
                {{ Form::label('square_ft[unit_total]', 'Unit Total', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('square_ft[unit_total]', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('square_ft.1_floor') ? 'has-error' : '' }}">
                {{ Form::label('square_ft[1_floor]', '1st Floor', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('square_ft[1_floor]', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('square_ft.2_floor') ? 'has-error' : '' }}">
                {{ Form::label('square_ft[2_floor]', '2nd Floor', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('square_ft[2_floor]', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('square_ft.3_floor') ? 'has-error' : '' }}">
                {{ Form::label('square_ft[3_floor]', '3nd Floor', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('square_ft[3_floor]', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('square_ft.lower_floor') ? 'has-error' : '' }}">
                {{ Form::label('square_ft[lower_floor]', 'Lower Floor', ['class' => 'col-sm-4 control-label']) }}
                <div class="col-sm-4 col-md-6">
                    {{ Form::text('square_ft[lower_floor]', null, ['class'=>'form-control']) }}
                </div>
            </div>
        </div>
        <div class="col-sm-7 col-md-8 col-sm-pull-1 col-md-pull-0">
            <div class="form-group {{ $errors->has('square_ft.bonus') ? 'has-error' : '' }}">
                {{ Form::label('square_ft[bonus]', 'Bonus', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('square_ft[bonus]', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('square_ft.garage') ? 'has-error' : '' }}">
                {{ Form::label('square_ft[garage]', 'Garage', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('square_ft[garage]', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('square_ft.storage') ? 'has-error' : '' }}">
                {{ Form::label('square_ft[storage]', 'Storage', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('square_ft[storage]', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('square_ft.porch') ? 'has-error' : '' }}">
                {{ Form::label('square_ft[porch]', 'Porch', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('square_ft[porch]', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('square_ft.deck') ? 'has-error' : '' }}">
                {{ Form::label('square_ft[deck]', 'Deck', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('square_ft[deck]', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('square_ft.patio') ? 'has-error' : '' }}">
                {{ Form::label('square_ft[patio]', 'Patio', ['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-3">
                    {{ Form::text('square_ft[patio]', null, ['class'=>'form-control']) }}
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
                                {{ Form::text('custom__sq_ft[custom_desc]['.$n.']', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="col-sm-2 {{ $errors->has('custom_sq.'.$n) ? 'has-error' : '' }}">
                            {{ Form::text('custom__sq_ft[custom_sq]['.$n.']', null, ['class'=>'form-control']) }}
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
            @elseif( isset($plan->custom__sq_ft['custom_sq']) )
                @foreach( $plan->custom__sq_ft['custom_sq'] as $n => $custom )
                    <div class="form-group">
                        <input type="hidden" name="custom_desc_sq[{{$n}}]" value="1">
                        <div class="col-sm-offset-1 col-sm-2 {{ $errors->has('custom_desc.'.$n) ? 'has-error' : '' }}">
                            <div class="input-group">
                                <span class="input-group-addon">#{{$loop->iteration}}</span>
                                {{ Form::text('custom__sq_ft[custom_desc]['.$n.']', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="col-sm-2 {{ $errors->has('custom_sq.'.$n) ? 'has-error' : '' }}">
                            {{ Form::text('custom__sq_ft[custom_sq]['.$n.']', null, ['class'=>'form-control']) }}
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
                            {{ Form::text('custom__sq_ft[custom_desc][]', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        {{ Form::text('custom__sq_ft[custom_sq][]', null, ['class'=>'form-control']) }}
                    </div>
                    <div class="col-sm-2">
                        <i id="custom-add-icon" class="fa fa-plus-circle fa-lg click-icon green-icon"></i>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="construction">
        <div class="form-group {{ $errors->has('construction.roof_frame') ? 'has-error' : '' }}">
            {{ Form::label('construction[roof_frame]', 'Roof Frame', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {!! Form::select('construction[roof_frame]', ['stick'=>'Stick', 'truss'=>'Truss'], null, ['class' => 'form-control', 'placeholder' => 'Select a Roof Frame...']) !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('construction.ext_walls') ? 'has-error' : '' }}">
            {{ Form::label('construction[ext_walls]', 'Ext. Walls', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-4">
                {!! Form::select('construction[ext_walls]', ['block'=>'Block', '2x4'=>'2x4', '2x6'=>'2x6'], null, ['class' => 'form-control', 'placeholder' => 'Select a Roof Frame...']) !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('construction.found_type') ? 'has-error' : '' }}">
            {{ Form::label('', 'Foundation Type', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('construction[found_type][]', 'Basement') }} Basement
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('construction[found_type][]', 'Crawlspace') }} Crawlspace
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('construction[found_type][]', 'Daylight basement') }} Daylight basement
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('construction[found_type][]', 'Pier') }} Pier
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('construction[found_type][]', 'Slab') }} Slab
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('construction[found_type][]', 'Walkout basement') }} Walkout basement
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="ceiling">
        <div class="form-group {{ $errors->has('ceiling.celing_1_floor') ? 'has-error' : '' }}">
            {{ Form::label('ceiling[celing_1_floor]', '1st Floor', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group">
                    {{ Form::text('ceiling[celing_1_floor]', null, ['class'=>'form-control']) }}
                    <span class="input-group-addon">ft.</span>
                </div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('ceiling.celing_2_floor') ? 'has-error' : '' }}">
            {{ Form::label('ceiling[celing_2_floor]', '2nd Floor', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group">
                    {{ Form::text('ceiling[celing_2_floor]', null, ['class'=>'form-control']) }}
                    <span class="input-group-addon">ft.</span>
                </div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('ceiling.celing_3_floor') ? 'has-error' : '' }}">
            {{ Form::label('ceiling[celing_3_floor]', '3rd Floor', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group">
                    {{ Form::text('ceiling[celing_3_floor]', null, ['class'=>'form-control']) }}
                    <span class="input-group-addon">ft.</span>
                </div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('ceiling.celing_lower_floor') ? 'has-error' : '' }}">
            {{ Form::label('ceiling[celing_lower_floor]', 'Lower Level', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                <div class="input-group">
                    {{ Form::text('ceiling[celing_lower_floor]', null, ['class'=>'form-control']) }}
                    <span class="input-group-addon">ft.</span>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="roof">
        <h3 class="text-center">Roof Pitch</h3>
        <div class="form-group {{ $errors->has('roof.primary') ? 'has-error' : '' }}">
            {{ Form::label('roof[primary]', 'Primary', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('roof[primary]', null, ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('roof.secondary') ? 'has-error' : '' }}">
            {{ Form::label('roof[secondary]', 'Secondary', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {{ Form::text('roof[secondary]', null, ['class'=>'form-control']) }}
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="garage-tab">
        <div class="form-group {{ $errors->has('garage.car') ? 'has-error' : '' }}">
            {{ Form::label('garage[car]', 'Car', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-2">
                {{ Form::text('garage[car]', null, ['class'=>'form-control', 'placeholder'=>'0']) }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('garage.car_location') ? 'has-error' : '' }}">
            {{ Form::label('garage[car_location]', 'Location', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-3">
                {!! Form::select('garage[car_location]', ['front'=>'front entry', 'rear'=>'rear entry', 'side'=>'side entry'], null, ['class' => 'form-control', 'placeholder' => 'Select Location...']) !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('garage.car_options') ? 'has-error' : '' }}">
            {{ Form::label('', 'Options', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-6">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('garage[car_options][]', 'attached') }} Attached
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('garage[car_options][]', 'carport') }} Carport
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('garage[car_options][]', 'detached') }} Detached
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('garage[car_options][]', 'drive-under') }} Drive-under
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('garage[car_options][]', 'none') }} None
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('garage[car_options][]', 'tandem') }} Tandem
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('garage[car_options][]', 'living_space') }} Width Living Space
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
                        @if( isset($plan) )
                            {{ Form::checkbox('style_id['.$style->id.']', $style->id, $plan->styles->contains($style->id)) }} {{ $style->short_name }}
                        @else
                            {{ Form::checkbox('style_id['.$style->id.']', $style->id) }} {{ $style->short_name }}
                        @endif
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

                <div class="form-group {{ $errors->has('collection_id.'.$collection->id) ? 'has-error' : '' }}">
                    <div class="checkbox">
                        <label>
                            @if( isset($plan) )
                                {{ Form::checkbox('collection_id['.$collection->id.']', $collection->id, $plan->collections->contains($collection->id)) }} {{ $collection->short_name }}
                            @else
                                {{ Form::checkbox('collection_id['.$collection->id.']', $collection->id) }} {{ $collection->short_name }}
                            @endif
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

        $('input:radio[name="youtube"]').on('click', function(){
            if( $(this).prop('checked') == true && $(this).val() == 'link' ){
                $("#video-file").hide();
                $("#youtube-link").show();
            }else{
                $("#youtube-link").hide();
                $("#video-file").show();
            }
        });

        $( ".datepicker" ).datepicker({
            dateFormat: "yy-mm-dd"
        });

        $("#custom-add-icon").on('click', function(){
            var elementsCount = +$('#custom-sq .form-group').length + 1;
            var html = '<div class="form-group"><input type="hidden" name="custom_desc_sq[]" value="1">' +
                '<div class="col-sm-offset-1 col-sm-2"><div class="input-group"><span class="input-group-addon">#' +elementsCount+ '</span><input class="form-control" name="custom__sq_ft[custom_desc][]" type="text"></div></div>' +
                '<div class="col-sm-2"><input class="form-control" name="custom__sq_ft[custom_sq][]" type="text"></div>' +
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

        $(document).on('focus', 'input:text[name^="similar[]"]', function(){
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
        });

        $("#video_file_change").on('click', function(){
            $("#current_video_file").hide();
            $("#new_video_file").show();
        });
    });
</script>
@endpush
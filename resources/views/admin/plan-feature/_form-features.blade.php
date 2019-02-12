<input type="hidden" name="redirect" id="redirect" value="next">

<div class="row">
    <h3 class="text-center">Kitchen</h3>
    @php
        $kitchensBreack = ceil(count($kitchens)/3);
    @endphp
    @foreach($kitchens as $kitchen)
        @if ($loop->first)
            <div class="col-sm-offset-2 col-sm-3">
                @endif

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('kitchen_id[]', $kitchen->id, $plan->kitchens->contains($kitchen->id)) }} {{ $kitchen->name }}
                        </label>
                    </div>
                </div>

                @if( ($loop->iteration % $kitchensBreack) == 0  && !$loop->last)
            </div>
            <div class="col-sm-3">
                @endif

                @if ($loop->last)
            </div>
        @endif
    @endforeach
</div>

<div class="row">
    <h3 class="text-center">Bed & Bath Options</h3>
    @php
        $bedsBreack = ceil(count($beds)/3);
    @endphp
    @foreach($beds as $bed)
        @if ($loop->first)
            <div class="col-sm-offset-2 col-sm-3">
                @endif

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('bed_id[]', $bed->id, $plan->beds->contains($bed->id)) }} {{ $bed->name }}
                        </label>
                    </div>
                </div>

                @if( ($loop->iteration % $bedsBreack) == 0  && !$loop->last)
            </div>
            <div class="col-sm-3">
                @endif

                @if ($loop->last)
            </div>
        @endif
    @endforeach
</div>

<div class="row">
    <h3 class="text-center">Room & Interior</h3>
    @php
        $roomsInteriorsBreack = ceil(count($roomsInteriors)/3);
    @endphp
    @foreach($roomsInteriors as $roomInterior)
        @if ($loop->first)
            <div class="col-sm-offset-2 col-sm-3">
                @endif

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('room_interior_id[]', $roomInterior->id, $plan->roomsInterior->contains($roomInterior->id)) }} {{ $roomInterior->name }}
                        </label>
                    </div>
                </div>

                @if( ($loop->iteration % $roomsInteriorsBreack) == 0  && !$loop->last)
            </div>
            <div class="col-sm-3">
                @endif

                @if ($loop->last)
            </div>
        @endif
    @endforeach
</div>

<div class="row">
    <h3 class="text-center">Garage Features</h3>
    @php
        $garagesBreack = ceil(count($garages)/3);
    @endphp
    @foreach($garages as $garage)
        @if ($loop->first)
            <div class="col-sm-offset-2 col-sm-3">
                @endif

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('garage_id[]', $garage->id, $plan->garages->contains($garage->id)) }} {{ $garage->name }}
                        </label>
                    </div>
                </div>

                @if( ($loop->iteration % $garagesBreack) == 0  && !$loop->last)
            </div>
            <div class="col-sm-3">
                @endif

                @if ($loop->last)
            </div>
        @endif
    @endforeach
</div>

<div class="row">
    <h3 class="text-center">Outdoor Spaces</h3>
    @php
        $outdoorsBreack = ceil(count($outdoors)/3);
    @endphp
    @foreach($outdoors as $outdoor)
        @if ($loop->first)
            <div class="col-sm-offset-2 col-sm-3">
                @endif

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('outdoor_id[]', $outdoor->id, $plan->outdoors->contains($outdoor->id)) }} {{ $outdoor->name }}
                        </label>
                    </div>
                </div>

                @if( ($loop->iteration % $outdoorsBreack) == 0  && !$loop->last)
            </div>
            <div class="col-sm-3">
                @endif

                @if ($loop->last)
            </div>
        @endif
    @endforeach
</div>

@push('scripts')
<script>
    $("#feature-submit-close, #feature-submit-next").on('click', function(e){
        e.preventDefault();
        if( $(this).prop('id') == 'feature-submit-close' )
            $('#redirect').val('close');
        else
            $('#redirect').val('next');

        $('#plans-feature').submit();
    })
</script>
@endpush
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
                            <input type="checkbox" name="bed_id[]" value="{{ $bed->id }}"> {{ $bed->name }}
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
                            <input type="checkbox" name="room_interior_id[]" value="{{ $roomInterior->id }}"> {{ $roomInterior->name }}
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
    <h3 class="text-center">Porches & Exterior</h3>
    @php
        $porchExterirorsBreack = ceil(count($porchExterirors)/3);
    @endphp
    @foreach($porchExterirors as $porchExteriror)
        @if ($loop->first)
            <div class="col-sm-offset-2 col-sm-3">
                @endif

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="porch_exter_id[]" value="{{ $porchExteriror->id }}"> {{ $porchExteriror->name }}
                        </label>
                    </div>
                </div>

                @if( ($loop->iteration % $porchExterirorsBreack) == 0  && !$loop->last)
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
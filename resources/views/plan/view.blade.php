@extends('layouts.index')

@section('content')


    Plan Package:
    <select name="package">
        <option value="0">--Select Package--</option>
        @foreach($plan->packages as $package)
            <option value="{{ $package->pivot->id }}">{{ $package->name }} (${{ $package->pivot->price }})</option>
        @endforeach
    </select>
    <br><br>
    Plan Foundation:
    <select name="foundation">
        <option value="0">--Select Foundation--</option>
        @foreach($plan->foundationOptions as $foundation)
            <option value="{{ $foundation->pivot->id }}">{{ $foundation->name }} (${{ $foundation->pivot->price }})</option>
        @endforeach
    </select>
    <br><br>
    Plan Addons:
    @foreach($plan->addons as $addon)
        <label><input type="checkbox" name="addons[]" value="{{$addon->pivot->id}}" id="">{{ $addon->name }} (${{ $addon->pivot->price }})</label><br>
    @endforeach
@endsection

@push('scripts')
<script>
    var packages = {'packages':{}, 'foundations': {}, 'addons': {}};

</script>
@endpush
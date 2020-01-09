@extends('admin.layouts.master')

@section('title', 'Orders')

@section('content')
<style>
    .box-body.large p, .box-body.large ul{
        font-size: 1.8rem;
    }
</style>
<div class="box box-default">
        <div class="box-header">        
            <h3>Order information:</h3>
        </div>
        <div class="box-body large">
            <fieldset>
                <legend>Shipping Address:</legend>
                <p>Order ID: {{$order['id']}}</p>
                <p>PayPal ID: {{$order['payd_id']}}</p>
                <p>First Name: {{$order['firstName']}}</p>
                <p>Last Name: {{$order['lastName']}}</p>
                <p>Street: {{$order['street']}}</p>
                <p>City: {{$order['city']}}</p>
                <p>State: {{$order['state']}}</p>
                <p>Zip: {{$order['zip']}}</p>
                <p>Email: {{$order['email']}}</p>
                <p>Phone: {{$order['phone']}}</p>
            </fieldset>
            <fieldset>
                <legend>Building:</legend>
                <p>Street: {{$order['bil_street']}}</p>
                <p>City: {{$order['bil_city']}}</p>
                <p>State: {{$order['bil_state']}}</p>
                <p>Zip: {{$order['bil_zip']}}</p>
            </fieldset>
            <fieldset>
                <legend>Additional Information:</legend>
                <p>Are you a builder?: {{$order['builder'] == 1 ? 'Yes' : 'No'}}</p>
                <p>How did you find us?: {{$order['how']}} {{$order['how_txt']}}</p>
            </fieldset>
            <fieldset>
                <legend>Order:</legend>
                <ul>
                    @foreach($plans as $plan)
                        <li>Plan: <a target="_blank" href="{{route("house-plan.edit", $plan->id)}}">{{$plan->name}}-{{$plan->plan_number}}</a></li>
                        <ul>
                            <li>Plan Package: {{$plan->packages[0]->name}} (${{$plan->packages[0]->pivot->price}})</li>
                            <li>Foundation: {{$plan->foundationOptions[0]->name}} (${{$plan->foundationOptions[0]->pivot->price}})</li>
                            @isset($plan->addons)
                                <li>Optional Features:</li>
                                <ul>
                                    @foreach ($plan->addons as $addon)
                                        <li>{{$addon->name}} (${{$addon->pivot->price}})</li>
                                    @endforeach
                                </ul>
                            @endisset
                        </ul>
                    @endforeach
                </ul>
                <p>Shipping method: {{$shipping->name}} (${{$shipping->cost}})</p>
                @if ($promo)
                    <p>Promo code: {{$promo->name}} ({{$promo->value}}{{$promo->level == 'percent' ? '%' : '$'}})</p>
                @endif
            </fieldset>
        </div>
        <div class="box-footer">
            <h3>Total: ${{$order['total']}}</h3>
        </div>
    </div>
@endsection
@extends('layouts.index')

@section('content')
<div class="px-5 mt-3">
    <h5 class="blue-text mobile-text-edit" style="margin-top : 10px;"> <b>COMPLETE YOUR HOUSE PLAN PURCHASE</b></h5>
    <div class="row">
        <div class="col-sm-12 col-md-8 order-md-1 order-2">

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                    <form action="{{ route('checkout.store') }}" id="shippingForm" method="POST">
                        <h4 class="font-weight-bold mt-2 mt-20">Billing Address</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="firstName" class="form-control rounded-0">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="lastName" class="form-control rounded-0">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Street</label>
                                    <input type="text" name="street" class="form-control rounded-0">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">City</label>
                                    <input type="text" name="city" class="form-control rounded-0">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">State</label>
                                    {!! Form::select('state', $states, null, ['class' => 'form-control rounded-0', 'id'
                                    => '',
                                    'placeholder' => '---Select---']) !!}
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Zipcode</label>
                                    <input type="text" name="zip" class="form-control rounded-0">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control rounded-0">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" class="form-control rounded-0">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox text-uppercase">
                            <input type="hidden" name="shipping_address" id="shipping_address" value="0">
                            <input type="checkbox" checked="checked" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label font-weight-bold" for="customCheck1"
                                style="color:#224195">SHIPPING ADDRESS SAME AS BILLING</label>
                        </div>
                        <div id="show-billing-adress" style="display:none">

                            <h4 class="font-weight-bold mt-20">Building/Site Address <span
                                    class="desktop-off text-danger if-known"> (if
                                    known)</span><small class="text-danger mobile-off">(enter only if you have the site
                                    address)</small>
                            </h4>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Street</label>
                                        <input type="text" name="bil_street" class="form-control rounded-0">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">City</label>
                                        <input type="text" name="bil_city" class="form-control rounded-0">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">State</label>
                                        {!! Form::select('bil_state', $states, null, ['class' => 'form-control
                                        rounded-0',
                                        'id' => '',
                                        'placeholder' => '---Select---']) !!}
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Zipcode</label>
                                        <input type="text" name="bil_zip" class="form-control rounded-0">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="font-weight-bold mt-2">Additional Information</h4>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="" class="blue-text font-weight-bold">Are you a builder?</label>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadio1" value="1" name="builder"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadio2" value="0" name="builder" checked
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12 form-group">
                                <label for="" class="blue-text font-weight-bold in-one-line">How did you find
                                    us?</label>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="how1" name="how" value="Google"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="how1">Google</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="how2" name="how" class="custom-control-input">
                                    <label class="custom-control-label" for="how2">Bing/Yahoo</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="how3" name="how" value="Pinterest"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="how3">Pinterest</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="how4" name="how" value="Other/Referral"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="how4">Other/Referral</label>
                                </div>
                                <input type="text" name="how_txt" placeholder="We'd love to know!" class="center"
                                    style="width : 152px;">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <h4 class="font-weight-bold">Billing</h4>
                        <div class="row">
                            <div class="col-12 red-text form-group">
                                <div class="form-check">
                                    <input name="confirm" class="form-check-input" type="checkbox"> I agree to the <a
                                        href="/purchase-terms-and-conditions" target="_blank"
                                        style="color:red;text-decoration: underline;font-weight:bold;"> Terms and
                                        Conditions</a>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-center">
                            <i id="checkout-loading" style="display:none" class="fas fa-sync-alt fa-spin fa-2x"></i>
                            <script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_API_KEY')}}"></script>
                            <div id="paypal-button-container"></div>
                            <script>
                                function toJSONString( form ) {
                                    var obj = {};
                                    var elements = form.elements;
                                    for( var i = 0; i < elements.length; ++i ) {
                                        var element = elements[i];
                                        var name = element.name;
                                        var value = element.value;

                                        if( name ) {
                                            obj[ name ] = value;
                                        }
                                    }

                                    return JSON.stringify( obj );
                                }
                                var submitForm = document.getElementById('shippingForm');
                                var orderID = null;
                                paypal.Buttons({
                                    onClick: function(data, actions){
                                        $(".invalid-feedback").html("");
                                        $(".form-group input, .form-group select").removeClass("is-invalid");

                                        return fetch("{{ route('checkout.store') }}", {
                                            method: 'post',
                                            headers: {
                                            'content-type': 'application/json',
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            body: toJSONString(submitForm)
                                        }).then(function(res){
                                            return res.json();
                                        }).then(function(data){
                                            if(data.errors){
                                                for (var prop in data.errors) {
                                                    submitForm.elements[prop].classList.add("is-invalid");
                                                    var nextElement = $(submitForm.elements[prop]).parent().find(".invalid-feedback");
                                                    if(nextElement){
                                                        nextElement.html(data.errors[prop][0]);
                                                    }
                                                }
                                                return actions.reject();
                                            }else if(data.orderID){
                                                orderID = data.orderID;
                                                return actions.resolve();
                                            }else{
                                                return actions.reject();
                                            }
                                        }).catch(function(e){                                            
                                            return actions.reject();
                                        })
                                    },
                                    createOrder: function(data, actions) {
                                        // Set up the transaction
                                        return actions.order.create({
                                            intent: 'CAPTURE',
                                            purchase_units: [{
                                            amount: {
                                                currency_code: "USD",
                                                value: '{{Cart::total()}}'
                                            }
                                            }]
                                        });
                                    },
                                    onApprove: function(data, actions) {
                                        // Capture the funds from the transaction
                                        $("#checkout-loading").show();
                                        $("#paypal-button-container").hide();
                                        return actions.order.capture().then(function(details) {
                                            // Show a success message to your buyer
                                            if(details.status =="COMPLETED"){
                                                fetch("{{ route('checkout.payd') }}", {
                                                    method: 'post',
                                                    headers: {
                                                    'content-type': 'application/json',
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                    },
                                                    body: JSON.stringify({orderID:orderID, paydID:details.id})
                                                }).then(function(res){
                                                    return res.json();
                                                }).then(function(data){
                                                    if(data.pay_status == 1){
                                                        window.location.replace("/checkout/done/"+data.orderID+"/"+data.paydID);
                                                    }else{
                                                        alert('Something went wrong!!!');
                                                    }
                                                }); 
                                            }
                                        });
                                    }                                    
                                }).render('#paypal-button-container');
                                $(document).ready(function () {
                                    $("#customCheck1").on('click', function(){
                                        if($(this).prop('checked')){
                                            $("#show-billing-adress").hide();
                                            $("#shipping_address").val(0);
                                            //submitForm.elements["bil_street"].value = submitForm.elements["street"].value;
                                            //submitForm.elements["bil_street"].disabled = true;

                                            //submitForm.elements["bil_city"].value = submitForm.elements["city"].value;
                                            // submitForm.elements["bil_city"].disabled = true;

                                            //submitForm.elements["bil_state"].value = submitForm.elements["state"].value;
                                            // submitForm.elements["bil_state"].disabled = true;

                                            //submitForm.elements["bil_zip"].value = submitForm.elements["zip"].value;
                                            // submitForm.elements["bil_zip"].disabled = true;
                                        }
                                        else{
                                            $("#show-billing-adress").show();
                                            $("#shipping_address").val(1);
                                            // submitForm.elements["bil_street"].disabled = false;
                                            // submitForm.elements["bil_city"].disabled = false;
                                            // submitForm.elements["bil_state"].disabled = false;
                                            // submitForm.elements["bil_zip"].disabled = false;
                                        }
                                    })
                                })
                            </script>
                            {{-- <button class="btn btn-primary rounded-0 mb-3 px-4 red-button big-button">Purchase Plan</button>    --}}

                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                    <h4 class="font-weight-bold mt-2">2. Billing</h4>
                </div>
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">...</div>
            </div>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-1">
            <h4 class="font-weight-bold mobile-off">Order Summary</h4>
            <div class="bg-summary p-3">
                @foreach ($plansData as $plan)
                @if(isset($plan['images'][0]['file_name']))
                <img src="{{ asset('storage/plans/'.$plan['id'].'/thumb/'.$plan['images'][0]['file_name']) }}"
                    alt="{{$plan['images'][0]['alt_text']}}" class="img-fluid d-block w-100">
                @endif
                <h5 class="font-weight-bold">HOUSE PLAN {{$plan['plan_number']}}</h5>
                @isset($plan['packages'])
                <dl class="row mb-0">
                    <dt class="col-7 text-primary text-lg  font-weight-semi-bold">{{$plan['packages'][0]['name']}}</dt>
                    <dd class="col-5 text-lg text-secondary font-weight-bold text-right">
                        ${{number_format($plan['packages'][0]['pivot']['price'], 2, '.', ',')}}</dd>
                </dl>
                @endisset
                @isset($plan['foundation_options'])
                <dl class="row mb-0">
                    <dt class="col-7 text-primary text-lg  font-weight-semi-bold">
                        {{$plan['foundation_options'][0]['name']}}</dt>
                    <dd class="col-5 text-lg text-secondary font-weight-bold text-right">
                        ${{number_format($plan['foundation_options'][0]['pivot']['price'], 2, '.', ',')}}</dd>
                </dl>
                @endisset
                @if(isset($plan['addons']))
                @foreach ($plan['addons'] as $item)
                <dl class="row mb-0">
                    <dt class="col-7 text-primary text-lg  font-weight-semi-bold">{{$item['name']}}</dt>
                    <dd class="col-5 text-lg text-secondary font-weight-bold text-right">
                        ${{number_format($item['pivot']['price'], 2, '.', ',')}}</dd>
                </dl>
                @endforeach
                @endif
                @endforeach
                <p class="font-weight-bold text-secondary">{{$curShipp['method']}}</p>
                <h5 class="font-weight-bold text-right"><span class="text-primary">TOTAL:</span> ${{Cart::total()}}</h5>
            </div>
        </div>
    </div>
</div>

@endsection
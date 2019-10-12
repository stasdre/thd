@extends('layouts.index')

@section('content')
<div class="px-5 mt-3">
    <h5 class="blue-text mobile-text-edit" style="margin-top : 10px;"> <b>COMPLETE YOUR HOUSE PLAN PURCHASE</b></h5>
   <div class="row">
     <div class="col-sm-12 col-md-8 order-md-1 order-2">
    
       <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade show active" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
             <h4 class="font-weight-bold mt-2 mt-20">Shipping Address</h4>
             <div class="row">
                 <div class="col-sm-6">
                     <div class="form-group">
                         <label for="">First Name</label>
                         <input type="text" class="form-control rounded-0">
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <div class="form-group">
                         <label for="">Last Name</label>
                         <input type="text" class="form-control rounded-0">
                     </div>
                 </div>
                 <div class="col-sm-12">
                     <div class="form-group">
                         <label for="">Street</label>
                         <input type="text" class="form-control rounded-0">
                     </div>
                 </div>
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="">City</label>
                         <input type="text" class="form-control rounded-0">
                     </div>
                 </div>
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="">State</label>
                        <select name="" id="" class="form-control rounded-0">
                            <option value="">Select State</option>
                        </select>
                     </div>
                 </div>
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="">Zipcode</label>
                         <input type="text" class="form-control rounded-0">
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <div class="form-group">
                         <label for="">Email</label>
                         <input type="text" class="form-control rounded-0">
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <div class="form-group">
                         <label for="">Phone</label>
                         <input type="text" class="form-control rounded-0">
                     </div>
                 </div>
             </div>
             <div class="custom-control custom-checkbox text-uppercase">
<input type="checkbox" class="custom-control-input" id="customCheck1">
<label class="custom-control-label font-weight-bold" for="customCheck1" style="color:#224195">Use this as Billing Address</label>
</div>
             
             <h4 class="font-weight-bold mt-20">Building/Site Address <span class="desktop-off text-danger if-known"> (if known)</span><small class="text-danger mobile-off">(enter only if you have the site address)</small></h4>
             <div class="row">                	
                 <div class="col-sm-12">
                     <div class="form-group">
                         <label for="">Street</label>
                         <input type="text" class="form-control rounded-0">
                     </div>
                 </div>
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="">City</label>
                         <input type="text" class="form-control rounded-0">
                     </div>
                 </div>
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="">State</label>
                        <select name="" id="" class="form-control rounded-0">
                            <option value="">Select State</option>
                        </select>
                     </div>
                 </div>
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="">Zipcode</label>
                         <input type="text" class="form-control rounded-0">
                     </div>
                 </div>
             </div>
             <h4 class="font-weight-bold mt-2">Additional Information</h4> 
             <div class="row mb-3">
                 <div class="col-sm-12">
                     <label for="" class="blue-text font-weight-bold">Are you a builder?</label>
                    
                     <div class="custom-control custom-radio custom-control-inline">
<input type="radio" id="customRadio1" name="customRadio2" class="custom-control-input">
<label class="custom-control-label" for="customRadio1">Yes</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
<input type="radio" id="customRadio2" name="customRadio2" class="custom-control-input">
<label class="custom-control-label" for="customRadio2">No</label>
</div>                    
                 </div>
             </div> 
             <div class="row mb-3">
                 <div class="col-sm-12">
                     <label for="" class="blue-text font-weight-bold in-one-line">How did you find us?</label>
                         
                     <div class="custom-control custom-radio custom-control-inline">
<input type="radio" id="customRadio1" name="customRadio2" class="custom-control-input">
<label class="custom-control-label" for="customRadio1">Google</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
<input type="radio" id="customRadio2" name="customRadio2" class="custom-control-input">
<label class="custom-control-label" for="customRadio2">Bing/Yahoo</label>
</div>     
                
<div class="custom-control custom-radio custom-control-inline">
<input type="radio" id="customRadio2" name="customRadio2" class="custom-control-input">
<label class="custom-control-label" for="customRadio2">Pinterest</label>
</div>     
<div class="custom-control custom-radio custom-control-inline">
<input type="radio" id="customRadio2" name="customRadio2" class="custom-control-input">
<label class="custom-control-label" for="customRadio2">Other/Referral</label>
</div>                    
<input type="text" placeholder="We'd love to know!" class="center" style="width : 152px;"> 
                 </div>
             </div>  
             
             <h4 class="font-weight-bold">Billing</h4>
             <div class="row"> <div class="col-12 red-text form-group"> <input name="" type="checkbox" > I agree to the <a href="#" style="color:red;text-decoration: underline;font-weight:bold;"> 	Terms and Conditions</a></div></div>                
                     <div class="mobile-center">        
                            <script src="https://www.paypal.com/sdk/js?client-id=AbipKKx6atXELtj6dGItlk-9DDYSLS0d01ff-kqTCtLUvkMygxfNuyz_Ao-Dr9aIoak6Swnz5zslP9Qp"></script>
                            <div id="paypal-button-container"></div>
                            <script>
                                paypal.Buttons({
                                    createOrder: function(data, actions) {
                                        // Set up the transaction
                                        console.log('createOrder',data);
                                        return actions.order.create({
                                            purchase_units: [{
                                            amount: {
                                                currency_code: "USD",
                                                value: '1000'
                                            }
                                            }]
                                        });
                                    },
                                    onApprove: function(data, actions) {
                                        // Capture the funds from the transaction
                                        return actions.order.capture().then(function(details) {
                                            // Show a success message to your buyer
                                            //alert('Transaction completed by ' + details.payer.name.given_name);
                                            // console.log(data);
                                            console.log('onApprove',details);
                                        });
                                    }                                    
                                }).render('#paypal-button-container');
                            </script>
                 {{-- <button class="btn btn-primary rounded-0 mb-3 px-4 red-button big-button">Purchase Plan</button>    --}}
            
            </div>     
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
                <img src="{{ asset('storage/plans/'.$plan['id'].'/thumb/'.$plan['images'][0]['file_name']) }}" alt="{{$plan['images'][0]['alt_text']}}" class="img-fluid d-block w-100">
            @endif
            <h5 class="font-weight-bold">HOUSE PLAN {{$plan['plan_number']}}</h5>
            @isset($plan['packages'])
                <dl class="row mb-0">
                    <dt class="col-7 text-primary text-lg  font-weight-semi-bold">{{$plan['packages'][0]['name']}}</dt>
                    <dd class="col-5 text-lg text-secondary font-weight-bold text-right">${{number_format($plan['packages'][0]['pivot']['price'], 2, '.', ',')}}</dd>
                </dl>
            @endisset
            @isset($plan['foundation_options'])
                <dl class="row mb-0">
                    <dt class="col-7 text-primary text-lg  font-weight-semi-bold">{{$plan['foundation_options'][0]['name']}}</dt>
                    <dd class="col-5 text-lg text-secondary font-weight-bold text-right">${{number_format($plan['foundation_options'][0]['pivot']['price'], 2, '.', ',')}}</dd>
                </dl>
            @endisset
            @if(isset($plan['addons']))
                @foreach ($plan['addons'] as $item)                                
                    <dl class="row mb-0">
                        <dt class="col-7 text-primary text-lg  font-weight-semi-bold">{{$item['name']}}</dt>
                        <dd class="col-5 text-lg text-secondary font-weight-bold text-right">${{number_format($item['pivot']['price'], 2, '.', ',')}}</dd>
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
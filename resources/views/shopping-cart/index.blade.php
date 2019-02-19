@extends('layouts.index')
@section('title', 'Shopping cart')

@section('content')
<div id="shoppingCart">
    <div class="container shooping-cart-page">
        <div class="page-name mt-3 py-2 px-5" style="margin-bottom : 10px;">
            <h1 class="font-weight-bold text-uppercase"><span clas="desktop-off">&nbsp;&nbsp;</span>YOUR CART</h1>
        </div>

        <div class="px-5 py-2" style="padding-right : 0 !important;">
            @forelse ($plansData as $plan)
                <div class="row">
                    <div class="col-sm-4">
                        <div class="cart-grid text-center"> <img src="images/cart.jpg" alt="" class="img-fluid w-100">
                            <p class="plan-name font-weight-bold m-0">dell’ Azienda Agricola House Plan 4839</p>
                            <p class="plan-meta">4,839 s.f. | 4 beds | 3.5 baths</p>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-weight-bold">HOUSE PLAN 4839</h5>
                        <table class="table cart-table">
                            <tbody>
                            <tr>
                                <td><span class="text-primary text-lg">PDF Files-Single Build</span> <span class="mobile-display ">&nbsp;(Immediate delivery)</span></td>
                                <td class="price">$1,895.00</td>
                                <td style="border:1px solid white;" class="text-right"><a href="{{route('plan.view', $plan->plan_number)}}">edit</a></td>
                            </tr>
                            <tr>
                                <td><span class="text-primary text-lg">Slab Foundation</span></td>
                                <td class="price">$0.00</td>
                                <td style="border:1px solid white;" class="text-right"><a href="{{route('plan.view', $plan->plan_number)}}">edit</a></td>
                            </tr>
                            <tr>
                                <td><span class="text-primary text-lg">Full Reverse</span></td>
                                <td class="price">$150.00</td>
                                <td style="border:1px solid white;" class="text-right"><a href="{{route('plan.view', $plan->plan_number)}}">edit</a></td>
                            </tr>
                            <tr>
                                <td class="shipping-values mobile-off"><span class="text-primary text-lg">Shipping</span>
                                    <select name="" class="form-control d-inline-block w-50" v-on:change="calculate">
                                        @foreach($shipping as $ship)
                                            <option data-cost="{{$ship->cost}}" value="{{$ship->id}}">{{$ship->name}}</option>
                                        @endforeach
                                    </select>


                                </td>
                                <td class="shipping-values desktop-off"><span class="text-primary text-lg">Shipping</span>
                                    <select name="" class="form-control d-inline-block w-50" v-on:change="calculate">
                                        @foreach($shipping as $ship)
                                            <option data-cost="{{$ship->cost}}" value="{{$ship->id}}">{{$ship->name}}</option>
                                        @endforeach
                                    </select>


                                </td>
                                <td class="price">@{{shippCost}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @empty
                <p>Empty cart</p>
            @endforelse
        </div>
    </div>

    @if($plansData)
        <div class="row page-name" style="padding-top : 18px;">
            <div class="col-7 col-sm-6 offset-sm-6">
                <div class="text-right promo-code">
                    <form action="">
                        <div class="form-group text-left">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control rounded-0 border-secondary promo-code-mobile" placeholder="Enter promo code">
                                <div class="input-group-append">
                                    <button class="btn btn-primary rounded-0 text-dark font-weight-semi-bold" type="button" v-on:click="promo">APPLY</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-5 col-sm-6 cart-mobile-total desktop-off"> <span class="text-primary">TOTAL :</span> $@{{ total }}</div>
        </div>

        <div class="page-name text-right mobile-off">
            <div class="container">
                <h2 class="font-weight-bold text-uppercase mt-3 mb-3 py-2 px-5"><span class="text-primary">TOTAL :</span> $@{{ total }}</h2>
            </div>
        </div>

</div>

        <div class="container cart-actions-sec">
            <div class="px-5 py-1 text-right cart-actions"> <a href="{{ route('register') }}" class="btn btn-dark rounded-0 text-uppercase font-weight-semi-bold sign-in-checkout">Sign in to Checkout</a> <a href="#" class="btn btn-primary rounded-0  font-weight-semi-bold guest-checkout">GUEST CHECKOUT</a> </div>
        </div>
    @endif
    <div class="page-name mt-3 mb-2 py-2 px-5 text-center">
        <div class="container">
            <h1 class="font-weight-bold text-uppercase cart-page-heading-mobile">IMPORTANT INFORMATION <span class="mobile-off">ABOUT YOUR HOUSE PLANS</span></h1>
        </div>
    </div>
    <div class="container">
        <div class="row center cart-que border-for-mobile">
            <div class="col-sm-4 text-right center-in-mobile"><a href="#" class="text-primary text-lg" data-toggle="modal" data-target="#planPackage"> What's in a plan package?</a></div>
            <div id="planPackage" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Construction drawings include detailed, dimensioned floor plans, basic electric layouts, cabinet layouts and elevations, structural information, cross sections, roof plans and foundation plans.  </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 center-in-mobile"><a href="#" class="text-primary text-lg" data-toggle="modal" data-target="#setsprint">How many sets can I print?</a></div>
            <div id="setsprint" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Print as many full size 24” x 36” copies as you need,<br> including 8.5 X 11 copies on your home printer. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-left center-in-mobile"><a href="#" class="text-primary text-lg" data-toggle="modal" data-target="#buildmore">Can I build more than once?</a></div>
            <div id="buildmore" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Each construction package is for a single build <br>unless a multi-build license is purchased. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="my-3">
            <p>All of the house plans you find on our site include all of the information your builder needs to build your new home. Certain building departments, however, may require additional information or engineering.  This can be handled either by a local, licensed professional or engineer. Even with these added changes to your plans when they are needed, buying our plans online are still just a fraction of the time and cost of hiring a licensed architect to design a new home from scratch. To find out what your local building department requires, call your local building department and/or consult with your general contractor.</p>
            <p class="font-weight-bold red-text"><span style="color : black;">NOTE: </span>Electronic and Modified Plan Purchases Are Final!</p>
        </div>
    </div>
@endsection

@push('scripts')
    @if(App::environment('local'))
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    @else
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.6/dist/vue.js"></script>
    @endif
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    var app = new Vue({
        el: '#shoppingCart',
        data: {
            total: {{ Cart::total() }},
            calc: parseFloat({{ Cart::total() }}),
            shippCost: "FREE"
        },
        methods: {
            calculate: function (e) {
                if(e.target.options.selectedIndex > -1) {
                    var cost = parseFloat(e.target.options[e.target.options.selectedIndex].dataset.cost);
                    this.total = this.calc + cost;
                    if(cost > 0)
                        this.shippCost = '$'+cost;
                    else
                        this.shippCost = 'FREE';
                }
            },
            promo: function(e){
                e.preventDefault();
                axios.get('https://api.coindesk.com/v1/bpi/currentprice.json')
                    .then(response => (console.log(response)));
            }
        }
    })
</script>
@endpush
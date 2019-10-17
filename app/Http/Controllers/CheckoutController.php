<?php

namespace Thd\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Thd\Checkout;
use Thd\Plan;
use Thd\Shipping;
use Validator;

class CheckoutController extends Controller
{

    public function index()
    {
        $dataCart = [];
        $curShipp = ['method'=>'', 'cost'=>0.00];

        if(Cart::count()){
            foreach (Cart::content() as $cart){

                if($cart->id === 'ship_method') {
                    $promo = Shipping::find($cart->name)->first();
                    $curShipp['method'] = $promo->name;
                    $curShipp['cost'] = $cart->price;
                    continue;
                }

                if($cart->id === 'promo') {
                    continue;
                }

                $plan = Plan::where('id', $cart->id);

                if($cart->options['plan_package']){
                    $plan->with(['packages' => function($query) use ($cart){
                        $query->where('package_id', '=', $cart->options['plan_package']);
                    }]);
                }

                if($cart->options['plan_foundation']){
                    $plan->with(['foundationOptions' => function($query) use ($cart){
                        $query->where('foundation_options_id', '=', $cart->options['plan_foundation']);
                    }]);
                }

                if(isset($cart->options['plan_features']) && !empty($cart->options['plan_features'])){
                    $plan->with(['addons' => function($query) use ($cart){
                        $query->whereIn('addon_id', $cart->options['plan_features']);
                    }]);
                }

                $plan->with(['images' => function($query){
                    $query->where('for_search', '=', 1);
                }]);

                $dataCart[] = $plan->first()->toArray();
            }

            return view('checkout.index', ['plansData'=>$dataCart, 'curShipp'=>$curShipp]);
        }else{
            return redirect()->route('home');
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|alpha_dash',
            'lastName' => 'required|alpha_dash',
            'street' => 'nullable|alpha_dash',
            'city' => 'nullable|alpha_dash',
            'state' => 'nullable|exists:states_us,abbr',
            'zip' => 'nullable|numeric',
            'email' => 'required|email',
            'phone'=>'required|alpha_dash',
            'confirm'=>'required|accepted',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->messages()], 200);
        }else{
            $reqData = $request->except(['confirm']);

            $checkout = new Checkout($reqData);
            $checkout->save();

            return response()->json(['orderID'=>$checkout->id], 200);
        }
    }
}

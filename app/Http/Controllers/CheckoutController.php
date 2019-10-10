<?php

namespace Thd\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Thd\Plan;

class CheckoutController extends Controller
{

    public function index()
    {
        $dataCart = [];

        if(Cart::count()){
            foreach (Cart::content() as $cart){

                if($cart->id === 'ship_method') {
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
                        $query->where('addon_id', '=', $cart->options['plan_features']);
                    }]);
                }

                $plan->with(['images' => function($query){
                    $query->where('for_search', '=', 1);
                }]);

                $dataCart[] = $plan->first()->toArray();
            }
        }
        return view('checkout.index', ['plansData'=>$dataCart]);
    }
}

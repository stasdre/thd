<?php

namespace Thd\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Thd\Plan;
use Thd\Shipping;

class ShoppingCartController extends Controller
{

    public function index()
    {
        //dd(Cart::content());
        $dataCart = [];

        if(Cart::count()){
            foreach (Cart::content() as $cart){

            }
        }

        return view('shopping-cart.index', [
            'cartData'=>$dataCart,
            'shipping'=>Shipping::all()
        ]);
    }

    public function purchase(Request $request)
    {
        $plan = Plan::find($request->post('plan_id'));
        $totalCost = 0;
        $packages = [];

        if($request->post('plan_package')){
            $plan_package = $plan->packages()->where('package_id', $request->post('plan_package'))->first();
            $totalCost += $plan_package->pivot->price;
            $packages['plan_package'] = $plan_package->id;
        }

        if($request->post('plan_foundation')){
            $plan_foundation = $plan->foundationOptions()->where('foundation_options_id', $request->post('plan_foundation'))->first();
            $totalCost += $plan_foundation->pivot->price;
            $packages['plan_foundation'] = $plan_foundation->id;
        }

        if($request->post('plan_features')){
            $plan_features = $plan->addons()->where('addon_id', $request->post('plan_features'))->first();
            $totalCost += $plan_features->pivot->price;
            $packages['plan_features'] = $plan_features->id;
        }

        if(Cart::count() != 0){
            $plan_id = $plan->id;
            $cartItem = Cart::search(function ($cartItem, $rowId) use($plan_id) {
                return $cartItem->id === $plan_id;
            })->first();
            if($cartItem->rowId){
                Cart::remove($cartItem->rowId);
            }
        }

        Cart::add($plan->id, $plan->name, 1, $totalCost, $packages);

        return redirect()->route('cart');
    }
}

<?php

namespace Thd\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Thd\Plan;
use Thd\Promo;
use Thd\Shipping;

class ShoppingCartController extends Controller
{

    public function index()
    {
        //dd(Cart::content());
        $dataCart = [];

        if(Cart::count()){
            foreach (Cart::content() as $cart){
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

                if($cart->options['plan_features']){
                    $plan->with(['addons' => function($query) use ($cart){
                        $query->where('addon_id', '=', $cart->options['plan_features']);
                    }]);
                }

                $plan->with(['images' => function($query){
                    $query->where('for_search', '=', 1);
                }]);

                $dataCart[] = $plan->first();
            }
        }
        //dd($dataCart[0]->images);
        return view('shopping-cart.index', [
            'plansData'=>$dataCart,
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

    public function promo(Request $request)
    {
        $promo = Promo::where('code', '=', $request->input('code'))->first();

        if(isset($promo->id)){
            return [
                'status'=>'ok',
                'value'=>$promo->value,
                'type'=>$promo->level
            ];
        }else {
            return ['status'=>false];
        }
    }
}

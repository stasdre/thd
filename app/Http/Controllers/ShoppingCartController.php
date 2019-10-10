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
    private function _promoCalculate($code)
    {
        $promo = Promo::where('code', '=', $code)->first();
        $cost = 0;

        $cartPromo = Cart::search(function ($cartItem, $rowId) {
            return $cartItem->id === 'promo';
        })->first();

        if(isset($cartPromo->rowId)){
            Cart::remove($cartPromo->rowId);
        }

        if(isset($promo->id)){
            
            if($promo->level === 'percent'){
                $cost = -($promo->value*Cart::total())/100;
            }else{
                $cost = -$promo->value;
            }
            Cart::add('promo', $promo->code, 1, $cost);

            return [
                'status'=>'ok',
                'code'=>$promo->code,
                'cost'=>$cost,
                'total'=>Cart::total(),
            ];
        }else {
            return [
                'status'=>'ok',
                'code'=>'',
                'cost'=>$cost,
                'total'=>Cart::total(),
            ];
        }
    }

    public function index()
    {
        //dd(Cart::content());
        $dataCart = [];
        $curShipp = ['method'=>0, 'cost'=>0.00];
        $curPromo = ['code'=>0, 'cost'=>0.00];

        if(Cart::count()){
            foreach (Cart::content() as $cart){
                if($cart->id === 'ship_method') {
                    $curShipp['method'] = $cart->name;
                    $curShipp['cost'] = $cart->price > 0 ? '$'.$cart->price : 'FREE';
                    continue;
                }

                if($cart->id === 'promo') {
                    $curPromo['code'] = $cart->name;
                    $curPromo['cost'] =  $cart->price;
                    continue;
                }

                $plan = Plan::where('id', $cart->id);

                if(isset($cart->options['plan_package'])){
                    $plan->with(['packages' => function($query) use ($cart){
                        $query->where('package_id', '=', $cart->options['plan_package']);
                    }]);
                }

                if(isset($cart->options['plan_foundation'])){
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
        }
        //dd($dataCart);
        return view('shopping-cart.index', [
            'plansData'=>$dataCart,
            'shipping'=>Shipping::all(),
            'curShipp'=>$curShipp,
            'curPromo'=>$curPromo
        ]);
    }

    public function purchase(Request $request)
    {
        $plan = Plan::find($request->post('plan_id'));
        $totalCost = 0;
        $packages = [];

        if(!isset($plan->id)){
            return [
                'status'=>'ok',
            ];    
        }

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
            $featuresIdArr = explode(",", $request->post('plan_features'));
            $plan_features = $plan->addons()->whereIn('addon_id', $featuresIdArr)->get();
            foreach($plan_features as $item){
                $totalCost += $item->pivot->price;
                $packages['plan_features'][] = $item->id;
            }
        }

        if(Cart::count() != 0){
            $plan_id = $plan->id;
            $cartItem = Cart::search(function ($cartItem, $rowId) use($plan_id) {
                return $cartItem->id === $plan_id;
            })->first();
            if(isset($cartItem->rowId)){
                Cart::remove($cartItem->rowId);
            }
        }

        Cart::add($plan->id, $plan->name, 1, $totalCost, $packages);

        $cartMethod = Cart::search(function ($cartItem, $rowId) {
            return $cartItem->id === 'ship_method';
        })->first();
        if(!isset($cartMethod->rowId)){
            $dataShipping = Shipping::orderBy('cost', 'asc')->first();
            if(!isset($dataShipping->id)){
                return [
                    'status'=>'ok',
                ];    
            }
    
            Cart::add('ship_method', $dataShipping->id, 1, $dataShipping->cost);                                    
        }


        $cartPromo = Cart::search(function ($cartItem, $rowId) {
            return $cartItem->id === 'promo';
        })->first();

        if(isset($cartPromo->rowId)){
            $this->_promoCalculate($cartPromo->name);
        }

        //return redirect()->route('cart');
        return [
            'status'=>'ok',
        ];
    }

    public function promo(Request $request)
    {
        return $this->_promoCalculate($request->input('code'));
    }

    public function update(Request $request)
    {
        if($request->input('type') === 'ship_method'){
            $dataShipping = Shipping::find((int)$request->input('val'));
            if(!isset($dataShipping->id)){
                return [];    
            }

            $cartMethod = Cart::search(function ($cartItem, $rowId) {
                return $cartItem->id === 'ship_method';
            })->first();
            if(!isset($cartMethod->rowId)){
                Cart::add('ship_method', $dataShipping->id, 1, $dataShipping->cost);                                    
            }else{
                Cart::update($cartMethod->rowId, ['name' => $dataShipping->id, 'qty'=>1, 'price'=>$dataShipping->cost]);
            }    
        }

        $cartPromo = Cart::search(function ($cartItem, $rowId) {
            return $cartItem->id === 'promo';
        })->first();

        if(isset($cartPromo->rowId)){
            $this->_promoCalculate($cartPromo->name);
        }


        return [
            'status'=>'ok',
            'cost'=>$dataShipping->cost > 0 ? '$'.$dataShipping->cost : 'FREE',
            'total'=>Cart::total()
        ];
    }
}

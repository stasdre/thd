<?php

namespace Thd\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Thd\Checkout;
use Thd\Plan;
use Thd\Shipping;
use Thd\Promo;
use Validator;
use PragmaRX\Countries\Package\Countries;
use Illuminate\Support\Facades\Mail;
use Thd\Mail\Checkout as MailCheckout;
use Thd\User;

class CheckoutController extends Controller
{

    public function index()
    {
        $dataCart = [];
        $curShipp = ['method' => '', 'cost' => 0.00];

        if (Cart::count()) {
            foreach (Cart::content() as $cart) {

                if ($cart->id === 'ship_method') {
                    $promo = Shipping::find($cart->name)->first();
                    $curShipp['method'] = $promo->name;
                    $curShipp['cost'] = $cart->price;
                    continue;
                }

                if ($cart->id === 'promo') {
                    continue;
                }

                $plan = Plan::where('id', $cart->id);

                if ($cart->options['plan_package']) {
                    $plan->with(['packages' => function ($query) use ($cart) {
                        $query->where('package_id', '=', $cart->options['plan_package']);
                    }]);
                }

                if ($cart->options['plan_foundation']) {
                    $plan->with(['foundationOptions' => function ($query) use ($cart) {
                        $query->where('foundation_options_id', '=', $cart->options['plan_foundation']);
                    }]);
                }

                if (isset($cart->options['plan_features']) && !empty($cart->options['plan_features'])) {
                    $plan->with(['addons' => function ($query) use ($cart) {
                        $query->whereIn('addon_id', $cart->options['plan_features']);
                    }]);
                }

                $plan->with(['images' => function ($query) {
                    //$query->where('for_search', '=', 1);
                }]);

                $dataCart[] = $plan->first()->toArray();
            }

            $countries = new Countries();

            return view('checkout.index', [
                'plansData' => $dataCart,
                'curShipp' => $curShipp,
                'states' => $countries->where('cca3', 'USA')->first()->hydrateStates()->states->pluck('name', 'postal')
            ]);
        } else {
            return redirect()->route('home');
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required|exists:states_us,abbr',
            'zip' => 'required|numeric',
            'email' => 'required|email',
            'phone' => 'required|alpha_dash',
            'confirm' => 'required|accepted',
            'shipping_address' => 'nullable',
            'bil_street' => 'nullable|required_if:shipping_address,1',
            'bil_city' => 'nullable|required_if:shipping_address,1',
            'bil_state' => 'nullable|required_if:shipping_address,1|exists:states_us,abbr',
            'bil_zip' => 'nullable|required_if:shipping_address,1|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()], 200);
        } else {
            $reqData = $request->except(['confirm', 'shipping_address']);

            $dataPlans = [];
            foreach (Cart::content() as $cart) {

                if ($cart->id === 'ship_method') {
                    $shipp = Shipping::find($cart->name)->first();
                    $reqData['shipping'] = json_encode(['method' => $cart->name, 'cost' => $cart->price, 'id' => $shipp->id]);
                    continue;
                }

                if ($cart->id === 'promo') {
                    $promo = Promo::where('code', '=', $cart->name)->first();
                    $reqData['promo'] = json_encode(['code' => $cart->name, 'cost' => $cart->price, 'id' => $promo->id]);
                    continue;
                }

                $dataPlans[$cart->id] = $cart->options;
            }

            $reqData['plans'] = json_encode($dataPlans, JSON_FORCE_OBJECT);
            $reqData['total'] = Cart::total();

            $checkout = new Checkout($reqData);
            $checkout->save();

            return response()->json(['orderID' => $checkout->id], 200);
        }
    }

    public function payd(Request $request)
    {
        $checkout = Checkout::where("id", $request->input('orderID'))
            ->where("pay_status", 0);

        $dataCheckout = $checkout->firstOrFail();

        $dataCheckout->payd_id = $request->input('paydID');
        $dataCheckout->pay_status = 1;

        $dataCheckout->update();

        return response()->json([
            'pay_status' => $dataCheckout->pay_status,
            'orderID' => $dataCheckout->id,
            'paydID' => $dataCheckout->payd_id
        ], 200);
    }

    public function done(Request $request, $orderID, $paydID)
    {
        if (Cart::count()) {
            $checkout = Checkout::where("id", $orderID)
                ->where("payd_id", $paydID)
                ->where("pay_status", 1);

            $dataCheckout = $checkout->firstOrFail();

            $dataShip = json_decode($dataCheckout->shipping);
            $shipMethod = Shipping::find($dataShip->method);
            $dataCheckout['ship_via'] = $shipMethod->name;

            $orderPlans = json_decode($dataCheckout->plans);
            $dataPlans = [];
            foreach ($orderPlans as $id => $orderData) {
                $plan = Plan::where('id', $id)->with(['images' => function ($query) {
                    $query->where('first_image', 1);
                }]);

                if ($orderData->plan_package) {
                    $plan->with(['packages' => function ($query) use ($orderData) {
                        $query->where('package_id', $orderData->plan_package);
                    }]);
                }

                if ($orderData->plan_foundation) {
                    $plan->with(['foundationOptions' => function ($query) use ($orderData) {
                        $query->where('foundation_options_id', $orderData->plan_foundation);
                    }]);
                }

                if ($orderData->plan_features) {
                    $plan->with(['addons' => function ($query) use ($orderData) {
                        $query->whereIn('addon_id', (array) $orderData->plan_features);
                    }]);
                }
                $dataPlans[] = $plan->first();
            }
            $dataCheckout['data_plans'] = $dataPlans;

            if (Auth::id()) {
                $dataPromo = json_decode($dataCheckout->promo);
                if (isset($dataPromo->id)) {
                    $user = User::find(Auth::id());
                    $user->promos()->attach($dataPromo->id);
                }
            }

            Cart::destroy();

            Mail::to($dataCheckout->email)->cc(config('mail.to_admin_email'))->send(new MailCheckout($dataCheckout));

            return view('checkout.done', ['data' => $dataCheckout]);
        } else {
            return redirect()->route('home');
        }
    }
}

<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Checkout;
use Thd\Http\Controllers\Controller;
use Thd\Plan;
use Thd\Promo;
use Thd\Shipping;
use Yajra\Datatables\Datatables;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index');
    }

    public function view(Checkout $order)
    {
        $orderPlans = json_decode($order['plans']);
        $dataPlans = [];
        //dd($orderPlans);
        foreach($orderPlans as $id=>$orderData){
            $plan = Plan::where('id', $id);
            
            if($orderData->plan_package){
                $plan->with(['packages' => function ($query) use($orderData) {
                    $query->where('package_id', $orderData->plan_package);
                }]);
            }

            if($orderData->plan_foundation){
                $plan->with(['foundationOptions' => function ($query) use($orderData) {
                    $query->where('foundation_options_id', $orderData->plan_foundation);
                }]);
            }

            if($orderData->plan_features){
                $plan->with(['addons' => function ($query) use($orderData) {
                    $query->whereIn('addon_id', (array) $orderData->plan_features);
                }]);
            }
            $dataPlans[] = $plan->first();
        }

        $shipping = json_decode($order['shipping']);
        $dataShipp = Shipping::find($shipping->method);

        $dataPromo=null;
        if($order['promo']){
            $promo = json_decode($order['promo']);
            $dataPromo = Promo::find($promo->id);
        }

        //dd($dataShipp );
        return view('admin.order.view', [
            'order'=>$order,
            'plans'=>$dataPlans,
            'shipping'=>$dataShipp,
            'promo'=>$dataPromo
        ]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $orders = Checkout::select(['id', 'payd_id', 'total', 'pay_status', 'created_at']);
        return Datatables::of($orders)
            ->addColumn('actions', function($order){
                return '<a class="btn btn-info btn-sm" href="'.route('order.view', $order->id).'" role="button">View</a>';
            })
            ->editColumn('pay_status', function(Checkout $order){
                if($order->pay_status == 1)
                    return '<i style="color: green;" class="fa fa-check" aria-hidden="true"></i>';
                return '';
            })
            ->editColumn('total', function(Checkout $order){
                return '$'.$order->total;
            })
            ->rawColumns(['total','pay_status','actions'])
            ->make(true);
    }
}

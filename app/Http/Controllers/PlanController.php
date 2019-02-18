<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Thd\Package;
use Thd\Plan;

class PlanController extends Controller
{

    public function view(Request $request, $plan_number)
    {
        $plan = Plan::where('plan_number', $plan_number)
            ->with('packages')
            ->with('foundationOptions')
            ->with('addons')
            ->with(['images' => function($query){
                $query->orderBy('sort_number', 'ASC');
            }])
            ->with('roomsInterior')
            ->with('outdoors')
            ->with('beds')
            ->with('kitchens')
            ->with('styles')
            ->with(['images_first' => function($query){
                $query->orderBy('sort_number', 'ASC');
            }])
            ->with(['images_second' => function($query){
                $query->orderBy('sort_number', 'ASC');
            }])
            ->with(['images_basement' => function($query){
                $query->orderBy('sort_number', 'ASC');
            }])
            ->with(['images_bonus' => function($query){
                $query->orderBy('sort_number', 'ASC');
            }]);

        if(!Auth::user() || Auth::user()->hasRole('customer'))
            $plan->where('is_active', 1);

        $dataPlan = $plan->firstOrFail();

        /*$packages = Package::whereHas('plans', function($query) use ($plan){
            $query->where('plan_id', '=', $plan->id);
        })->get();*/

        return view('plan.plan', [
            'plan'=>$dataPlan,
            //'packages'=>$packages
        ]);
    }
	public function modifyplan(){
		return view('plan.modify-plan');
    }
}

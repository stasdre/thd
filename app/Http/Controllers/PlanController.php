<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\Package;
use Thd\Plan;

class PlanController extends Controller
{

    public function view(Request $request, $id)
    {
        $plan = Plan::where('id', $id)
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
            }])
            ->firstOrFail();

        /*$packages = Package::whereHas('plans', function($query) use ($plan){
            $query->where('plan_id', '=', $plan->id);
        })->get();*/

        return view('plan.plan', [
            'plan'=>$plan,
            //'packages'=>$packages
        ]);
    }
	public function modifyplan(){
		return view('plan.modify-plan');
    }
}

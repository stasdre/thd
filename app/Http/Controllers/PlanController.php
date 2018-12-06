<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\Package;
use Thd\Plan;

class PlanController extends Controller
{
     public function index()
     {
		return view('plan');
    }

    public function view(Request $request, $id)
    {
        $plan = Plan::where('id', $id)
            ->with('packages')
            ->with('foundationOptions')
            ->with('addons')
            ->firstOrFail();

        /*$packages = Package::whereHas('plans', function($query) use ($plan){
            $query->where('plan_id', '=', $plan->id);
        })->get();*/

        return view('plan.view', [
            'plan'=>$plan,
            //'packages'=>$packages
        ]);
    }
	public function modifyplan(){
		return view('modify-plan');
    }
}

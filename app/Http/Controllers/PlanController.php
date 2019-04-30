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
        $packages = [];
        if($dataPlan->packages){
            foreach($dataPlan->packages as $package){
                $packages[] = [
                    'id'=>$package->id,
                    'name'=>$package->name,
                    'price'=>$package->pivot->price,
                    'desc'=>$package->short_desc,
                ];
            }
        }

        $foundations = [];
        if($dataPlan->foundationOptions){
            foreach($dataPlan->foundationOptions as $foundation){
                $foundations[] = [
                    'id'=>$foundation->id,
                    'name'=>$foundation->name,
                    'price'=>$foundation->pivot->price,
                    'desc'=>$foundation->short_desc,
                ];
            }
        }

        $addons = [];
        if($dataPlan->addons){
            foreach($dataPlan->addons as $addon){
                $addons[] = [
                    'id'=>$addon->id,
                    'name'=>$addon->name,
                    'price'=>$addon->pivot->price,
                    'desc'=>$addon->short_desc,
                ];
            }
        }

        return view('plan.plan', [
            'plan'=>$dataPlan,
            'packages'=>json_encode($packages),
            'foundations'=>json_encode($foundations),
            'addons'=>json_encode($addons)
        ]);
    }
	public function modifyplan(){
		return view('plan.modify-plan');
    }
}

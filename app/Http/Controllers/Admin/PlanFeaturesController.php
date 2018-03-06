<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;

use Thd\Plan;
use Thd\Kitchen;
use Thd\Bed;
use Thd\PorchExterior;
use Thd\RoomInterior;


class PlanFeaturesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $plan = Plan::findOrFail($id);

        $kitchens = Kitchen::orderBy('name')->get();
        $beds = Bed::orderBy('name')->get();
        $roomsInteriors = RoomInterior::orderBy('name')->get();
        $porchExterirors = PorchExterior::orderBy('name')->get();

        return view('admin.plan-feature.create',[
            'plan'=>$plan,
            'kitchens'=>$kitchens,
            'beds'=>$beds,
            'roomsInteriors'=>$roomsInteriors,
            'porchExterirors'=>$porchExterirors
        ]);
    }
}

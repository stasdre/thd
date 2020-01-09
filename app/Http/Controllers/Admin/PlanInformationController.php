<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Bed;
use Thd\Bedroom;
use Thd\Garage;
use Thd\Http\Controllers\Controller;
use Thd\Kitchen;
use Thd\Outdoor;
use Thd\Plan;
use Thd\PorchExterior;
use Thd\RoomInterior;

class PlanInformationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $plan = Plan::findOrFail($id);
        $kitchens = Kitchen::orderBy('name')->pluck('name', 'id');
        $beds = Bed::orderBy('name')->pluck('name', 'id');
        $roomsInteriors = RoomInterior::orderBy('name')->pluck('name', 'id');
        $porchExterirors = PorchExterior::orderBy('name')->pluck('name', 'id');
        $garages = Garage::orderBy('name')->pluck('name', 'id');
        $outdoors = Outdoor::orderBy('name')->pluck('name', 'id');

        return view('admin.plan-info.create',[
            'plan'=>$plan,
            'kitchens'=>$kitchens,
            'beds'=>$beds,
            'roomsInteriors'=>$roomsInteriors,
            'porchExterirors'=>$porchExterirors,
            'garages'=>$garages,
            'outdoors'=>$outdoors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);

        return redirect()->route('plan-images.create', ['id'=>$plan->id])
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$plan->name.' information was added',
                'autoHide'=>1]);
    }
}

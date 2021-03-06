<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Garage;
use Thd\Http\Controllers\Controller;

use Thd\Outdoor;
use Thd\Plan;
use Thd\Kitchen;
use Thd\Bed;
use Thd\RoomInterior;


class PlanFeaturesController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        $kitchens = Kitchen::orderBy('name')->get();
        $beds = Bed::orderBy('name')->get();
        $roomsInteriors = RoomInterior::orderBy('name')->get();
        $garages = Garage::orderBy('name')->get();
        $outdoors = Outdoor::orderBy('name')->get();

        return view('admin.plan-feature.create',[
            'plan'=>$plan,
            'kitchens'=>$kitchens,
            'beds'=>$beds,
            'roomsInteriors'=>$roomsInteriors,
            'garages'=>$garages,
            'outdoors'=>$outdoors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $validatedData = $request->validate([
            'kitchen_id' => 'nullable|array|exists:kitchens,id',
            'bed_id' => 'nullable|array|exists:beds,id',
            'room_interior_id' => 'nullable|array|exists:room_interiors,id',
            'garage_id' => 'nullable|array|exists:garages,id',
            'outdoor_id' => 'nullable|array|exists:outdoors,id',
        ]);

        $plan->kitchens()->sync(array_flatten($request->input('kitchen_id')));
        $plan->beds()->sync(array_flatten($request->input('bed_id')));
        $plan->roomsInterior()->sync(array_flatten($request->input('room_interior_id')));
        $plan->garages()->sync(array_flatten($request->input('garage_id')));
        $plan->outdoors()->sync(array_flatten($request->input('outdoor_id')));

        if( $request->input('redirect') == 'next' ){
            return redirect()->route('plan-desc.edit', ['plan'=>$plan->id])
                ->with('message', [
                    'type'=>'success',
                    'title'=>'Success!',
                    'message'=>$plan->name.' was updated',
                    'autoHide'=>1]);
        }else{
            return redirect()->route('house-plan.index')
                ->with('message', [
                    'type'=>'success',
                    'title'=>'Success!',
                    'message'=>$plan->name.' was updated',
                    'autoHide'=>1]);
        }
    }
}

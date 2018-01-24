<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Thd\Kitchen;
use Thd\Plan;

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

        return view('admin.plan-info.create',[
            'plan'=>$plan,
            'kitchens'=>$kitchens
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

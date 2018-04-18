<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;

use Thd\Plan;

class PlanDescriptionController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        return view('admin.plan-description.create', ['plan'=>$plan]);
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
        $request->validate([
            'short_description' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
        ]);

        $plan->short_description = $request->input('short_description');
        $plan->description = $request->input('description');
        $plan->meta_title = $request->input('meta_title');
        $plan->meta_description = $request->input('meta_description');
        $plan->update();

        if( $request->input('redirect') == 'next' ){
            return redirect()->route('plan-packages.create', ['plan'=>$plan->id])
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

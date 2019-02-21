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
            'page_title'=>'required|max:70',
            'meta_title' => 'required',
            'meta_description' => 'required|max:155',
        ]);

        $plan->page_title = $request->input('page_title');
        $plan->description = $request->input('description');
        $plan->short_desc = $request->input('short_desc');
        $plan->meta_title = $request->input('meta_title');
        $plan->meta_description = $request->input('meta_description');
        $plan->update();

        if( $request->input('redirect') == 'next' ){
            return redirect()->route('plan-packages.edit', ['plan'=>$plan->id])
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

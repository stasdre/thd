<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Thd\Package;
use Thd\Plan;
use Thd\PlanPackageData;
use Illuminate\Support\Facades\DB;

class PlanPackageController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        $packages = Package::all();

        return view('admin.plan-package.create', [
            'plan' => $plan,
            'packages' => $packages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'package' => 'nullable|array|exists:packages,id',
        ]);

        $plan->packages()->sync(array_flatten($request->input('package')));

        return redirect()->route('house-plan.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$plan->name.' packages was added',
                'autoHide'=>1]);
    }
}

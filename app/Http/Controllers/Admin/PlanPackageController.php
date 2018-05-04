<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Thd\Package;
use Thd\Plan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            'package.*' => 'nullable|exists:packages,id',
            'package_price.*' => 'required_with:package.*|nullable|numeric'
        ]);

        try {
            DB::beginTransaction();

            $plansData = [];
            if($request->input('package')){
                foreach ($request->input('package') as $package){
                    if($request->input('package_price')[$package]){
                        $plansData[$package] = [
                            'price' => $request->input('package_price')[$package]
                        ];
                    }
                }
            }

            $plan->packages()->sync($plansData);

            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }

        return redirect()->route('house-plan.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$plan->name.' packages was added',
                'autoHide'=>1]);
    }

    public function upload(Request $request, Plan $plan, Package $package)
    {
        $files = $plan->packages()->where('package_id', $package->id)->first();

        $dataFiles = [];

        if($files){
            $dataFiles = json_decode($files->pivot->files, true);
        }

        if($file = $request->file('file')){
            $filename  = str_random(40) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('packages/' . $plan->id, $filename);
            $dataFiles[] = $filename;
        }
        $plan->packages()->syncWithoutDetaching([$package->id=>['files'=>json_encode($dataFiles)]]);

        return response()->json(['success', 'plan_id' => $plan->id, 'package_id'=> $package->id, 'file_name'=>$filename], 200);
    }

    public function destroy(Request $request, Plan $plan, Package $package, $filename)
    {
        $files = $plan->packages()->where('package_id', $package->id)->first();

        $dataFiles = [];

        if($files){
            $dataFiles = json_decode($files->pivot->files, true);
            $pos = array_search($filename, $dataFiles);
            unset($dataFiles[$pos]);
            Storage::delete('packages/' . $plan->id . '/' .$filename);

            $plan->packages()->syncWithoutDetaching([$package->id=>['files'=>json_encode($dataFiles)]]);
        }

        return response()->json(['success'], 200);
    }

    public function download(Request $request, Plan $plan, Package $package, $filename)
    {
        $file = $plan->packages()->where('package_id', $package->id)->whereRaw('JSON_SEARCH(files, "one", "'.$filename.'") IS NOT NULL')->first();
        if($file){
            return Storage::download('packages/' . $plan->id . '/' .$filename);
        }else{
            abort(404);
        }
    }
}

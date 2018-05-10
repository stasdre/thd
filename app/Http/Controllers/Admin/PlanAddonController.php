<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Addon;
use Thd\Plan;
use Thd\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PlanAddonController extends Controller
{
    public function upload(Request $request, Plan $plan, Addon $addon)
    {
        $files = $plan->addons()->where('addon_id', $addon->id)->first();

        $dataFiles = [];

        if($files){
            $dataFiles = json_decode($files->pivot->files, true);
        }

        if($file = $request->file('file')){
            $filename  = str_random(40) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('addon/' . $plan->id, $filename);
            $dataFiles[] = $filename;
        }
        $plan->addons()->syncWithoutDetaching([$addon->id=>['files'=>json_encode($dataFiles)]]);

        return response()->json(['success', 'plan_id' => $plan->id, 'package_id'=> $addon->id, 'file_name'=>$filename], 200);
    }

    public function destroy(Request $request, Plan $plan, Addon $addon, $filename)
    {
        $files = $plan->addons()->where('addon_id', $addon->id)->first();

        $dataFiles = [];

        if($files){
            $dataFiles = json_decode($files->pivot->files, true);
            $pos = array_search($filename, $dataFiles);
            unset($dataFiles[$pos]);
            Storage::delete('addon/' . $plan->id . '/' .$filename);

            $plan->addons()->syncWithoutDetaching([$addon->id=>['files'=>json_encode($dataFiles)]]);
        }

        return response()->json(['success'], 200);
    }

    public function download(Request $request, Plan $plan, Addon $addon, $filename)
    {
        $file = $plan->addons()->where('addon_id', $addon->id)->whereRaw('JSON_SEARCH(files, "one", "'.$filename.'") IS NOT NULL')->first();
        if($file){
            return Storage::download('addon/' . $plan->id . '/' .$filename);
        }else{
            abort(404);
        }
    }
}

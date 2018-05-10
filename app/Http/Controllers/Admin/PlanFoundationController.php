<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\FoundationOption;
use Thd\Plan;
use Thd\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PlanFoundationController extends Controller
{
    public function upload(Request $request, Plan $plan, FoundationOption $foundation)
    {
        $files = $plan->foundationOptions()->where('foundation_options_id', $foundation->id)->first();

        $dataFiles = [];

        if($files){
            $dataFiles = json_decode($files->pivot->files, true);
        }

        if($file = $request->file('file')){
            $filename  = str_random(40) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('foundation/' . $plan->id, $filename);
            $dataFiles[] = $filename;
        }
        $plan->foundationOptions()->syncWithoutDetaching([$foundation->id=>['files'=>json_encode($dataFiles)]]);

        return response()->json(['success', 'plan_id' => $plan->id, 'package_id'=> $foundation->id, 'file_name'=>$filename], 200);
    }

    public function destroy(Request $request, Plan $plan, FoundationOption $foundation, $filename)
    {
        $files = $plan->foundationOptions()->where('foundation_options_id', $foundation->id)->first();

        $dataFiles = [];

        if($files){
            $dataFiles = json_decode($files->pivot->files, true);
            $pos = array_search($filename, $dataFiles);
            unset($dataFiles[$pos]);
            Storage::delete('foundation/' . $plan->id . '/' .$filename);

            $plan->foundationOptions()->syncWithoutDetaching([$foundation->id=>['files'=>json_encode($dataFiles)]]);
        }

        return response()->json(['success'], 200);
    }

    public function download(Request $request, Plan $plan, FoundationOption $foundation, $filename)
    {
        $file = $plan->foundationOptions()->where('foundation_options_id', $foundation->id)->whereRaw('JSON_SEARCH(files, "one", "'.$filename.'") IS NOT NULL')->first();
        if($file){
            return Storage::download('foundation/' . $plan->id . '/' .$filename);
        }else{
            abort(404);
        }
    }
}

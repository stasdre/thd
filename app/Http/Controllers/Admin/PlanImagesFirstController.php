<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Thd\PlanImageFirst;
use Thd\Plan;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PlanImagesFirstController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Plan $plan)
    {
        $input = $request->all();

        $rules = array(
            'file' => 'image|max:3000',
            'sort_number' => 'integer'
        );

        $validation = Validator::make($input, $rules);
        if ($validation->fails())
        {
            return Response::make($validation->errors()->first('file'), 400);
        }

        $image = $request->file('file');
        $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();

        if(!file_exists(storage_path('app/public/plans/' . $plan->id . '/original/'))){
            Storage::makeDirectory('public/plans/' . $plan->id . '/original');
        }

        $pathOriginal = storage_path('app/public/plans/' . $plan->id . '/original/' . $filename);
        $path = storage_path('app/public/plans/' . $plan->id . '/' . $filename);
        $pathThumb = storage_path('app/public/plans/' . $plan->id . '/thumb/' . $filename);

        $img = Image::make($image->getRealPath());
        $img->resize(1200, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path, 100);

        $imgThumb = Image::make($image->getRealPath());
        $imgThumb->resize(380, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $imgThumb->save($pathThumb);

        $imgOriginal = Image::make($image->getRealPath());
        $imgOriginal->save($pathOriginal, 100);

        if( $img &&  $imgThumb ) {
            $imagePlan = new PlanImageFirst([
                'file_name' => $filename,
                'sort_number' => $request->input('sort_number')
            ]);
            $imagePlan->plan()->associate($plan);
            $imagePlan->save();
            return response()->json(['success', 'plan_id' => $plan->id, 'file_name'=>$filename, 'id'=>$imagePlan->id], 200);
        } else {
            return response()->json('error', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Thd\PlanImage  $image
     */
    public function edit(PlanImageFirst $image)
    {
        return response()->json($image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanImageFirst $image)
    {
        $input = $request->all();

        $rules = array(
            'title' => 'string|max:100'
        );

        $validation = Validator::make($input, $rules);
        if ($validation->fails())
        {
            return response()->json(['error'=>$validation->errors()->first()], 400);
        }

        $image->title = $input['title'];
        $image->alt_text = $input['alt_text'];
        $image->description = $input['description'];

        if($image->update()){
            return response()->json('success', 200);
        }else{
            return response()->json(['error'=>'Data not updated'], 400);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanImageFirst $image)
    {
        Storage::delete('public/plans/'.$image->plan_id.'/thumb/'.$image->file_name);
        Storage::delete('public/plans/'.$image->plan_id.'/original/'.$image->file_name);
        Storage::delete('public/plans/'.$image->plan_id.'/'.$image->file_name);
        if($image->delete()){
            return response()->json('success', 200);
        }else{
            return response()->json(['error'=>'Image not deleted'], 400);
        }
    }

    public function sort(Request $request)
    {
        $input = $request->all();

        $rules = array(
            'sortable_id.*' => 'integer'
        );

        $validation = Validator::make($input, $rules);
        if ($validation->fails())
        {
            return Response::make($validation->errors()->first('sortable_id.*'), 400);
        }

        foreach ($request->input('sortable_id') as $key=>$image){
            PlanImageFirst::where('id', $image)->update(['sort_number'=>$key]);
        }

        return response()->json(['success'], 200);
    }
}

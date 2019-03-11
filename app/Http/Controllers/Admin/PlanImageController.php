<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Thd\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Thd\Plan;
use Thd\PlanImage;


class PlanImageController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Plan $plan)
    {
        $planImages = $plan->images()->orderBy('sort_number', 'asc')->get();
        $planImagesFirst = $plan->images_first()->orderBy('sort_number', 'asc')->get();
        $planImagesSecond = $plan->images_second()->orderBy('sort_number', 'asc')->get();
        $planImagesBasement = $plan->images_basement()->orderBy('sort_number', 'asc')->get();
        $planImagesBonus = $plan->images_bonus()->orderBy('sort_number', 'asc')->get();
        return view('admin.plan-image.create', [
            'plan' => $plan,
            'planImages' => $planImages ? $planImages : [],
            'planImagesFirst' => $planImagesFirst ? $planImagesFirst : [],
            'planImagesSecond' => $planImagesSecond ? $planImagesSecond : [],
            'planImagesBasement' => $planImagesBasement ? $planImagesBasement : [],
            'planImagesBonus' => $planImagesBonus ? $planImagesBonus : []
        ]);
    }

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
            'file' => 'image|max:3000|dimensions:min_width=1050',
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
        $img->resize(null, 465, function ($constraint) {
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
            $imagePlan = new PlanImage([
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
    public function edit(PlanImage $image)
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
    public function update(Request $request, PlanImage $image)
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

        if($input['first_image'] == 1)
            PlanImage::where('plan_id', '=', $image->plan_id)->update(['first_image'=>0]);

        if($input['for_search'] == 1)
            PlanImage::where('plan_id', '=', $image->plan_id)->update(['for_search'=>0]);

        $image->title = $input['title'];
        $image->alt_text = $input['alt_text'];
        $image->description = $input['description'];
        $image->first_image = $input['first_image'] == 1 ? 1 : 0;
        $image->for_search = $input['for_search'] == 1 ? 1 : 0;
        $image->camera_icon = $input['camera_icon'] == 1 ? 1 : 0;

        if($image->update()){
            return response()->json('success', 200);
        }else{
            return response()->json(['error'=>'Data not updated'], 400);
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
            PlanImage::where('id', $image)->update(['sort_number'=>$key]);
        }

        return response()->json(['success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanImage $image)
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
}

<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Thd\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;


class PlanImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::all();
        $rules = array(
            'file' => 'image|max:3000|dimensions:min_width=200,min_height=200',
        );

        $validation = Validator::make($input, $rules);
        if ($validation->fails())
        {
            return Response::make($validation->errors()->first('file'), 400);
        }

        $image = Input::file('file');
        $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
        $path = storage_path('tmp/' . $filename);

        $upload_success = Image::make($image->getRealPath())->save($path, 100);

        if( $upload_success ) {
            return response()->json(['success', 'file_name'=>$filename, 'id'=>str_random(10)], 200);
        } else {
            return response()->json('error', 400);
        }
    }
}

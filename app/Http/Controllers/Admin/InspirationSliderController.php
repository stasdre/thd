<?php

namespace Thd\Http\Controllers\Admin;

use Thd\InspirationSlider;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Validator;
use Illuminate\Support\Facades\Storage;

class InspirationSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.inspiration-slider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = InspirationSlider::select('order')->orderBy('order', 'desc')->first();
        return view('admin.inspiration-slider.create', ['order' => isset($order->order) ? $order->order + 1 : 1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:190',
            'desc' => 'required',
            'slider_img' => 'required|image|dimensions:min_width=500,min_height=400',
        ]);

        if ($validator->fails()) {
            return redirect(route('inspiration-slider.create'))
                ->withErrors($validator)
                ->withInput();
        }        

        $dataRequest = $request->except(['_token']);

        if ($request->file('logo_img')) {
            $logo_img = uploadFile($request->file('logo_img'), [
                'dir' => 'inspiration-slider',
                'width' => 210,
                'height' => null,
                'quality' => 90,
                'thumb_width' => 210,
                'thumb_height' => null
            ]);
            $dataRequest['logo_img'] = $logo_img;
        }

        if ($request->file('slider_img')) {
            $slider_img = uploadFile($request->file('slider_img'), [
                'dir' => 'inspiration-slider',
                'width' => 500,
                'height' => null,
                'quality' => 90,
                'thumb_width' => 210,
                'thumb_height' => null
            ]);
            $dataRequest['slider_img'] = $slider_img;
        }

        $inspirationSlider = new InspirationSlider($dataRequest);
        $inspirationSlider->save();

        return redirect()->route('inspiration-slider.index')
            ->with('message', [
                'type' => 'success',
                'title' => 'Success!',
                'message' => $inspirationSlider->name . ' was added',
                'autoHide' => 1
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Thd\InspirationSlider  $inspirationSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(InspirationSlider $inspirationSlider)
    {
        return view('admin.inspiration-slider.edit', [
            'inspirationSlider' => $inspirationSlider,
            'order' => $inspirationSlider->order
        ]);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Thd\InspirationSlider  $inspirationSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InspirationSlider $inspirationSlider)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:190',
            'desc' => 'required',
            'slider_img' => 'nullable|image|dimensions:min_width=500,min_height=400',
        ]);

        if ($validator->fails()) {
            return redirect(route('inspiration-slider.edit', $inspirationSlider->id))
                ->withErrors($validator)
                ->withInput();
        }  
        
        $dataRequest = $request->except(['_token', '_method']);

        if ($request->file('logo_img')) {
            $logo_img = uploadFile($request->file('logo_img'), [
                'dir' => 'inspiration-slider',
                'width' => 210,
                'height' => null,
                'quality' => 90,
                'thumb_width' => 210,
                'thumb_height' => null
            ]);
            $dataRequest['logo_img'] = $logo_img;

            Storage::delete('public/inspiration-slider/' . $inspirationSlider->logo_img);
            Storage::delete('public/inspiration-slider/thumb/' . $inspirationSlider->logo_img);
            Storage::delete('public/inspiration-slider/original/' . $inspirationSlider->logo_img);
        }

        if ($request->file('slider_img')) {
            $slider_img = uploadFile($request->file('slider_img'), [
                'dir' => 'inspiration-slider',
                'width' => 500,
                'height' => null,
                'quality' => 90,
                'thumb_width' => 210,
                'thumb_height' => null
            ]);
            $dataRequest['slider_img'] = $slider_img;

            Storage::delete('public/inspiration-slider/' . $inspirationSlider->slider_img);
            Storage::delete('public/inspiration-slider/thumb/' . $inspirationSlider->slider_img);
            Storage::delete('public/inspiration-slider/original/' . $inspirationSlider->slider_img);
        }

        $inspirationSlider->update($dataRequest);

        return redirect()->route('inspiration-slider.index')
            ->with('message', [
                'type' => 'success',
                'title' => 'Success!',
                'message' => $inspirationSlider->name . ' was updated',
                'autoHide' => 1
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Thd\InspirationSlider  $inspirationSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(InspirationSlider $inspirationSlider)
    {
        //
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $inspirationSliders = InspirationSlider::select(['name', 'order', 'created_at', 'updated_at', 'id']);
        return Datatables::of($inspirationSliders)
            ->addColumn('actions', function ($inspirationSlider) {
                return '<a class="btn btn-info btn-sm" href="' . route('inspiration-slider.edit', $inspirationSlider->id) . '" role="button">Edit</a> <form style="display: inline-block" action="' . route('inspiration-slider.destroy', $inspirationSlider->id) . '" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

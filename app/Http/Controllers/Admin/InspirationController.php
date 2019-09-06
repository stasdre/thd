<?php

namespace Thd\Http\Controllers\Admin;

use Thd\Inspiration;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Thd\Http\Requests\InspirationRequest;
use Yajra\Datatables\Datatables;

class InspirationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.inspiration.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = Inspiration::select('order')->orderBy('order', 'desc')->first();
        return view('admin.inspiration.create', ['order' => $order + 1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InspirationRequest $request)
    {
        $dataRequest = $request->except(['_token']);

        if ($request->file('img_above_logo')) {
            $img_above_logo = uploadFile($request->file('img_above_logo'), [
                'dir' => 'inspiration',
                'width' => null,
                'height' => 230,
                'quality' => 90,
                'thumb_width' => null,
                'thumb_height' => 230
            ]);
            $dataRequest['img_above_logo'] = $img_above_logo;
        }

        if ($request->file('logo_img')) {
            $logo_img = uploadFile($request->file('logo_img'), [
                'dir' => 'inspiration',
                'width' => 210,
                'height' => null,
                'quality' => 90,
                'thumb_width' => 210,
                'thumb_height' => null
            ]);
            $dataRequest['logo_img'] = $logo_img;
        }

        if ($request->file('main_img')) {
            $main_img = uploadFile($request->file('main_img'), [
                'dir' => 'inspiration',
                'width' => null,
                'height' => 380,
                'quality' => 90,
                'thumb_width' => null,
                'thumb_height' => 230
            ]);
            $dataRequest['main_img'] = $main_img;
        }

        if ($request->file('first_img')) {
            $first_img = uploadFile($request->file('first_img'), [
                'dir' => 'inspiration',
                'width' => null,
                'height' => 235,
                'quality' => 90,
                'thumb_width' => null,
                'thumb_height' => 230
            ]);
            $dataRequest['first_img'] = $first_img;
        }

        if ($request->file('second_img')) {
            $second_img = uploadFile($request->file('second_img'), [
                'dir' => 'inspiration',
                'width' => null,
                'height' => 235,
                'quality' => 90,
                'thumb_width' => null,
                'thumb_height' => 230
            ]);
            $dataRequest['second_img'] = $second_img;
        }

        if ($request->file('third_img')) {
            $third_img = uploadFile($request->file('third_img'), [
                'dir' => 'inspiration',
                'width' => null,
                'height' => 235,
                'quality' => 90,
                'thumb_width' => null,
                'thumb_height' => 230
            ]);
            $dataRequest['third_img'] = $third_img;
        }

        $inspiration = new Inspiration($dataRequest);
        $inspiration->save();

        return redirect()->route('inspiration.index')
            ->with('message', [
                'type' => 'success',
                'title' => 'Success!',
                'message' => $inspiration->name . ' was added',
                'autoHide' => 1
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Thd\Inspiration  $inspiration
     * @return \Illuminate\Http\Response
     */
    public function edit(Inspiration $inspiration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Thd\Inspiration  $inspiration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inspiration $inspiration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Thd\Inspiration  $inspiration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inspiration $inspiration)
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
        $inspirations = Inspiration::select(['logo_img', 'name', 'link', 'order', 'created_at', 'updated_at']);
        return Datatables::of($inspirations)
            ->addColumn('actions', function ($inspiration) {
                return '<a class="btn btn-info btn-sm" href="' . route('inspiration.edit', $inspiration->id) . '" role="button">Edit</a> <form style="display: inline-block" action="' . route('inspiration.destroy', $inspiration->id) . '" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->editColumn('logo_img', function($inspiration){
                return '<div class="table__img"><img src="/storage/inspiration/thumb/'.$inspiration->logo_img.'" /></div>';
            })
            ->rawColumns(['logo_img', 'actions'])
            ->make(true);
    }
}

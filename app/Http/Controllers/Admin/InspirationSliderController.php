<?php

namespace Thd\Http\Controllers\Admin;

use Thd\InspirationSlider;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

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
        return view('admin.inspiration-slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Thd\InspirationSlider  $inspirationSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(InspirationSlider $inspirationSlider)
    {
        //
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
        //
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

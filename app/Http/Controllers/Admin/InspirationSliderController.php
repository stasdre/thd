<?php

namespace Thd\Http\Controllers\Admin;

use Thd\InspirationSlider;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;

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
}

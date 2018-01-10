<?php

namespace Thd\Http\Controllers\Admin;

use Thd\Style;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.style.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.style.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'short_name' => 'required|max:50',
            'description' => 'required',
            'in_filter' => 'boolean'
        ]);

        $style = new Style();
        $style->name = $request->input('name');
        $style->short_name = $request->input('short_name');
        $style->description = $request->input('description');
        $style->in_filter = $request->input('in_filter', 0);
        $style->save();

        return redirect()->route('styles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Thd\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function edit(Style $style)
    {
        return view('admin.style.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Thd\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Style $style)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Thd\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function destroy(Style $style)
    {
        //
    }
}

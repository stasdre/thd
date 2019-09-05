<?php

namespace Thd\Http\Controllers\Admin;

use Thd\Inspiration;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
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
        return view('admin.inspiration.create');
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
            ->rawColumns(['actions'])
            ->make(true);
    }
}

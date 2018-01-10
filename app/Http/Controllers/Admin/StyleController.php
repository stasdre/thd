<?php

namespace Thd\Http\Controllers\Admin;

use Thd\Http\Requests\StylesRequest;
use Thd\Style;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;

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
    public function store(StylesRequest $request)
    {

        $style = new Style();
        $style->name = $request->input('name');
        $style->short_name = $request->input('short_name');
        $style->description = $request->input('description');
        $style->in_filter = $request->input('in_filter', 0);
        $style->save();

        return redirect()->route('styles.index')
                ->with('message', [
                    'type'=>'success',
                    'title'=>'Success!',
                    'message'=>$style->name.' was added',
                    'autoHide'=>1]);
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

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $styles = Style::select(['id', 'name', 'short_name', 'in_filter', 'created_at', 'updated_at']);
        return Datatables::of($styles)
            ->addColumn('actions', function($style){
                return '<a class="btn btn-info btn-sm" href="'.route('styles.edit', ['style'=>$style->id]).'" role="button">Edit</a> <form style="display: inline-block" action="'.route('styles.destroy', ['style'=>$style->id]).'" method="POST"><input type="hidden" name="_method" value="PUT"><input type="hidden" name="_token" value="'.csrf_token().'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->editColumn('in_filter', function($style){
                if($style->in_filter == 1)
                    return '<i style="color: green;" class="fa fa-check" aria-hidden="true"></i>';
                return '';
            })
            ->rawColumns(['in_filter', 'actions'])
            ->make(true);
    }
}

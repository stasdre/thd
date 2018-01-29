<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\FoundationOption;
use Thd\Http\Controllers\Controller;
use Thd\Http\Requests\FoundationOptionsRequest;
use Yajra\Datatables\Datatables;

class FoundationOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.foundation-option.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.foundation-option.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Thd\Http\Requests\FoundationOptionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoundationOptionsRequest $request)
    {
        $inputs = $request->except('_token');

        $option = new FoundationOption();
        $option->fill($inputs);
        $option->save();

        return redirect()->route('foundation-options.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$option->name.' was added',
                'autoHide'=>1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FoundationOption $foundation_option)
    {
        return view('admin.foundation-option.edit', ['foundation_option'=>$foundation_option]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Thd\Http\Requests\PackagesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FoundationOptionsRequest $request, FoundationOption $foundation_option)
    {
        $inputs = $request->except(['_method', '_token']);

        $foundation_option->fill($inputs);
        $foundation_option->update();

        return redirect()->route('foundation-options.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$foundation_option->name.' was updated',
                'autoHide'=>1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoundationOption $foundation_option)
    {
        $foundation_option->delete();

        return redirect()->route('foundation-options.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$foundation_option->name.' was deleted',
                'autoHide'=>1]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $options = FoundationOption::select(['id', 'name', 'created_at', 'updated_at']);
        return Datatables::of($options)
            ->addColumn('actions', function($option){
                return '<a class="btn btn-info btn-sm" href="'.route('foundation-options.edit', ['option'=>$option->id]).'" role="button">Edit</a> <form style="display: inline-block" action="'.route('foundation-options.destroy', ['package'=>$option->id]).'" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="'.csrf_token().'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

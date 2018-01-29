<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Addon;
use Thd\Http\Controllers\Controller;
use Thd\Http\Requests\AddonsRequest;
use Yajra\Datatables\Datatables;

class AddonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.addon.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Thd\Http\Requests\AddonsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddonsRequest $request)
    {
        $inputs = $request->except('_token');

        $addon = new Addon();
        $addon->fill($inputs);
        $addon->save();

        return redirect()->route('addons.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$addon->name.' was added',
                'autoHide'=>1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Addon $addon)
    {
        return view('admin.addon.edit', ['addon'=>$addon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Thd\Http\Requests\PackagesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddonsRequest $request, Addon $addon)
    {
        $inputs = $request->except(['_method', '_token']);

        $addon->fill($inputs);
        $addon->update();

        return redirect()->route('addons.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$addon->name.' was updated',
                'autoHide'=>1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Addon $addon)
    {
        $addon->delete();

        return redirect()->route('packages.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$addon->name.' was deleted',
                'autoHide'=>1]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $addons = Addon::select(['id', 'name', 'created_at', 'updated_at']);
        return Datatables::of($addons)
            ->addColumn('actions', function($addon){
                return '<a class="btn btn-info btn-sm" href="'.route('addons.edit', ['package'=>$addon->id]).'" role="button">Edit</a> <form style="display: inline-block" action="'.route('addons.destroy', ['addon'=>$addon->id]).'" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="'.csrf_token().'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

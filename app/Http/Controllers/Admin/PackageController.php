<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Thd\Http\Requests\PackagesRequest;
use Thd\Package;
use Yajra\Datatables\Datatables;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.package.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Thd\Http\Requests\PackagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackagesRequest $request)
    {
        $inputs = $request->except('_token');

        $package = new Package();
        $package->fill($inputs);
        $package->save();

        return redirect()->route('packages.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$package->name.' was added',
                'autoHide'=>1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('admin.package.edit', ['package'=>$package]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Thd\Http\Requests\PackagesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PackagesRequest $request, Package $package)
    {
        $inputs = $request->except(['_method', '_token']);

        $package->fill($inputs);
        $package->update();

        return redirect()->route('packages.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$package->name.' was updated',
                'autoHide'=>1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->route('packages.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$package->name.' was deleted',
                'autoHide'=>1]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $packages = Package::select(['id', 'name', 'created_at', 'updated_at']);
        return Datatables::of($packages)
            ->addColumn('actions', function($package){
                return '<a class="btn btn-info btn-sm" href="'.route('packages.edit', ['package'=>$package->id]).'" role="button">Edit</a> <form style="display: inline-block" action="'.route('packages.destroy', ['package'=>$package->id]).'" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="'.csrf_token().'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Collection;
use Thd\Http\Controllers\Controller;
use Thd\Http\Requests\CollectionsRequest;
use Yajra\Datatables\Datatables;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.collection.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.collection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectionsRequest $request)
    {
        $inputs = $request->except('_token');

        $collection = new Collection();
        $collection->fill($inputs);
        $collection->save();

        return redirect()->route('collections.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$collection->name.' was added',
                'autoHide'=>1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Thd\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        return view('admin.collection.edit', ['collection'=>$collection]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Thd\Http\Request\CollectionsRequest  $request
     * @param  \Thd\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(CollectionsRequest $request, Collection $collection)
    {
        $inputs = $request->except(['_method', '_token']);

        if(!$request->has('in_filter'))
            $inputs['in_filter'] = 0;

        $collection->fill($inputs);
        $collection->update();

        return redirect()->route('collections.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$collection->name.' was updated',
                'autoHide'=>1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
        $collections = Collection::select(['id', 'name', 'short_name', 'in_filter', 'created_at', 'updated_at']);
        return Datatables::of($collections)
            ->addColumn('actions', function($collection){
                return '<a class="btn btn-info btn-sm" href="'.route('collections.edit', ['collection'=>$collection->id]).'" role="button">Edit</a> <form style="display: inline-block" action="'.route('collections.destroy', ['collection'=>$collection->id]).'" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="'.csrf_token().'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->editColumn('in_filter', function($collection){
                if($collection->in_filter == 1)
                    return '<i style="color: green;" class="fa fa-check" aria-hidden="true"></i>';
                return '';
            })
            ->rawColumns(['in_filter', 'actions'])
            ->make(true);
    }
}

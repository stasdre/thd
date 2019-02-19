<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Thd\Promo;
use Yajra\Datatables\Datatables;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.promo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promo.create');
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
            'name' => 'required',
            'value' => 'required|alpha_num',
            'level' => 'required|in:cost,percent',
            'code' => 'required'
        ]);

        $inputs = $request->except('_token');

        $promo = new Promo();
        $promo->fill($inputs);
        $promo->save();

        return redirect()->route('promo.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$promo->name.' was added',
                'autoHide'=>1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        return view('admin.promo.edit', ['promo'=>$promo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'value' => 'required|alpha_num',
            'level' => 'required|in:cost,percent',
            'code' => 'required'
        ]);

        $inputs = $request->except(['_method', '_token']);

        $promo->fill($inputs);
        $promo->update();

        return redirect()->route('promo.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$promo->name.' was updated',
                'autoHide'=>1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        $promo->delete();

        return redirect()->route('promo.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$promo->name.' was deleted',
                'autoHide'=>1]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $promos = Promo::select(['id', 'name', 'value', 'level', 'code', 'created_at', 'updated_at']);
        return Datatables::of($promos)
            ->addColumn('actions', function($promo){
                return '<a class="btn btn-info btn-sm" href="'.route('promo.edit', $promo->id).'" role="button">Edit</a> <form style="display: inline-block" action="'.route('promo.destroy', $promo->id).'" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="'.csrf_token().'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->editColumn('value', function(Promo $promo){
                if($promo->level == 'cost')
                    return $promo->value.'$';
                else
                    return $promo->value.'%';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

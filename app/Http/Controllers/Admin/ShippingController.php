<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Thd\Shipping;
use Yajra\Datatables\Datatables;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.shipping.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shipping.create');
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
            'cost' => 'required|alpha_num',
        ]);

        $inputs = $request->except('_token');

        $shipping = new Shipping();
        $shipping->fill($inputs);
        $shipping->save();

        return redirect()->route('shipping.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$shipping->name.' was added',
                'autoHide'=>1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        return view('admin.shipping.edit', ['shipping'=>$shipping]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping $shipping)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'cost' => 'required|alpha_num',
        ]);

        $inputs = $request->except(['_method', '_token']);

        $shipping->fill($inputs);
        $shipping->update();

        return redirect()->route('shipping.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$shipping->name.' was updated',
                'autoHide'=>1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        $shipping->delete();

        return redirect()->route('shipping.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$shipping->name.' was deleted',
                'autoHide'=>1]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $shippings = Shipping::select(['id', 'name', 'cost',  'created_at', 'updated_at']);
        return Datatables::of($shippings)
            ->addColumn('actions', function($shipping){
                return '<a class="btn btn-info btn-sm" href="'.route('shipping.edit', $shipping->id).'" role="button">Edit</a> <form style="display: inline-block" action="'.route('shipping.destroy', $shipping->id).'" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="'.csrf_token().'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->editColumn('cost', '{{$cost}}$')
            ->rawColumns(['actions'])
            ->make(true);
    }
}

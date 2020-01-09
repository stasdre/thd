<?php

namespace Thd\Http\Controllers\Admin;

use Thd\InspirationProduct;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Validator;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;

class InspirationProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.inspiration-products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = InspirationProduct::select('order')->orderBy('order', 'desc')->first();
        return view('admin.inspiration-products.create', ['order' => isset($order->order) ? $order->order + 1 : 1]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'link_name'=>'required_with:link',
            'link'=>'required_with:link_name',
            'img' => 'required|image|dimensions:min_width=230,min_height=225',
        ]);

        if ($validator->fails()) {
            return redirect(route('inspiration-products.create'))
                ->withErrors($validator)
                ->withInput();
        }     

        $dataRequest = $request->except(['_token']);      

        if ($request->file('img')) {
            $img = uploadFile($request->file('img'), [
                'dir' => 'inspiration-products',
                'width' => 230,
                'height' => null,
                'quality' => 90,
                'thumb_width' => 230,
                'thumb_height' => null
            ]);
            $dataRequest['img'] = $img;
        }        
        
        $inspirationProduct = new InspirationProduct($dataRequest);
        $inspirationProduct->save();

        return redirect()->route('inspiration-products.index')
            ->with('message', [
                'type' => 'success',
                'title' => 'Success!',
                'message' => $inspirationProduct->name . ' was added',
                'autoHide' => 1
            ]);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Thd\InspirationProduct  $inspirationProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(InspirationProduct $inspirationProduct)
    {
        return view('admin.inspiration-products.edit', [
            'inspirationProduct' => $inspirationProduct,
            'order' => $inspirationProduct->order
        ]);                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Thd\InspirationProduct  $inspirationProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InspirationProduct $inspirationProduct)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'link_name'=>'required_with:link',
            'link'=>'required_with:link_name',
            'img' => 'nullable|image|dimensions:min_width=230,min_height=225',
        ]);

        if ($validator->fails()) {
            return redirect(route('inspiration-products.edit', $inspirationProduct->id))
                ->withErrors($validator)
                ->withInput();
        }         
        
        $dataRequest = $request->except(['_token', '_method']);

        if ($request->file('img')) {
            $img = uploadFile($request->file('img'), [
                'dir' => 'inspiration-products',
                'width' => 230,
                'height' => null,
                'quality' => 90,
                'thumb_width' => 230,
                'thumb_height' => null
            ]);
            $dataRequest['img'] = $img;

            Storage::delete('public/inspiration-products/' . $inspirationProduct->img);
            Storage::delete('public/inspiration-products/thumb/' . $inspirationProduct->img);
            Storage::delete('public/inspiration-products/original/' . $inspirationProduct->img);
        }  
        
        $inspirationProduct->update($dataRequest);

        return redirect()->route('inspiration-products.index')
            ->with('message', [
                'type' => 'success',
                'title' => 'Success!',
                'message' => $inspirationProduct->name . ' was updated',
                'autoHide' => 1
            ]);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Thd\InspirationProduct  $inspirationProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(InspirationProduct $inspirationProduct)
    {
        if ($inspirationProduct->img) {
            Storage::delete('public/inspiration-products/' . $inspirationProduct->img);
            Storage::delete('public/inspiration-products/thumb/' . $inspirationProduct->img);
            Storage::delete('public/inspiration-products/original/' . $inspirationProduct->img);
        }    
        
        $inspirationProduct->delete();

        return redirect()->route('inspiration-products.index')
            ->with('message', [
                'type' => 'success',
                'title' => 'Success!',
                'message' => $inspirationProduct->name . ' was deleted',
                'autoHide' => 1
            ]);                
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $inspirationProducts = InspirationProduct::select(['name', 'order', 'created_at', 'updated_at', 'id']);
        return Datatables::of($inspirationProducts)
            ->addColumn('actions', function ($inspirationProduct) {
                return '<a class="btn btn-info btn-sm" href="' . route('inspiration-products.edit', $inspirationProduct->id) . '" role="button">Edit</a> <form style="display: inline-block" action="' . route('inspiration-products.destroy', $inspirationProduct->id) . '" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

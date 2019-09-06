<?php

namespace Thd\Http\Controllers\Admin;

use Thd\Inspiration;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Thd\Http\Requests\InspirationRequest;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;

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
        $order = Inspiration::select('order')->orderBy('order', 'desc')->first();
        return view('admin.inspiration.create', ['order' => isset($order->order) ? $order->order + 1 : 1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InspirationRequest $request)
    {
        $dataRequest = $request->except(['_token']);

        if ($request->file('img_above_logo')) {
            $img_above_logo = uploadFile($request->file('img_above_logo'), [
                'dir' => 'inspiration',
                'width' => null,
                'height' => 230,
                'quality' => 90,
                'thumb_width' => null,
                'thumb_height' => 230
            ]);
            $dataRequest['img_above_logo'] = $img_above_logo;
        }

        if ($request->file('logo_img')) {
            $logo_img = uploadFile($request->file('logo_img'), [
                'dir' => 'inspiration',
                'width' => 210,
                'height' => null,
                'quality' => 90,
                'thumb_width' => 210,
                'thumb_height' => null
            ]);
            $dataRequest['logo_img'] = $logo_img;
        }

        if ($request->file('main_img')) {
            $main_img = uploadFile($request->file('main_img'), [
                'dir' => 'inspiration',
                'width' => null,
                'height' => 380,
                'quality' => 90,
                'thumb_width' => null,
                'thumb_height' => 230
            ]);
            $dataRequest['main_img'] = $main_img;
        }

        if ($request->file('first_img')) {
            $first_img = uploadFile($request->file('first_img'), [
                'dir' => 'inspiration',
                'width' => null,
                'height' => 235,
                'quality' => 90,
                'thumb_width' => null,
                'thumb_height' => 230
            ]);
            $dataRequest['first_img'] = $first_img;
        }

        if ($request->file('second_img')) {
            $second_img = uploadFile($request->file('second_img'), [
                'dir' => 'inspiration',
                'width' => null,
                'height' => 235,
                'quality' => 90,
                'thumb_width' => null,
                'thumb_height' => 230
            ]);
            $dataRequest['second_img'] = $second_img;
        }

        if ($request->file('third_img')) {
            $third_img = uploadFile($request->file('third_img'), [
                'dir' => 'inspiration',
                'width' => null,
                'height' => 235,
                'quality' => 90,
                'thumb_width' => null,
                'thumb_height' => 230
            ]);
            $dataRequest['third_img'] = $third_img;
        }

        $inspiration = new Inspiration($dataRequest);
        $inspiration->save();

        return redirect()->route('inspiration.index')
            ->with('message', [
                'type' => 'success',
                'title' => 'Success!',
                'message' => $inspiration->name . ' was added',
                'autoHide' => 1
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Thd\Inspiration  $inspiration
     * @return \Illuminate\Http\Response
     */
    public function edit(Inspiration $inspiration)
    {
        return view('admin.inspiration.edit', [
            'inspiration'=>$inspiration
        ]);
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
        $dataRequest = $request->except(['_token', '_method']);
        
        if ($request->file('img_above_logo')) {
            $img_above_logo = uploadFile($request->file('img_above_logo'), [
                'dir' => 'inspiration',
                'width' => null,
                'height' => 230,
                'quality' => 90,
                'thumb_width' => null,
                'thumb_height' => 230
            ]);
            $dataRequest['img_above_logo'] = $img_above_logo;

            Storage::delete('public/inspiration/'.$inspiration->img_above_logo);
            Storage::delete('public/inspiration/thumb/'.$inspiration->img_above_logo);
            Storage::delete('public/inspiration/original/'.$inspiration->img_above_logo);
        }

        if ($request->file('logo_img')) {
            $logo_img = uploadFile($request->file('logo_img'), [
                'dir' => 'inspiration',
                'width' => 210,
                'height' => null,
                'quality' => 90,
                'thumb_width' => 210,
                'thumb_height' => null
            ]);
            $dataRequest['logo_img'] = $logo_img;

            Storage::delete('public/inspiration/'.$inspiration->logo_img);
            Storage::delete('public/inspiration/thumb/'.$inspiration->logo_img);
            Storage::delete('public/inspiration/original/'.$inspiration->logo_img);
        }

        if ($request->file('main_img')) {
            $main_img = uploadFile($request->file('main_img'), [
                'dir' => 'inspiration',
                'width' => null,
                'height' => 380,
                'quality' => 90,
                'thumb_width' => null,
                'thumb_height' => 230
            ]);
            $dataRequest['main_img'] = $main_img;

            Storage::delete('public/inspiration/'.$inspiration->main_img);
            Storage::delete('public/inspiration/thumb/'.$inspiration->main_img);
            Storage::delete('public/inspiration/original/'.$inspiration->main_img);
        }

        if ($request->file('first_img')) {
            $first_img = uploadFile($request->file('first_img'), [
                'dir' => 'inspiration',
                'width' => null,
                'height' => 235,
                'quality' => 90,
                'thumb_width' => null,
                'thumb_height' => 230
            ]);
            $dataRequest['first_img'] = $first_img;

            Storage::delete('public/inspiration/'.$inspiration->first_img);
            Storage::delete('public/inspiration/thumb/'.$inspiration->first_img);
            Storage::delete('public/inspiration/original/'.$inspiration->first_img);
        }

        if ($request->file('second_img')) {
            $second_img = uploadFile($request->file('second_img'), [
                'dir' => 'inspiration',
                'width' => null,
                'height' => 235,
                'quality' => 90,
                'thumb_width' => null,
                'thumb_height' => 230
            ]);
            $dataRequest['second_img'] = $second_img;

            Storage::delete('public/inspiration/'.$inspiration->second_img);
            Storage::delete('public/inspiration/thumb/'.$inspiration->second_img);
            Storage::delete('public/inspiration/original/'.$inspiration->second_img);
        }

        if ($request->file('third_img')) {
            $third_img = uploadFile($request->file('third_img'), [
                'dir' => 'inspiration',
                'width' => null,
                'height' => 235,
                'quality' => 90,
                'thumb_width' => null,
                'thumb_height' => 230
            ]);
            $dataRequest['third_img'] = $third_img;

            Storage::delete('public/inspiration/'.$inspiration->third_img);
            Storage::delete('public/inspiration/thumb/'.$inspiration->third_img);
            Storage::delete('public/inspiration/original/'.$inspiration->third_img);
        }

        if (!$request->input('in_menu')) {
            $dataRequest['in_menu'] = 0;
        }

        $inspiration->update($dataRequest);

        return redirect()->route('inspiration.index')
            ->with('message', [
                'type' => 'success',
                'title' => 'Success!',
                'message' => $inspiration->name . ' was updated',
                'autoHide' => 1
            ]);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Thd\Inspiration  $inspiration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inspiration $inspiration)
    {
        if($inspiration->img_above_logo){
            Storage::delete('public/inspiration/'.$inspiration->img_above_logo);
            Storage::delete('public/inspiration/thumb/'.$inspiration->img_above_logo);
            Storage::delete('public/inspiration/original/'.$inspiration->img_above_logo);
        }

        if($inspiration->logo_img){
            Storage::delete('public/inspiration/'.$inspiration->logo_img);
            Storage::delete('public/inspiration/thumb/'.$inspiration->logo_img);
            Storage::delete('public/inspiration/original/'.$inspiration->logo_img);
        }

        if($inspiration->main_img){
            Storage::delete('public/inspiration/'.$inspiration->main_img);
            Storage::delete('public/inspiration/thumb/'.$inspiration->main_img);
            Storage::delete('public/inspiration/original/'.$inspiration->main_img);
        }

        if($inspiration->first_img){
            Storage::delete('public/inspiration/'.$inspiration->first_img);
            Storage::delete('public/inspiration/thumb/'.$inspiration->first_img);
            Storage::delete('public/inspiration/original/'.$inspiration->first_img);
        }

        if($inspiration->second_img){
            Storage::delete('public/inspiration/'.$inspiration->second_img);
            Storage::delete('public/inspiration/thumb/'.$inspiration->second_img);
            Storage::delete('public/inspiration/original/'.$inspiration->second_img);
        }

        if($inspiration->third_img){
            Storage::delete('public/inspiration/'.$inspiration->third_img);
            Storage::delete('public/inspiration/thumb/'.$inspiration->third_img);
            Storage::delete('public/inspiration/original/'.$inspiration->third_img);
        }

        $inspiration->delete();

        return redirect()->route('inspiration.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$inspiration->name.' was deleted',
                'autoHide'=>1]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $inspirations = Inspiration::select(['name', 'link', 'order', 'in_menu', 'created_at', 'updated_at', 'id']);
        return Datatables::of($inspirations)
            ->addColumn('actions', function ($inspiration) {
                return '<a class="btn btn-info btn-sm" href="' . route('inspiration.edit', $inspiration->id) . '" role="button">Edit</a> <form style="display: inline-block" action="' . route('inspiration.destroy', $inspiration->id) . '" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->editColumn('link', function($inspiration){
                return '<a target="_blank" href="'.asset("inspiration/".$inspiration->link).'">'.asset("inspiration/".$inspiration->link).'</a>';
            })
            ->editColumn('in_menu', function($inspiration){
                if($inspiration->in_menu == 1)
                    return '<i style="color: green;" class="fa fa-check" aria-hidden="true"></i>';
                return '<i style="color: red;" class="fa fa-ban"></i>';
            })
            ->rawColumns(['link', 'in_menu', 'actions'])
            ->make(true);
    }
}

<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use Thd\MobileGallery;

class MobileGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.mobile-gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mobile-gallery.create');
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
            'name' => 'required|max:190',
            'url' => 'max:190',
            'caption' => 'max:190',
            'plan' => 'max:190',
            'file' => 'required|mimetypes:image/jpeg,image/png,image/bmp,image/gif,video/mp4,video/ogg'
        ]);

        if ($validator->fails()) {
            return redirect(route('mobile-gallery.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('file');
        $filename  = str_random(40) . '.' . $file->getClientOriginalExtension();

        Storage::putFileAs('public/gallery/', $file, $filename);

        $gallery = new MobileGallery([
            'name' => $request->input('name'),
            'url' => $request->input('url'),
            'description' => $request->input('description'),
            'file' => $filename,
            'caption' => $request->input('caption'),
            'plan' => $request->input('plan'),
            'quote' => $request->input('quote') == 1 ? 1 : 0
        ]);
        $gallery->save();

        return redirect()->route('mobile-gallery.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>'Slide was added',
                'autoHide'=>1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MobileGallery $mobileGallery)
    {
        return view('admin.mobile-gallery.edit', ['gallery'=>$mobileGallery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MobileGallery $mobileGallery)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:190',
            'url' => 'max:190',
            'caption' => 'max:190',
            'plan' => 'max:190',
            'file' => 'mimetypes:image/jpeg,image/png,image/bmp,image/gif,video/mp4,video/ogg'
        ]);

        if ($validator->fails()) {
            return redirect(route('mobile-gallery.edit', ['gallery'=>$mobileGallery->id]))
                ->withErrors($validator)
                ->withInput();
        }

        if($request->file('file')){
            $file = $request->file('file');
            $filename  = str_random(40) . '.' . $file->getClientOriginalExtension();

            Storage::putFileAs('public/gallery/', $file, $filename);
            Storage::delete('public/gallery/'.$mobileGallery->file);

            $mobileGallery->file = $filename;
        }

        $mobileGallery->name = $request->input('name');
        $mobileGallery->url = $request->input('url');
        $mobileGallery->description = $request->input('description');
        $mobileGallery->caption = $request->input('caption');
        $mobileGallery->plan = $request->input('plan');
        $mobileGallery->quote = $request->input('quote') == 1 ? 1: 0;

        $mobileGallery->update();

        return redirect()->route('mobile-gallery.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>'Slide was updated',
                'autoHide'=>1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MobileGallery $mobileGallery)
    {
        $mobileGallery->delete();

        Storage::delete('public/gallery/'.$mobileGallery->file);

        return redirect()->route('mobile-gallery.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>'Slide ' .$mobileGallery->name.' was deleted',
                'autoHide'=>1]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $gallery = MobileGallery::select(['id', 'name', 'url', 'created_at', 'updated_at']);
        return Datatables::of($gallery)
            ->addColumn('actions', function($gallery){
                return '<a class="btn btn-info btn-sm" href="'.route('mobile-gallery.edit', ['mobile-gallery'=>$gallery->id]).'" role="button">Edit</a> <form style="display: inline-block" action="'.route('mobile-gallery.destroy', ['mobile-gallery'=>$gallery->id]).'" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="'.csrf_token().'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }    
}

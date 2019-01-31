<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Thd\MobileNew;
use Validator;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;

class MobileNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.mobile-new.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mobile-new.create');
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
            'plan' => 'max:50',
            'file' => 'required|mimetypes:image/jpeg,image/png,image/bmp,image/gif'
        ]);

        if ($validator->fails()) {
            return redirect(route('mobile-new.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file('file');
        $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
        $path = storage_path('app/public/gallery/' . $filename);

        $img = Image::make($image->getRealPath());
        $img->resize(277, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path, 90);

        $gallery = new MobileNew([
            'name' => $request->input('name'),
            'url' => $request->input('url'),
            'file' => $filename,
            'plan' => $request->input('plan')
        ]);
        $gallery->save();

        return redirect()->route('mobile-new.index')
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
    public function edit(MobileNew $mobileNew)
    {
        return view('admin.mobile-new.edit', ['gallery'=>$mobileNew]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MobileNew $mobileNew)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:190',
            'url' => 'max:190',
            'plan' => 'max:50',
            'file' => 'mimetypes:image/jpeg,image/png,image/bmp,image/gif'
        ]);

        if ($validator->fails()) {
            return redirect(route('mobile-new.edit', ['mobileNew'=>$mobileNew->id]))
                ->withErrors($validator)
                ->withInput();
        }

        if($request->file('file')){
            $image = $request->file('file');
            $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
            $path = storage_path('app/public/gallery/' . $filename);

            $img = Image::make($image->getRealPath());
            $img->resize(277, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path, 90);

            Storage::delete('public/gallery/'.$mobileNew->file);

            $mobileNew->file = $filename;
        }

        $mobileNew->name = $request->input('name');
        $mobileNew->url = $request->input('url');
        $mobileNew->plan = $request->input('plan');

        $mobileNew->update();

        return redirect()->route('mobile-new.index')
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
    public function destroy(MobileNew $mobileNew)
    {
        $mobileNew->delete();

        Storage::delete('public/gallery/'.$mobileNew->file);

        return redirect()->route('mobile-new.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>'Slide ' .$mobileNew->name.' was deleted',
                'autoHide'=>1]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $gallery = MobileNew::select(['id', 'name', 'url', 'created_at', 'updated_at']);
        return Datatables::of($gallery)
            ->addColumn('actions', function($gallery){
                return '<a class="btn btn-info btn-sm" href="'.route('mobile-new.edit', ['mobile-new'=>$gallery->id]).'" role="button">Edit</a> <form style="display: inline-block" action="'.route('mobile-new.destroy', ['mobile-new'=>$gallery->id]).'" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="'.csrf_token().'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

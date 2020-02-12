<?php

namespace Thd\Http\Controllers\Admin;

use Thd\Gallery;
use Validator;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use Yajra\Datatables\Datatables;

class GalleryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.gallery.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.gallery.create');
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
      return redirect(route('gallery.create'))
        ->withErrors($validator)
        ->withInput();
    }

    $file = $request->file('file');
    $filename  = str_random(40) . '.' . $file->getClientOriginalExtension();

    Storage::putFileAs('public/gallery/', $file, $filename);

    $gallery = new Gallery([
      'name' => $request->input('name'),
      'url' => $request->input('url'),
      'description' => $request->input('description'),
      'file' => $filename,
      'caption' => $request->input('caption'),
      'plan' => $request->input('plan'),
      'quote' => $request->input('quote') == 1 ? 1 : 0,
      'order' => $request->input('order') ? $request->input('order') : 0
    ]);
    $gallery->save();

    return redirect()->route('gallery.index')
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => 'Slide was added',
        'autoHide' => 1
      ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Gallery $gallery)
  {
    return view('admin.gallery.edit', ['gallery' => $gallery]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Gallery $gallery)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:190',
      'url' => 'max:190',
      'caption' => 'max:190',
      'plan' => 'max:190',
      'file' => 'mimetypes:image/jpeg,image/png,image/bmp,image/gif,video/mp4,video/ogg'
    ]);

    if ($validator->fails()) {
      return redirect(route('gallery.edit', ['gallery' => $gallery->id]))
        ->withErrors($validator)
        ->withInput();
    }

    if ($request->file('file')) {
      $file = $request->file('file');
      $filename  = str_random(40) . '.' . $file->getClientOriginalExtension();

      Storage::putFileAs('public/gallery/', $file, $filename);
      Storage::delete('public/gallery/' . $gallery->file);

      $gallery->file = $filename;
    }

    $gallery->name = $request->input('name');
    $gallery->url = $request->input('url');
    $gallery->description = $request->input('description');
    $gallery->caption = $request->input('caption');
    $gallery->plan = $request->input('plan');
    $gallery->quote = $request->input('quote') == 1 ? 1 : 0;
    $gallery->order = $request->input('order') ? $request->input('order') : 0;

    $gallery->update();

    return redirect()->route('gallery.index')
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => 'Slide was updated',
        'autoHide' => 1
      ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Gallery $gallery)
  {
    $gallery->delete();

    Storage::delete('public/gallery/' . $gallery->file);

    return redirect()->route('gallery.index')
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => 'Slide ' . $gallery->name . ' was deleted',
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
    $gallery = Gallery::select(['id', 'name', 'order', 'url', 'created_at', 'updated_at']);
    return Datatables::of($gallery)
      ->addColumn('actions', function ($gallery) {
        return '<a class="btn btn-info btn-sm" href="' . route('gallery.edit', ['gallery' => $gallery->id]) . '" role="button">Edit</a> <form style="display: inline-block" action="' . route('gallery.destroy', ['gallery' => $gallery->id]) . '" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
      })
      ->rawColumns(['actions'])
      ->make(true);
  }
}

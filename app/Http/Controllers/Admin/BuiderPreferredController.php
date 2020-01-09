<?php

namespace Thd\Http\Controllers\Admin;

use Thd\BuilderPreferred;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Validator;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;

class BuiderPreferredController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.builder-preferred.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.builder-preferred.create');
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
      'link' => 'required',
      'img' => 'required|image|dimensions:min_width=230,min_height=190'
    ]);

    if ($validator->fails()) {
      return redirect(route('builders-preferred.create'))
        ->withErrors($validator)
        ->withInput();
    }

    $dataRequest = $request->except(['_token']);

    if ($request->file('img')) {
      $img = uploadFile($request->file('img'), [
        'dir' => 'builders',
        'width' => 230,
        'height' => 190,
        'quality' => 90,
        'thumb_width' => 230,
        'thumb_height' => 190
      ]);
      $dataRequest['img'] = $img;
    }

    $builder = new BuilderPreferred($dataRequest);
    $builder->save();

    return redirect()->route('builders-preferred.index')
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => $builder->name . ' was added',
        'autoHide' => 1
      ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \Thd\BuilderPreferred  $builderPreferred
   * @return \Illuminate\Http\Response
   */
  public function edit(BuilderPreferred $buildersPreferred)
  {
    return view('admin.builder-preferred.edit', [
      'builderPreferred' => $buildersPreferred
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Thd\BuilderPreferred  $builderPreferred
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, BuilderPreferred $buildersPreferred)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:100',
      'link' => 'required',
      'img' => 'nullable|image|dimensions:min_width=230,min_height=190'
    ]);

    if ($validator->fails()) {
      return redirect(route('builders-preferred.edit', $buildersPreferred->id))
        ->withErrors($validator)
        ->withInput();
    }

    $dataRequest = $request->except(['_token', '_method']);

    if ($request->file('img')) {
      $img = uploadFile($request->file('img'), [
        'dir' => 'builders',
        'width' => 230,
        'height' => 190,
        'quality' => 90,
        'thumb_width' => 230,
        'thumb_height' => 190
      ]);
      $dataRequest['img'] = $img;

      Storage::delete('public/builders/' . $buildersPreferred->img);
      Storage::delete('public/builders/thumb/' . $buildersPreferred->img);
      Storage::delete('public/builders/original/' . $buildersPreferred->img);
    }

    $buildersPreferred->update($dataRequest);

    return redirect()->route('builders-preferred.index')
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => $buildersPreferred->name . ' was updated',
        'autoHide' => 1
      ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \Thd\BuilderPreferred  $builderPreferred
   * @return \Illuminate\Http\Response
   */
  public function destroy(BuilderPreferred $buildersPreferred)
  {
    if ($buildersPreferred->img) {
      Storage::delete('public/builders/' . $buildersPreferred->img);
      Storage::delete('public/builders/thumb/' . $buildersPreferred->img);
      Storage::delete('public/builders/original/' . $buildersPreferred->img);
    }

    $buildersPreferred->delete();

    return redirect()->route('builders-preferred.index')
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => $buildersPreferred->name . ' was deleted',
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
    $builders = BuilderPreferred::select(['name', 'plan', 'created_at', 'updated_at', 'id']);
    return Datatables::of($builders)
      ->addColumn('actions', function ($builder) {
        return '<a class="btn btn-info btn-sm" href="' . route('builders-preferred.edit', $builder->id) . '" role="button">Edit</a> <form style="display: inline-block" action="' . route('builders-preferred.destroy', $builder->id) . '" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
      })
      ->rawColumns(['actions'])
      ->make(true);
  }
}

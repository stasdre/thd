<?php

namespace Thd\Http\Controllers\Admin;

use Thd\Builder;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Services\Countries;
use Thd\Http\Controllers\Controller;
use Validator;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;

class BuildersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.builders.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $countries = new Countries();
    $states = $countries->where('cca3', 'USA')->first()->hydrateStates()->states->pluck('name', 'name');

    return view('admin.builders.create', [
      'states' => $states
    ]);
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
      'img' => 'required|image|dimensions:min_width=325,min_height=190',
      'recently_img' => 'nullable|image|dimensions:min_width=490,min_height=395'
    ]);

    if ($validator->fails()) {
      return redirect(route('builders.create'))
        ->withErrors($validator)
        ->withInput();
    }

    $dataRequest = $request->except(['_token']);

    if ($request->file('img')) {
      $img = uploadFile($request->file('img'), [
        'dir' => 'builders',
        'width' => 325,
        'height' => 190,
        'quality' => 90,
        'thumb_width' => 230,
        'thumb_height' => 190
      ]);
      $dataRequest['img'] = $img;
    }

    if ($request->file('recently_img')) {
      $img = uploadFile($request->file('recently_img'), [
        'dir' => 'builders',
        'width' => 490,
        'height' => 395,
        'quality' => 90,
        'thumb_width' => 230,
        'thumb_height' => 190
      ]);
      $dataRequest['recently_img'] = $img;
    }

    $builder = new Builder($dataRequest);
    $builder->save();

    return redirect()->route('builders.index')
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
   * @param  \Thd\Builder  $builder
   * @return \Illuminate\Http\Response
   */
  public function edit(Builder $builder)
  {
    $countries = new Countries();
    $states = $countries->where('cca3', 'USA')->first()->hydrateStates()->states->pluck('name', 'name');

    return view('admin.builders.edit', [
      'builder' => $builder,
      'states' => $states
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Thd\Builder  $builder
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Builder $builder)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:100',
      'img' => 'nullable|image|dimensions:min_width=325,min_height=190',
      'recently_img' => 'nullable|image|dimensions:min_width=490,min_height=395'
    ]);

    if ($validator->fails()) {
      return redirect(route('builders.edit', $builder->id))
        ->withErrors($validator)
        ->withInput();
    }

    $dataRequest = $request->except(['_token', '_method']);

    if ($request->file('img')) {
      $img = uploadFile($request->file('img'), [
        'dir' => 'builders',
        'width' => 325,
        'height' => 190,
        'quality' => 90,
        'thumb_width' => 230,
        'thumb_height' => 190
      ]);
      $dataRequest['img'] = $img;

      Storage::delete('public/builders/' . $builder->img);
      Storage::delete('public/builders/thumb/' . $builder->img);
      Storage::delete('public/builders/original/' . $builder->img);
    }

    if ($request->file('recently_img')) {
      $img = uploadFile($request->file('recently_img'), [
        'dir' => 'builders',
        'width' => 490,
        'height' => 395,
        'quality' => 90,
        'thumb_width' => 230,
        'thumb_height' => 190
      ]);
      $dataRequest['recently_img'] = $img;

      Storage::delete('public/builders/' . $builder->recently_img);
      Storage::delete('public/builders/thumb/' . $builder->recently_img);
      Storage::delete('public/builders/original/' . $builder->recently_img);
    }

    $builder->update($dataRequest);

    return redirect()->route('builders.index')
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => $builder->name . ' was updated',
        'autoHide' => 1
      ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \Thd\Builder  $builder
   * @return \Illuminate\Http\Response
   */
  public function destroy(Builder $builder)
  {
    if ($builder->img) {
      Storage::delete('public/builders/' . $builder->img);
      Storage::delete('public/builders/thumb/' . $builder->img);
      Storage::delete('public/builders/original/' . $builder->img);
    }

    if ($builder->recently_img) {
      Storage::delete('public/builders/' . $builder->recently_img);
      Storage::delete('public/builders/thumb/' . $builder->recently_img);
      Storage::delete('public/builders/original/' . $builder->recently_img);
    }

    $builder->delete();

    return redirect()->route('builders.index')
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => $builder->name . ' was deleted',
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
    $builders = Builder::select(['name', 'city', 'state', 'zip', 'show_landing', 'recently_built', 'created_at', 'updated_at', 'id']);
    return Datatables::of($builders)
      ->addColumn('actions', function ($builder) {
        return '<a class="btn btn-info btn-sm" href="' . route('builders.edit', $builder->id) . '" role="button">Edit</a> <form style="display: inline-block" action="' . route('builders.destroy', $builder->id) . '" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
      })
      ->editColumn('show_landing', function ($builders) {
        if ($builders->show_landing == 1)
          return '<i style="color: green;" class="fa fa-check" aria-hidden="true"></i>';
        return '';
      })
      ->editColumn('recently_built', function ($builders) {
        if ($builders->show_landing == 1)
          return '<i style="color: green;" class="fa fa-check" aria-hidden="true"></i>';
        return '';
      })
      ->rawColumns(['show_landing', 'recently_built', 'actions'])
      ->make(true);
  }
}

<?php

namespace Thd\Http\Controllers\Admin;

use Thd\Page;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class PagesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.pages.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.pages.create');
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
      'title' => 'required',
      'link' => 'required|unique:pages,link',
      'text' => 'required',
    ]);

    $inputs = $request->except('_token');

    $page = new Page();
    $page->fill($inputs);
    $page->save();

    return redirect()->route('pages.index')
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => $page->title . ' was added',
        'autoHide' => 1
      ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \Thd\Page  $page
   * @return \Illuminate\Http\Response
   */
  public function edit(Page $page)
  {
    return view('admin.pages.edit', ['page' => $page]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Thd\Page  $page
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Page $page)
  {
    $validatedData = $request->validate([
      'title' => 'required',
      'link' => 'required|unique:pages,link,' . $page->id . ',id',
      'text' => 'required',
    ]);

    $inputs = $request->except(['_method', '_token']);

    $page->fill($inputs);
    $page->update();

    return redirect()->route('pages.index')
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => $page->title . ' was updated',
        'autoHide' => 1
      ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \Thd\Page  $page
   * @return \Illuminate\Http\Response
   */
  public function destroy(Page $page)
  {
    $page->delete();

    return redirect()->route('pages.index')
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => $page->title . ' was deleted',
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
    $pages = Page::select(['id', 'title', 'link', 'created_at', 'updated_at']);
    return Datatables::of($pages)
      ->addColumn('actions', function ($page) {
        return '<a class="btn btn-info btn-sm" href="' . route('pages.edit', $page->id) . '" role="button">Edit</a> <form style="display: inline-block" action="' . route('pages.destroy', $page->id) . '" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
      })
      ->rawColumns(['actions'])
      ->make(true);
  }
}

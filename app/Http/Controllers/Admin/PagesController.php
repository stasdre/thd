<?php

namespace Thd\Http\Controllers\Admin;

use Thd\Page;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Thd\SpecialPage;
use Yajra\Datatables\Datatables;
use Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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
        return '<a class="btn btn-info btn-sm" href="' . route('pages.edit', $page->link) . '" role="button">Edit</a> <form style="display: inline-block" action="' . route('pages.destroy', $page->link) . '" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
      })
      ->rawColumns(['actions'])
      ->make(true);
  }

  public function about()
  {
    $data = SpecialPage::findOrFail('about-us');
    return view('admin.pages.about-us', [
      'data' => json_decode($data->data)
    ]);
  }

  public function aboutStore(Request $request)
  {
    $data = SpecialPage::findOrFail('about-us');

    $validator = Validator::make($request->all(), [
      'title' => 'required|max:190',
      'desc' => 'required'
    ]);

    if ($validator->fails()) {
      return redirect(route('pages.about'))
        ->withErrors($validator)
        ->withInput();
    } else {
      $dataPage = $request->except('_method', '_token', 'image');

      $oldData = json_decode($data->data);

      $dataPage['image'] = isset($oldData->image) ? $oldData->image : '';

      $image = $request->file('image');

      if ($image && isset($oldData->image) && !empty($oldData->image)) {
        Storage::delete('public/about/' . $oldData->image);
        Storage::delete('public/about/thumb/' . $oldData->image);
        Storage::delete('public/about/original/' . $oldData->image);
      }

      if (!file_exists(storage_path('app/public/about/original/'))) {
        Storage::makeDirectory('public/about/original');
      }
      if (!file_exists(storage_path('app/public/about/thumb/'))) {
        Storage::makeDirectory('public/about/thumb');
      }

      if ($image) {
        $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();

        $pathOriginal = storage_path('app/public/about/original/' . $filename);
        $path = storage_path('app/public/about/' . $filename);
        $pathThumb = storage_path('app/public/about/thumb/' . $filename);

        $img = Image::make($image->getRealPath());
        $img->fit(580, 330);
        $img->save($path, 90);

        $imgThumb = Image::make($image->getRealPath());
        $imgThumb->fit(200, 200);
        $imgThumb->save($pathThumb, 90);

        $imgOriginal = Image::make($image->getRealPath());
        $imgOriginal->save($pathOriginal, 100);

        $dataPage['image'] = $filename;
      }

      $data->data = json_encode($dataPage);
      $data->update();

      return redirect()->route('pages.about')
        ->with('message', [
          'type' => 'success',
          'title' => 'Success!',
          'message' => 'Data was updated',
          'autoHide' => 1
        ]);
    }
  }
}

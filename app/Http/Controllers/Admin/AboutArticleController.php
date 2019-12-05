<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Thd\AboutArticle;
use Yajra\Datatables\Datatables;


class AboutArticleController extends Controller
{
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.pages.about-article.create');
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
      'description' => 'required',
      'image' => 'required|image'
    ]);

    if ($validator->fails()) {
      return redirect(route('about-article.create'))
        ->withErrors($validator)
        ->withInput();
    }

    if ($request->file('image')) {
      $image = $request->file('image');
      $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
      $path = storage_path('app/public/about/' . $filename);

      $img = Image::make($image->getRealPath());
      $img->fit(265, 200);
      $img->save($path, 90);


      $pathThumb = storage_path('app/public/about/thumb/' . $filename);

      $imgThumb = Image::make($image->getRealPath());
      $imgThumb->fit(100, 100);
      $imgThumb->save($pathThumb);

      if (!file_exists(storage_path('app/public/about/original/'))) {
        Storage::makeDirectory('public/about/original');
      }

      $pathOriginal = storage_path('app/public/about/original/' . $filename);
      $imgOriginal = Image::make($image->getRealPath());
      $imgOriginal->save($pathOriginal, 100);
    }

    $article = new AboutArticle([
      'name' => $request->input('name'),
      'description' => $request->input('description'),
      'image' => $filename ? $filename : '',
    ]);
    $article->save();

    return redirect()->route('pages.about')
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => $article->name . ' was added',
        'autoHide' => 1
      ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \Thd\AboutArticle  $article
   * @return \Illuminate\Http\Response
   */
  public function edit(AboutArticle $aboutArticle)
  {
    return view('admin.pages.about-article.edit', [
      'data' => $aboutArticle
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Thd\AboutArticle  $style
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, AboutArticle $aboutArticle)
  {

    $validator = Validator::make($request->all(), [
      'name' => 'required|max:190',
      'description' => 'required'
    ]);

    if ($validator->fails()) {
      return redirect(route('about-article.edit'))
        ->withErrors($validator)
        ->withInput();
    }

    if ($request->file('image')) {
      $image = $request->file('image');
      $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
      $path = storage_path('app/public/about/' . $filename);

      $img = Image::make($image->getRealPath());
      $img->fit(265, 200);
      $img->save($path, 90);

      Storage::delete('public/about/' . $aboutArticle->image);
      Storage::delete('public/about/thumb/' . $aboutArticle->image);
      Storage::delete('public/about/original/' . $aboutArticle->image);

      $aboutArticle->image = $filename;

      $pathThumb = storage_path('app/public/about/thumb/' . $filename);

      $imgThumb = Image::make($image->getRealPath());
      $imgThumb->fit(100, 100);
      $imgThumb->save($pathThumb);

      if (!file_exists(storage_path('app/public/about/original/'))) {
        Storage::makeDirectory('public/about/original');
      }

      $pathOriginal = storage_path('app/public/about/original/' . $filename);
      $imgOriginal = Image::make($image->getRealPath());
      $imgOriginal->save($pathOriginal, 100);
    }

    $aboutArticle->name = $request->input('name');
    $aboutArticle->description = $request->input('description');

    $aboutArticle->update();

    return redirect()->route('pages.about')
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => $aboutArticle->name . ' was updated',
        'autoHide' => 1
      ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \Thd\AboutArticle  $aboutArticle
   * @return \Illuminate\Http\Response
   */
  public function destroy(AboutArticle $aboutArticle)
  {

    if ($aboutArticle->image) {
      Storage::delete('public/about/' . $aboutArticle->image);
      Storage::delete('public/about/thumb/' . $aboutArticle->image);
      Storage::delete('public/about/original/' . $aboutArticle->image);
    }

    $aboutArticle->delete();

    return redirect()->route('pages.about')
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => $aboutArticle->name . ' was deleted',
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
    $articles = AboutArticle::select(['id', 'name', 'created_at', 'updated_at']);
    return Datatables::of($articles)
      ->addColumn('actions', function ($article) {
        return '<a class="btn btn-info btn-sm" href="' . route('about-article.edit', $article->id) . '" role="button">Edit</a> <form style="display: inline-block" action="' . route('about-article.destroy', $article->id) . '" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
      })
      ->rawColumns(['actions'])
      ->make(true);
  }
}

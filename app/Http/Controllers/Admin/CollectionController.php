<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Asp;
use Thd\Collection;
use Thd\Http\Controllers\Controller;
use Thd\Http\Requests\CollectionsRequest;
use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Validator;

class CollectionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data = Asp::findOrFail(2);
    return view('admin.collection.index')->with('data', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.collection.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CollectionsRequest $request)
  {
    $dataPlans = [];
    $filename = '';

    if ($request->input('added-plan')) {
      $count = 0;
      foreach ($request->input('added-plan') as $plan) {
        $dataPlans[$count]['title'] = Input::get('plan_title.' . $count);
        $dataPlans[$count]['url'] = Input::get('plan_url.' . $count);
        $dataPlans[$count]['img_alt'] = Input::get('plan_img_alt.' . $count);

        $image = Input::file('plan_img.' . $count);
        $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();

        $path = storage_path('app/public/collections/' . $filename);
        $pathThumb = storage_path('app/public/collections/thumb/' . $filename);

        $img = Image::make($image->getRealPath())->save($path, 100);

        $imgThumb = Image::make($image->getRealPath());
        $imgThumb->resize(null, 189, function ($constraint) {
          $constraint->aspectRatio();
        });
        $imgThumb->save($pathThumb);

        $dataPlans[$count]['img'] = $filename;

        $count++;
      }
    }

    if ($request->file('image')) {
      $image = $request->file('image');
      $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
      $path = storage_path('app/public/collections/' . $filename);

      $img = Image::make($image->getRealPath());
      $img->fit(470, 265);
      $img->save($path, 90);

      $pathThumb = storage_path('app/public/collections/thumb/' . $filename);

      $imgThumb = Image::make($image->getRealPath());
      $imgThumb->fit(238, 166);
      $imgThumb->save($pathThumb);

      if (!file_exists(storage_path('app/public/collections/original/'))) {
        Storage::makeDirectory('public/collections/original');
      }

      $pathOriginal = storage_path('app/public/collections/original/' . $filename);
      $imgOriginal = Image::make($image->getRealPath());
      $imgOriginal->save($pathOriginal, 100);

      //Storage::delete('public/home-page/'.$data->image);
    }

    $collection = new Collection([
      'name' => $request->input('name'),
      'slug' => $request->input('slug'),
      'short_name' => $request->input('short_name'),
      'description' => $request->input('description'),
      'in_filter' => $request->input('in_filter') == 1 ? 1 : 0,
      'meta_title' => $request->input('meta_title'),
      'meta_description' => $request->input('meta_description'),
      'meta_keywords' => $request->input('meta_keywords'),
      'plans' => json_encode($dataPlans),
      'image' => $filename ? $filename : '',
      'plan' => $request->input('plan')
    ]);
    $collection->save();

    if ($request->input('redirect') == 'next') {
      return redirect()->route('collections.edit', $collection->id)
        ->with('message', [
          'type' => 'success',
          'title' => 'Success!',
          'message' => $collection->name . ' was added',
          'autoHide' => 1
        ]);
    } else {
      return redirect()->route('collections.index')
        ->with('message', [
          'type' => 'success',
          'title' => 'Success!',
          'message' => $collection->name . ' was added',
          'autoHide' => 1
        ]);
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \Thd\Collection  $collection
   * @return \Illuminate\Http\Response
   */
  public function edit(Collection $collection)
  {
    $plans = json_decode($collection->plans);
    return view('admin.collection.edit', [
      'collection' => $collection,
      'plans' => $plans
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  Thd\Http\Request\CollectionsRequest  $request
   * @param  \Thd\Collection  $collection
   * @return \Illuminate\Http\Response
   */
  public function update(CollectionsRequest $request, Collection $collection)
  {
    $dataPlans = [];

    if ($request->input('added-plan')) {
      $count = 0;
      foreach ($request->input('added-plan') as $plan) {
        $dataPlans[$count]['title'] = Input::get('plan_title.' . $count);
        $dataPlans[$count]['url'] = Input::get('plan_url.' . $count);
        $dataPlans[$count]['img_alt'] = Input::get('plan_img_alt.' . $count);

        $image = Input::file('plan_img.' . $count);
        if ($image) {
          $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();

          $path = storage_path('app/public/collections/' . $filename);
          $pathThumb = storage_path('app/public/collections/thumb/' . $filename);

          $img = Image::make($image->getRealPath())->save($path, 100);

          $imgThumb = Image::make($image->getRealPath());
          $imgThumb->resize(null, 189, function ($constraint) {
            $constraint->aspectRatio();
          });
          $imgThumb->save($pathThumb);

          Storage::delete('public/collections/' . Input::get('plan_img_old.' . $count));
          Storage::delete('public/collections/thumb/' . Input::get('plan_img_old.' . $count));

          $dataPlans[$count]['img'] = $filename;
        } else {
          $dataPlans[$count]['img'] = Input::get('plan_img_old.' . $count);
        }

        $count++;
      }
    }

    if ($request->file('image')) {
      $image = $request->file('image');
      $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
      $path = storage_path('app/public/collections/' . $filename);

      $img = Image::make($image->getRealPath());
      $img->fit(470, 265);
      $img->save($path, 90);

      Storage::delete('public/collections/' . $collection->image);
      Storage::delete('public/collections/thumb/' . $collection->image);
      Storage::delete('public/collections/original/' . $collection->image);

      $collection->image = $filename;

      $pathThumb = storage_path('app/public/collections/thumb/' . $filename);

      $imgThumb = Image::make($image->getRealPath());
      $imgThumb->fit(238, 166);
      $imgThumb->save($pathThumb);

      if (!file_exists(storage_path('app/public/collections/original/'))) {
        Storage::makeDirectory('public/collections/original');
      }

      $pathOriginal = storage_path('app/public/collections/original/' . $filename);
      $imgOriginal = Image::make($image->getRealPath());
      $imgOriginal->save($pathOriginal, 100);
    }

    $collection->name = $request->input('name');
    $collection->short_name = $request->input('short_name');
    $collection->description = $request->input('description');
    $collection->in_filter = $request->input('in_filter') == 1 ? 1 : 0;
    $collection->meta_title = $request->input('meta_title');
    $collection->meta_description = $request->input('meta_description');
    $collection->meta_keywords = $request->input('meta_keywords');
    $collection->plans = json_encode($dataPlans);
    $collection->plan = $request->input('plan');

    $collection->update();

    if (strlen($request->input('deleted_img'))) {
      $deletedImages = explode(",", substr($request->input('deleted_img'), 0, -1));
      foreach ($deletedImages as $img) {
        Storage::delete('public/collections/' . $img);
        Storage::delete('public/collections/thumb/' . $img);
      }
    }

    if ($request->input('redirect') == 'next') {
      return redirect()->route('collections.edit', $collection->id)
        ->with('message', [
          'type' => 'success',
          'title' => 'Success!',
          'message' => $collection->name . ' was updated',
          'autoHide' => 1
        ]);
    } else {
      return redirect()->route('collections.index')
        ->with('message', [
          'type' => 'success',
          'title' => 'Success!',
          'message' => $collection->name . ' was updated',
          'autoHide' => 1
        ]);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \Thd\Collection  $collection
   * @return \Illuminate\Http\Response
   */
  public function destroy(Collection $collection)
  {
    $plans = json_decode($collection->plans);
    if ($plans) {
      foreach ($plans as $plan) {
        Storage::delete('public/collections/' . $plan->img);
        Storage::delete('public/collections/thumb/' . $plan->img);
      }
    }

    if ($collection->image) {
      Storage::delete('public/collections/' . $collection->image);
      Storage::delete('public/collections/thumb/' . $collection->image);
      Storage::delete('public/collections/original/' . $collection->image);
    }

    $collection->delete();

    return redirect()->route('collections.index')
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => $collection->name . ' was deleted',
        'autoHide' => 1
      ]);
  }

  public function publish(Collection $collection)
  {
    $collection->is_active = 1;
    $collection->update();

    return redirect()->back()
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => $collection->name . ' was published',
        'autoHide' => 1
      ]);
  }

  public function unpublish(Collection $collection)
  {
    $collection->is_active = 0;
    $collection->update();

    return redirect()->back()
      ->with('message', [
        'type' => 'success',
        'title' => 'Success!',
        'message' => $collection->name . ' was unpublished',
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
    $collections = Collection::select(['id', 'name', 'short_name', 'in_filter', 'is_active', 'created_at', 'updated_at']);
    return Datatables::of($collections)
      ->addColumn('actions', function ($collection) {
        $pudlish = $collection->is_active == 1 ? '<a class="btn btn-warning btn-sm" href="' . route('collection.unpublish', ['plan' => $collection->id]) . '" role="button">Unpublish</a>' : '<a class="btn btn-success btn-sm" href="' . route('collection.publish', ['plan' => $collection->id]) . '" role="button">Publish</a>';

        return '<a class="btn btn-info btn-sm" href="' . route('collections.edit', ['collection' => $collection->id]) . '" role="button">Edit</a> ' . $pudlish . ' <form style="display: inline-block" action="' . route('collections.destroy', ['collection' => $collection->id]) . '" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
      })
      ->editColumn('in_filter', function ($collection) {
        if ($collection->in_filter == 1)
          return '<i style="color: green;" class="fa fa-check" aria-hidden="true"></i>';
        return '';
      })
      ->editColumn('is_active', function ($collection) {
        if ($collection->is_active == 1)
          return '<i style="color: green;" class="fa fa-check" aria-hidden="true"></i>';
        return '';
      })
      ->rawColumns(['in_filter', 'is_active', 'actions'])
      ->make(true);
  }

  public function storeData(Request $request)
  {
    $data = Asp::findOrFail(2);

    $validator = Validator::make($request->all(), [
      'title' => 'required|max:190',
    ]);

    if ($validator->fails()) {
      return redirect(route('collections.index'))
        ->withErrors($validator)
        ->withInput();
    } else {

      if ($request->file('image')) {
        $image = $request->file('image');
        $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
        $path = storage_path('app/public/collections/' . $filename);

        $img = Image::make($image->getRealPath());
        $img->resize(null, 276, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->save($path, 90);

        Storage::delete('public/collections/' . $data->image);
        Storage::delete('public/collections/thumb/' . $data->image);
        Storage::delete('public/collections/original/' . $data->image);

        $data->image = $filename;

        $pathThumb = storage_path('app/public/collections/thumb/' . $filename);

        $imgThumb = Image::make($image->getRealPath());
        $imgThumb->resize(380, null, function ($constraint) {
          $constraint->aspectRatio();
        });
        $imgThumb->save($pathThumb);

        if (!file_exists(storage_path('app/public/collections/original/'))) {
          Storage::makeDirectory('public/collections/original');
        }

        $pathOriginal = storage_path('app/public/collections/original/' . $filename);
        $imgOriginal = Image::make($image->getRealPath());
        $imgOriginal->save($pathOriginal, 100);
      }

      $data->title = $request->input('title');
      $data->subtitle = $request->input('subtitle');
      $data->desc = $request->input('desc');
      $data->meta = $request->input('meta');
      $data->update();

      return redirect()->route('collections.index')
        ->with('message', [
          'type' => 'success',
          'title' => 'Success!',
          'message' => 'Data was updated',
          'autoHide' => 1
        ]);
    }
  }
}

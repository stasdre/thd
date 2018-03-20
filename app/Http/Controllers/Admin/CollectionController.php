<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Collection;
use Thd\Http\Controllers\Controller;
use Thd\Http\Requests\CollectionsRequest;
use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.collection.index');
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
        if( $request->input('added-plan') ){
            $dataPlans = [];
            $count = 0;
            foreach ( $request->input('added-plan') as $plan ){
                $dataPlans[$count]['title'] = Input::get('plan_title.'.$count);
                $dataPlans[$count]['url'] = Input::get('plan_url.'.$count);
                $dataPlans[$count]['img_alt'] = Input::get('plan_img_alt.'.$count);

                $image = Input::file('plan_img.'.$count);
                $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();

                $path = storage_path('app/public/collections/' . $filename);
                $pathThumb = storage_path('app/public/collections/thumb/' . $filename);

                $img = Image::make($image->getRealPath())->save($path, 100);

                $imgThumb = Image::make($image->getRealPath());
                $imgThumb->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $imgThumb->save($pathThumb);

                $dataPlans[$count]['img'] = $filename;

                $count ++;
            }
        }

        $collection = new Collection([
            'name' => $request->input('name'),
            'short_name' => $request->input('short_name'),
            'description' => $request->input('description'),
            'in_filter' => $request->input('in_filter') == 1 ? 1 : 0,
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'meta_keywords' => $request->input('meta_keywords'),
            'plans' => json_encode($dataPlans)
        ]);
        $collection->save();

        return redirect()->route('collections.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$collection->name.' was added',
                'autoHide'=>1]);
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
            'collection'=>$collection,
            'plans'=>$plans
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
        if( $request->input('added-plan') ){
            $dataPlans = [];
            $count = 0;
            foreach ( $request->input('added-plan') as $plan ){
                $dataPlans[$count]['title'] = Input::get('plan_title.'.$count);
                $dataPlans[$count]['url'] = Input::get('plan_url.'.$count);
                $dataPlans[$count]['img_alt'] = Input::get('plan_img_alt.'.$count);

                $image = Input::file('plan_img.'.$count);
                if($image){
                    $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();

                    $path = storage_path('app/public/collections/' . $filename);
                    $pathThumb = storage_path('app/public/collections/thumb/' . $filename);

                    $img = Image::make($image->getRealPath())->save($path, 100);

                    $imgThumb = Image::make($image->getRealPath());
                    $imgThumb->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $imgThumb->save($pathThumb);

                    Storage::delete('public/collections/'.Input::get('plan_img_old.'.$count));
                    Storage::delete('public/collections/thumb/'.Input::get('plan_img_old.'.$count));

                    $dataPlans[$count]['img'] = $filename;
                }else{
                    $dataPlans[$count]['img'] = Input::get('plan_img_old.'.$count);
                }

                $count ++;
            }
        }

        $collection->name = $request->input('name');
        $collection->short_name = $request->input('short_name');
        $collection->description = $request->input('description');
        $collection->in_filter = $request->input('in_filter') == 1 ? 1 : 0;
        $collection->meta_title = $request->input('meta_title');
        $collection->meta_description = $request->input('meta_description');
        $collection->meta_keywords = $request->input('meta_keywords');
        $collection->plans = json_encode($dataPlans);

        $collection->update();

        if( strlen($request->input('deleted_img')) ){
            $deletedImages = explode(",", substr($request->input('deleted_img'), 0, -1));
            foreach ( $deletedImages as $img ){
                Storage::delete('public/collections/'.$img);
                Storage::delete('public/collections/thumb/'.$img);
            }
        }

        return redirect()->route('collections.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$collection->name.' was updated',
                'autoHide'=>1]);
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
        if(count($plans)){
            foreach ($plans as $plan){
                Storage::delete('public/collections/'.$plan->img);
                Storage::delete('public/collections/thumb/'.$plan->img);
            }
        }

        $collection->delete();

        return redirect()->route('collections.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$collection->name.' was deleted',
                'autoHide'=>1]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $collections = Collection::select(['id', 'name', 'short_name', 'in_filter', 'created_at', 'updated_at']);
        return Datatables::of($collections)
            ->addColumn('actions', function($collection){
                return '<a class="btn btn-info btn-sm" href="'.route('collections.edit', ['collection'=>$collection->id]).'" role="button">Edit</a> <form style="display: inline-block" action="'.route('collections.destroy', ['collection'=>$collection->id]).'" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="'.csrf_token().'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->editColumn('in_filter', function($collection){
                if($collection->in_filter == 1)
                    return '<i style="color: green;" class="fa fa-check" aria-hidden="true"></i>';
                return '';
            })
            ->rawColumns(['in_filter', 'actions'])
            ->make(true);
    }
}

<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Thd\Http\Requests\StylesRequest;
use Thd\Style;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Datatables;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.style.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.style.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StylesRequest $request)
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

                $path = storage_path('app/public/styles/' . $filename);
                $pathThumb = storage_path('app/public/styles/thumb/' . $filename);

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

        $style = new Style([
            'name' => $request->input('name'),
            'short_name' => $request->input('short_name'),
            'description' => $request->input('description'),
            'in_filter' => $request->input('in_filter') == 1 ? 1 : 0,
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'meta_keywords' => $request->input('meta_keywords'),
            'plans' => json_encode($dataPlans)
        ]);
        $style->save();

        return redirect()->route('styles.index')
                ->with('message', [
                    'type'=>'success',
                    'title'=>'Success!',
                    'message'=>$style->name.' was added',
                    'autoHide'=>1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Thd\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function edit(Style $style)
    {
        $plans = json_decode($style->plans);
        return view('admin.style.edit', [
            'style'=>$style,
            'plans'=>$plans
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Thd\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function update(StylesRequest $request, Style $style)
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

                    $path = storage_path('app/public/styles/' . $filename);
                    $pathThumb = storage_path('app/public/styles/thumb/' . $filename);

                    $img = Image::make($image->getRealPath())->save($path, 100);

                    $imgThumb = Image::make($image->getRealPath());
                    $imgThumb->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $imgThumb->save($pathThumb);

                    Storage::delete('public/styles/'.Input::get('plan_img_old.'.$count));
                    Storage::delete('public/styles/thumb/'.Input::get('plan_img_old.'.$count));

                    $dataPlans[$count]['img'] = $filename;
                }else{
                    $dataPlans[$count]['img'] = Input::get('plan_img_old.'.$count);
                }

                $count ++;
            }
        }

        $style->name = $request->input('name');
        $style->short_name = $request->input('short_name');
        $style->description = $request->input('description');
        $style->in_filter = $request->input('in_filter') == 1 ? 1 : 0;
        $style->meta_title = $request->input('meta_title');
        $style->meta_description = $request->input('meta_description');
        $style->meta_keywords = $request->input('meta_keywords');
        $style->plans = json_encode($dataPlans);

        $style->update();

        if( strlen($request->input('deleted_img')) ){
            $deletedImages = explode(",", substr($request->input('deleted_img'), 0, -1));
            foreach ( $deletedImages as $img ){
                Storage::delete('public/styles/'.$img);
                Storage::delete('public/styles/thumb/'.$img);
            }
        }

        return redirect()->route('styles.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$style->name.' was updated',
                'autoHide'=>1]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Thd\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function destroy(Style $style)
    {
        $plans = json_decode($style->plans);
        if(count($plans)){
            foreach ($plans as $plan){
                Storage::delete('public/styles/'.$plan->img);
                Storage::delete('public/styles/thumb/'.$plan->img);
            }
        }
        $style->delete();

        return redirect()->route('styles.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$style->name.' was deleted',
                'autoHide'=>1]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $styles = Style::select(['id', 'name', 'short_name', 'in_filter', 'created_at', 'updated_at']);
        return Datatables::of($styles)
            ->addColumn('actions', function($style){
                return '<a class="btn btn-info btn-sm" href="'.route('styles.edit', ['style'=>$style->id]).'" role="button">Edit</a> <form style="display: inline-block" action="'.route('styles.destroy', ['style'=>$style->id]).'" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="'.csrf_token().'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->editColumn('in_filter', function($style){
                if($style->in_filter == 1)
                    return '<i style="color: green;" class="fa fa-check" aria-hidden="true"></i>';
                return '';
            })
            ->rawColumns(['in_filter', 'actions'])
            ->make(true);
    }
}

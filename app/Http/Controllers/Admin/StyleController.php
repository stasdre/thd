<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Thd\Asp;
use Thd\Http\Requests\StylesRequest;
use Thd\Style;
use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Datatables;
use Validator;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Asp::findOrFail(1);

        return view('admin.style.index')->with('data', $data);
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
        $dataPlans = [];

        if( $request->input('added-plan') ){
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

        if($request->file('image')){
            $image = $request->file('image');
            $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
            $path = storage_path('app/public/styles/' . $filename);

            $img = Image::make($image->getRealPath());
            $img->resize(null, 189, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path, 90);


            $pathThumb = storage_path('app/public/styles/thumb/' . $filename);

            $imgThumb = Image::make($image->getRealPath());
            $imgThumb->resize(380, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imgThumb->save($pathThumb);
    
            if(!file_exists(storage_path('app/public/styles/original/'))){
                Storage::makeDirectory('public/styles/original');
            }

            $pathOriginal = storage_path('app/public/styles/original/' . $filename);
            $imgOriginal = Image::make($image->getRealPath());
            $imgOriginal->save($pathOriginal, 100);    

            //Storage::delete('public/home-page/'.$data->image);
        }

        $style = new Style([
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
        $style->save();

        if( $request->input('redirect') == 'next' ){
            return redirect()->route('styles.edit', $style->id)
                ->with('message', [
                    'type'=>'success',
                    'title'=>'Success!',
                    'message'=>$style->name.' was added',
                    'autoHide'=>1]);
        }else{
            return redirect()->route('styles.index')
                ->with('message', [
                    'type'=>'success',
                    'title'=>'Success!',
                    'message'=>$style->name.' was added',
                    'autoHide'=>1]);
        }
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
        $dataPlans = [];
        if( $request->input('added-plan') ){
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

        if($request->file('image')){
            $image = $request->file('image');
            $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
            $path = storage_path('app/public/styles/' . $filename);

            $img = Image::make($image->getRealPath());
            $img->resize(null, 189, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path, 90);

            Storage::delete('public/styles/'.$style->image);
            Storage::delete('public/styles/thumb/'.$style->image);
            Storage::delete('public/styles/original/'.$style->image);

            $style->image = $filename;

            $pathThumb = storage_path('app/public/styles/thumb/' . $filename);

            $imgThumb = Image::make($image->getRealPath());
            $imgThumb->resize(380, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imgThumb->save($pathThumb);
    
            if(!file_exists(storage_path('app/public/styles/original/'))){
                Storage::makeDirectory('public/styles/original');
            }

            $pathOriginal = storage_path('app/public/styles/original/' . $filename);
            $imgOriginal = Image::make($image->getRealPath());
            $imgOriginal->save($pathOriginal, 100);    

        }

        $style->name = $request->input('name');
        $style->short_name = $request->input('short_name');
        $style->description = $request->input('description');
        $style->in_filter = $request->input('in_filter') == 1 ? 1 : 0;
        $style->meta_title = $request->input('meta_title');
        $style->meta_description = $request->input('meta_description');
        $style->meta_keywords = $request->input('meta_keywords');
        $style->plans = json_encode($dataPlans);
        $style->plan = $request->input('plan');

        $style->update();

        if( strlen($request->input('deleted_img')) ){
            $deletedImages = explode(",", substr($request->input('deleted_img'), 0, -1));
            foreach ( $deletedImages as $img ){
                Storage::delete('public/styles/'.$img);
                Storage::delete('public/styles/thumb/'.$img);
            }
        }

        if( $request->input('redirect') == 'next' ){
            return redirect()->route('styles.edit', $style->id)
                ->with('message', [
                    'type'=>'success',
                    'title'=>'Success!',
                    'message'=>$style->name.' was updated',
                    'autoHide'=>1]);
        }else{
            return redirect()->route('styles.index')
                ->with('message', [
                    'type'=>'success',
                    'title'=>'Success!',
                    'message'=>$style->name.' was updated',
                    'autoHide'=>1]);
        }
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

        if($style->image){
            Storage::delete('public/styles/'.$style->image);
            Storage::delete('public/styles/thumb/'.$style->image);
            Storage::delete('public/styles/original/'.$style->image);
        }

        $style->delete();

        return redirect()->route('styles.index')
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$style->name.' was deleted',
                'autoHide'=>1]);
    }

    public function publish(Style $style)
    {
        $style->is_active = 1;
        $style->update();

        return redirect()->back()
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$style->name.' was published',
                'autoHide'=>1]);
    }

    public function unpublish(Style $style)
    {
        $style->is_active = 0;
        $style->update();

        return redirect()->back()
            ->with('message', [
                'type'=>'success',
                'title'=>'Success!',
                'message'=>$style->name.' was unpublished',
                'autoHide'=>1]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $styles = Style::select(['id', 'name', 'short_name', 'in_filter', 'is_active', 'created_at', 'updated_at']);
        return Datatables::of($styles)
            ->addColumn('actions', function($style){
                $pudlish = $style->is_active == 1 ? '<a class="btn btn-warning btn-sm" href="'.route('style.unpublish', ['plan'=>$style->id]).'" role="button">Unpublish</a>' : '<a class="btn btn-success btn-sm" href="'.route('style.publish', ['plan'=>$style->id]).'" role="button">Publish</a>';
                return '<a class="btn btn-info btn-sm" href="'.route('styles.edit', ['style'=>$style->id]).'" role="button">Edit</a>  '.$pudlish.'  <form style="display: inline-block" action="'.route('styles.destroy', ['style'=>$style->id]).'" method="POST"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="'.csrf_token().'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></form>';
            })
            ->editColumn('in_filter', function($style){
                if($style->in_filter == 1)
                    return '<i style="color: green;" class="fa fa-check" aria-hidden="true"></i>';
                return '';
            })
            ->editColumn('is_active', function($style){
                if($style->is_active == 1)
                    return '<i style="color: green;" class="fa fa-check" aria-hidden="true"></i>';
                return '';
            })
            ->rawColumns(['in_filter', 'is_active', 'actions'])
            ->make(true);
    }

    public function storeData(Request $request)
    {
        $data = Asp::findOrFail(1);

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:190',
        ]);

        if ($validator->fails()) {
            return redirect(route('styles.index'))
                ->withErrors($validator)
                ->withInput();
        }else{

            if($request->file('image')){
                $image = $request->file('image');
                $filename  = str_random(40) . '.' . $image->getClientOriginalExtension();
                $path = storage_path('app/public/styles/' . $filename);

                $img = Image::make($image->getRealPath());
                $img->resize(null, 276, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($path, 90);

                Storage::delete('public/styles/'.$data->image);
                Storage::delete('public/styles/thumb/'.$data->image);
                Storage::delete('public/styles/original/'.$data->image);

                $pathThumb = storage_path('app/public/styles/thumb/' . $filename);

                $imgThumb = Image::make($image->getRealPath());
                $imgThumb->resize(380, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $imgThumb->save($pathThumb);
        
                if(!file_exists(storage_path('app/public/styles/original/'))){
                    Storage::makeDirectory('public/styles/original');
                }
    
                $pathOriginal = storage_path('app/public/styles/original/' . $filename);
                $imgOriginal = Image::make($image->getRealPath());
                $imgOriginal->save($pathOriginal, 100);    
    
                $data->image = $filename;
            }

            $data->title = $request->input('title');
            $data->subtitle = $request->input('subtitle');
            $data->desc = $request->input('desc');
            $data->update();

            return redirect()->route('styles.index')
                ->with('message', [
                    'type'=>'success',
                    'title'=>'Success!',
                    'message'=>'Data was updated',
                    'autoHide'=>1]);
        }
    }
}

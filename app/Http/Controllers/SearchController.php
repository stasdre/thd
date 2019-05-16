<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Thd\Plan;

class SearchController extends Controller
{
    public function index(Request $request)
    { 
        return view('search.index');
    }

    public function advanced(Request $request)
    { 
        return view('search.advanced');
    }

    public function result(Request $request)
    {
        $input = $request->all();

        $views = $request->get('views');
        $collection = $request->get('collection');
        $style = $request->get('style');

        $order = $request->get('order') ? $request->get('order') : 'popular';
        
        $sq_min = $request->get('sq_min');
        $sq_max = $request->get('sq_max');
        $beds = $request->get('beds');
        $baths = $request->get('baths');
        $garages = $request->get('garages');
        $stories = $request->get('stories');
        $txt = $request->get('txt');
        $width_min = $request->get('width_min');
        $width_max = $request->get('width_max');
        $depth_min = $request->get('depth_min');
        $depth_max = $request->get('depth_max');

        $rules = [
            'views' => 'required|in:24,50',
            'order' => 'nullable|in:popular,recent',
            'collection' => 'nullable|integer',
            'style' => 'nullable|integer',
            'sq_min' => 'nullable|numeric',
            'sq_max' => 'nullable|numeric',
            'beds' => 'nullable|numeric',
            'baths' => 'nullable|numeric',
            'garages' => 'nullable|numeric',
            'stories' => 'nullable|numeric',
            'txt' => 'nullable|string',
            'width_min' => 'nullable|numeric',
            'width_max' => 'nullable|numeric',
            'depth_min' => 'nullable|numeric',
            'depth_max' => 'nullable|numeric',
        ];


        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return abort(404);
        }
        $plans = Plan::where('is_active', '=', 1);

        if(!empty($collection)){
            $plans->whereHas('collections', function($query) use ($collection){
                $query->where('collection_id', '=', $collection);
            });
        }

        if(!empty($style)){
            $plans->whereHas('styles', function($query) use ($style){
                $query->where('style_id', '=', $style);
            });
        }

        if($sq_min)
            $plans->where('square_ft->str_total', '>=', $sq_min);

        if($sq_max)
            $plans->where('square_ft->str_total', '<=', $sq_max);

        if($beds)
            $plans->where('rooms->r_bedrooms', '>=', $beds);

        if($baths)
            $plans->where('rooms->r_full_baths', '>=', $baths);

        if($garages)
            $plans->where('garage->car', '>=', $garages);

        if($stories)
            $plans->where('dimensions->stories', '>=', $stories);

        if($txt){
            $plans->where(function ($query) use($txt) {
                $query->where('name', 'like', '%'.$txt.'%')
                      ->orWhere('plan_number', 'like', '%'.$txt.'%');
            });
        }

        if($width_min)
            $plans->where('dimensions->width_ft', '>=', $width_min);

        if($width_max)
            $plans->where('dimensions->width_ft', '<=', $width_max);


        if($depth_min)
            $plans->where('dimensions->depth_ft', '>=', $depth_min);

        if($depth_max)
            $plans->where('dimensions->depth_ft', '<=', $depth_max);

        switch ($order) {
            case 'popular':
                $plans->orderBy('views', 'desc');
                break;
            case 'recent':
                $plans->orderBy('created_at', 'desc');
                break;
        }

        $dataPlans = $plans->with('images')->paginate($views);
        //return view('search.index', ['plans'=>$dataPlans]);
        return response()->json($dataPlans);
    }
}

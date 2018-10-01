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
        $input = $request->all();

        $ft_min = $request->get('ft_min');
        $ft_max = $request->get('ft_max');
        $beds = $request->get('beds');
        $baths = $request->get('baths');
        $half_baths = $request->get('half_baths');
        $garages = $request->get('garages');
        $stories = $request->get('stories');
        $w_min = $request->get('w_min');
        $w_max = $request->get('w_max');
        $d_min = $request->get('d_min');
        $d_max = $request->get('d_max');

        $rules = [
            'ft_min' => 'nullable|integer',
            'ft_max' => 'nullable|integer',
            'beds' => 'nullable|integer',
            'baths' => 'nullable|integer',
            'half_baths' => 'nullable|integer',
            'garages' => 'nullable|integer',
            'stories' => 'nullable|integer',
            'w_min' => 'nullable|integer',
            'w_max' => 'nullable|integer',
            'd_min' => 'nullable|integer',
            'd_max' => 'nullable|integer',
        ];


        $validation = Validator::make($input, $rules);

        if($validation->fails()){
            return abort(404);
        }
        $plans = Plan::where('is_active', '=', 1);

        if($ft_min)
            $plans->where('square_ft->str_total', '>=', $ft_min);

        if($ft_max)
            $plans->where('square_ft->str_total', '<=', $ft_max);

        if($beds)
            $plans->where('rooms->r_bedrooms', '>=', $beds);

        if($baths)
            $plans->where('rooms->r_full_baths', '>=', $baths);

        if($half_baths)
            $plans->where('rooms->r_half_baths', '>=', $half_baths);

        if($garages)
            $plans->where('garage->car', '>=', $garages);

        if($stories)
            $plans->where('dimensions->stories', '>=', $stories);

        if($w_min)
            $plans->where('dimensions->width_ft', '>=', $w_min);

        if($w_max)
            $plans->where('dimensions->width_ft', '<=', $w_max);

        if($d_min)
            $plans->where('dimensions->depth_ft', '>=', $d_min);

        if($d_max)
            $plans->where('dimensions->depth_ft', '<=', $d_max);

        $dataPlans = $plans->with(['images' => function($query){
            $query->where('first_image', '=', 1);
        }])->orderBy('created_at', 'desc')->paginate(10);
        return view('search.index', ['plans'=>$dataPlans]);
    }
}

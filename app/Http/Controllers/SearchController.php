<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Thd\Plan;
use Thd\Bed;
use Thd\Kitchen;
use Thd\RoomInterior;
use Thd\Garage;
use Thd\Outdoor;
use Thd\Collection;
use Thd\Style;
use Illuminate\Support\Facades\Auth;
use Thd\SavedPlan;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        return view('search.index');
    }

    public function advanced(Request $request)
    {
        $beds = Bed::orderBy('name')->get();
        $kitchens = Kitchen::orderBy('name')->get();
        $roomsInteriors = RoomInterior::orderBy('name')->get();
        $garages = Garage::orderBy('name')->get();
        $outdoors = Outdoor::orderBy('name')->get();

        $styles = Style::orderBy('name')->get();
        $collections = Collection::orderBy('name')->get();

        $mostPlans = Plan::orderBy('views', 'desc')->limit(10)->with(['images' => function ($query) {
            $query->orderBy('for_search', 'desc');
            $query->orderBy('sort_number', 'asc');
        }])->get();


        return view('search.advanced', [
            'beds' => $beds,
            'kitchens' => $kitchens,
            'roomsInteriors' => $roomsInteriors,
            'garages' => $garages,
            'outdoors' => $outdoors,
            'styles' => $styles,
            'collections' => $collections,
            'mostPlans' => $mostPlans
        ]);
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

        $bf = $request->get('bf');
        $kf = $request->get('kf');
        $rf = $request->get('rf');
        $gf = $request->get('gf');
        $ef = $request->get('ef');
        $styles = $request->get('styles');
        $collections = $request->get('collections');
        $style_or_collection = $request->get('style_or_collection');
        $b_s_p = $request->get('b_s_p');
        $saved_user = $request->get('saved_user');


        $rules = [
            'views' => 'required|integer',
            'order' => 'nullable|in:popular,recent,s_l,l_s',
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
            'style_or_collection' => 'nullable|string',
            'b_s_p' => 'nullable|in:1',
            'saved_user' => 'nullable|exists:users,id',
        ];


        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return abort(404);
        }

        if ($b_s_p == 1) {
            $plans = Plan::select(
                'id',
                'name',
                'plan_number',
                'rooms',
                'dimensions',
                'square_ft',
                'garage'
            )->whereIn('plan_number', [2091, 1421, 2214])->with(['images' => function ($query) {
                $query->orderBy('for_search', 'desc');
                $query->orderBy('sort_number', 'asc');
            }])->with(['images_first' => function ($query) {
                $query->orderBy('sort_number', 'asc');
            }])->with(['images_second' => function ($query) {
                $query->orderBy('sort_number', 'asc');
            }])->with(['images_basement' => function ($query) {
                $query->orderBy('sort_number', 'asc');
            }])->get()->sortBy(function ($value, $key) {
                switch ($value->plan_number) {
                    case 2091:
                        return 1;
                    case 1421:
                        return 2;
                    case 2214:
                        return 3;
                }
            });

            return response()->json([
                "current_page" => 1,
                "data" => array_values($plans->toArray()),
                "first_page_url" => "",
                "from" => 1,
                "last_page" => 1,
                "last_page_url" => "",
                "next_page_url" => "",
                "path" => "/search/result",
                "per_page" => $views,
                "prev_page_url" => null,
                "to" => $views,
                "total" => $views,
            ]);
        }

        $plans = Plan::select(
            'id',
            'name',
            'plan_number',
            'rooms',
            'dimensions',
            'square_ft',
            'garage'
        )->where('is_active', '=', 1);

        if (!empty($collection)) {
            $plans->whereHas('collections', function ($query) use ($collection) {
                $query->where('collection_id', '=', $collection);
            });
        }

        if (!empty($style)) {
            $plans->whereHas('styles', function ($query) use ($style) {
                $query->where('style_id', '=', $style);
            });
        }

        if ($sq_min)
            $plans->where('square_ft->str_total', '>=', 1 * $sq_min);

        if ($sq_max)
            $plans->where('square_ft->str_total', '<=', 1 * $sq_max);

        if ($beds)
            $plans->where('rooms->r_bedrooms', '>=', 1 * $beds);

        if ($baths)
            $plans->where('rooms->r_full_baths', '>=', 1 * $baths);

        if ($garages)
            $plans->where('garage->car', '>=', 1 * $garages);

        if ($stories)
            $plans->where('dimensions->stories', '>=', 1 * $stories);

        if ($txt) {
            $plans->where(function ($query) use ($txt) {
                $query->where('name', 'like', '%' . $txt . '%')
                    ->orWhere('plan_number', 'like', '%' . $txt . '%');
            });
        }

        if ($width_min)
            $plans->where('dimensions->width_ft', '>=', 1 * $width_min);

        if ($width_max)
            $plans->where('dimensions->width_ft', '<=', 1 * $width_max);


        if ($depth_min)
            $plans->where('dimensions->depth_ft', '>=', 1 * $depth_min);

        if ($depth_max)
            $plans->where('dimensions->depth_ft', '<=', 1 * $depth_max);


        if (!empty($bf)) {
            $plans->whereHas('beds', function ($query) use ($bf) {
                $query->whereIn('bed_id', explode(",", $bf));
            });
        }

        if (!empty($kf)) {
            $plans->whereHas('kitchens', function ($query) use ($kf) {
                $query->whereIn('kitchen_id', explode(",", $kf));
            });
        }


        if (!empty($rf)) {
            $plans->whereHas('roomsInterior', function ($query) use ($rf) {
                $query->whereIn('room_interior_id', explode(",", $rf));
            });
        }

        if (!empty($gf)) {
            $plans->whereHas('garages', function ($query) use ($gf) {
                $query->whereIn('garage_id', explode(",", $gf));
            });
        }

        if (!empty($ef)) {
            $plans->whereHas('outdoors', function ($query) use ($ef) {
                $query->whereIn('outdoor_id', explode(",", $ef));
            });
        }

        if (!empty($styles)) {
            $plans->whereHas('styles', function ($query) use ($styles) {
                $query->whereIn('style_id', explode(",", $styles));
            });
        }

        if (!empty($collections)) {
            $plans->whereHas('collections', function ($query) use ($collections) {
                $query->whereIn('collection_id', explode(",", $collections));
            });
        }

        if (!empty($style_or_collection)) {
            $plans->whereHas('collections', function ($query) use ($style_or_collection) {
                $query->where('short_name', 'like', '%' . $style_or_collection . '%');
            })->orWhereHas('styles', function ($query) use ($style_or_collection) {
                $query->where('short_name', 'like', '%' . $style_or_collection . '%');
            });
        }

        switch ($order) {
            case 'popular':
                $plans->orderBy('views', 'desc');
                break;
            case 'recent':
                $plans->orderBy('created_at', 'desc');
                break;
            case 's_l':
                $plans->orderBy('square_ft->str_total', 'asc');
                break;
            case 'l_s':
                $plans->orderBy('square_ft->str_total', 'desc');
                break;
        }

        if (Auth::id()) {
            $plans->with(['saved_plans' => function ($query) {
                $query->where('user_id', Auth::id());
            }]);
            if ($saved_user == Auth::id()) {
                $plans->has('saved_plans');
            }
        }

        $dataPlans = $plans->with(['images' => function ($query) {
            $query->orderBy('for_search', 'desc');
            $query->orderBy('sort_number', 'asc');
        }])->with(['images_first' => function ($query) {
            $query->orderBy('sort_number', 'asc');
        }])->with(['images_second' => function ($query) {
            $query->orderBy('sort_number', 'asc');
        }])->with(['images_basement' => function ($query) {
            $query->orderBy('sort_number', 'asc');
        }])->paginate($views);

        //return view('search.index', ['plans'=>$dataPlans]);
        return response()->json($dataPlans);
    }
}

<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Thd\Asp;
use Thd\Style;
use Illuminate\Support\Facades\Validator;
use Thd\Plan;
use Illuminate\Support\Facades\Auth;
use Thd\Collection;
use Thd\helpers\SearchPlansResult;

class StyleController extends Controller
{
    use SearchPlansResult;

    public function slug(Request $request, $slug, $views = 24, $order = 'popular')
    {
        $validator = Validator::make($request->route()->parameters(), [
            'slug' => 'required|alpha_dash|max:190',
        ]);

        if ($validator->fails()) {
            return abort(404);
        }

        $style = Style::where('slug', $slug);

        if (!Auth::user() || Auth::user()->hasRole('customer'))
            $style->where('is_active', 1);

        $dataStyle = $style->firstOrFail();

        $allCollections = Collection::orderBy('name', 'asc')->where('is_active', 1)->get();
        $allStyles = Style::orderBy('name', 'asc')->where('is_active', 1)->get();

        $searchCollect = $allCollections->filter(function ($value, $key) {
            return $value->in_filter == 1;
        })->pluck('short_name');

        $searchStyles = $allStyles->filter(function ($value, $key) {
            return $value->in_filter == 1;
        })->pluck('short_name');

        $mergeStyleAndCollect = $searchCollect->merge($searchStyles)->sort()->all();

        $this->views = $views;
        $this->order = $order;
        $this->style = $dataStyle->id;
        $plans = $this->get_plans();

        return view('style.slug', [
            'style' => $dataStyle,
            'allCollections' => $allCollections,
            'allStyles' => $allStyles,
            'searchFilter' => $mergeStyleAndCollect,
            'plans' => $plans
        ]);
    }

    public function all()
    {
        $styleData = Asp::find(1);
        $styles = Style::orderBy('name', 'asc')->where('is_active', 1)->get();

        return view('style.all', [
            'styles' => $styles,
            'styleData' => $styleData
        ]);
    }
}

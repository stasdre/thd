<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\Asp;
use Thd\Collection;
use Illuminate\Support\Facades\Validator;
use Thd\Plan;
use Illuminate\Support\Facades\Auth;
use Thd\Style;
use Thd\helpers\SearchPlansResult;

class CollectionController extends Controller
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

        $collection = Collection::where('slug', $slug);

        if (!Auth::user() || Auth::user()->hasRole('customer'))
            $collection->where('is_active', 1);

        $dataCollect = $collection->firstOrFail();

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
        $this->collection = $dataCollect->id;
        $plans = $this->get_plans();

        return view('collection.slug', [
            'collection' => $dataCollect,
            'allCollections' => $allCollections,
            'allStyles' => $allStyles,
            'searchFilter' => $mergeStyleAndCollect,
            'plans' => $plans
        ]);
    }

    public function all()
    {
        $collectionData = Asp::find(2);
        $collections = Collection::orderBy('name', 'asc')->where('is_active', 1)->get();

        return view('collection.all', [
            'collections' => $collections,
            'collectionData' => $collectionData
        ]);
    }
}

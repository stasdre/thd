<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\Asp;
use Thd\Collection;
use Illuminate\Support\Facades\Validator;
use Thd\Plan;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    public function slug(Request $request, $slug)
    {
        $validator = Validator::make($request->route()->parameters(), [
            'slug' => 'required|alpha_dash|max:190',
        ]);

        if ($validator->fails()) {
            return abort(404);
        }

        $collection = Collection::where('slug', $slug);

        if(!Auth::user() || Auth::user()->hasRole('customer'))
            $collection->where('is_active', 1);

        $dataCollect = $collection->firstOrFail();


        //$plans->load('images');
        return view('collection.slug', ['collection'=>$dataCollect]);
    }

    public function all()
    {
        $collectionData = Asp::find(2);
        $collections = Collection::orderBy('name', 'asc')->where('is_active', 1)->get();

        return view('collection.all', [
            'collections'=>$collections,
            'collectionData'=>$collectionData
        ]);
    }
}

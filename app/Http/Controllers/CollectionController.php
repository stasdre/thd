<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\Asp;
use Thd\Collection;
use Illuminate\Support\Facades\Validator;
use Thd\Plan;

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

        $collection = Collection::where('slug', $slug)->firstOrFail();
        $plans = Plan::whereHas('collections' ,function($query) use($collection){
            $query->where('collection_id', '=', $collection->id);
        })->with(['images' => function($query){
            $query->where('first_image', '=', 1);
        }])->orderBy('created_at', 'desc')->paginate(12);
        //$plans->load('images');
        return view('collection.slug', ['collection'=>$collection, 'plans'=>$plans]);
    }

    public function all()
    {
        $collectionData = Asp::find(2);
        $collections = Collection::orderBy('name', 'asc')->get();

        return view('collection.all', [
            'collections'=>$collections,
            'collectionData'=>$collectionData
        ]);
    }
}

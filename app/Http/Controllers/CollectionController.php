<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\Collection;
use Illuminate\Support\Facades\Validator;

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
        return view('collection.slug', ['collection'=>$collection]);
    }
}

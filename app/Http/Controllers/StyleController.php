<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\Style;
use Illuminate\Support\Facades\Validator;

class StyleController extends Controller
{
    public function slug(Request $request, $slug)
    {
        $validator = Validator::make($request->route()->parameters(), [
            'slug' => 'required|alpha_dash|max:190',
        ]);

        if ($validator->fails()) {
            return abort(404);
        }

        $style = Style::where('slug', $slug)->firstOrFail();
        return view('style.slug', ['style'=>$style]);
    }
}

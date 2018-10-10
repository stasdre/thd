<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\Style;
use Illuminate\Support\Facades\Validator;
use Thd\Plan;

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
        $plans = Plan::whereHas('styles', function($query) use($style){
            $query->where('style_id', '=', $style->id);
        })->with(['images' => function($query){
            $query->where('first_image', '=', 1);
        }])->orderBy('created_at', 'desc')->paginate(12);

        return view('style.slug', ['style'=>$style, 'plans'=>$plans]);
    }
}

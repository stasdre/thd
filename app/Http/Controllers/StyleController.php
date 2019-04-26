<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\Asp;
use Thd\Style;
use Illuminate\Support\Facades\Validator;
use Thd\Plan;
use Illuminate\Support\Facades\Auth;

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

        $style = Style::where('slug', $slug);

        if(!Auth::user() || Auth::user()->hasRole('customer'))
            $style->where('is_active', 1);

        $dataStyle = $style->firstOrFail();

        $plans = Plan::whereHas('styles', function($query) use($dataStyle){
            $query->where('style_id', '=', $dataStyle->id);
        })->with(['images' => function($query){
            $query->where('first_image', '=', 1);
        }])->orderBy('created_at', 'desc')->paginate(12);

        return view('style.slug', ['style'=>$dataStyle, 'plans'=>$plans]);
    }

    public function all()
    {
        $styleData = Asp::find(1);
        $styles = Style::orderBy('name', 'asc')->where('is_active', 1)->get();

        return view('style.all', [
            'styles'=>$styles,
            'styleData'=>$styleData
        ]);
    }
}

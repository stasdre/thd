<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;

class InspirationController extends Controller
{
    public function index(){
        return view('inspirations.index');
    }

    public function pages($page)
    {
        if(!view()->exists('inspirations.'.$page)){
            abort(404);
        }

        return view('inspirations.'.$page);
    }
}

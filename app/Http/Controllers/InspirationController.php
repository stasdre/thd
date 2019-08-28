<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;

class InspirationController extends Controller
{
    public function index(){
        return view('inspirations.index');
    }
}

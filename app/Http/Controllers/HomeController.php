<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\Gallery;

class HomeController extends Controller
{
    /**
     * Show the index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all();
        return view('home', [
            'gallery'=>$gallery
        ]);
    }
}

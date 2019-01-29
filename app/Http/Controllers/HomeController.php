<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\AboutDavid;
use Thd\Collection;
use Thd\Gallery;
use Thd\Style;
use Thd\TextContent;

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
        $styles = Style::where('in_filter', 1)->orderBy('short_name', 'asc')->limit(18)->get();
        $collections = Collection::where('in_filter', 1)->orderBy('short_name', 'asc')->limit(18)->get();
        $aboutData = AboutDavid::find(1);
        $descDesctop = TextContent::find(1);

        return view('home', [
            'gallery'=>$gallery,
            'aboutData'=>$aboutData,
            'styles'=>$styles,
            'collections'=>$collections,
            'descDesctop'=>$descDesctop
        ]);
    }
}

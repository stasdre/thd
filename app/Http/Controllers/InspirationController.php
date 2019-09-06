<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\Inspiration;

class InspirationController extends Controller
{

    private function _getMenuItems()
    {
        return Inspiration::select('name', 'link')->where('in_menu', '=', 1)->orderBy('order', 'asc')->get();
    }

    public function index()
    {
        return view('inspirations.index', ['menu' => $this->_getMenuItems()]);
    }

    public function pages($link)
    {

        $inspiration = Inspiration::where('link', $link);
        $data = $inspiration->firstOrFail();

        return view('inspirations.page', ['data' => $data, 'menu' => $this->_getMenuItems()]);
    }
}

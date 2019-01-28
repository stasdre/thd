<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function desktopDream()
    {

        return view('admin.home-page.desktop-dream');
    }

    public function mobile()
    {

    }
}

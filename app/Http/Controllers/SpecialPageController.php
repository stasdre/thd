<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;

class SpecialPageController extends Controller
{
  public function about()
  {
    return view('pages.about');
  }
}

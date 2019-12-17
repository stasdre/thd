<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\Builder;

class BuildersController extends Controller
{
  public function index()
  {
    $recentlyBuilders = Builder::where('recently_built', 1)->limit(2)->get();
    $builders = Builder::where('show_landing', 1)->limit(4)->get();

    return view('builders.index', [
      'recently' => $recentlyBuilders,
      'builders' => $builders
    ]);
  }
}

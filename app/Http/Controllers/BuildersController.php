<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Thd\Builder;
use Thd\BuilderPreferred;
use PragmaRX\Countries\Package\Services\Countries;

class BuildersController extends Controller
{
  public function index()
  {
    $recentlyBuilders = Builder::where('recently_built', 1)->limit(2)->get();
    $builders = Builder::where('show_landing', 1)->limit(4)->get();
    $preferred = BuilderPreferred::where('show_landing', 1)->limit(4)->get();

    $countries = new Countries();
    $states = $countries->where('cca3', 'USA')->first()->hydrateStates()->states->pluck('name', 'name');

    return view('builders.index', [
      'recently' => $recentlyBuilders,
      'builders' => $builders,
      'preferred' => $preferred,
      'states' => $states
    ]);
  }
}

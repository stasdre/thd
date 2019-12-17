<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Thd\Builder;
use Thd\BuilderPreferred;
use PragmaRX\Countries\Package\Services\Countries;
use Thd\BuilderLandingBlock;

class BuildersController extends Controller
{
  public function index()
  {
    $recentlyBuilders = Builder::where('recently_built', 1)->limit(2)->get();
    $builders = Builder::where('show_landing', 1)->limit(4)->get();
    $preferred = BuilderPreferred::where('show_landing', 1)->limit(4)->get();
    $blocks = BuilderLandingBlock::find(1);

    $countries = new Countries();
    $states = $countries->where('cca3', 'USA')->first()->hydrateStates()->states->pluck('name', 'name');

    return view('builders.index', [
      'recently' => $recentlyBuilders,
      'builders' => $builders,
      'preferred' => $preferred,
      'states' => $states,
      'blocks' => $blocks
    ]);
  }

  public function search(Request $request)
  {
    $countries = new Countries();
    $states = $countries->where('cca3', 'USA')->first()->hydrateStates()->states->pluck('name', 'name');

    $builders = Builder::select();
    if (!empty($request->get('city'))) {
      $builders->orWhere('city', 'like', '%' . $request->get('city') . '%');
    }
    if (!empty($request->get('state'))) {
      $builders->orWhere('state', 'like', '%' . $request->get('state') . '%');
    }
    if (!empty($request->get('zip'))) {
      $builders->orWhere('zip', 'like', '%' . $request->get('zip') . '%');
    }

    return view('builders.search', [
      'builders' => $builders->paginate(15)->appends(Input::except('page')),
      'states' => $states,
    ]);
  }
}
